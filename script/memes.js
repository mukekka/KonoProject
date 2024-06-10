function InputMeme(){
	var jsonurl = 'json/memes.json';
	$.getJSON(jsonurl,function (data){
		console.log(data);
	});
	document.getElementById('commit-text').value += '1234';
}