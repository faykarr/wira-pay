$(document).ready(function () {
  $("#wNIT").inputmask("99.99.999");
});

var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
  headerTag: "h6",
  bodyTag: "section",
  transitionEffect: "fade",
  titleTemplate: '<span class="step">#index#</span> #title#',
  labels: {
    finish: "Submit",
  },
  onStepChanging: function (event, currentIndex, newIndex) {
  },
  onFinishing: function (event, currentIndex) {
    return (form.validate().settings.ignore = ":disabled"), form.valid();
  },
  onFinished: function (event, currentIndex) {
    Swal.fire("Form Submitted!", "Data siswa akan diexport.", "info").then(function () {
      $("#loading-overlay").fadeIn();
      setTimeout(() => {
        form.submit();
      }, 900);

      // Setelah form submit selesai, fadeOut overlay
      form.on('submit', function (e) {
        $("#loading-overlay").fadeOut();
      });
    });;
  },
}),
  $(".validation-wizard").validate({
    ignore: "",
    errorClass: "text-danger",
    successClass: "text-success",
    highlight: function (element, errorClass) {
      $(element).removeClass(errorClass);
    },
    unhighlight: function (element, errorClass) {
      $(element).removeClass(errorClass);
    },
    errorPlacement: function (error, element) {
      error.insertAfter(element);
    },
  });
