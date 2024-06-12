var langSelect,value;
function indexlangset(lang){
    var jsonurl = '/json/index-lang/'+lang+'-lang.json';
    $.getJSON(jsonurl,function (data){
        for (var i = 0; i < Object.keys(data['lang']).length; i++) {
            if ((data['lang'][i]['id']=='UserID')&&(getCookie('user')!='')) continue;
            if ((data['lang'][i]['id']=='commit-text')&&(getCookie('user')!='')) continue;
            switch (data['lang'][i]['type']){
                case 'placeholder':
                    document.getElementById(data['lang'][i]['id']).placeholder = data['lang'][i]['content'].toString();
                    break;
                case 'value':
                    document.getElementById(data['lang'][i]['id']).value = data['lang'][i]['content'].toString();
                    break;
                case 'p':
                    document.getElementById(data['lang'][i]['id']).innerHTML = data['lang'][i]['content'].toString();
                    break;
                case 'a':
                    document.getElementById(data['lang'][i]['id']).innerText = data['lang'][i]['content'].toString();
                    break;
            }
        }
    });
}
function setLang(){
    langSelect = document.getElementById('langSelect');
    value = langSelect.options[langSelect.selectedIndex].value; //获取语言选项
    switch (value) {                                            //设置语言
        case 'SC':
            setCookie('lang','SC',365,"/");
            indexlangset('SC');
            break;
        case 'TC':
            setCookie('lang','TC',365,"/");
            indexlangset('TC');
            break;
        case 'EN':
            setCookie('lang','EN',365,"/");
            indexlangset('EN');
            break;
        case 'JP':
            setCookie('lang','JP',365,"/");
            indexlangset("JP");
            break;
    }
}

var selectElement = document.getElementById('langSelect');
var langCookie = getCookie('lang');
switch (langCookie){
    case 'SC':
        selectElement.value = 'SC';
        document.documentElement.lang='zh-cn';
        indexlangset('SC');
        break;
    case 'TC':
        selectElement.value = 'TC';
        document.documentElement.lang='zh-tw';
        indexlangset('TC');
        break;
    case 'EN':
        selectElement.value = 'EN';
        document.documentElement.lang='en';
        indexlangset('EN');
        break;
    case 'JP':
        selectElement.value = 'JP';
        document.documentElement.lang='ja';
        indexlangset('JP');
        break;
}
