$(document).ready(function(){
    $('#btnCreate').click(function(){
        var car_id = $('#car_id').val();
        var cartype = $('#cartype').val();
        var description = $('#description').val();
        var transmission_id = $('#transmission_id').val();
        var hireprice = $('#hireprice').val();
        var image = $('#image').val();
        var status = $('#status').val();

        if(car_id !=1 && car_id !=2 && car_id !=3 && car_id !=4){
            alert("Select Car Category");
            return false;
        }
        else if(cartype == ""){
            alert("Input Car Type");
            return false;
        }
        else if(description == ""){
            alert("Input Seating Capacity");
            return false;
        }
        else if(transmission_id != 1 && transmission_id != 2){
            alert("Select Transmission Type");
            return false;
        }
        else if(hireprice == ""){
            alert("Input Hireprice");
            return false;
        }
        else if(image == ""){
            alert("Insert Atleast ONE Image");
            return false;
        }
        else if (status == ""){
            alert("Select status");
            return false;
        };
   


    });
}); 

$(document).ready(function(){
    $('#btnUpdate').click(function(){
        var car_id = $('#car_id').val();
        var cartype = $('#cartype').val();
        var description = $('#description').val();
        var transmission_id = $('#transmission_id').val();
        var hireprice = $('#hireprice').val();
        var image = $('#image').val();
        var status = $('#status').val();

        if(car_id !=1 && car_id !=2 && car_id !=3 && car_id !=4){
            alert("Select Car Category");
            return false;
        }
        else if(cartype == ""){
            alert("Input Car Type");
            return false;
        }
        else if(description == ""){
            alert("Input Seating Capacity");
            return false;
        }
        else if(transmission_id != 1 && transmission_id != 2){
            alert("Select Transmission Type");
            return false;
        }
        else if(hireprice == ""){
            alert("Input Hireprice");
            return false;
        }
        else if(image == ""){
            alert("Insert Atleast ONE Image");
            return false;
        }
        else if (status == ""){
            alert("Select status");
            return false;
        }
   


    });
}); 
