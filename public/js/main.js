$(document).ready(function(){

    // Starting AJAX ..
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Start Datatabe ..
    $('#myTable').DataTable();

    // Switching Active Link ..
    $('.skin-blue .sidebar-menu>li>a').click(function(){
        $(this).parent().addClass('active').siblings().removeClass('active');
    });



});
