$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

class TaskTrailXHR {
    setPerPage(obj) {
        TaskTrail.block();

        let _option = obj.value;
        let _route = obj.getAttribute('data-route');

        $.ajax({
            url: _route,
            type: 'PATCH',
            data: {
                "per_page": _option
            },
            success: function(data) {
                window.location.reload(true);
            },
            error: function(xhr, status, error) {
                TaskTrail.unblock();
                console.error(xhr.responseText);
            }
        });
    }
}

let _tt_xhr  = new TaskTrailXHR;
