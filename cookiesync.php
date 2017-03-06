<!DOCTYPE html>
<html>
<body>

<script type="text/javascript">
var fonts="";
var f1oc=1;
var retarg_oc=1;
var d = new Date()
var n = d.getTimezoneOffset();

function getCookie(best_candidate, all_candidates)
{
    alert("The retrieved cookie is: " + best_candidate + "\n" +
        "You can see what each storage mechanism returned " +
        "by looping through the all_candidates object.");

    for (var item in all_candidates)
        document.write("Storage mechanism " + item +
            " returned " + all_candidates[item] + " votes<br>");
}


function genID(){
	var guidHolder = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx';
	var hex = '0123456789abcdef';
	var r = 0;
	var guidResponse = "";
	for (var i = 0; i < 36; i++){
		if (guidHolder[i] !== '-' && guidHolder[i] !== '4') {
		r = Math.random() * 16 | 0;
        }
		if (guidHolder[i] === 'x') {
		guidResponse += hex[r];
		}
		else if (guidHolder[i] === 'y') {
		 r &= 0x3; r |= 0x8; guidResponse += hex[r];
		}
		else {
		guidResponse += guidHolder[i];
		}
	 }
    return guidResponse;
}

function SetCookieG(cookieName,cookieValue,nDays) {
  document.cookie = cookieName+"="+escape(cookieValue);
}
function SetCookie(cookieName,cookieValue,nDays) {
 var today = new Date();
 var expire = new Date();
 if (nDays==null || nDays==0) nDays=1;
 expire.setTime(today.getTime() + 3600000*24*nDays);
 document.cookie = cookieName+"="+escape(cookieValue)
                 + ";expires="+expire.toGMTString();
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}



function SetRootCookie(cookieName,cookieValue,nDays) {
 var today = new Date();
 var expire = new Date();
 if (nDays==null || nDays==0) nDays=1;
 expire.setTime(today.getTime() + 3600000*24*nDays);
 document.cookie = cookieName+"="+escape(cookieValue)
                 + ";expires="+expire.toGMTString()+";domain=.dc.cuberoot.co"+";path=/";
}



function checkCookie() {
	 var masterck = getCookie("masterck");
        if (masterck != "" && masterck != null){
             SetRootCookie("masterck", masterck, 365);
        } else {
           var mckid=genID();
           SetRootCookie("masterck", mckid, 365);

        }

}



   document.write('<form name="formm" action="index.php" method="post">');
   
   document.write('<input type="hidden" id="ck" name="ck" value="">');
  
   document.write('<input type="hidden" id="a" name="a" value="<?php if (isset($_GET['a'])) echo $_GET['a'];?>">');
   document.write('<input type="hidden" id="b" name="b" value="<?php if (isset($_GET['b'])) echo $_GET['b'];?>">');
   document.write('</form>');
  
	checkCookie();
	document.getElementById('ck').value = getCookie("masterck");
	
	document.formm.submit();
  </script>

</body>
</html>