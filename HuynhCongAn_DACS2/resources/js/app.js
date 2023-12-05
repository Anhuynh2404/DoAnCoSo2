require('./bootstrap');

// Import Axios
import axios from 'axios';

// Thêm sự kiện cho nút thay đổi trạng thái
document.addEventListener('DOMContentLoaded', function () {
    const statusButtons = document.querySelectorAll('.toggle-status-btn');

    statusButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            const cardId = this.dataset.cardId;

            axios.post(`/readers/toggleStatus/${cardId}`)
                .then(response => {
                    // Xử lý khi thành công, có thể cập nhật giao diện mà không cần tải lại trang
                    console.log(response.data);
                })
                .catch(error => {
                    // Xử lý khi có lỗi
                    console.error(error);
                });
        });
    });
});
