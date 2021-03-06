
$('.select2').select2();

$('#saveUserForm').on('submit', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    console.log(formData);
    $('input:submit').attr("disabled", true);

    $("#loaderModal").modal('show');
    $.ajax({
        url: 'saveuser',
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (data) {
            $("#loaderModal").modal('hide');
            $("#userModal").modal('hide');
            $('input:submit').attr("disabled", false);
            console.log('server details:' + data);
            // $('.userdetails').html(data.userdetails);

            if (data.success == 0) {
                Command: toastr["success"](data.message, "Success");

                getUsers();
            } else {
                Command: toastr["error"](data.message, "Error");

            }
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }


        },
        error: function (jXHR, textStatus, errorThrown) {
            $("#loaderModal").modal('hide')
            swal("Error!", "Contact Systen Administrator", "error");
        }
    });




});


var datatable = $('#usersTbl').DataTable({
    responsive: true,
    language: {
        paginate:
                {previous: "&laquo;", next: "&raquo;"},
        search: "_INPUT_",
        searchPlaceholder: "Search…"
    },
    "order": [[5, "desc"]]


});






getUsers();

function getUsers()
{

    $.ajax({
        url: 'getusers',
        type: "GET",
        dataType: "json",
        success: function (data) {
            // alert(data);
            console.log('new code here 2');
            console.log(data);
            datatable.clear().draw();

            if (data.length == 0) {
                console.log("NO DATA!");
            } else {
                $.each(data, function (key, value) {

//                    if (value.firstname == null) {
//                        value.firstname = '';
//                    }
//                    if (value.institution_name == null) {
//                        value.institution_name = '';
//                    }
//
//                    if (value.usergroup_name == null) {
//                        value.usergroup_name = '';
//                    }
//                    if (value.role == null) {
//                        value.role = '';
//                    }
                    var j = -1;
                    var r = new Array();
                    // represent columns as array
                    r[++j] = '<td >' + value.name + '</td>';
                    r[++j] = '<td>' + value.username + '</td>';
                    r[++j] = '<td>' + value.email + '</td>';
                    r[++j] = '<td>' + value.phoneno + '</td>';
                    r[++j] = '<td>' + value.usergroup_name + '</td>';
                    r[++j] = '<td>' + value.createdby + '</td>';
                    r[++j] = '<td>' + value.datecreated + '</td>';
                    r[++j] = '<td>\n\
<button onclick="editUser(\'' + value.id + '\')" class="btn btn-outline-info btn-sm editBtn"  type="button">Edit</button>\n\
</td>';
                    r[++j] = '<td>\n\           <button onclick="deleteUser(\'' + value.id + '\',\''+ value.name + '\')" class="btn btn-outline-danger btn-sm editBtn"  type="button">Delete</button>\n\
</td>';

                    rowNode = datatable.row.add(r);
                });

                rowNode.draw().node();
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Contact Systen Administrator", "error");
        }
    });


}

function editUser(id) {


    $.ajax({
        url: 'user/' + id,
        type: "GET",
        //dataType: 'json',
        success: function (data) {
            $("#usergroups  option[value='']").prop("selected", true);

            console.log(data[0].instituition_code);
            if (data[0].instituition_code == null) {
                $("input").prop("readonly", false);
            }
            if (data[0].instituition_code != null) {
                $("input").prop("readonly", true);
            }
            var name = data[0].name;
            var username = data[0].username;
            var email = data[0].email;
            var usergroup = data[0].usergroup;
            var phoneno = data[0].phoneno;
            var id = data[0].id;
            $('#upusername').val(username);
            $('#upuserid').val(id);
            $('#upemail').val(email);
            $('#upname').val(name);
            $('#upphoneno').val(phoneno);
            $("#upuserGroup  option[value=" + usergroup + "]").prop("selected", true);

            $('#edituserModal').modal('show');


        }
    });

}



$('#updateUserForm').on('submit', function (e) {
    e.preventDefault();

    var formData = $(this).serialize();
    console.log(formData);
    $('input:submit').attr("disabled", true);

    $.ajax({
        url: 'userinfo',
        type: "PUT",
        data: formData,
        success: function (data) {
            $('input:submit').attr("disabled", false);
            console.log('server details:' + data);
            $('#edituserModal').modal('hide');

                if (data == 0) {
                Command: toastr["success"]("Data updated successfully", "Success");

                getUsers();
            } else {
                Command: toastr["error"]("Couldnt update data", "Error");

            }
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }


        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Contact Systen Administrator", "error");
        }
    });




});



function deleteUser(code, title) {


    
    $('#userid').val(code);
    $('#userholder').html(title);
    $('#confirmModal').modal('show');
}


$('#deleteUserForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var code = $('#userid').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');

    $.ajax({
        url: 'deleteuser/' + code,
        type: "DELETE",
        data: {_token: token},
        success: function (data) {
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
              if (data == 0) {
                Command: toastr["success"]("Deleted successfully", "Success");

                getUsers();
            } else {
                Command: toastr["error"]("Couldnt delete", "Error");

            }
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            swal("Error!", "Contact Systen Administrator", "error");
        }
    });

});


$.ajax({
    url: 'getusergroups',
    type: "GET",
    dataType: 'json',
    success: function (data) {


        $.each(data, function (i, item) {

            $('.usergroups').append($('<option>', {
                value: item.id,
                text: item.name
            }));
        });

    }
});
