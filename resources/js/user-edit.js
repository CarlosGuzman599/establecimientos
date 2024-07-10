import Swal from 'sweetalert2'
$(document).ready(function(){
    console.log('___ USERS EDIT ___');

    $(".change-type").click(function(){
        let type_input = $(this).attr('id')
        if(type_input == 'img'){
            $('#img').attr('type', 'file');
            $('#img').attr('accept', 'image/jpeg');
        }else if(type_input == 'avatar'){
            $('#img').attr('type', 'text');
            $('#img').attr('accept', null);
            $('#img').attr('placeholder', 'Cargar IMG');
            $('#img').attr('value', null);
        }
    });

    $(".img-avatar").click(function(){
        let avatar = $(this).attr('id')
        $('#img').attr('value', avatar);
        $('#avatarModal').modal('toggle');
    });

    $("#img").change(function(){
        var file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (event) {
                $("#img-user").attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    $(".img-avatar").click(function(){ 
        $("#img-user").attr('src', $(this).attr('src'));
    });

    $(".btn-delete").click(function (e) { 
        e.preventDefault();
        Swal.fire({
            title: "Eliminar?",
            text: "El registro se perdera de manera definitiva",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Eliminar!"
          }).then((result) => {

            let id = $(this).attr('id');
            $.ajax({
                type: "delete",
                url: `/users/destroy/${id}`,
                data: {_token: $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    console.log(response);
                    if(response.status == 200){
                        Swal.fire({
                            title: "Eliminado!",
                            text: "Eminimado permanente.",
                            icon: "success"
                        });
                        window.location.href = "/admin/users/index";
                    }else{
                        Swal.fire({
                            icon: "error",
                            title: "Contactar administrador",
                            text: response,
                        });
                    }   
                }
            });

        });
    });

});
