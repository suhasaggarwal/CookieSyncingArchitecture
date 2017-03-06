<script type="text/javascript">

var nid = "1234";
var srcLoc = "http://cookiesync.dc.cuberoot.co/";

function createCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

var cookie = readCookie("spdsuidguess");

cookie = encodeURIComponent(cookie);


var ifrSpidSrc=srcLoc+'cookiesync.php?a='+cookie+'&b='+nid+"&ord="+Math.random();
document.write('<ifr'+'ame src="'+ifrSpidSrc+'" width="0" height="0" style="hidden" frameborder="0" marginheight="0" marginwidth="0" scrolling="no"></ifr'+'ame>');


</script>