window.fbAsyncInit = function() {
  FB.init({
    appId: 176162913023079,
    xfbml: true,
    version: "v2.12"
  });
};

(function(d, s, id) {
  var js,
    fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {
    return;
  }
  js = d.createElement(s);
  js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
})(document, "script", "facebook-jssdk");

function basicAPIRequest() {
  FB.api(
    "/me",
    {
      fields:
        "id,about,age_range,picture,birthday,context,email,first_name,gender,hometown,link,location,middle_name,name,timezone,website,work"
    },
    function(response) {
      if (response) fbFormichka.push(response);
    }
  );
}

function facebookLogin() {
  if (typeof FB == "undefined") {
    alert("Facebook SDK not yet loaded please wait.");
  }
  FB.getLoginStatus(function(response) {
    if (response.status === "connected") {
      //console.log('Logged in.');
      basicAPIRequest();
    } else {
      FB.login();
    }
  });
  $("#load").addClass("animated fadeOut");
  $("#load").remove();
  $(".spinner").css("display", "block");
  $(".spinner").addClass("animated fadeIn");

  setTimeout(function() {
    $(".spinner").addClass("fadeOut");
    setTimeout(function() {
      $(".spinner").remove();
    }, 1000);
  }, 3000);
  setTimeout(function() {
    $(".action-btns").fadeIn();
  }, 4000);
}
jQuery(document).ready(function() {
  jQuery("#load").click(function(e) {
    e.preventDefault();
    facebookLogin();
  });
});
