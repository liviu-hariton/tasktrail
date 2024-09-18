@extends('layout')

@section('meta-title', 'Roles')
@section('section-title', 'Roles')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Roles List <span class="badge badge-info">{{ $roles_count }}</span></h4>
            </div>

            <div class="user-list-files d-flex">
                <a class="bg-success" href="{{ route('roles.create') }}"> Create new role <i class="las la-plus-circle"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table id="users-list-table" class="table table-striped table-hover table-sm  mt-4">
                <thead>
                <tr class="ligth">
                    <th>Role name</th>
                    <th>Permissions</th>
                    <th>Users</th>
                    <th class="text-center">...</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    @include('sections.roles.blocks.listing_item', $role)
                @endforeach
                </tbody>
            </table>

            @if(count($roles) == 0)
                <div class="alert alert-info mt-3" role="alert">
                    No roles found.
                </div>
            @endif

            <div class="row justify-content-between  mt-3">
                <div class="col-md-2">
                    @include('components.general.items-per-page')
                </div>
                <div class="col-md-10">
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
