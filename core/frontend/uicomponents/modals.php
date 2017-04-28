<script>
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

<!--Message Modal-->
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