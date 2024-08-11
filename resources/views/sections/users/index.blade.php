@extends('layout')

@section('meta-title', 'Users')
@section('section-title', 'Users')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">User List <span class="badge badge-info">{{ $Users_count }}</span></h4>
            </div>

            <div class="user-list-files d-flex">
                <a class="bg-success" href="{{ route('users.create') }}"> Create new user <i class="las la-plus-circle"></i></a>
                <a class="bg-primary" href="javascript:void();" data-toggle="modal" data-target="#users_search" title="Search for specific users"> <i class="las la-search"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-md-12">
                    <div class="btn-group">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                Bulk actions
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="las la-ban"></i> Disable</a>
                                <a class="dropdown-item" href="#"><i class="las la-trash-alt"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table id="users-list-table" class="table table-striped table-hover dataTable mt-4">
                <thead>
                    <tr class="ligth">
                        <th class="text-center">
                            <div class="checkbox">
                                <input type="checkbox" class="checkbox-input" id="checkbox1">
                            </div>
                        </th>

                        <th colspan="2">User</th>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Company</th>
                        <th>Active</th>
                        <th class="text-center">...</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    @include('sections.users.blocks.listing_item', $user)
                @endforeach
                </tbody>
            </table>

            <div class="row justify-content-between  mt-3">
                <div class="col-md-2">
                    @include('components.general.items-per-page')
                </div>
                <div class="col-md-10">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('sections.users.blocks.search')
@endsection
