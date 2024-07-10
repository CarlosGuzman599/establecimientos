import Swal from 'sweetalert2'
$(document).ready(function(){
    console.log('___ UPDATE ESTABLECIMIENTO ___')

    $(".btn-delete").click(function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        Swal.fire({
            title: "Eliminar?",
            text: "El registro colocara temporalmente como inactivo, asi como los anuncios que contenga",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Eliminar!"
          }).then((result) => {

            let id = $(this).attr('id');
            $.ajax({
                type: "put",
                url: `/establecimiento/update/${id}`,
                data: {_token: $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {

                    console.log(response);
                    if(response.status == 200){
                        Swal.fire({
                            title: "Eliminado!",
                            text: "Para reavilitar solicite al administrador.",
                            icon: "success"
                        });
                        window.location.href = "/home";
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