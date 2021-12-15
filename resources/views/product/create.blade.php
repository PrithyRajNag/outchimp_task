@extends('layouts.master')
@section('content')
    <div class="modal-content">
        <div class="modal-header bg-info">
            <h4 class="modal-title text-light">Create Category</h4>
        </div>
        <div class="modal-body row">
            <form role="form" action="{{route('product.store')}}" class="clearfix" method="POST"
                  enctype="multipart/form-data" style="width: 100%; display: contents;">
                @csrf
                <div class="form-group col-md-6">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option hidden></option>
                        @foreach($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label>Unit</label>
                    <select name="unit_id" class="form-control">
                        <option hidden></option>
                        @foreach($units as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('unit_id'))
                        <span class="text-danger">{{ $errors->first('unit_id') }}</span>
                    @endif
                </div>
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
                <div class="form-group col-md-6">
                    <label>Brand</label>
                    <input type="text" name="brand" value="{{ old('brand') }}" class="form-control"
                           placeholder="Brand" required>
                    @if ($errors->has('brand'))
                        <span class="text-danger">{{ $errors->first('brand') }}</span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label>Description</label>
                    <textarea type="text" name="description" class="form-control"
                              placeholder="Description">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control"
                           placeholder="Quantity" required>
                    @if ($errors->has('quantity'))
                        <span class="text-danger">{{ $errors->first('quantity') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label>Alert Quantity</label>
                    <input type="number" name="alert_quantity" value="{{ old('alert_quantity') }}" class="form-control"
                           placeholder="Alert Quantity" required>
                    @if ($errors->has('alert_quantity'))
                        <span class="text-danger">{{ $errors->first('alert_quantity') }}</span>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="">Image:</label>
                    <div class="custom-file">
                        <input type="file" name="image" id="image" value="{{ old('image') }}" />
                    </div>
                    <div class="form-group">
                        <div id="image-holder"  style="width: 200px; position: relative"></div>
                    </div>
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        @include('layouts.partials.statusDropdown')
                    </select>
                    <div id="status_error" class="text-danger"></div>
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
