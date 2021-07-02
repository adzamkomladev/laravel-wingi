<div>
    <table class="table">
        <caption>Sub Categories</caption>
        <thead>
            <tr>
                <th scope="col" colspan="2">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subCategories as $subCategory)
                <tr>
                    <th scope="row" colspan="2">
                        <div>
                            {{ $subCategory->name }}
                        </div>
                    </th>
                    <td>{{ $subCategory->description }}</td>
                    <td>{{ $subCategory->available }}</td>
                    <td>
                        <button type="button" class="btn btn-primary">View category</button>
                        <button wire:click="delete({{ $subCategory->id }})" type="button"
                            class="btn btn-primary">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
