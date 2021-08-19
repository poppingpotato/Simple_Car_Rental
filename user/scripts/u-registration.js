function submitreg() {
    var form = document.reg;
    if(form.firstname.value == ""){
    alert( "Enter firstname." );
    return false;
    }
    else if(form.lastname.value == ""){
    alert( "Enter lastname." );
    return false;
    }
    else if(form.uname.value == ""){
    alert( "Enter username." );
    return false;
    }
    else if(form.upass.value == ""){
    alert( "Enter password." );
    return false;
    }
    else if(form.uemail.value == ""){
    alert( "Enter email." );
    return false;
    }
    else if(form.phone.value == ""){
    alert( "Enter phone no." );
    return false;
    }
}

