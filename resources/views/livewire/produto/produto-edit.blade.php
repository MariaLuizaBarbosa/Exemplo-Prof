<div>
    <style>
        body {
            background: linear-gradient(180deg, #f8f5ff 0%, #ece4f9 100%);
            font-family: 'Poppins', sans-serif;
            color: #2d114d;
        }

        .container-editar {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 35px;
            box-shadow: 0px 4px 12px rgba(121, 73, 170, 0.15);
            margin: 50px auto;
            max-width: 700px;
        }

        h2 {
            color: #5c2d91;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
        }

        /* ===== Inputs ===== */
        .form-label {
            font-weight: 500;
            color: #4c1d95;
        }

        .form-control {
            border: 1px solid #d8c8f1;
            border-radius: 8px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            padding: 10px 12px;
        }

        .form-control:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 6px rgba(139, 92, 246, 0.4);
        }

        .text-danger {
            font-size: 0.85rem;
            color: #e11d48 !important;
        }

        /* ===== Botões ===== */
        .btn {
            border: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 10px 18px;
        }

        .btn-primary {
            background: linear-gradient(90deg, #7c3aed 0%, #a78bfa 100%);
            color: #fff;
            width: 100%;
            font-size: 1rem;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #6d28d9 0%, #8b5cf6 100%);
            box-shadow: 0 4px 10px rgba(124, 58, 237, 0.4);
        }

        .btn-voltar {
            background-color: #ede9fe;
            color: #5b21b6;
            border: 1px solid #c4b5fd;
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }

        .btn-voltar:hover {
            background-color: #c4b5fd;
            color: #fff;
            box-shadow: 0 3px 8px rgba(91, 33, 182, 0.3);
        }
    </style>

    <div class="container-editar">
        <h2>Editar Produto</h2>

        <!-- Botão Voltar -->
        <a href="{{ route('produto.index') }}" class="btn btn-voltar mb-3">← Voltar</a>

        <form wire:submit.model="update">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" wire:model="nome" class="form-control" id="nome" placeholder="Digite o nome do produto">
                @error('nome')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade</label>
                <input type="number" wire:model="quantidade" class="form-control" id="quantidade" placeholder="Informe a quantidade">
                @error('quantidade')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" wire:model="preco" class="form-control" id="preco" placeholder="Digite o preço" step="0.01">
                @error('preco')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</div>
