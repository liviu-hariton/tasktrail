@extends('layout')

@section('meta-title', 'Users')
@section('section-title', 'Users')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">User List <span class="badge badge-info">12</span></h4>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-md-9">
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
                <div class="col-md-3">
                    <div class="user-list-files d-flex">
                        <a class="bg-success" href="javascript:void();"> Create new user <i class="las la-plus-circle"></i></a>
                        <a class="bg-primary" href="javascript:void();" data-toggle="modal" data-target="#users_search" title="Search for specific users"> <i class="las la-search"></i></a>
                    </div>
                </div>
            </div>

            <table id="user-list-table" class="table table-striped dataTable mt-4" role="grid" aria-describedby="user-list-page-info">
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
                    <th>Join Date</th>
                    <th>Last update</th>
                    <th>Last login</th>
                    <th>Active</th>
                    <th class="text-center">...</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center">
                        <div class="checkbox">
                            <input type="checkbox" class="checkbox-input" id="checkbox2">
                        </div>
                    </td>

                    <td class="text-center">
                        <img class="rounded img-fluid avatar-40" src="../assets/images/user/01.jpg" alt="profile">
                    </td>
                    <td>Admin</td>

                    <td>Anna Sthesia</td>
                    <td>annasthesia@gmail.com</td>
                    <td>(760) 756 7568</td>
                    <td><span class="badge bg-primary">Client</span></td>
                    <td>Acme Corporation</td>
                    <td>2019/12/01</td>
                    <td>2019/12/01</td>
                    <td>2019/12/01</td>
                    <td class="text-center">
                        <div class="custom-control custom-switch custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="customSwitch2" checked="">
                            <label class="custom-control-label" for="customSwitch2">&nbsp;</label>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="flex align-items-center list-user-action">
                            <a class="btn btn-sm bg-secondary" data-toggle="tooltip" data-placement="top" title="Edit" href="#"><i class="ri-pencil-line mr-0"></i></a>
                            <a class="btn btn-sm bg-danger" data-toggle="tooltip" data-placement="top" title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="row justify-content-between  mt-3">
                <div class="col-md-2">
                    <select class="custom-select">
                        <option value="1" >câte 1 pe pagină</option>
                        <option value="2" >câte 2 pe pagină</option>
                        <option value="3" >câte 3 pe pagină</option>
                        <option value="4" >câte 4 pe pagină</option>
                        <option value="5" >câte 5 pe pagină</option>
                        <option value="10" >câte 10 pe pagină</option>
                        <option value="15" >câte 15 pe pagină</option>
                        <option value="20" selected="selected">câte 20 pe pagină</option>
                        <option value="30" >câte 30 pe pagină</option>
                        <option value="40" >câte 40 pe pagină</option>
                        <option value="50" >câte 50 pe pagină</option>
                        <option value="100" >câte 100 pe pagină</option>
                        <option value="200" >câte 200 pe pagină</option>
                        <option value="300" >câte 300 pe pagină</option>
                        <option value="400" >câte 400 pe pagină</option>
                        <option value="500" >câte 500 pe pagină</option>
                    </select>
                </div>
                <div class="col-md-10">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div id="users_search" class="modal modal-right fade" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header text-white border-0 py-2">
                    <h6 class="modal-title font-weight-semibold py-1 my-auto text-uppercase">Caută utilizatori</h6>
                    <button type="button" class="btn btn-icon btn-sm rounded-pill my-1 ml-auto" data-dismiss="modal"><i class="las la-times"></i></button>
                </div>

                <div class="modal-body p-0">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" name="f_users_search" id="f_users_search">
                                <input type="hidden" name="created_range" id="created_range" value="2021-05-24|2022-11-07" />
                                <input type="hidden" name="modified_range" id="modified_range" value="2023-02-17|2024-01-20" />

                                <div class="form-group">
                                    <input type="text" name="src_query" id="src_query" class="form-control" placeholder="Caută după utilizator, nume, telefon sau email" value="">
                                </div>

                                <div class="form-group mt-3">
                                    <label>Creați în perioada</label><br />
                                    <div data-field="created_range" class="dates-range tooltips btn btn-info" data-container="body" data-placement="bottom" data-original-title="Alege un interval calendaristic">
                                        <i class="las la-calendar"></i>&nbsp;
                                        <span class="thin text-capitalize hidden-xs">24 Mai 2021 - 7 Noiembrie 2022</span>&nbsp;
                                        <i class="las la-angle-down"></i>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label>Modificați în perioada</label><br />
                                    <div data-field="modified_range" class="dates-range tooltips btn btn-info" data-container="body" data-placement="bottom" data-original-title="Alege un interval calendaristic">
                                        <i class="las la-calendar"></i>&nbsp;
                                        <span class="thin text-capitalize hidden-xs">17 Februarie 2023 - 20 Ianuarie 2024</span>&nbsp;
                                        <i class="las la-angle-down"></i>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label>Autentificați în perioada</label><br />
                                    <div data-field="logged_in_range" class="dates-range tooltips btn btn-info" data-container="body" data-placement="bottom" data-original-title="Alege un interval calendaristic">
                                        <i class="las la-calendar"></i>&nbsp;
                                        <span class="thin text-capitalize hidden-xs">17 Februarie 2023 - 20 Ianuarie 2024</span>&nbsp;
                                        <i class="las la-angle-down"></i>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label>Rol</label>
                                    <select class="custom-select" id="idRole" name="idRole">
                                        <option value="">orice rol</option>
                                        <option value="0" >fără rol asociat</option>
                                        <option value="1" >Superadmin </option>
                                        <option value="18" >Proprietar (test mention)</option>
                                        <option value="19" >Operator </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Limbă editare conținut:</label><br />
                                    <select class="select-icons" name="edit_lang" id="edit_lang" style="width:100%;">
                                        <option value="1" data-icon="fi fi-ro" >Română</option>
                                        <option value="2" data-icon="fi fi-us" >English (US)</option>
                                        <option value="3" data-icon="fi fi-fr" >Français</option>
                                        <option value="11" data-icon="fi fi-it" >Italiano</option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label>Stare</label><br />
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="active" id="active_1"  value="1">
                                        <label class="custom-control-label" for="active_1">activ</label>
                                    </div>

                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" name="active" id="active_0"  value="0">
                                        <label class="custom-control-label" for="active_0">inactiv</label>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-5">
                                    <button type="submit" class="btn btn-light" data-dismiss="modal">Renunță</button>

                                    <button type="submit" name="save_form_data" id="save_form_data" class="btn btn-success">Caută <i class="las la-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
