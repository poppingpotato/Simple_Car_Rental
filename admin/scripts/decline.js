// JavaScript for approving message
$(document).on('click', '.decline-object', function(){
 
    var id = $(this).attr('decline-id');
    console.log(id);
 
    if(confirm("Are you sure you want to DECLINE this request?")){
        window.location.href ='a-decline.php?id='+ id;
    }
});
