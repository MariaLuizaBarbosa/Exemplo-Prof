<div>
    <style>
        body {
            background: linear-gradient(180deg, #f8f5ff 0%, #ece4f9 100%);
            font-family: 'Poppins', sans-serif;
            color: #2d114d;
        }

        .container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0px 4px 12px rgba(121, 73, 170, 0.15);
            margin-top: 30px;
        }

        h2, h5 {
            color: #5c2d91;
            font-weight: 600;
        }

        a.btn-secondary {
            background-color: #7a3bd1;
            border: none;
            transition: 0.3s;
        }

        a.btn-secondary:hover {
            background-color: #5b2aa8;
        }

        .btn-primary {
            background-color: #8b5cf6;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #7c3aed;
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
        }

        .form-label {
            color: #5c2d91;
            font-weight: 500;
        }

        .form-control,
        .form-select {
            border: 1px solid #d8c8f1;
            border-radius: 8px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 5px rgba(139, 92, 246, 0.4);
        }

        .alert-success {
            background-color: #e9d5ff;
            color: #5b21b6;
            border: 1px solid #c4b5fd;
            border-radius: 8px;
        }

        .alert-warning {
            background-color: #f5e3ff;
            color: #7e22ce;
            border: 1px solid #d8b4fe;
            border-radius: 8px;
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

        .badge.bg-danger {
            background-color: #e11d48 !important;
        }

        .badge.bg-warning {
            background-color: #fbbf24 !important;
            color: #4c1d95;
        }

        .badge.bg-success {
            background-color: #10b981 !important;
        }

        /* Botão de submit com leve brilho */
        button.btn-primary {
            box-shadow: 0 2px 6px rgba(139, 92, 246, 0.4);
        }

        button.btn-primary:active {
            transform: scale(0.97);
        }
    </style>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Gestão de Estoque</h2>
            <a class="btn btn-secondary me-2" href="{{ route('dashboard') }}">Voltar</a>
        </div>

        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        @if($alerta)
            <div class="alert alert-warning">{{ $alerta }}</div>
        @endif

        <!-- Formulário de Movimentação -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Registrar Movimentação de Estoque</h5>
            </div>
            <div class="card-body">
                <form wire:submit="registroMov">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Produto</label>
                                <select class="form-select" wire:model="selectedProdutoId">
                                    <option value="">Selecione um produto</option>
                                    @foreach($produtos as $produto)
                                        <option value="{{ $produto->id }}">{{ $produto->nome }} (Estoque: {{ $produto->quantidade }})</option>
                                    @endforeach
                                </select>
                                @error('selectedProductId') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Tipo</label>
                                <select class="form-select" wire:model="tipo">
                                    <option value="entrada">Entrada</option>
                                    <option value="saida">Saída</option>
                                </select>
                                @error('tipo') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Quantidade</label>
                                <input type="number" class="form-control" wire:model="quantidade_movimentada">
                                @error('quantidade_movimentada') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Data</label>
                                <input type="date" class="form-control" wire:model="data_movimentacao">
                                @error('data_movimentacao') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar Movimentação</button>
                </form>
            </div>
        </div>

        <!-- Lista de Produtos -->
        <div class="card">
            <div class="card-header">
                <h5>Produtos Cadastrados</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Estoque Atual</th>
                                <th>Estoque Mínimo</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ Str::limit($produto->descricao, 50) }}</td>
                                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                    <td>{{ $produto->quantidade }}</td>
                                    <td>{{ $produto->quantidade_minima }}</td>
                                    <td>
                                        @if($produto->quantidade < $produto->quantidade_minima)
                                            <span class="badge bg-danger">Estoque Baixo</span>
                                        @elseif($produto->quantidade == $produto->quantidade_minima)
                                            <span class="badge bg-warning">Estoque Mínimo</span>
                                        @else
                                            <span class="badge bg-success">Normal</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        Livewire.on('redirect', (data) => {
            window.location.href = data.url;
        });
    </script>
</div>
