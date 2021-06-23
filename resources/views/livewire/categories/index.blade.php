<div class="container">
    <div class="row d-flex w-100">
        <button type="button" class="btn btn-primary">Create category</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" colspan="2">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row" colspan="2">
                        <div>
                            {{ $cateogry->name }}
                        </div>
                    </th>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->available }}</td>
                    <td>
                        <button type="button" class="btn btn-primary">View category</button>
                        <button type="button" class="btn btn-primary">Delete category</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</div>
