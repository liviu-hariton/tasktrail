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
                                <label>Companie</label>
                                <select class="custom-select" id="idCompany" name="idCompany">
                                    <option value="">orice companie</option>
                                    <option value="0" >fără companie asociata</option>
                                    <option value="1" >Minifarm </option>
                                    <option value="18" >Dez</option>
                                </select>
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
