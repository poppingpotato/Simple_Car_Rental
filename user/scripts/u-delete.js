// JavaScript for approving message
$(document).on('click', '.delete-object', function(){
 
    var id = $(this).attr('delete-id');
    console.log(id);
 
    if(confirm("Are you sure you want to DELETE this request?")){
        window.location.href ='u-delete.php?id='+ id;
    }
});