@extends('admin.layouts.app')
@section('title', 'Tạo mới độc giả')
@section('content')
    <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center">
                <div>
                    <h6 class="font-weight-semibold text-lg mb-0">Tạo mới độc giả</h6>
                    <p class="text-sm">See information about all members</p>
                </div>
                <div class="ms-auto d-flex">
                    <button type="button" class="btn btn-sm btn-white me-2"> View all </button>
                </div>
            </div>
        </div>
        <div class="card-body px-0 py-0">
            <form action="{{ route('slips.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="status" value="">
                <input type="hidden" name="returned_date" value="">
                <div class="container-fluid  my-5">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="card_id" id="card_id" aria-label="Chọn độc giả">
                            @foreach ($cards as $card)
                                <option value="{{ $card->id }}">{{ $card->reader->name }}</option>
                            @endforeach
                        </select>
                        <label for="card_id">Chọn độc giả</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="ngayHếtHạn" type="date" name="borrowed_date"
                            placeholder="Ngày lập" data-sb-validations="required" value="{{ old('borrowed_date') }}" />
                        <label for="ngayHếtHạn">Ngày lập</label>
                        <div class="invalid-feedback" data-sb-feedback="ngayHếtHạn:required">Ngày hết hạn is required.
                        </div>
                        @error('borrowed_date')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <div class="form-floating mb-3">
                        <select class="form-select" name="user_id" id="user_id" aria-label="Người cho mượn">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <label for="user_id">Người cho mượn</label>
                    </div> --}}
                    <input type="hidden" name="user_id">
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="note" id="ghiChu" type="text" placeholder="Ghi chú" style="height: 10rem;"
                            data-sb-validations="required" value="{{ old('note') }}"></textarea>
                        <label for="ghiChu">Ghi chú·</label>
                    </div>

                    {{-- <div class="form-floating mb-3">
                        <select class="form-select" name="book_id" id="book_id" aria-label="Chọn ấn phẩm">
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                            @endforeach
                        </select>
                        <label for="book_id">Chọn ấn phẩm</label>
                    </div> --}}
                    {{-- <div class="form mb-3">
                        <select class="form-control mySelect" name="book_id[]" multiple="multiple">
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}"
                                    {{ in_array($book->id, old('book_id', [])) ? 'selected' : '' }}>
                                    {{ $book->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="book_id[]">Chọn ấn phẩm</label>
                        @error('book_id[]')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div> --}}

                    {{-- <label for="details">Chọn sách:</label>
                    <div id="details-container">
                        <div class="detail">
                            <select name="details[0][book_id]">
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}




                     <div class="form-group ">
                        <label for="exampleFormControlSelect1">Chọn sách</label>
                        <select class="form-control mySelect" name="book_ids[]" class="form-select" id="multiple-select-field" data-placeholder="Choose anything" multiple >
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}"
                                    {{ in_array($book->id, old('book_ids', [])) ? 'selected' : '' }}>
                                    {{ $book->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('book_ids')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="selectedBooks">Thông tin sách đã chọn:</label>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sách</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="selectedBooksTable">
                                <!-- Thông tin sách đã chọn sẽ hiển thị ở đây -->
                            </tbody>
                        </table>
                        <span id="errorMessage" class="text-danger"></span>
                    </div>  --}}



                    <div class="mt-4 d-flex justify-content-end">
                        <a class="btn btn-white btn-lg me-2" type="submit" href="{{ route('slips.index') }}">Hủy</a>
                        <button type="submit" class="btn btn-dark btn-lg">Xác nhận</button>
                    </div>
                </div>
                <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
            </form>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.mySelect').select2();
        });
    </script>



    <script src="{{ asset('admin/assets/js/slip/slip.js') }}"></script>
@endsection
