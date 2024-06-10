function InputMeme(memeKey){
	var jsonurl = 'json/memes.json';
	$.getJSON(jsonurl,function (data){
		for (var i = 0;i < Object.keys(data['memes']).length;i++){
			if (data['memes'][i]['key']==memeKey){
				document.getElementById('commit-text').value += data['memes'][i]['value'];
				break
			}else{
				continue;
			}
		}
	});
}