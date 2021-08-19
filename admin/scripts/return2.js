// JavaScript for returning message
$(document).on('click', '.return-user', function(){
 
    var id = $(this).attr('r-user-id');
    console.log(id);
 
    if(confirm("Is the car returned?")){
        window.location.href ='a-returned-user.php?id='+ id;
    }
});