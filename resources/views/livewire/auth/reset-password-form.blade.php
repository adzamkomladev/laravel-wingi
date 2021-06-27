<form wire:submit.prevent="submit">
    <input type="password" wire:model="password">
    @error('password') <span class="error">{{ $message }}</span> @enderror

    <button type="submit" class="btn btn-primary">
        <span wire:loading.delay wire:target="submit" class="spinner-border spinner-border-sm" role="status"
            aria-hidden="true"></span>
        Reset password
    </button>
</form>
