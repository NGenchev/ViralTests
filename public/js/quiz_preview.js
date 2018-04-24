String.prototype.splice = function(index, count, add) {
  if (index < 0) {
    index = this.length + index;
    if (index < 0) {
      index = 0;
    }
  }
  return this.slice(0, index) + (add || "") + this.slice(index + count);
};

function generate_faceapp(url, filter, callback) {
  var data;
  var notebook = RunKit.createNotebook({
    element: document.getElementById("runkit_api"),
    source:
      "const faceapp = require('faceapp')\nconst superagent = require('superagent')\nlet { body } = await superagent.get('" +
      url +
      "')\nlet image = await faceapp.process(body, '" +
      filter +
      "')\nexports.endpoint = function(req, res){res.end(image);}",
    onLoad: function() {
      notebook.evaluate();
    },
    onEvaluate: function() {
      callback(notebook.endpointURL);
    }
  });
}

function toDataURL(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.onload = function() {
    var reader = new FileReader();
    reader.onloadend = function() {
      callback(reader.result);
    };
    reader.readAsDataURL(xhr.response);
  };
  xhr.open("GET", url);
  xhr.responseType = "blob";
  xhr.send();
}

function finishTest(id, image_position, user_img, bg_img, user_img_filtered) {
  // Check if both images are loaded
  $(user_img).ready(function() {
    $(bg_img).ready(function() {
      // Get canvas and create rendering context
      var c = document.getElementById("myCanvas");
      var ctx = c.getContext("2d");
      if (user_img_filtered === undefined) {
        // Check image position and draw user image
        if (image_position == "left") {
          ctx.drawImage(user_img, 0, 0, 300, 420);
        } else if (image_position == "top") {
          ctx.drawImage(
            user_img,
            225,
            0,
            user_img.width,
            user_img.height - 170
          );
        } else {
          ctx.drawImage(user_img, 550, 0, user_img.width - 50, user_img.height);
        }
      } else {
        // Draw user image
        ctx.drawImage(user_img, 0, 0, 400, 420);
        console.log(user_img_filtered);
        //Draw filtered image
        setTimeout(function() {
          ctx.drawImage(
            user_img_filtered,
            0,
            0,
            user_img_filtered.width,
            user_img_filtered.height
          );
        }, 5000);
      }

      // Draw background overlay
      ctx.drawImage(bg_img, 0, 0, 800, 420);
      // Get image data from canvas and apply result
      img = c.toDataURL();
      document.getElementById("testResult").setAttribute("src", img);
      // Check when result is loaded and show it
      $("#loading").fadeOut();
      $("#testResult").fadeIn(2500);
      $(".share").fadeIn(2500);
    });
  });
}

function startQuest() {
  if (
    $(".question_wrapper").css("display") == "none" &&
    $(".caption").css("display") == "block"
  ) {
    $("#testResult").slideUp();
    $(".caption").slideUp();
    $(".question_wrapper").fadeIn();
    $(".quest-btn").remove();
  } else if (
    $(".question_wrapper").css("display") == "block" &&
    $(".caption").css("display") == "none"
  ) {
    $(".question_wrapper").fadeOut();
    $("#testResult").slideDown();
    $(".caption").slideDown();
    $(".action-btns").fadeIn();
  } else if ($(".question_preview").length == 0) {
    $(".action-btns").css("display", "block");
    $(".action-btns").fadeIn();
  }
}

var questions = document.getElementsByClassName("question_preview");
for (let i = 0; i < questions.length; i++) {
  const element = questions[i];
  var uniqId =
    "_" +
    Math.random()
      .toString(36)
      .substr(2, 9);
  element.setAttribute("id", uniqId);
  if (i > 0) {
    element
      .getElementsByClassName("prev_q_btn")[0]
      .setAttribute("onclick", "slidePrev(" + uniqId + ")");
  }
  if (element.getElementsByClassName("next_q_btn")[0]) {
    element
      .getElementsByClassName("next_q_btn")[0]
      .setAttribute("onclick", "slideNext(" + uniqId + ")");
  }
}
$("a.prev_q_btn").click(function(e) {
  e.preventDefault();
});
$("a.next_q_btn").click(function(e) {
  e.preventDefault();
});

function slideNext(elem) {
  id = elem.getAttribute("id");
  for (let i = 0; i < questions.length; i++) {
    if (questions[i].getAttribute("id") == id) {
      $("#" + id).addClass("animated fadeOutLeftBig");
      setTimeout(function() {
        $("#" + id).css("display", "none");
      }, 1500);
      $("#" + questions[i + 1].getAttribute("id")).removeClass(
        "animated fadeOutRightBig"
      );
      $("#" + questions[i + 1].getAttribute("id")).css("display", "block");
      $("#" + questions[i + 1].getAttribute("id")).addClass(
        "animated fadeInRightBig"
      );
    }
  }
}

function slidePrev(elem) {
  id = elem.getAttribute("id");
  for (let i = 0; i < questions.length; i++) {
    if (questions[i].getAttribute("id") == id) {
      $("#" + id).addClass("animated fadeOutRightBig");
      setTimeout(function() {
        $("#" + id).css("display", "none");
      }, 1500);
      $("#" + questions[i - 1].getAttribute("id")).removeClass(
        "fadeOutLeftBig"
      );
      $("#" + questions[i - 1].getAttribute("id")).css("display", "block");
      $("#" + questions[i - 1].getAttribute("id")).addClass(
        "animated fadeInLeftBig"
      );
    }
  }
}
