$(function () {
  // Initialize DataTable for all siswa
  const urlSiswa = $('#all-student').data('url');
  $("#all-student").DataTable({
    processing: true,
    serverSide: true,
    ajax: urlSiswa,
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
      { data: 'nit', name: 'nit' },
      { data: 'nama_lengkap', name: 'nama_lengkap' },
      { data: 'tahun_akademik', name: 'tahun_akademik', searchable: false },
      { data: 'nama_jurusan', name: 'nama_jurusan', searchable: false },
      { data: 'status_registrasi', name: 'status_registrasi', searchable: false },
      { data: 'status_spi', name: 'status_spi', searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
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
      { data: 'jumlah_siswa', name: 'jumlah_siswa', searchable: false },
      { data: 'status_pembayaran', name: 'status_pembayaran', searchable: false },
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
      { data: 'jumlah_siswa', name: 'jumlah_siswa', searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });
});
