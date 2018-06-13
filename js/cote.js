/*
var a = new ActiveXObject("sapi.SpVoice");
a.speak('I can talk dennis');*/
Notification.requestPermission();

let title = document.getElementsByTagName('title')[0].innerHTML;

let b = new Notification("Info", {body: `You are on page: ${title}`});
