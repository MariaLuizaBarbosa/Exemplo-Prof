<div>

    <form wire:submit.model='login'>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" wire:model='email' class="form-control" id="email"
                aria-describedby="email">
            @error('email')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" wire:model='password'>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" wire:model='password' class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
