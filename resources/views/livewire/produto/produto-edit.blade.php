<div>
    <div>
        <div>

            <form wire:submit.model='update'>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="nome" wire:model='nome' class="form-control" id="nome" aria-describedby="nome">
                    @error('nome')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="quantidade" class="form-label">Quantidade</label>
                    <input type="quantidade" wire:model='quantidade' class="form-control" id="quantidade"
                        aria-describedby="quantidade">
                    @error('quantidade')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="preco" wire:model='preco' class="form-control" id="preco"
                        aria-describedby="preco">
                    @error('preco')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

</div>
