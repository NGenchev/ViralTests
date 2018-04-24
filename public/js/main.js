(function() {
  "use strict";
  //bs viewport bug fix
  if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement("style");
    msViewportStyle.appendChild(
      document.createTextNode("@-ms-viewport{width:auto!important}")
    );
    document.querySelector("head").appendChild(msViewportStyle);
  }

  $(".masonry").each(function(index) {
    if (index >= 6) {
      $(".masonry:nth-of-type(" + (index + 1) + ")").hide();
    }
  });

  //check if there is a grid wrapper
  if ($(".grid-wrapper").length > 0) {
    //apply masonry grid layout to all elements in the wrapper
    $(".grid-wrapper").imagesLoaded(function() {
      $(".grid-wrapper").masonry({
        itemSelector: ".masonry"
      });
      if ($(".main-tumbnail").length > 0) {
        $(".likebox").height($(".main-tumbnail").height() - 150 + "px");
      }
    });
  }
  // ($(".masonry:nth-of-type("+(index+1)+")").css("display") == "none") && counter <
  $("#loader").click(function() {
    var counter = 0;
    $(".masonry").each(function(index) {
      if (
        $(".masonry:nth-of-type(" + (index + 1) + ")").css("display") ==
          "none" &&
        counter < 6
      ) {
        $(".masonry:nth-of-type(" + (index + 1) + ")").css("display", "block");
        $(".grid-wrapper").append(
          $(".masonry:nth-of-type(" + (index + 1) + ")")
        );
        $(".grid-wrapper").masonry("reloadItems");
        $(".grid-wrapper").masonry("layout");
        counter++;
      }
    });
  });
})();
