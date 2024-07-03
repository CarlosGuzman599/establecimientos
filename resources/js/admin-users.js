import DataTable from 'datatables.net';
$(document).ready(function(){
    console.log('___ ADMIN USERS ___');

    new DataTable('#table-users');
    $('#table-users').removeAttr("style");
    $('.dt-paging-button').addClass('btn col btn-secondary p-2 m-1');
    $('.dt-input').addClass('form-select col-4 mb-2');

    $(".btn-edit").click(function(){
       let id = $(this).parent().attr('id');
        $.ajax({
            type: "GET",
            url: `/users/${id}`,
            data: {_token: $('meta[name="csrf-token"]').attr('content')},
            success: function (user) {
                $('#name').val(user.name);
                $('#email').val(user.email);
                $('#phone').val(user.phone);
                $('#localidad_users_id').val(user.localidad_users_id);
                $('#state_users_id').val(user.state_users_id);
                $('#tipo_users_id').val(user.tipo_users_id);
            },error: function(error, status, xhr){
                console.log(error, status, xhr);
                Swal.fire({
                    title: 'Error!',
                    text: xhr+" \n >"+error.statusText,
                    icon: 'error',
                    confirmButtonText: 'Notificar'
                });
            }
        });

	});
});
