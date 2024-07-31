@extends('layout')

@section('meta-title', 'Users / Create user')
@section('section-title', 'Users')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Create a new user</h4>
            </div>

            <div class="user-list-files d-flex">
                <a class="bg-info-light" href="{{ route('users.index') }}"> Back to list <i class="las la-undo"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="new-user-info">
                <form class="form-horizontal" method="post" action="{{ route('users.store') }}" name="f-new-user" id="f-new-user" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mb-3">Login details</h5>

                            <div class="form-group row">
                                <label class="control-label col-md-3 align-self-center" for="email">Email: <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 align-self-center" for="password">Password: <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <div class="badge-indicator-absolute">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="btn btn-light generate-password" data-toggle="tooltip" title="Generează o parolă aleatorie" data-lenght="15"><i class="las la-user-secret font-size-20 mt-2"></i></span>
                                            </span>
                                            <div class="badge password-indicator-badge-absolute"></div>
                                            <input type="text" class="form-control password-field" name="password" id="password" required value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 align-self-center"></label>
                                <div class="col-md-9">
                                    <div class="custom-control custom-switch custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" name="send_login" id="send_login" value="1" {{ old('send_login') ? old('send_login') !== '1' ? '' : 'checked' : 'checked' }}>
                                        <label class="custom-control-label" for="send_login">trimite datele de autentificare pe email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 align-self-center"></label>
                                <div class="col-md-9">
                                    <div class="custom-control custom-switch custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" name="is_active" id="is_active" value="1" {{ old('is_active') ? old('is_active') !== '1' ? '' : 'checked' : 'checked' }}>
                                        <label class="custom-control-label" for="is_active">contul este activ (se poate autentifica imediat)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-3">Profile details</h5>

                            <div class="form-group row">
                                <label class="control-label col-md-3 align-self-center" for="firstname">First name: <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="firstname" id="firstname" value="{{ old('firstname') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 align-self-center" for="lastname">Last name: <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="lastname" id="lastname" value="{{ old('lastname') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 align-self-center" for="lastname">Phone number:</label>
                                <div class="col-md-9">
                                    <input type="tel" pattern="[0-9]*" inputmode="numeric" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 align-self-center">Profile picture:</label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="avatar" id="avatar">
                                        <label class="custom-file-label" for="avatar">Alege imaginea</label>
                                    </div>
                                    <span class="text-muted font-size-12">(tip de fișier agreat: JPG / JPEG sau PNG)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="go-new-user" id="go-new-user" class="btn btn-success float-right">Add New User <i class="las la-chevron-circle-right"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
