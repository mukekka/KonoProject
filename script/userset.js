var user=getCookie('user');
if(user!=''){
    var username=decodeURIComponent(getCookie('user'));
    console.log(username);
    document.getElementById('UserID').innerText=username.toString();
}else if(user==null){
    console.log('无用户');
    setCookie('user','','365','/')
}else if(user==''){
    document.getElementById('UserID').innerText='离线用户';
}