@extends('admin.layouts.app')
@section('title', 'Readers')

@section('content')

    <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center mt-3">
                <select class="form-select w-10 mb-3 me-2" aria-label="Default select example" >
                    <option selected >Trạng thái</option>
                    <option value="1">Đã trả</option>
                    <option value="2">Chưa trả</option>
                  </select>
                  <select class="form-select w-15 mb-3 me-2" aria-label="Default select example" >
                    <option selected>Thể loại</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <select class="form-select w-20 mb-3" aria-label="Default select example" >
                    <option selected>Nhà xuất bản</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                <div class="ms-md-auto d-flex w-35 me-2 mb-3">
                    <form action="{{ route('slips.search') }}" method="GET">
                        <div class="input-group">
                            <span class="input-group-text text-body bg-white border-end-0 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </span>
                            <input type="text" name="search" class="form-control" id="searchInput" placeholder="Search">
                        </div>
                    </form>
                </div>
                <div class="ms-auto d-flex mb-3">
                    <a href="{{ route('slips.create') }} " type="button"
                        class="btn btn-sm btn-success btn-icon d-flex align-items-center mb-0 me-2">
                        <span class="btn-inner--icon">
                            <span class="btn-inner--icon">
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor" class="d-block me-2">
                                    <path
                                        d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                    </path>
                                </svg>
                            </span>
                        </span>
                        <span class="btn-inner--text">Thêm phiếu mượn</span>
                    </a>
                </div>

            </div>
        </div>
        <div class="card-body px-0 py-0" id="searchResults">
            <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7">#</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Ngày lập</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Tên độc giả</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Điện thoại</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Người lập</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Số lượng</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Ngày hết hạn</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Trạng thái</th>
                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slips as $slip)
                            <tr>
                                <td>
                                    <div class="d-flex px-2">
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">{{ $slip->id }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-normal mb-0">{{ $slip['details'][0]['borrowed_date'] }}</p>
                                </td>
                                <td>
                                    <span class="text-sm font-weight-normal">{{ $slip->card->reader->name }}</span>
                                </td>
                                <td>
                                    <span class="text-sm font-weight-normal">{{ $slip->user->phone }}</span>
                                </td>
                                <td>
                                    <span class="text-sm font-weight-normal">{{ $slip->user->name }}</span>
                                </td>
                                <td>
                                    <span class="text-sm font-weight-normal">{{ $slip['details'][0]['books_count'] ?? 0 }}/5</span>
                                </td>
                                <td>
                                    @if ($slip['details'][0]['returned_date']< now())
                                        <p class="text-danger text-sm mb-0">Quá hạn: {{ $slip['details'][0]['returned_date'] }}</p>
                                    @else
                                        <p class="text-success text-sm mb-0">{{ $slip['details'][0]['returned_date'] }}</p>
                                    @endif
                                </td>
                                <td>

                                    <form action="{{ route('slips.returnStatus', $slip->id) }}" method="post">
                                        @csrf
                                        @method('post')
                                        <button type="submit" class="border border-0 bg-transparent p-0 cursor-pointer">
                                            @if ($slip['details'][0]['status'] == 1)
                                            <span class="badge badge-sm border border-danger text-danger bg-danger">
                                                <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="me-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                </svg> Chưa trả
                                            </span>
                                            @else
                                                <span class="badge badge-sm border border-success text-success bg-success">
                                                    <svg width="9" height="9" viewBox="0 0 10 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg" stroke="currentColor"
                                                        class="me-1">
                                                        <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg> Đã trả
                                                </span>
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex mt-2">
                                        <div>
                                            <a href="{{ route('slips.edit', $slip->id) }}" type="button"
                                                class="btn btn-info btn-icon px-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="px-2">
                                            <form action="{{ route('readers.destroy', $slip->id) }}" method="post"
                                                id="form-delete{{ $slip->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon px-3 btn-delete"
                                                    data-id="{{ $slip->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="">
                                            <form action="" method="POST">
                                                @csrf
                                                <button  class="btn btn-light btn-icon px-3 btn-extend" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384v38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM288 368a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm211.3-43.3c-6.2-6.2-16.4-6.2-22.6 0L416 385.4l-28.7-28.7c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6l40 40c6.2 6.2 16.4 6.2 22.6 0l72-72c6.2-6.2 6.2-16.4 0-22.6z"/></svg>

                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3 px-4" style="color: white">
                    {{ $slips->links()  }}
                </div>
            </div>
        </div>
    </div>



@endsection

@section('script')
    @if (session('message'))
        <script>
            swal("Thông báo!", "{{ session('message') }}", "success");
        </script>
    @endif
    <script>
        <script>
    $(document).ready(function () {
        $('#searchInput').keypress(function (e) {
            if (e.which === 13) {  // Kiểm tra nếu phím Enter được nhấn
                e.preventDefault();
                performSearch();
            }
        });

        function performSearch() {
            // Lấy giá trị từ ô tìm kiếm
            var searchTerm = $('#searchInput').val();

            // Gửi yêu cầu tìm kiếm, bạn có thể sử dụng Ajax để gửi yêu cầu đến máy chủ
            // và nhận kết quả tìm kiếm về, sau đó cập nhật nội dung trang web.
            // Ở đây chỉ là ví dụ cơ bản.
            alert('Performing search for: ' + searchTerm);
        }
    });
</script>

    </script>
    <script>
        // Handle form submission with AJAX
        document.getElementById('searchForm').addEventListener('submit', function (event) {
            event.preventDefault();

            // Fetch the search results
            fetch(this.action + '?' + new URLSearchParams(new FormData(this)))
                .then(response => response.json())
                .then(data => {
                    // Update the results container with the received data
                    document.getElementById('searchResults').innerHTML = renderSearchResults(data);
                });
        });

        // Function to render search results as HTML
        function renderSearchResults(data) {
            // Customize this function based on how you want to display the results
            let html = '<ul>';
            data.data.forEach(slip => {
                html += `<li>${slip.id}: ${slip.card.reader.name}</li>`;
            });
            html += '</ul>';

            // Return the HTML
            return html;
        }
    </script>
@endsection
