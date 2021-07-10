function showDiv(){
    var div = document.getElementById("shadow-log");
    var reg = document.getElementById("reg-form");
    var log = document.getElementById("login-form");
    var ani = document.getElementById("ani-reg");
    if(!div.style.display || div.style.display == "none")
    {
        div.style.display = "block";
        reg.style.display = "none";
        ani.style.display = "none";
        log.style.display = "block";
    }
    else
    {
        div.style.display = "none";
    }
}

function closeDiv()
{
    var div = document.getElementById("shadow-log");
    if(!div.style.display || div.style.display == "none")
    {
        div.style.display = "block";
    }
    else
    {
        div.style.display = "none";
    }
}

function switchReg()
{
    var reg = document.getElementById("reg-form");
    var log = document.getElementById("login-form");
    var ani = document.getElementById("ani-reg");

    if(!reg.style.display || reg.style.display == "none")
    {
        log.style.display = "none";
        ani.style.display = "block";
        reg.style.display = "block";  
    }
    else
    {
        reg.style.display = "none";
        ani.style.display = "none";
        log.style.display = "block";
    }
}