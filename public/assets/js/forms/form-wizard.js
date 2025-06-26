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
    // Cek khusus saat dari Step 1 ke Step 2
    if (currentIndex === 1 && newIndex > currentIndex) {
      let status = $('#hidden_status').val();
      if (status == 'Lunas') {
        Swal.fire({
          icon: 'error',
          title: 'Oops!',
          text: 'Siswa ini sudah lunas. Tidak bisa melanjutkan ke step berikutnya.'
        });
        return false;
      } else if (status == 'Not Found') {
        Swal.fire({
          icon: 'error',
          title: 'Oops!',
          text: 'Siswa tidak ditemukan. Silakan periksa NIT siswa.'
        });
        return false;
      }
    }

    return (
      currentIndex > newIndex ||
      (!(3 === newIndex && Number($("#age-2").val()) < 18) &&
        (currentIndex < newIndex &&
          (form.find(".body:eq(" + newIndex + ") label.error").remove(),
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error"))),
        (form.validate().settings.ignore = ":disabled,:hidden"),
        form.valid())
    );
  },
  onFinishing: function (event, currentIndex) {
    return (form.validate().settings.ignore = ":disabled"), form.valid();
  },
  onFinished: function (event, currentIndex) {
    Swal.fire("Form Submitted!", "Data siswa berhasil dikirim.", "info").then(function () {
      form.submit();
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
