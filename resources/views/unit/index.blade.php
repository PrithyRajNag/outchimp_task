@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12 m-3">
            @if(session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    {{ session('success') }}
                </div>
            @endif
            <div class="card border-success">
                <h4 class="card-header bg-success d-flex justify-content-between">
                    <span class="text-light align-self-center"> Unit List</span>
                    <a href="{{route('unit.create')}}" class="btn btn-light"><i class="fas fa-plus-circle"></i>&nbsp;
                        ADD</a>
                </h4>
                <div class="card-body f-14">
                    <div class="table-responsive" id="">
                        <table class="table table-striped text-canter">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contentData as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>
                                        <a href="{{route('unit.edit', $item->uuid)}}"
                                           class="btn btn-primary f-12"><i class="fas fa-edit"></i>&nbsp;</a>
                                        <form id="delete-form-{{ $loop->index }}"
                                              action="{{ route('unit.destroy', $item->uuid) }}"
                                              method="post"
                                              class="form-horizontal d-inline">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <div class="btn-group">
                                                <button onclick="deleteData({{ $loop->index }})" type="button"
                                                        class="btn btn-danger waves-effect waves-light btn-sm align-items-center">
                                                    <i class="fas fa-trash"></i>&nbsp;
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('customScripts')
    <script>
        function deleteData(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('delete-form-' + id).submit();
                    setTimeout(1000);
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        }
    </script>
@endpush
