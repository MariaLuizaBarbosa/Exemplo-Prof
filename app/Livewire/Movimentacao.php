<?php

namespace App\Livewire;

use App\Models\Movimentacao as ModelsMovimentacao;
use App\Models\Produto;
use Livewire\Component;

class Movimentacao extends Component
{
    public $produtos;
    public $selectedProdutoId;
    public $tipo = 'saida';
    public $quantidade_movimentada;
    public $data_movimentacao;
    public $alerta;

    protected $rules = [
        'selectedProdutoId' => 'required|exists:produtos,id',
        'tipo' => 'required|in:entrada,saida',
        'quantidade_movimentada' => 'required|integer|min:1',
        'data_movimentacao' => 'required|date'
    ];

    public function mount(){
        $this->produtos = Produto::orderBy('nome')->get();
        $this->data_movimentacao = now()->format('Y-m-d');
    }

    public function registroMov(){
        $this->validate();

        $produto = Produto::findOrFail($this->selectedProdutoId);

        if ($this->tipo === 'saida' && $produto->quantidade < $this->quantidade_movimentada){
            $this->addError('quantidade_movimentada', 'Quantidade em estoque insuficiente.');
            return;
        }

        if ($this->tipo === 'entrada'){
            $produto->quantidade = $produto->quantidade + $this->quantidade_movimentada;
        } else {
            $produto->quantidade = $produto->quantidade - $this->quantidade_movimentada;
        }



        ModelsMovimentacao::create([
            'produto_id' => $this->selectedProdutoId,
            'tipo' => $this->tipo,
            'quantidade' => $this->quantidade_movimentada,
            'data_movimentacao' => $this->data_movimentacao
        ]);

        // Verificar estoque baixo
        $produto->save();
        $produto->refresh();
        if ($produto->quantidade < $produto->quantidade_minima) {
            $this->alerta = "ALERTA: Estoque baixo para {$produto->nome}. Quantidade atual: {$produto->quantidade}";
        } else {
            $this->alerta = '';
        }

        session()->flash('message', 'Movimentação registrada com sucesso!');
        $this->reset(['quantidade_movimentada', 'tipo']);
        $this->produtos = Produto::orderBy('nome')->get();
    }

    public function render()
    {
        return view('livewire.movimentacao');
    }
}
