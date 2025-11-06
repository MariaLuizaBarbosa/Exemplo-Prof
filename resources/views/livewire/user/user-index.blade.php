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
                            <th>id</th>
                            <th>nome</th>
                            <th>email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                            <tr>
                                <td>{{ $u->id }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $u->id) }}" class="btn btn-sm btn-info">Editar</a>
                                    <button wire:click='delete({{$u->id}})' class="btn btn-danger btn-sm">Excluir</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
