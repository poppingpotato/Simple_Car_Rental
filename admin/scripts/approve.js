// JavaScript for approving message
$(document).on('click', '.approve-object', function(){
 
    var id = $(this).attr('approve-id');
    console.log(id);
 
    if(confirm("Are you sure you want to Approve this request?")){
        window.location.href ='a-approve.php?id='+ id;
    }
});