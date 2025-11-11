<div>
    <style>
        body {
            background: linear-gradient(180deg, #f8f5ff 0%, #ece4f9 100%);
            font-family: 'Poppins', sans-serif;
            color: #2d114d;
        }

        .container-usuarios {
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

        /* ====== Input de busca ====== */
        .form-control {
            border: 1px solid #d8c8f1;
            border-radius: 8px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 5px rgba(139, 92, 246, 0.4);
        }

        /* ====== Cards ====== */
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

        /* ====== Tabela ====== */
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

        th {
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        /* ====== Botões ====== */
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

        /* ====== Botão Voltar ====== */
        .btn-voltar {
            background-color: #ede9fe;
            color: #5b21b6;
            border: 1px solid #c4b5fd;
            transition: all 0.3s ease;
            margin-bottom: 20px;
            padding: 8px 16px;
            font-weight: 500;
        }

        .btn-voltar:hover {
            background-color: #c4b5fd;
            color: #fff;
            box-shadow: 0 3px 8px rgba(91, 33, 182, 0.3);
        }

        .no-results {
            text-align: center;
            color: #6b21a8;
            padding: 15px;
            font-style: italic;
        }
    </style>

    <div class="container-usuarios">
        <h2>Gerenciamento de Usuários</h2>

        <!-- Botão Voltar -->
        <a href="{{ route('dashboard') }}" class="btn btn-voltar">← Voltar</a>

        <div class="mb-4">
            <input type="text" wire:model.live="search" class="form-control" placeholder="🔍 Buscar usuário...">
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="m-0">Usuários Cadastrados</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $u)
                                <tr>
                                    <td>{{ $u->id }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('user.edit', $u->id) }}" class="btn btn-sm btn-info me-2">Editar</a>
                                        <button wire:click="delete({{ $u->id }})" class="btn btn-danger btn-sm">Excluir</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="no-results">Nenhum usuário encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
