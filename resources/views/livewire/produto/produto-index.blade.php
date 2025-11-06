<div>
    <div>
    <div class="mb-3">
        <input type="text" wire:model.live='search' class="form-control">
    </div>

    <div class="mt-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>QUANTIDADE</th>
                            <th>PREÇO</th>
                            <th>AÇÕES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produto as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->nome }}</td>
                                <td>{{ $p->quantidade }}</td>
                                <td>{{ $p->preco }}</td>
                                <td>
                                    <a href=" {{ route('produto.edit', $p->id) }} " class="btn btn-sm btn-info">Editar</a>
                                    <button wire:click='delete({{$p->id}})' class="btn btn-danger btn-sm">Excluir</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
