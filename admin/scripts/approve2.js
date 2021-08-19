// JavaScript for approving message
$(document).on('click', '.approve-user', function(){
 
    var id = $(this).attr('user-id');
    console.log(id);
 
    if(confirm("Are you sure you want to Approve this request?")){
        window.location.href ='a-approve-user.php?id='+ id;
    }
});