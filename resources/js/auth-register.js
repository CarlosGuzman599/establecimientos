$(document).ready(function(){
    console.log('___ AUTH REGISTER ___');

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
});
