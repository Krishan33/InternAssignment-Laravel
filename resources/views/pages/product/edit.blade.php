<form action="{{ route('product.update', $task->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <input type="text" class="form-control"  name="name" value="{{ $task->name }}" placeholder="Enter Product Name" required>
            </div>
            <br>
            <div class="form-group">
                <input type="file" class="form-control"  name="images" value="{{ $task->image_id }}" placeholder="Enter Product Name" required>
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control"  name="price" value="{{ $task->price }}" placeholder="Enter Product Name" required>
            </div>
        </div>
        <div class="col-lg-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
  </form>
