$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

class TaskTrailXHR {

}

let _tt_xhr  = new TaskTrailXHR;
