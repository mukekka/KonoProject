var langSelect,value,langCookie;
var langArr = ['SC','TC','EN','JP']
function setLang(){
    langSelect = document.getElementById('langSelect');
    value = langSelect.options[langSelect.selectedIndex].value; //获取语言选项
    switch (value) {                                            //设置语言
        case 'SC':
            setCookie('lang','SC',365,"/");
            document.getElementById('language').innerHTML = '简体中文';
            console.log(value);
            break;
        case 'TC':
            setCookie('lang','TC',365,"/");
            document.getElementById('language').innerHTML = '繁體中文';
            console.log(value);
            break;
        case 'EN':
            setCookie('lang','EN',365,"/");
            document.getElementById('language').innerHTML = 'English';
            console.log(value);
            break;
        case 'JP':
            setCookie('lang','JP',365,"/");
            document.getElementById('language').innerHTML = '日本語';
            console.log(value);
            break;
    }
}
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
    let cookieName = name + "=";
    let cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i].trim();
        if (cookie.indexOf(cookieName) === 0) {
            return decodeURIComponent(cookie.substring(cookieName.length));
        }
    }
    return null;
}

langCookie = getCookie('lang');
switch (langCookie){
    case langCookie != langArr:
        setCookie('lang','SC','365','/')
        break;
    case 'SC':
        document.getElementById('language').innerHTML = '简体中文';
        break;
    case 'TC':
        document.getElementById('language').innerHTML = '繁體中文';
        break;
    case 'EN':
        document.getElementById('language').innerHTML = 'English';
        break;
    case 'JP':
        document.getElementById('language').innerHTML = '日本語';
        break;
}
