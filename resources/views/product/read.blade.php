<table class="table">
    <tr>
        <th>Id</th>
        <th>Product Name</th>
        <th>Action</th>
    </tr>
    <?php $i = 1; ?>
    @foreach ($data as $item)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <button type="button" class="btn btn-warning" onclick="show({{ $item->id }})">Edit</button> | <button type="button" class="btn btn-danger" onclick="destroy({{ $item->id }})">Delete</button>
            </td>
        </tr>
    <?php $i++; ?>
    @endforeach
</table>