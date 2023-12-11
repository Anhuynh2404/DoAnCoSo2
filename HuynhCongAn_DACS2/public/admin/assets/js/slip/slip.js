$(document).ready(function() {
    let selectedBooks = [];

    $('#bookSelector').change(function() {
        const selectedOption = $(this).find(':selected');
        const bookId = selectedOption.val();
        const bookName = selectedOption.text();

        if (selectedBooks.find(book => book.id === bookId)) {
            $('#errorMessage').text('Sách đã được chọn.');
            return;
        }

        if (selectedBooks.length >= 5) {
            $('#errorMessage').text('Chỉ được chọn tối đa 3 cuốn sách.');
            return;
        }
        selectedBooks.push({ id: bookId, name: bookName });

        renderSelectedBooksTable();
    });

    $('#selectedBooksTable').on('click', '#remove-book', function() {
        const bookIdToRemove = $(this).data('book-id');
        console.log(bookIdToRemove);
        selectedBooks = selectedBooks.delete(book => book.id !== bookIdToRemove);
        console.log(selectedBooks);
        renderSelectedBooksTable();
    });
    function renderSelectedBooksTable() {
        const selectedBooksTable = $('#selectedBooksTable');
        selectedBooksTable.empty();
        $('#errorMessage').text('');

        selectedBooks.forEach(book => {
            const row = `
                <tr>
                    <td>${book.id}</td>
                    <td>${book.name}</td>
                    <td>
                        <button type="button" id= "remove-book" class=" btn btn-danger" data-book-id="${book.id}">Xóa</button>
                    </td>
                </tr>
            `;

            selectedBooksTable.append(row);
        });
    }
});
