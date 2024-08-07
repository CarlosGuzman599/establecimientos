import DataTable from 'datatables.net';
$(document).ready(function(){
    console.log('___ ADMIN ESTABLECIMIENTOS ___');

    new DataTable('#table-establecimientos');
    $('#table-establecimientos').removeAttr("style");
    $('.dt-paging-button').addClass('btn col btn-secondary p-2 m-1');
    $('.dt-input').addClass('form-select col-4 mb-2');

});
