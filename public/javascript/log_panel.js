function showDiv(){
    var div = document.getElementById("shadow-log");
    var reg = document.getElementById("reg-form");
    var log = document.getElementById("login-form");
    var ani = document.getElementById("ani-reg");
    var reg_inf = document.getElementById("reg-inf");
    var log_inf = document.getElementById("log-inf");
    if(!div.style.display || div.style.display == "none")
    {
        div.style.display = "block";
        reg.style.display = "none";
        ani.style.display = "none";
        log.style.display = "block";
        log_inf.style.display= "block";
        reg_inf.style.display = "none";
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
    var reg_inf = document.getElementById("reg-inf");
    var log_inf = document.getElementById("log-inf");

    if(!reg.style.display || reg.style.display == "none")
    {
        log.style.display = "none";
        log_inf.style.display= "none";
        reg_inf.style.display = "block";
        ani.style.display = "block";
        reg.style.display = "block";  
    }
    else
    {
        reg.style.display = "none";
        ani.style.display = "none";
        log.style.display = "block";
        log_inf.style.display= "block";
        reg_inf.style.display = "none";
    }
}