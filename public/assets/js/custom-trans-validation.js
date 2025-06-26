$(document).ready(function () {
    // Format input nominal as Rupiah
    $('#wnominalPembayaran').inputmask('numeric', {
        radixPoint: ',',
        groupSeparator: '.',
        digits: 0,
        autoGroup: true,
        rightAlign: false,
        removeMaskOnSubmit: true,
        placeholder: '0'
    });

    // Update rekap section on input change
    $('#wkodeTransaksi').on('input', function () {
        $('#rekapKodeTransaksi').text($(this).val());
    });
    $('#wnit').on('input', function () {
        $('#rekapNIT').text($(this).val());
    });
    $('#wfullName').on('input', function () {
        $('#rekapNama').text($(this).val());
    });
    $('#wtahunAkademik').on('input', function () {
        $('#rekapTahunAkademik').text($(this).val());
    });
    $('#wtanggalTransaksi').on('change', function () {
        $('#rekapTanggalTransaksi').text($(this).val());
    });
    $('#wjenisPembayaran').on('change', function () {
        $('#rekapJenisPembayaran').text($(this).val());
    });
    $('#wnominalPembayaran').on('input', function () {
        var value = $(this).val();
        var formatted = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        $('#rekapNominalPembayaran').text('Rp ' + formatted);
    });
    $('#wangsuranKe').on('input', function () {
        $('#rekapAngsuranKe').text($(this).val());
    });

    function fetchSiswaInfo() {
        var nit = $('#wnit').val();
        var jenis = $('#wjenisPembayaran').val();
        const urlSiswaInfo = $('#wnit').data('url');
        if (nit && jenis) {
            // Disable input dan tampilkan spinner
            $('#wnit').prop('disabled', true);
            $('#nitLoading').removeClass('d-none');
            $.ajax({
                url: urlSiswaInfo,
                data: { nit: nit, jenis_pembayaran: jenis },
                success: function (res) {
                    $('#siswa_id').val(res.siswa_id);
                    $('#wfullName').val(res.nama_lengkap);
                    $('#wtahunAkademik').val(res.tahun_akademik);
                    $('#wstatusPembayaran').val(res.status_pembayaran);
                    $('.wkodeTransaksi').val(res.kode_transaksi);
                    $('.wangsuranKe').val(res.angsuran_ke);
                    $('#wremaining').val(res.remaining);

                    // Update rekap
                    $('#rekapNama').text(res.nama_lengkap);
                    $('#rekapTahunAkademik').text(res.tahun_akademik);
                    $('#rekapKodeTransaksi').text(res.kode_transaksi);
                    $('#rekapAngsuranKe').text(res.angsuran_ke);

                    // Sembunyikan pesan error jika ada
                    $('#siswaNotFound').remove();
                    $('#hidden_status').val('');

                    // Enable input dan sembunyikan spinner
                    $('#wnit').prop('disabled', false);
                    $('#nitLoading').addClass('d-none');
                },
                error: function (xhr) {
                    $('#wfullName').val('');
                    $('#wtahunAkademik').val('');
                    $('#wstatusPembayaran').val('');
                    $('#wremaining').val('');
                    $('.wkodeTransaksi').val('');
                    $('.wangsuranKe').val('');
                    $('#siswa_id').val('');
                    $('#siswaNotFound').remove();

                    // Tampilkan pesan error jika 404 atau 422
                    if (xhr.status === 404) {
                        if ($('#siswaNotFound').length === 0) {
                            $('#wnit').after('<div id="siswaNotFound" class="text-danger mt-2">Siswa tidak ditemukan!</div>');
                            $('#hidden_status').val('Not Found');
                        }
                    } else if (xhr.status === 422) {
                        let msg = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Sudah lunas!';
                        if ($('#siswaNotFound').length === 0) {
                            $('#wnit').after('<div id="siswaNotFound" class="text-danger mt-2">' + msg + '</div>');
                            $('#hidden_status').val('Lunas');
                        } else {
                            $('#siswaNotFound').text(msg);
                            $('#hidden_status').val('Lunas');
                        }
                    } else {
                        $('#siswaNotFound').remove();
                    }
                    // Enable input dan sembunyikan spinner
                    $('#wnit').prop('disabled', false);
                    $('#nitLoading').addClass('d-none');
                }
            });
        } else {
            $('#siswaNotFound').remove();
            $('#wnit').prop('disabled', false);
            $('#nitLoading').addClass('d-none');
        }
    }

    // Aktifkan inputmask pada NIT
    $('#wnit').inputmask({
        mask: '99.99.999',
        oncomplete: function () {
            // Cek jika NIT sudah lengkap
            if ($(this).inputmask("isComplete")) {
                fetchSiswaInfo();
            }
        },
    });

    // Jika jenis pembayaran berubah, cek ulang jika NIT sudah lengkap
    $('#wjenisPembayaran').on('change', function () {
        if ($('#wnit').inputmask("isComplete")) {
            fetchSiswaInfo();
        }
    });
});