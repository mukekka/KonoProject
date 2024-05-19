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
    var cookiearr = document.cookie.split("=");
    for (var i = 0; i < cookiearr.length; i+=2) {
        console.log(cookiearr[i]);
        if (cookiearr[i] == name) return cookiearr[i+1].split(";");
    }
    return null;
}

var user=getCookie('user');
if(user!=''){
    var username=decodeURIComponent(getCookie('user'));
    console.log(username);
    document.getElementById('UserInfo').innerText=username;
}else if(user==null){
    console.log('无用户');
    setCookie('user',0,'365','/')
}else if(user==0){
    document.getElementById('UserInfo').innerText='离线用户';
}