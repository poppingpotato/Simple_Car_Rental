$(document).on('click','.view-id',function(){

    var vid = $(this).attr('view-id');

    console.log(vid);

    $.ajax({
        url:'a-view-vehicle.php',
        method: "POST",
        data:{id:vid},

        success:function(data){
            $('#viewContent').html(data);
            $('#viewmodal').modal('show');            
        }
    })
});