$(function () {
  $("#all-student").DataTable({
    columnDefs: [
      {
        targets: [0],
        orderData: [0, 1],
      },
      {
        targets: [1],
        orderData: [1, 0],
      },
      {
        targets: [4],
        orderData: [4, 0],
      },
    ],
  });

  $("#all-akademik").DataTable({
    columnDefs: [
      {
        targets: [0],
        orderData: [0, 1],
      },
      {
        targets: [1],
        orderData: [1, 0],
      },
      {
        targets: [4],
        orderData: [4, 0],
      },
    ],
  });
});
