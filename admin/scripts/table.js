$(document).ready(function() {
    $('#test').DataTable({
        "paging":   false,
        "searching":false,
        "info": "Showing page _PAGE_ of _PAGES_",
        "lengthMenu": "Display _MENU_ records per page"
    });
});

