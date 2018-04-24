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
    