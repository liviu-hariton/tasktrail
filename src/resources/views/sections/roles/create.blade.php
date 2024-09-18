@extends('layout')

@section('meta-title', 'Users / Create role')
@section('section-title', 'Roles')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Create a new role</h4>
            </div>

            <div class="user-list-files d-flex">
                <a class="bg-info-light" href="{{ route('roles.index') }}"> Back to list <i class="las la-undo"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="new-user-info">
                <form class="form-horizontal" method="post" action="{{ route('roles.store') }}" name="f-new-role" id="f-new-role" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mb-3">Role details</h5>

                            <div class="form-group row">
                                <label class="control-label col-md-3 align-self-center" for="name">Name: <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required>

                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 align-self-center" for="description">Description:</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>

                                    <span class="text-muted font-size-12">(doar pentru uz intern)</span>

                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="go-new-role" id="go-new-role" class="btn btn-success float-right">Add New Role <i class="las la-chevron-circle-right"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
