function loadScript(url){   
   var head = document.getElementsByTagName('head')[0];
   var script = document.createElement('script');
   script.type = 'text/javascript';
   script.src = url;
   head.appendChild(script); 
};
   
function initSystem() {
loadScript('static/js/jquery-1.6.4.min.js');
loadScript('static/js/functions.js');
loadScript('static/js/login.js');
};