// JavaScript Document
function oncode(){
	var n = document.getElementById("name").value;
	var p = document.getElementById("psd").value;
	var c = document.getElementById("codes").value;
	var t = document.getElementById("ts");
	if(n==""){
	    t.style.display="block";
		t.innerHTML="请输入用户名";
		return false;
	}else if(p==""){
		t.style.display="block";
		t.innerHTML="请输入密码";
		return false;
	}else if(c==""){
		t.style.display="block";
		t.innerHTML="请输入验证码";
		return false;
	}else{
		return true;
	}
}
function fGetCode(){   
	document.getElementById('code').src='?login=img';   
}
