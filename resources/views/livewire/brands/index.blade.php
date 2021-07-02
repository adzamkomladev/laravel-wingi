<div class="container">
    <div class="row">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBrandModal">
            Create
        </button>
    </div>
    <table class="table">
        <caption>Brands</caption>
        <thead>
            <tr>
                <th scope="col" colspan="2">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <th scope="row" colspan="2">
                        <div>
                            {{ $brand->name }}
                        </div>
                    </th>
                    <td>{{ $brand->description }}</td>
                    <td>{{ $brand->available }}</td>
                    <td>
                        <button type="button" class="btn btn-primary">View brand</button>
                        <button wire:click="$emit('updateModalOpened', {{ $brand->id }})"
                            type="button" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#updateBrandModal">Update</button>
                        <button wire:click="delete({{ $brand->id }})" type="button"
                            class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @livewire('brands.create-modal')
    @livewire('brands.update-modal')
</div>
