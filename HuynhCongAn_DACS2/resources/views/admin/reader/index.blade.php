@extends('admin.layouts.app')
@section('title', 'Readers')

@section('content')

    <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center w-100">
                <select class="form-select w-25 mb-3" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div class="ms-md-auto d-flex w-50 mb-3">
                    <div class="input-group">
                        <span class="input-group-text text-body bg-white border-end-0 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </div>
                <div class="ms-md-auto d-flex">
                    <button type="button" class="btn btn-sm btn-white me-2"> View all </button>
                    <a href="{{ route('readers.create') }}" type="button "
                        class="btn btn-sm btn-success btn-icon d-flex align-items-center me-2">
                        <span class="btn-inner--icon">
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" class="d-block me-2">
                                <path
                                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                </path>
                            </svg>
                        </span>
                        <span class="btn-inner--text" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">Thêm độc
                            giả</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body px-0 py-0">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7">#</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Tên</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Số điện thoại</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Email</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Địa chỉ</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Ngày hết hạn</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Trạng thái</th>
                            <th class="text-secondary  opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cards as $card)
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex px-2">
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">{{ $card->id }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <p class="text-sm font-weight-normal mb-0">{{ $card->name }}</p>
                                </td>
                                <td class="align-middle">
                                    <span class="text-sm font-weight-normal">{{ $card->phone }}</span>
                                </td>
                                <td class="align-middle">
                                    <span class="text-sm font-weight-normal">{{ $card->email }}</span>
                                </td>
                                <td style="white-space: pre-line;">
                                    <p class="text-secondary text-sm mb-0">{{ $card->address }}</p>
                                </td>
                                <td class="align-middle">
                                    @if ($card->end_date < now())
                                        <p class="text-danger text-sm mb-0">Quá hạn: {{ $card->end_date }}</p>
                                    @else
                                        <p class="text-secondary text-sm mb-0">{{ $card->end_date }}</p>
                                    @endif
                                </td>
                                <td class="align-middle">

                                    <form action="{{ route('readers.toggleStatus', $card->id) }}" method="post">
                                        @csrf
                                        @method('post')
                                        <button type="submit" class="border border-0 bg-transparent p-0 cursor-pointer">
                                            @if ($card->status == 1)
                                                <span class="badge badge-sm border border-success text-success bg-success">
                                                    <svg width="9" height="9" viewBox="0 0 10 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg" stroke="currentColor"
                                                        class="me-1">
                                                        <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg> Kích hoạt
                                                </span>
                                            @else
                                                <span class="badge badge-sm border border-danger text-danger bg-danger">
                                                    <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" class="me-1">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg> Khóa
                                                </span>
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                {{-- <td class="d-flex align-middle">
                                    <div class="align-items-center d-flex mt-2">
                                        <a href="{{ route('readers.edit', $card->id) }}" type="button"
                                            class="btn btn-info btn-icon px-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </a>
                                        <div class="px-2">
                                            <form action="{{ route('readers.destroy', $card->id) }}" method="post"
                                                id="form-delete{{ $card->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon px-3 btn-delete"
                                                    data-id="{{ $card->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>

                                        <div class="px-2">
                                            <form action="{{ route('readers.extendCard', $card->reader_id) }}" method="POST">
                                                @csrf
                                                <button  class="btn btn-light btn-icon px-3 btn-extend" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="22" width="24"
                                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                        <path
                                                            d="M512 80c8.8 0 16 7.2 16 16V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16H512zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM208 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H304c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H176zM376 144c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </td> --}}
                                <td class="align-middle">
                                    <div class="d-flex mt-2">
                                        <div>
                                            <a href="{{ route('readers.edit', $card->id) }}" type="button"
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
                                            <form action="{{ route('readers.destroy', $card->id) }}" method="post"
                                                id="form-delete{{ $card->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon px-3 btn-delete"
                                                    data-id="{{ $card->id }}">
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
                                            <form action="{{ route('readers.extendCard', $card->reader_id) }}" method="POST">
                                                @csrf
                                                <button  class="btn btn-light btn-icon px-3 btn-extend" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18"
                                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                        <path
                                                            d="M512 80c8.8 0 16 7.2 16 16V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16H512zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM208 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H304c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H176zM376 144c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="px-3 mt-3" style="color: white">
                    {{ $cards->links() }}
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
@endsection
