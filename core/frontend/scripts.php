<?php
require_once $_SERVER['DOCUMENT_ROOT']."/core/user/session.php";

function message_return($title,$message) {
    setcookie("message_title",$title,time()+36000,"/");
	setcookie("message",$message,time()+36000,"/");
	$url = "/".$_COOKIE["lastpage"];
	header("Location: $url");
}

?>

<script>
<?php
echo "var userName = \"".$userName."\";\n";
echo "var userPermission = \"".$userPermission."\";\n";
?>

function edit() {
	tinymce.init({
	selector: '.editable',
	height: 500,
	theme: 'modern',
	plugins: [
		'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		'searchreplace wordcount visualblocks visualchars code fullscreen',
		'insertdatetime media nonbreaking save table contextmenu directionality',
		'emoticons template paste textcolor colorpicker textpattern imagetools'
	],
	content_css: [
		'//fonts.googleapis.com/css?family=Roboto',
		'//www.tinymce.com/css/codepen.min.css'
	]
});

	$(".editbutton").text("Update");
	$(".editbutton").attr("onclick","updateContent(pagename)");

 }

function login() {
	savePageCookie();
	window.location = "/core/frontend/return.php"
}

function savePageCookie() {
	days = 1;
	date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    expires = "; expires="+date.toGMTString();
	document.cookie = "lastpage"+"="+pagename+expires+"; path=/";
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

function dummy() {

}

 function updateContent(pageName) {
    savePageCookie();
    var url = "/core/backend/contentupdate.php"; // the script where you handle the form input.
    $.ajax({
        type: "POST",
        url: url,
        data: {
			'page': pageName,
			'content': tinyMCE.activeEditor.getContent({format : 'raw'}) 
		},
        success: function(data) {
            location.reload();
        }
    });

    return false; // avoid to execute the actual submit of the form.
}        
</script>