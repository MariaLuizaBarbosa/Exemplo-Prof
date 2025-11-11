<div>
    <style>
        body {
            background: linear-gradient(180deg, #f8f5ff 0%, #ece4f9 100%);
            font-family: 'Poppins', sans-serif;
            color: #2d114d;
        }

        .container-lista {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0px 4px 12px rgba(121, 73, 170, 0.15);
            margin: 40px auto;
            max-width: 1100px;
        }

        h2 {
            color: #5c2d91;
            font-weight: 600;
            margin-bottom: 25px;
        }

        .form-control {
            border: 1px solid #d8c8f1;
            border-radius: 8px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 5px rgba(139, 92, 246, 0.4);
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(92, 45, 145, 0.1);
        }

        .card-header {
            background: linear-gradient(90deg, #7c3aed 0%, #a78bfa 100%);
            color: white;
            font-weight: 500;
            border-radius: 10px 10px 0 0 !important;
            padding: 12px 20px;
        }

        .card-body {
            padding: 25px;
        }

        table {
            border-radius: 8px;
            overflow: hidden;
        }

        thead {
            background-color: #8b5cf6;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f3e8ff;
        }

        tbody tr:hover {
            background-color: #ede9fe;
            transition: 0.3s;
        }

        .btn {
            border: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-info {
            background-color: #7c3aed;
            color: white;
        }

        .btn-info:hover {
            background-color: #6d28d9;
        }

        .btn-danger {
            background-color: #e11d48;
            color: white;
        }

        .btn-danger:hover {
            background-color: #be123c;
        }

        .no-results {
            text-align: center;
            color: #6b21a8;
            padding: 15px;
            font-style: italic;
        }
    </style>

    <div class="container-lista">
        <h2>Lista de Produtos</h2>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a class="btn btn-secondary me-2" href="{{ route('dashboard') }}">Voltar</a>
            <a class="btn btn-secondary me-2" href="{{ route('produto.create') }}">Cadastrar</a>
        </div>

        <div class="mb-4">
            <input type="text" wire:model.live="search" class="form-control" placeholder="🔍 Buscar produto...">
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Produtos Cadastrados</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Quantidade</th>
                                <th>Preço</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produto as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->nome }}</td>
                                    <td>{{ $p->quantidade }}</td>
                                    <td>R$ {{ number_format($p->preco, 2, ',', '.') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('produto.edit', $p->id) }}" class="btn btn-sm btn-info me-2">Editar</a>
                                        <button wire:click="delete({{ $p->id }})" class="btn btn-danger btn-sm">Excluir</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="no-results">Nenhum produto encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
