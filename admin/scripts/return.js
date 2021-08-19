// JavaScript for returning message
$(document).on('click', '.return-object', function(){
 
    var id = $(this).attr('return-id');
    console.log(id);
 
    if(confirm("Is the car returned?")){
        window.location.href ='a-return.php?id='+ id;
    }
});