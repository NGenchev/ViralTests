var questions;
var answers;
window.addEventListener("load", function(e) {
  loadQuestions();
});

function loadQuestions() {
  questions = document.getElementsByClassName("question");
  for (let i = 0; i < questions.length; i++) {
    if (questions[0].getAttribute("id") !== "") {
      var uniqId =
        "_" +
        Math.random()
          .toString(36)
          .substr(2, 9);
      questions[0].setAttribute("id", uniqId);
      document
        .getElementById("add_answer_btn")
        .setAttribute("onclick", "addAnswer(" + uniqId + ")");
      var id = questions[i].getAttribute("id");
      document.querySelector("#" + id + ">.panel-heading>a>h3").innerHTML =
        "Question " + (i + 1);
      answers = questions[i].getElementsByClassName("answer");
      for (let i = 0; i < answers.length; i++) {
        if (answers[i].getAttribute("id") !== "") {
          var uniqId =
            "_" +
            Math.random()
              .toString(36)
              .substr(2, 9);
          answers[i].setAttribute("id", uniqId);
          answers[i]
            .getElementsByClassName("remove_answer_btn")[0]
            .setAttribute("onclick", "removeAnswer(" + uniqId + ")");
        }
      }
    } else {
      var id = questions[i].getAttribute("id");
      document.querySelector("#" + id + ">.panel-heading>a>h3").innerHTML =
        "Question " + (i + 1);
      answers = questions[i].getElementsByClassName("answer");
      for (let i = 0; i < answers.length; i++) {
        if (answers[i].getAttribute("id") !== "") {
          var uniqId =
            "_" +
            Math.random()
              .toString(36)
              .substr(2, 9);
          answers[i].setAttribute("id", uniqId);
          answers[i]
            .getElementsByClassName("remove_answer_btn")[0]
            .setAttribute("onclick", "removeAnswer(" + uniqId + ")");
        }
      }
    }
  }
}

function addQuestion() {
  var container = document.getElementsByClassName("questions");
  var uniqId =
    "_" +
    Math.random()
      .toString(36)
      .substr(2, 9);
  $(".questions").append(
    "<div class='panel panel-default question' id='" +
      uniqId +
      "'> <div class='panel-heading'><a href='#'><h3>Question </h3></a></div> <div class='panel-body'> <div class='form-group'> <label>Text for the question:</label> <input type='text' class='form-control' placeholder='Enter the text for question!'> </div> <hr> <strong> <p>Answers: </p> </strong> <div class='row answers'> <div class='col-md-6 answer'> <div class='form-group'> <input type='text' class='form-control' aria-label='Answer ' placeholder='Enter text for the answer!'> <button class='btn btn-xs btn-default remove_answer_btn'>X</button> </div><!-- /input-group --> </div> <div class='col-md-6 answer'> <div class='form-group'> <input type='text' class='form-control' aria-label='Answer ' placeholder='Enter text for the answer!'> <button class='btn btn-xs btn-default remove_answer_btn'>X</button> </div><!-- /input-group --> </div> </div> <br> <button class='btn btn-sample' id='add_answer_btn' onclick='addAnswer(" +
      uniqId +
      ")'>Add Answer!</button> </div> </div>"
  );
  loadQuestions();
}

function addAnswer(elem) {
  var id = elem.getAttribute("id");
  var uniqId =
    "_" +
    Math.random()
      .toString(36)
      .substr(2, 9);
  $("#" + id + " .answers").append(
    "<div class='col-md-6 answer' id='" +
      uniqId +
      "'> <div class='form-group'> <input type='text' class='form-control' aria-label='Answer ' placeholder='Enter text for the answer!'> <button class='btn btn-xs btn-default remove_answer_btn' onclick='removeAnswer(" +
      uniqId +
      ")'>X</button> </div><!-- /input-group --> </div><br>"
  );
}

function removeAnswer(elem) {
  id = elem.getAttribute("id");
  document.getElementById(id).remove();
}

function addQuiz() {
  var data = new FormData();
  //var polls = "@VAPROS?|OTG|OTG|OTG|@VAPROS?|OTG|OTG|OTG| ";
  var polls = "QnA:";

  for (let i = 0; i < questions.length; i++) {
    var element = questions[i];
    polls +=
      "@" + element.getElementsByClassName("form-control")[0].value + "|";
    "Question" + element.getElementsByClassName("form-control")[0].value;
    var temp_ans = element.getElementsByClassName("form-control");

    for (let i = 1; i < temp_ans.length; i++) {
      polls += temp_ans[i].value + "|";
    }
  }

  for (let i = 0; i < background_images.length; i++) {
    var element = background_images[i];

    var thumb = document
      .getElementsByClassName("thumbnail")
      [i].getAttribute("id");
    if (thumb == cover_id) {
      data.append("file_" + i, element, "cover");
    } else {
      data.append("file_" + i, element, element.name);
    }
  }

  data.append("title", document.getElementById("title").value);
  data.append("type", "quest");
  data.append("QnA", polls);
  $.ajax({
    url: "../public/responses/upload.response.php",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    type: "POST",
    success: function(data) {
        $.notify(
        {
          // options
          icon: "fas fa-check-square",
          title: "Успешно качване",
          message:
            "Успешно качихте нов тест! След малко ще бъдете пренасочени към началната страница",
          url: "https://viraltest.eu/en/",
          target: "_blank"
        },
        {
          // settings
          element: "body",
          position: null,
          type: "success",
          allow_dismiss: true,
          newest_on_top: false,
          showProgressbar: false,
          placement: {
            from: "bottom",
            align: "right"
          },
          offset: 20,
          spacing: 10,
          z_index: 1031,
          delay: 5000,
          timer: 1000,
          url_target: "_blank",
          mouse_over: null,
          animate: {
            enter: "animated fadeInDown",
            exit: "animated fadeOutUp"
          },
          onShow: null,
          onShown: null,
          onClose: null,
          onClosed: null,
          icon_type: "class",
          template:
            '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            "</div>"
        }
      );
      window.location.href =
        "http://viraltest.eu/index.php?page=quiz&action=index";
    },
    error: function() {
      $.notify(
        {
          // options
          icon: "fas fa-exclamation-triangle",
          title: "Неуспешно качване",
          message:
            "Имаше проблем със качването на новия тест... Опитайте отново",
          url: "https://viraltest.eu/en/?page=quiz&action=create&param=quest"
        },
        {
          // settings
          element: "body",
          position: null,
          type: "danger",
          allow_dismiss: true,
          newest_on_top: false,
          showProgressbar: false,
          placement: {
            from: "bottom",
            align: "right"
          },
          offset: 20,
          spacing: 10,
          z_index: 1031,
          delay: 5000,
          timer: 1000,
          url_target: "_blank",
          mouse_over: null,
          animate: {
            enter: "animated fadeInDown",
            exit: "animated fadeOutUp"
          },
          onShow: null,
          onShown: null,
          onClose: null,
          onClosed: null,
          icon_type: "class",
          template:
            '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            "</div>"
        }
      );
    }
  });
}
