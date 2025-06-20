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
