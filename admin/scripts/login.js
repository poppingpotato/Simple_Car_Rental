function submitlogin() {
    var form = document.login;
    if(form.emailusername.value == ""){
        alert( "Enter email or username." );
        return false; 
    }
    else if(form.password.value == ""){
        alert( "Enter password." );
        return false;
    }
}