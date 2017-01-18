<?php
//Owen Holloway 2016
//@Zeryter
include $_SERVER['DOCUMENT_ROOT']."/core/backend/settings.php";
require_once $_SERVER['DOCUMENT_ROOT']."/core/user/session.php";
?>
<head>
<title><?php echo getSetting("groupname");?></title>
</head>
<!--Navigation-->
<nav class="scarf" role="navigation">
    <div class="nav-wrapper container grey darken-3"><a id="logo-container" class="brand-logo"><?php echo getSetting("groupname");?></a>
        <!--NAV Bar START-->
        <ul class="right hide-on-med-and-down">
            <li><a href="/">Home</a></li>
            <?php
            include $_SERVER["DOCUMENT_ROOT"]."/core/frontend/links.php";
            ?>
            <?php
            if ($userPermission > 0) {
                echo "<li><a href=\"/core/user/logout.php\">Logout ".$userName."</a></li>";
            } else {
                echo "<li><a href=\"#loginmodal\">Login</a></li>";
            }
            ?>
            
        </ul>
        <!--NAV Bar END-->
        <!--Mobile NAV START-->
        <ul id="nav-mobile" class="side-nav">
            <li><a href="/">Home</a></li>
            <?php
            include $_SERVER["DOCUMENT_ROOT"]."/core/frontend/links.php";
            ?>
           <?php
            if ($userPermission > 0) {
                echo "<li><a href=\"/core/user/logout.php\">Logout ".$userName."</a></li>";
            } else {
                echo "<li><a href=\"#loginmodal\">Login</a></li>";
            }
            ?>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
    <!--Mobile NAV END-->
</nav>
<div class="watermark">
    Example site <br>
    not final
</div>
<script type="text/javascript">
//Enable mobile pull out menu
(function($){
    $(function(){
    $('.button-collapse').sideNav();
    });
})(jQuery);
</script>