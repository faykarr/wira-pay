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

  // Initialize DataTable for all akademik
  const urlAkademik = $('#all-akademik').data('url');

  $("#all-akademik").DataTable({
    processing: true,
    serverSide: true,
    ajax: urlAkademik,
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
      { data: 'tahun_akademik', name: 'tahun_akademik' },
      { data: 'jumlah_siswa', name: 'jumlah_siswa' },
      { data: 'status_pembayaran', name: 'status_pembayaran' },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });

  const urlJurusan = $('#all-jurusan').data('url');

  $("#all-jurusan").DataTable({
    processing: true,
    serverSide: true,
    ajax: urlJurusan,
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
      { data: 'nama_jurusan', name: 'nama_jurusan' },
      { data: 'jumlah_siswa', name: 'jumlah_siswa' },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });
});
