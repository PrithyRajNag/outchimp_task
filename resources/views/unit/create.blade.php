@extends('layouts.master')
@section('content')
    <div class="modal-content">
        <div class="modal-header bg-info">
            <h4 class="modal-title text-light">Create Unit</h4>
        </div>
        <div class="modal-body row">
            <form role="form" action="{{route('unit.store')}}" class="clearfix" method="POST"
                  enctype="multipart/form-data" style="width: 100%; display: contents;">
                @csrf
                <div class="form-group col-md-6">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                           placeholder="Name" required>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label>Code</label>
                    <input type="text" name="code" value="{{ old('code') }}" class="form-control"
                           placeholder="Code" required>
                    @if ($errors->has('code'))
                        <span class="text-danger">{{ $errors->first('code') }}</span>
                    @endif
                </div>
                <div class="form-group d-block mb-20 offset-5 col-2 pt-5 mt-5 text-center">
                    <button type="submit" name="createBtn" id="createBtn" value="Save"
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
