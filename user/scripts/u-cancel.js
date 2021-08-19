// JavaScript for approving message
$(document).on('click', '.cancel-user', function(){
 
    var id = $(this).attr('cancel-id');
    console.log(id);
 
    if(confirm("Are you sure you want to CANCEL this request?")){
        window.location.href ='u-cancel.php?id='+ id;
    }
});