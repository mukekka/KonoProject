var langSelect,value;
var langArr = ['SC','TC','EN','JP']
function indexlangset(lang){
    var jsonurl = 'json/lang/'+lang+'-lang.json';
    $.getJSON(jsonurl,function (data){
        for (var i = 0; i < Object.keys(data['lang']).length; i++) {
            switch (data['lang'][i]['type']){
                case 'placeholder':
                    document.getElementById(data['lang'][i]['id']).placeholder = data['lang'][i]['content'].toString();
                    console.log(data['lang'][i]['content'])
                    break;
                case 'value':
                    document.getElementById(data['lang'][i]['id']).value = data['lang'][i]['content'].toString();
                    console.log(data['lang'][i]['content'])
                    break;
                case 'p':
                    document.getElementById(data['lang'][i]['id']).innerHTML = data['lang'][i]['content'].toString();
                    console.log(data['lang'][i]['content'])
                    break;
                case 'a':
                    console.log(data['lang'][i]['content'])
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
            indexlangset(value);
            break;
        case 'TC':
            setCookie('lang','TC',365,"/");
            indexlangset(value);
            break;
        case 'EN':
            setCookie('lang','EN',365,"/");
            indexlangset(value);
            break;
        case 'JP':
            setCookie('lang','JP',365,"/");
            indexlangset(value);
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
        indexlangset('SC');
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
        indexlangset('JP');
        break;
}
