document.getElementById("file").addEventListener("change", function() {
  upload_func(document.getElementById("file").files);
});

function upload_func(files) {
  $(".progress").show();
  if (files.length >= 1) {
    for (let i = 0; i < files.length; i++) {
      background_images.push(files[i]);
    }
  }

  document.getElementsByClassName("imgs")[0].innerHTML = "";
  for (var i = 0; i < background_images.length; i++) {
    var file = background_images[i];
    var output = document.getElementById("temp-container");
    //Only pics
    if (!file.type.match("image")) continue;
    var picReader = new FileReader();
    picReader.onload = (function(theFile) {
      return function(e) {
        var picFile = e.target.result;
        var div = document.createElement("div");
        var uniqId =
          "_" +
          Math.random()
            .toString(36)
            .substr(2, 9);
        div.innerHTML =
          "<div class='thumbnail' data-file-name='" +
          theFile.name +
          "' id='" +
          uniqId +
          "'> <img src='" +
          picFile +
          "' alt='What is your true love name?'> <div class='caption'> <button class='btn btn-sample' onclick='setCover(" +
          uniqId +
          ")'>Make cover</button> </div></div>";
        output.insertBefore(div, null);
      };
    })(file);
    picReader.readAsDataURL(file);
  }
  setTimeout(function() {
    $(".progress").fadeOut();
    var temp_img_containers = document
      .getElementById("temp-container")
      .getElementsByClassName("thumbnail");
    for (var i = 0; i < background_images.length; i++) {
      for (var j = 0; j < temp_img_containers.length; j++) {
        if (
          background_images[i].name ==
          temp_img_containers[j].getAttribute("data-file-name")
        ) {
          var div = document.createElement("div");
          div.classList = "col-md-4 col-sm-2 animated fadeIn";
          div.appendChild(temp_img_containers[j]);
          document.getElementsByClassName("imgs")[0].append(div);
        }
      }
    }
    if (document.getElementsByClassName("bg-cover").length == 0) {
      setCover(document.getElementsByClassName("thumbnail")[0]);
    }
  }, 2500);
}

function setCover(elem) {
  if (document.getElementsByClassName("bg-cover").length > 0) {
    cover_elem = document.getElementsByClassName("bg-cover")[0];
    cover_elem_id = cover_elem.getAttribute("id");
    cover_elem.innerHTML +=
      "<div class='caption'> <button class='btn btn-sample' onclick='setCover(" +
      cover_elem_id +
      ")'>Make cover</button> </div>";
    cover_elem.setAttribute("class", "thumbnail");
  }
  elem.setAttribute("class", "thumbnail bg-cover");
  cover_id = elem.getAttribute("id");
  document
    .querySelector("#" + elem.getAttribute("id") + " > .caption")
    .remove();
}
