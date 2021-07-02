<div wire:ignore.self x-data="{ updateBrandModal: new bootstrap.Modal($el, { keyboard: false }) }"
    x-on:brand-updated.window="updateBrandModal.hide()" class="modal fade" id="updateBrandModal" tabindex="-1"
    aria-labelledby="updateBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateBrandModalLabel">Update Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="submit" class="row g-3 needs-validation">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input wire:model="name" type="text" class="form-control" id="name" name="name">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 row">
                        <div class="col-md-6">
                            <label for="image" class="form-label">Image</label>
                            <input wire:model="image" class="form-control" type="file" id="image" name="image">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            @if ($image)
                                <img class="img-fluid" src="{{ $this->imageUrl }}">
                            @endif
                        </div>

                    </div>
                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea wire:model="description" class="form-control" id="description" rows="3"
                            name="description"></textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">
                            <span wire:loading.delay wire:target="submit" class="spinner-border spinner-border-sm"
                                role="status" aria-hidden="true"></span>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
