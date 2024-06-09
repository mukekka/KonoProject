function showPopup(id, article) {
    document.getElementById(id).innerHTML = '';
    document.getElementById(id).style.display = 'block';
    var jsonurl = 'json/article/' + getCookie('lang') + '-article.json';
    var div = document.getElementById(id);
    var name = article.toString();
    var back = "";
    $.getJSON(jsonurl,function (data){
        for (var i = 0; i < Object.keys(data[name]).length; i++) {
            var lable = data[name][i]['type'];
            var content = data[name][i]['content'];
            var lableid = data[name][i]['id'];
            if ((lable == 'div') && (lableid != '')) {
                back = div;
                div.innerHTML += '<' + lable + ' id="' + lableid + '" class="scrollbar">';
                div = document.getElementById(lableid);
            } else if (lable == '/div') {
                div = back;
            } else if ((lable == 'br')||(lable == 'hr')) {
                div.innerHTML += '<' + lable + '>';
            }else {
                div.innerHTML += '<' + lable + '>' + content + '</' + lable + '>';
            }
        }
        div.innerHTML += '<br><button onclick="hidePopup(\'popup\')" id="popupButton">'+data['other'][0]['content']+'</button>';
    });
}

function hidePopup(id) {
    document.getElementById(id).style.display = 'none';
    document.getElementById(id).innerHTML = '';
}