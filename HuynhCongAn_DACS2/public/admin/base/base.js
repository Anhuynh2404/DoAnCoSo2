$(() => {

    function confirmDelete() {
        return new Promise((resolve, reject) => {
            swal({
                    title: "Bạn có chắc muốn xóa?",
                    text: "Sau khi xóa, bạn không thể khôi phục bản ghi này!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        resolve(true)
                    } else {
                        reject(false)
                    }
                });
        })
    }

    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        confirmDelete().then(function(){

            $('#form-delete' + id).submit();
        }).catch();

    })
})
