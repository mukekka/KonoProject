function InputMeme(memeKey){
	var jsonurl = 'json/memes.json';
	$.getJSON(jsonurl,function (data){
		for (var i = 0;i < Object.keys(data).length;i++){
			if (data.hasOwnProperty(memeKey.toString()) > -1){
				document.getElementById('commit-text').value += data[memeKey.toString()];
				break
			}
		}
	});
}