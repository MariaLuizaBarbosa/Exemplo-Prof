<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'quantidade',
        'quantidade_minima',
        'preco',
    ];

    public function movimentacoes(){
        return $this->hasMany(Movimentacao::class, 'produto_id');
    }

    use HasFactory;
}
