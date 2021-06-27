<form wire:submit.prevent="submit">
    <input class="form-control" type="email" wire:model="email">
    @error('email') <span class="error">{{ $message }}</span> @enderror

    <button type="submit" class="btn btn-primary">
        <span wire:loading.delay wire:target="submit" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Send mail!
    </button>
</form>
