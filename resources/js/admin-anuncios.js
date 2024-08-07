import DataTable from 'datatables.net';
$(document).ready(function(){
    console.log('___ ADMIN ANUNCIOS ___');

    new DataTable('#table-anuncios');
    $('#table-anuncios').removeAttr("style");
    $('.dt-paging-button').addClass('btn col btn-secondary p-2 m-1');
    $('.dt-input').addClass('form-select col-4 mb-2');

});
