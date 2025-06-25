$(document).ready(function () {
    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();

        let button = $(this);
        let url = button.data('url');
        let urlLoad = button.data('load') || window.location.href;

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: 'Data akan dihapus secara permanen.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then(function (result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        Swal.fire('Berhasil!', 'Data berhasil dihapus.', 'success').then(() => {
                            if (urlLoad) {
                                window.location.href = urlLoad;
                            } else {
                                location.reload();
                            }
                        });
                    },
                    error: function () {
                        Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                    }
                });
            }
        });
    });
});

// Format input as Rupiah currency
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        var separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix === undefined ? rupiah : (rupiah ? prefix + ' ' + rupiah : '');
}