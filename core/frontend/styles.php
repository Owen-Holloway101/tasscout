<?php
//Owen Holloway 2016
//@Zeryter
function displayBackground()
{
    $exact_dir = "/assets/background/";
	$dir = $_SERVER['DOCUMENT_ROOT'].$exact_dir;
	$cnt = 0;
	$bgArray= array();
		
	/*if we can load the directory*/
	if ($handle = opendir($dir)) {
		
		/* Loop through the directory here */
		while (false !== ($entry = readdir($handle))) {
		
            $pathToFile = $dir.$entry;
            if(is_file($pathToFile)) //if the files exists 
            {	
                
                //make sure the file is an image...there might be a better way to do this
                if(getimagesize($pathToFile)!=FALSE)
                {
                    //add it to the array
                    $bgArray[$cnt]= $pathToFile;
                    $cnt = $cnt+1;
                
                }
                
            }	
            
        }	
	//create a random number, then use the image whos key matches the number
	$myRand = rand(0,($cnt-1));	
	$val = str_replace($dir,$exact_dir,$bgArray[$myRand]);
	
    }
    closedir($handle);
    echo('"'.$val.'"');
    
}

?>
<!--Love me some good jquery-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script async type="text/javascript" src="http://malsup.github.com/jquery.form.js"></script> 

<link rel="stylesheet" type="text/css" href="/core/frontend/global.css"/>

<style>
	body
	{
	background: url(<?php displayBackground();?>) no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	}
</style>


<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

<!--Text Editor-->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<!--Meterial Icons-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!--We use UTF-8 here-->
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<?php
function isMobile() {
    require_once $_SERVER['DOCUMENT_ROOT'].'/core/lib/mobile-detect.php';
    $detect = new Mobile_Detect;
    if ($detect->isMobile()) {
        return true;
    } else  {
        return false;
    }
}
	
if (isMobile()) {
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/core/frontend/mobile.css\"/>";
} else {
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/core/frontend/desktop.css\"/>";
}

?>
<script type="text/javascript">
//Enable parallax
$(document).ready(function(){
    $('.parallax').parallax();
    $('.modal').modal();
    $(".button-collapse").sideNav();
    checkMessage();
});

function checkMessage() {
    var messageCookie = getCookie("message");

    if (messageCookie == "") {
        // do cookie doesn't exist stuff;
    }
    else {
        $('#messagemodal').modal('open');
        days = 100;
        date = new Date();
        date.setTime(date.getTime()-(days*24*60*60*1000));
        expires = "; expires="+date.toGMTString();
        document.cookie = "message_title"+"="+pagename+expires+"; path=/";
        document.cookie = "message"+"="+pagename+expires+"; path=/";
    }
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}

</script>

<!--Login Modal-->
<div id="messagemodal" class="modal">
    <div class="modal-content">
        <h4><script>document.write(unescape(decodeURIComponent(getCookie("message_title"))));</script></h4>
        <p><script>document.write(unescape(decodeURIComponent(getCookie("message"))));</script></p>
    </div>
    <div class="modal-footer">
        <a onclick="$('#messagemodal').modal('close');" class=" modal-action modal-close waves-effect waves-green btn-flat">Okay</a>
    </div>
</div>

<script>
    function handle(e){
        if(e.keyCode === 13){
            e.preventDefault();
            $('#login').submit();
        }
    }
</script>

<!--Login Modal-->
<div id="loginmodal" class="modal">
    <div class="modal-content">
        <h4>Login</h4>
        </br>
        <form action="/core/user/login.php" onkeypress="handle(event)" id="login" method="post" class="col">
            <div class="row">
                <div class="input-field col s12">
                    <input id="user_name" name="user_name" type="text" class="validate">
                    <label for="user_name">Username</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a onclick="$('#loginmodal').modal('close');" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        <a onclick="$('#login').submit();" class=" modal-action modal-close waves-effect waves-green btn-flat">Login</a>
    </div>
</div>