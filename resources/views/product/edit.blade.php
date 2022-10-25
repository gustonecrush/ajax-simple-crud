    <div class="mb-3">
        <label for="name" class="form-label">Product's Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" placeholder="Enter Product Name">
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" onclick="reset()">Reset</button>
        <button type="submit" class="btn btn-warning" onclick="update({{ $data->id }})">Edit Product</button>
    </div>
