@extends('layouts.master')
@section('content')
        <div class="modal-header bg-info">
            <h4 class="modal-title text-light">Update Category Information</h4>
        </div>
        <div class="modal-body row">
            <form role="form" id="editForm" action="{{route('category.update', $data->uuid)}}" method="POST" enctype="multipart/form-data" class="clearfix"  style="width: 100%; display: contents;">
                @csrf
                @method('PUT')
                <div class="form-group col-md-6">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', $data->name) }}" required>

                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label>Description</label>
                    <textarea type="text" name="description" class="form-control" placeholder="Description">{{ old('description', $data->description) }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="form-group d-block mb-20 offset-5 col-2 pt-5 mt-5 text-center">
                    <button type="submit" name="editBtn" id="editBtn" value="Save"
                            class="btn btn-success btn-block btn-lg">Save
                    </button>
                </div>
            </form>
        </div>
    </div>


@endsection
@push('customScripts')
    <script>

    </script>
@endpush
