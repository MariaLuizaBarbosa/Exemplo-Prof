<div>
    <style>
        body {
            background: linear-gradient(180deg, #f8f5ff 0%, #ece4f9 100%);
            font-family: 'Poppins', sans-serif;
            color: #2d114d;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px;
            max-width: 450px;
            margin: 60px auto;
            box-shadow: 0px 4px 12px rgba(121, 73, 170, 0.15);
        }

        h2 {
            color: #5c2d91;
            font-weight: 600;
            text-align: center;
            margin-bottom: 25px;
        }

        .form-label {
            color: #5c2d91;
            font-weight: 500;
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

        .form-check-label {
            color: #5c2d91;
            font-weight: 400;
        }

        .btn-primary {
            background-color: #8b5cf6;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(139, 92, 246, 0.4);
        }

        .btn-primary:hover {
            background-color: #7c3aed;
        }

        .btn-primary:active {
            transform: scale(0.97);
        }

        .text-danger {
            font-size: 0.9rem;
        }

        .alert {
            border-radius: 8px;
            padding: 10px 15px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #e9d5ff;
            color: #5b21b6;
            border: 1px solid #c4b5fd;
        }

        .alert-danger {
            background-color: #f5e3ff;
            color: #7e22ce;
            border: 1px solid #d8b4fe;
        }
    </style>

    <div class="login-container">
        <h2>Login</h2>

        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form wire:submit.prevent="login">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" wire:model="email" class="form-control" id="email" placeholder="seuemail@exemplo.com">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" wire:model="password" placeholder="Digite sua senha">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" wire:model="remember">
                <label class="form-check-label" for="exampleCheck1">Lembrar de mim</label>
            </div>

            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                <span wire:loading.remove>Entrar</span>
                <span wire:loading>Entrando...</span>
            </button>
        </form>
    </div>
</div>
