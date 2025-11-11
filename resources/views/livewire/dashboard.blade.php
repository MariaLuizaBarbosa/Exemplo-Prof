<div>
    <style>
        body {
            background: linear-gradient(180deg, #f8f5ff 0%, #ece4f9 100%);
            font-family: 'Poppins', sans-serif;
            color: #2d114d;
        }

        /* ====== Navbar ====== */
        .navbar-custom {
            background: linear-gradient(90deg, #7c3aed 0%, #a78bfa 100%);
            box-shadow: 0 2px 10px rgba(92, 45, 145, 0.25);
        }

        .navbar-brand {
            font-weight: 600;
            color: #fff !important;
            letter-spacing: 1px;
        }

        .navbar-text {
            color: #ede9fe;
            font-weight: 500;
        }

        .btn-logout {
            background-color: transparent;
            border: 1px solid #ede9fe;
            color: #fff;
            border-radius: 8px;
            padding: 5px 12px;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background-color: #fff;
            color: #5c2d91;
        }

        /* ====== Cards ====== */
        .dashboard-container {
            max-width: 1100px;
            margin: 50px auto;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(92, 45, 145, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 15px rgba(92, 45, 145, 0.15);
        }

        .card-body {
            padding: 25px;
        }

        .card-title {
            color: #5c2d91;
            font-weight: 600;
        }

        .card-text {
            color: #6b21a8;
        }

        .btn-primary {
            background-color: #8b5cf6;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            padding: 8px 16px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(139, 92, 246, 0.4);
        }

        .btn-primary:hover {
            background-color: #7c3aed;
        }

        .btn-primary:active {
            transform: scale(0.97);
        }

        /* ====== Responsividade ====== */
        @media (max-width: 768px) {
            .navbar-text {
                display: none;
            }

            .card {
                margin-bottom: 20px;
            }
        }
    </style>

    <!-- ====== NAVBAR ====== -->
    <nav class="navbar navbar-expand-lg navbar-custom mb-4">
        <div class="container">
            <span class="navbar-brand">Moda Express</span>
            <div class="navbar-nav ms-auto d-flex align-items-center">
                <span class="navbar-text me-3">👋 Olá, {{ $user->name }}</span>
                <button class="btn btn-logout btn-sm" wire:click="logout">Sair</button>
            </div>
        </div>
    </nav>

    <!-- ====== CONTEÚDO PRINCIPAL ====== -->
    <div class="container dashboard-container">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">📦 Gestão de Produtos</h5>
                        <p class="card-text">Gerencie os produtos da loja</p>
                        <a href="{{ route('produto.index') }}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">📊 Gestão de Estoque</h5>
                        <p class="card-text">Controle as movimentações</p>
                        <a href="{{ route('movimentacao') }}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">👥 Usuários</h5>
                        <p class="card-text">Gerencie os acessos do sistema</p>
                        <a href="{{ route('user.index') }}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
