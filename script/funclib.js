function setCookie(name, value, expires, path, domain, secure) {
    let cookieString = name + "=" + encodeURIComponent(value);
    if (expires) {
        let expirationDate = new Date();
        expirationDate.setTime(expirationDate.getTime() + expires * 24 * 60 * 60 * 1000);
        cookieString += "; expires=" + expirationDate.toUTCString();
    }
    if (path) {
        cookieString += "; path=" + path;
    }
    if (domain) {
        cookieString += "; domain=" + domain;
    }
    if (secure) {
        cookieString += "; secure";
    }
    document.cookie = cookieString;
}
function getCookie(name) {
    var cookiearr = document.cookie.split(";");
    for (var i = 0; i < cookiearr.length; i++)
        if (cookiename = cookiearr[i].split("=")[0].trim() == name) return cookiearr[i].split("=")[1];
    return null;
}
function displayPassword(){
    var flag = document.querySelector('#DISPWIN');
    if(flag.checked){
        document.getElementById('DISPWLA').innerHTML = 'ÏÔÊ¾ÃÜÂë';
        document.getElementById("passwordinput").type="text";
        document.getElementById("repasswordinput").type="text";
    }else{
        document.getElementById('DISPWLA').innerHTML = 'Òþ²ØÃÜÂë';
        document.getElementById("passwordinput").type="password";
        document.getElementById("repasswordinput").type="password";
    }
}