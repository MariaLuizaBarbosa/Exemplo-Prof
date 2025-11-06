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
            'quantidade' => '55',
            'preco' => '30.00'
        ]);

        Produto::create([
            'nome' => 'Produto 2',
            'quantidade' => '55',
            'preco' => '70.00'
        ]);

        Produto::create([
            'nome' => 'Produto 3',
            'quantidade' => '55',
            'preco' => '120.00'
        ]);
    }
}
