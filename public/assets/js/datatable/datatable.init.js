$(function () {
  // Initialize DataTable for all siswa
  const urlSiswa = $('#all-student').data('url');
  function ucwords(str) {
    return str.toLowerCase().replace(/\b\w/g, function (l) { return l.toUpperCase(); });
  }

  $("#all-student").DataTable({
    processing: true,
    serverSide: true,
    ajax: urlSiswa,
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false },
      { data: 'nit', name: 'nit' },
      {
        data: 'nama_lengkap', name: 'nama_lengkap', render: function (data) {
          return ucwords(data);
        }
      },
      { data: 'tahun_akademik', name: 'tahun_akademik', searchable: false },
      { data: 'status_registrasi', name: 'status_registrasi', searchable: false },
      { data: 'status_spi', name: 'status_spi', searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });

  // Initialize DataTable for import student (hanya sekali)
  const importTable = $('#import-student').DataTable({
    searching: false,
    lengthChange: false,
    columns: [
      { title: "#" },
      { title: "NIT" },
      { title: "Nama Siswa" },
      { title: "Tahun Akademik" }
    ]
  });

  $('#wfile').on('change', function () {
    const fileInput = this.files[0];
    const akademik = $('#wakademik').val();
    const urlImport = $('#import-student').data('url');

    if (!fileInput || !akademik) {
      alert("Lengkapi dulu file + tahun akademik + jurusan");
      return;
    }

    // Show loading indicator inside tbody
    const $tbody = $('#import-student tbody');
    $tbody.html(`
      <tr id="import-loading">
        <td colspan="5" class="text-center py-4">
          <span class="spinner-border spinner-border-sm me-2"></span>
          Memproses data, mohon tunggu...
        </td>
      </tr>
    `);

    const formData = new FormData();
    formData.append('file', fileInput);
    formData.append('akademik', akademik);
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    $.ajax({
      url: urlImport,
      method: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function (res) {
        importTable.clear().draw();

        res.data.forEach((row, i) => {
          importTable.row.add([
            i + 1,
            row.nit,
            row.nama_lengkap,
            $('#wakademik option:selected').text()
          ]).draw(false);
        });
      },
      error: function (err) {
        $tbody.html(`
          <tr>
            <td colspan="5" class="text-center text-danger py-4">
              Gagal memuat data, cek kembali file dan inputan.
            </td>
          </tr>
        `);
      },
      complete: function () {
        $('#import-loading').remove();
      }
    });
  });

  // Initialize DataTable for all akademik
  const urlAkademik = $('#all-akademik').data('url');

  $("#all-akademik").DataTable({
    processing: true,
    serverSide: true,
    ajax: urlAkademik,
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false },
      { data: 'tahun_akademik', name: 'tahun_akademik' },
      { data: 'jumlah_siswa', name: 'jumlah_siswa', searchable: false },
      { data: 'status_pembayaran', name: 'status_pembayaran', searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });

  // Initialize DataTable for all pembayaran
  const urlPembayaran = $('#all-pembayaran').data('url');

  $("#all-pembayaran").DataTable({
    processing: true,
    serverSide: true,
    ajax: urlPembayaran,
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false },
      { data: 'tahun_akademik', name: 'tahun_akademik' },
      { data: 'registration_fee', name: 'registration_fee', searchable: false },
      { data: 'spi_fee', name: 'spi_fee', searchable: false },
      { data: 'spi_fee_per_semester', name: 'spi_fee_per_semester', searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });

  // Initialize DataTable for transaksi payments
  const urlTransaksi = $('#all-payments').data('url');
  $("#all-payments").DataTable({
    processing: true,
    serverSide: true,
    ajax: urlTransaksi,
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false },
      { data: 'kode_transaksi', name: 'kode_transaksi', orderable: true, searchable: true },
      {
        data: 'siswa.nit',
        name: 'siswa.nit',
        orderable: true, searchable: true,
      },
      {
        data: 'siswa.nama_lengkap',
        name: 'siswa.nama_lengkap',
        orderable: true, searchable: true,
      },
      {
        data: null, name: 'jenis_pembayaran', searchable: false, render:
          function (data) {
            if (data.jenis_pembayaran === 'SPI') {
              return `<span class="badge bg-warning-subtle rounded-pill text-warning border-warning border fs-2">
                                    Bayar ${data.jenis_pembayaran}
                                </span>`;
            }
            return `<span class="badge bg-danger-subtle rounded-pill text-danger border-danger border fs-2">
                                    ${data.jenis_pembayaran}
                                </span>`;
          }
      },
      { data: 'nominal', name: 'nominal', orderable: false, searchable: false },
      {
        data: null, name: 'angsuran', orderable: false, searchable: false, render: function (data) {
          if (data.jenis_pembayaran === 'SPI') {
            return `<span class="badge bg-warning-subtle rounded-pill text-warning border-warning border fs-2">
                                    Semester ${data.angsuran}
                                </span>`;
          }
          return `<span class="badge bg-danger-subtle rounded-pill text-danger border-danger border fs-2">
                                    Angsuran ${data.angsuran}
                                </span>`;
        }
      },
      { data: 'tanggal_transaksi', name: 'tanggal_transaksi', orderable: true, searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });
});
