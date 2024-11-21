function signupvalid(){

    var regName = /^[A-Za-z\s]+$/;
    var name=document.getElementById("name").value;

    if(!regName.test(name)){
        alert("Invalid name given");
        return false;
    }

    var pass=document.getElementById("pass").value;
    var cpass=document.getElementById("cpass").value;

    if(pass!=cpass)
    {
        alert("password and confirm password is different");
        return false;
    }
    
}

function contactvalid(){


    var regName = /^[A-Za-z\s]+$/;
    var name=document.getElementById("name").value;

    if(!regName.test(name)){
        alert("Invalid name given");
        return false;
    }

    var email=document.getElementById("email").value;
    var regEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(!regEmail.test(email)){
        alert("invalid email given");
        return false;
    }

    var phone=document.getElementById("phone").value;
    var regPhone=/^\d{10}$/;

    if(!regPhone.test(phone)){
        alert("invalid phone number given");
        return false;
    }

    var qty=document.getElementById("qty").value;
    if(qty<=0)
    {
        alert("Invalid quantity given");
        return false;
    }
}

function addvalid(){
    var price=document.getElementById("price").value;
    if(price<=0)
    {
        alert("Invalid price given");
        return false;
    }
}

function mfood()
{
    return confirm("Do you really want to delete this food?");
}

function deliver()
{
    return confirm("Do you really want to deliver this food?");
}

function cancel()
{
    return confirm("Do you really want to cancel this food");
}