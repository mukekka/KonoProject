var langSelect,value;
var langArr = ['SC','TC','EN','JP']

function setLang(){
    langSelect = document.getElementById('langSelect');
    value = langSelect.options[langSelect.selectedIndex].value; //获取语言选项
    switch (value) {                                            //设置语言
        case 'SC':
            setCookie('lang','SC',365,"/");
            // document.getElementById('language').innerHTML = '简体中文';
            // console.log(value);
            break;
        case 'TC':
            setCookie('lang','TC',365,"/");
            // document.getElementById('language').innerHTML = '繁體中文';
            // console.log(value);
            break;
        case 'EN':
            setCookie('lang','EN',365,"/");
            // document.getElementById('language').innerHTML = 'English';
            // console.log(value);
            break;
        case 'JP':
            setCookie('lang','JP',365,"/");
            // document.getElementById('language').innerHTML = '日本語';
            // console.log(value);
            break;
    }
}

var selectElement = document.getElementById('langSelect');
var langCookie = getCookie('lang');
switch (langCookie){
    case langCookie != langArr:
        setCookie('lang','SC','365','/')
        break;
    case 'SC':
        // console.log('SC');
        selectElement.value = 'SC';
        break;
    case 'TC':
        // console.log('TC');
        selectElement.value = 'TC';
        break;
    case 'EN':
        // console.log('EN');
        selectElement.value = 'EN';
        break;
    case 'JP':
        // console.log('JP');
        selectElement.value = 'JP';
        break;
}
