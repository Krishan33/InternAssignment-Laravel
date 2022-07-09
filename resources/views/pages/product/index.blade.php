@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-title">Dashboard</h1>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-8 ">
            <div class="form-group">
                <form role="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label" >Product Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Product Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlFile1">Product Image</label><br>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="images"
                        accept="image/jpg, image/jpeg, image/png">
                      </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label" >Product Price</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="price" placeholder="Enter Product Price">
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mt-5">
        <div>
            <table class="table table-success table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $key => $task)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $task->name }}</td>
                        <td><img src="{{ config('images.access_path') }}/{{ $task->images->name }}" alt="" width="100px"></td>
                        <td>{{ $task->price }}</td>
                        <td>
                            @if ($task->status == 0)
                                <span class="badge bg-warning">Inactive</span>
                            @else
                            <span class="badge bg-success">Active</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('product.status',$task->id) }}" class="btn btn-success"><i class="fas fa-check-circle"></i></a>
                            <a href="{{ route('product.delete',$task->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            <a href="javascript:void(0)" class="btn btn-dark"><i class="far fa-edit" onclick="taskEditModal({{ $task->id }})"></i></a>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
    </div>
</div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="taskEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="taskEditLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="taskEditLabel">Product Edit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="taskEditContent">
        </div>
    </div>
  </div>

@endsection

@push('css')
<style>
    .page-title {
        padding-top: 20px;
        font-size: 34px;
        color: rgb(28, 0, 104);
    }
</style>
@endpush

@push('js')
<script>
    function taskEditModal(task_id)
    {
        var data = {
            task_id: task_id,
            task_id: task_id,
            task_id: task_id,

        };
        $.ajax({
            url: "{{ route('product.edit') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            dataType: '',
            data: data,
            success: function (response) {
                console.log(response);
                $('#taskEdit').modal('show');
                $('#taskEditContent').html(response);

            }
        });
    }
</script>
@endpush
