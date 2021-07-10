function showDiv(){
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