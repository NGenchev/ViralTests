function addQuiz() {

    var title = document.getElementById("title").value;

    var filter = document.getElementById("filter_select").value;

    var data = new FormData();

    data.append("type", "filter");

    for (let i = 0; i < background_images.length; i++) {

        var element = background_images[i];



        var thumb = document

            .getElementsByClassName("thumbnail")

        [i].getAttribute("id");

        if (thumb == cover_id) {

            data.append("file_" + i, element, "cover");

            // console.log(element, cover_id, thumb);

        } else {

            data.append("file_" + i, element, element.name);

            // console.log(element, cover_id, thumb);

        }

    }



    data.append("title", title);

    data.append("filter", filter);



    //   console.log(data);

    for (var pair of data.entries()) {

        console.log(pair[0] + ", " + pair[1]);

    }



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

                    url: "https://viraltest.eu/en/?page=quiz&action=create&param=filter"

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