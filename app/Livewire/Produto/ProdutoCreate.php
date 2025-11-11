<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;

class ProdutoCreate extends Component
{
    public $nome;
    public $descricao;
    public $quantidade;
    public $quantidade_minima;
    public $preco;

    protected $rules = [
        'nome' => 'required',
        'quantidade' => 'required',
        'preco' => 'required'
    ];

    protected $messages = [
        'nome.required' => 'Preencher Nome',
        'quantidade.required' => 'Preencher Quantidade',
        'preco.required' => 'Preencher Preco'
    ];

    public function store(){
        $this->validate();

        Produto::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'quantidade' => $this->quantidade,
            'quantidade_minima' => $this->quantidade_minima,
            'preco' => $this->preco
        ]);
        session()->flash('success', 'Cadastrado');
        return redirect()->route('produto.index');
    }

    public function render()
    {
        return view('livewire.produto.produto-create');
    }
}
