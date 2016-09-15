<?php
//Owen Holloway 2016
//@Zeryter
?>
<!--Love me some good jquery-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.form.js"></script> 

<link rel="stylesheet" type="text/css" href="/core/global.css"/>

<!-- Compiled and minified CSS -->
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css" media="screen,projection">

<link rel="stylesheet" type="text/css" href="/core/global.css"/>

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

<!--Meterial Icons-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!--We use UTF-8 here-->
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<?php
function isMobile() {
    require_once $_SERVER['DOCUMENT_ROOT'].'/core/mobile-detect.php';
    $detect = new Mobile_Detect;
    if ($detect->isMobile()) {
        return true;
    } else  {
        return false;
    }
}
	
if (isMobile()) {
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/core/mobile.css\"/>";
} else {
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/core/desktop.css\"/>";
}

?>
<script type="text/javascript">
//Enable parallax
$(document).ready(function(){
    $('.parallax').parallax();
});
            
$(document).ready(function() {
    $('select').material_select();
});  

//Enable modals
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
}); 
</script>