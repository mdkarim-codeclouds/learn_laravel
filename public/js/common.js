$(document).ready(function(){
    $('.custom-file-input').change(function(){
        $(this).parent().find('.custom-file-label').html($(this).val().split('\\').pop());
    });
});
function validate_todo_form(self){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('#todo_edit_form input[name="_token"]').val()
        }
    });
    var state = $(self).data('state');
    var todo_id = $('#todo_edit_form #todo_id').val();
    var formData = {
        title: $('#todo_edit_form #title').val(),
        description: $('#todo_edit_form #description').val(),
        id: todo_id,
        _method: (state == "add") ? "POST" : "PUT"
    };
    $.ajax({
        type: "POST",
        url: (state == "add") ? "todo" : "todo/"+todo_id,
        data: formData,
        dataType: 'JSON',
        success: function (data) {
            var todo_html = '<tr id="todo_' + data.id + '">';
            todo_html += '<td class="inner-table text-right">' + data.id + '</td>';
            todo_html += '<td class="inner-table">' + data.title + '</td>';
            todo_html += '<td class="inner-table">' + data.description + '</td>';
            todo_html += '<td class="inner-table text-center">';
            todo_html += '<button type="button" data-todoid="' + data.id + '" onclick="get_todo_data(this);" class="edit-todo text-success" title="Edit ToDo" style="border:none;background-color:transparent;padding:0px;padding-right:5px;"><i class="fas fa-edit fa-lg"></i></a>';
            todo_html += '<button type="button" data-todoid="' + data.id + '" onclick="delete_todo_data(this);" class="delete-todo text-danger" title="Delete ToDo" style="border:none;background-color:transparent;padding:0px;"><i class="fas fa-trash fa-lg text-danger"></i></button>';
            todo_html += '</td>';
            todo_html += '</tr>';
            if (state == "add") {
                $('#todo_list').append(todo_html);
            } else {
                $("#todo_" + todo_id).replaceWith(todo_html);
            }
            $('#todo_edit_form').trigger("reset");
            $('#todoFormModal #add_edit_todo_btn').data('state', 'add');
            $('#todoFormModal').modal('hide');
        },
        error: function (data) { console.log(data); }
    });
}

function get_todo_data(self){
    $('#todo_edit_form').trigger("reset");
    $('#todoFormModal #add_edit_todo_btn').data('state', 'add');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('#todo_edit_form input[name="_token"]').val()
        }
    });
    $.ajax({
        type: "GET",
        url: "todo/" + $(self).data('todoid'),
        data: {},
        dataType: 'JSON',
        success: function (data) {
            if(data.todo != undefined){
                $('#todo_edit_form #todo_id').val(data.todo.id);
                $('#todo_edit_form #title').val(data.todo.title);
                $('#todo_edit_form #description').val(data.todo.description);
                $('#todoFormModal #add_edit_todo_btn').data('state', 'edit');
                $('#todoFormModal').modal('show');
            }
        },
        error: function (data) { console.log(data); }
    });
}

function delete_todo_data(self){
    $('#todo_edit_form').trigger("reset");
    $('#todoFormModal #add_edit_todo_btn').data('state', 'add');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('#todo_edit_form input[name="_token"]').val()
        }
    });
    var todo_id = $(self).data('todoid');
    $.ajax({
        type: "POST",
        url: "todo/" + todo_id,
        data: {
            _method: "DELETE"
        },
        dataType: 'JSON',
        success: function (data) {
            if(data.check == 'success'){
                $("#todo_" + todo_id).hide(1000, function() {
                    $("#todo_" + todo_id).remove();
                });
            }
        },
        error: function (data) { console.log(data); }
    });
}