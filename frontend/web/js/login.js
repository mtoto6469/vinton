


    $('.virtualKeyboard').vkb();


//Javascript Referesh Random String

function captch() {
    var x = document.getElementById("ran")
    x.value = Math.floor((Math.random() * 10000) + 1);
}

//Javascript Captcha validation


function validation()
{

    if(document.name.value=="")
    {
        document.getElementById("name").innerHTML="Enter your Name!";
        document.form1.name.focus();
        return false;
    }

    if(document.chk.value=="")
    {
        document.getElementById("error").innerHTML="Enter Captcha!";
        document.form1.chk.focus();
        return false;
    }


    if(document.ran.value!=document.chk.value)
    {
        document.getElementById("error").innerHTML="Captcha Not Matched!";
        document.chk.focus();
        return false;
    }

    return true;
}




