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
    return '';
}
function displayPassword(){
    var flag = document.querySelector('#DISPWIN');
    if(flag.checked){
        document.getElementById('DISPWLA').innerHTML = '显示密码'.toString();
        document.getElementById("passwordinput").type="text";
        document.getElementById("repasswordinput").type="text";
    }else{
        document.getElementById('DISPWLA').innerHTML = '隐藏密码'.toString();
        document.getElementById("passwordinput").type="password";
        document.getElementById("repasswordinput").type="password";
    }
}
function showNotification(title,body,ico,time,audio){
    if (ico==null) ico='image/Logo16.ico';
    if (time==null) time=5000;
    if (audio==null) audio='audio/system.wav';
    var notification = new Notification(title,{body:body, icon:ico});
    setTimeout(function (){notification.close()},time);
    var sound = new Howl({
        src: [audio],
        autoplay: true, // 是否自动播放
        loop: false, // 是否循环播放
        volume: 1, // 音量大小，范围是0-1，默认为1
        preload: true // 是否预加载音频，默认为true
    });
    sound.play();
}