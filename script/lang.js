var langSelect,value;
var langArr = ['SC','TC','EN','JP']

function setLang(){
    langSelect = document.getElementById('langSelect');
    value = langSelect.options[langSelect.selectedIndex].value; //获取语言选项
    switch (value) {                                            //设置语言
        case 'SC':
            setCookie('lang','SC',365,"/");
            break;
        case 'TC':
            setCookie('lang','TC',365,"/");
            break;
        case 'EN':
            setCookie('lang','EN',365,"/");
            break;
        case 'JP':
            setCookie('lang','JP',365,"/");
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
        selectElement.value = 'SC';
        document.documentElement.lang='zh-cn';
        break;
    case 'TC':
        selectElement.value = 'TC';
        document.documentElement.lang='zh-tw';
        break;
    case 'EN':
        selectElement.value = 'EN';
        document.documentElement.lang='en';
        break;
    case 'JP':
        selectElement.value = 'JP';
        document.documentElement.lang='ja';
        break;
}
