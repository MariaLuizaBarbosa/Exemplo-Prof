<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;

class ProdutoEdit extends Component
{
    public $produtoId;
    public $nome;
    public $quantidade;
    public $preco;

    public function mount($id)
    {
        $this->produtoId = $id;
        $produto = Produto::find($this->produtoId);

        if ($produto) {
            $this->nome = $produto->nome;
            $this->quantidade = $produto->quantidade;
            $this->preco = $produto->preco;
        }
    }

    public function update(){
        $produto = Produto::find($this->produtoId);
        $produto->update([
            'nome' => $this->nome,
            'quantidade' => $this->quantidade,
            'preco' => $this->preco,
        ]);
        session()->flash('success', 'Atualizado');
        return redirect()->route('produto.index');
    }

    public function render()
    {
        return view('livewire.produto.produto-edit');
    }
}
