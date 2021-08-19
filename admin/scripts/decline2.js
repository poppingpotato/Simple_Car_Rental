// JavaScript for approving message
$(document).on('click', '.decline-user', function(){
 
    var id = $(this).attr('d-user-id');
    console.log(id);
 
    if(confirm("Are you sure you want to DECLINE this request?")){
        window.location.href ='a-decline-user.php?id='+ id;
    }
});