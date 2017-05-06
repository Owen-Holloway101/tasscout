window.onload = loadfunction();

function loadfunction() {
  //Mobile Navigation
  $('.button-collapse').sideNav({
    menuWidth: 300, // Default is 300
    closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
    draggable: true // Choose whether you can drag to open on touch screens
  });

  //All dropdowns
  $(".dropdown-button").dropdown();

  $('.parallax').parallax();


  $('.modal').modal();
  

  //Checks for any messages that are waiting for the user
  checkMessage()
}

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