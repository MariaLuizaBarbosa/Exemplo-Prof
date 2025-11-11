<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use App\Livewire\Movimentacao;
use App\Livewire\Produto\ProdutoCreate;
use App\Livewire\Produto\ProdutoEdit;
use App\Livewire\Produto\ProdutoIndex;
use App\Livewire\User\UserEdit;
use App\Livewire\User\UserIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', Login::class)->name('login');

Route::get('/dashboard', Dashboard::class)->middleware('auth')->name('dashboard');
Route::get('/user', UserIndex::class)->middleware('auth')->name('user.index');
Route::get('/user/edit/{id}', UserEdit::class)->middleware('auth')->name('user.edit');

Route::get('/produto', ProdutoCreate::class)->middleware('auth')->name('produto.create');
Route::get('/produto/index', ProdutoIndex::class)->middleware('auth')->name('produto.index');
Route::get('/produto/edit/{id}', ProdutoEdit::class)->middleware('auth')->name('produto.edit');

Route::get('/movimentacao', Movimentacao::class)->middleware('auth')->name('movimentacao');