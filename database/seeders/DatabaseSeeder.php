<?php

namespace Database\Seeders;

use App\Models\Produto;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test1@example.com',
            'password' => Hash::make('123456')
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test2@example.com',
            'password' => Hash::make('123456')
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test3@example.com',
            'password' => Hash::make('123456')
        ]);

        Produto::create([
            'nome' => 'Produto 1',
            'descricao' => 'AAA',
            'quantidade' => '55',
            'quantidade_minima' => '5',
            'preco' => '30.00'
        ]);

        Produto::create([
            'nome' => 'Produto 2',
            'descricao' => 'BBB',
            'quantidade' => '60',
            'quantidade_minima' => '10',
            'preco' => '50.00'
        ]);

        Produto::create([
            'nome' => 'Produto 3',
            'descricao' => 'CCC',
            'quantidade' => '44',
            'quantidade_minima' => '8',
            'preco' => '80.00'
        ]);
    }
}
