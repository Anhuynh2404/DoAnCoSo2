@extends('admin.layouts.app')
@section('title', 'Readers')

@section('content')

    <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center mb-3">
                <div>
                    <h6 class="font-weight-semibold text-lg mb-0">Danh sách độc giả</h6>
                    <p class="text-sm mb-sm-0">These are details about the last transactions</p>
                </div>
                <div class="ms-auto d-flex">
                    <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2 d-flex"
                        data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">
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
                        <span class="btn-inner--text">Thêm độc giả</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body px-0 py-0">
            <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7">#</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Tên</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Số điện thoại</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Email</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Lớp</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Địa chỉ</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Ngày hết hạn</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Trạng thái</th>
                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cards as $card)
                            <tr>
                                <td>
                                    <div class="d-flex px-2">
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">{{ $card->id }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-normal mb-0">{{ $card->name }}</p>
                                </td>
                                <td>
                                    <span class="text-sm font-weight-normal">{{ $card->phone }}</span>
                                </td>
                                <td>
                                    <span class="text-sm font-weight-normal">{{ $card->email }}</span>
                                </td>
                                <td>
                                    <span class="text-sm font-weight-normal">{{ $card->class }}</span>
                                </td>
                                <td>
                                    <p class="text-secondary text-sm mb-0">{{ $card->address }}</p>
                                </td>
                                <td>
                                    @if ($card->end_date < now())
                                        <p class="text-danger text-sm mb-0">Quá hạn: {{ $card->end_date }}</p>
                                    @else
                                        <p class="text-secondary text-sm mb-0">{{ $card->end_date }}</p>
                                    @endif
                                </td>
                                <td>

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
                                <td class=" d-flex">
                                    <div class="align-items-center d-flex">
                                        <a href="{{ route('readers.edit', $card->reader_id) }}"
                                            class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip"
                                            data-bs-title="Edit user">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                                viewBox="0 0 512 512">
                                                <path
                                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                            </svg>
                                        </a>
                                        <a href="" class="text-secondary font-weight-bold text-xs px-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                            </svg>

                                        </a>
                                    </div>
                                    <form action="{{ route('readers.extendCard', $card->reader_id) }}" method="POST">
                                        @csrf
                                        <button class="border border-0 bg-transparent p-0 cursor-pointer" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18"
                                                viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                <path
                                                    d="M512 80c8.8 0 16 7.2 16 16V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16H512zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM208 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H304c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H176zM376 144c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="px-3 mt-3 ">
                    {{ $cards->links() }}
                </div>
            </div>
        </div>
    </div>


    {{-- modals --}}
    <div class="modal fade w-100" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="max-width: 60%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="d-flex">
                            <div class=" mb-3 w-80 me-2">
                                <input type="hidden" name="reader_id" id="id_reader_id">
                                <input style=" height: 40px;" class="form-control custom-height" id="id_name"
                                    name="name" type="text" placeholder="Họ và tên" data-sb-validations="required"
                                    value="{{ old('name') }}" />
                                <div class="invalid-feedback" data-sb-feedback="ten:required">Họ và tên is required.</div>
                                @error('name')
                                    <p class="text-sm text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 w-20 ">
                                <input class="form-control" id="id_class" type="text" name="class"
                                    placeholder="Lớp" data-sb-validations="required" value="{{ old('class') }}" />
                                <div class="invalid-feedback" data-sb-feedback="lớp:required">Lớp is required.</div>
                                @error('class')
                                    <p class="text-sm text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class ="d-flex w-100">
                            <div class="mb-3 w-50 me-2">
                                <input class="form-control" id="id_faculty" name="faculty" type="text"
                                    placeholder="Khoa" data-sb-validations="required" value="{{ old('faculty') }}" />

                                <div class="invalid-feedback" data-sb-feedback="khoa:required">Khoa is required.</div>
                                @error('faculty')
                                    <p class="text-sm text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 w-50">
                                <input class="form-control px-3" id="id_major" name="major" type="text"
                                    placeholder="Chuyên nghành" data-sb-validations="required"
                                    value="{{ old('major') }}" />

                                <div class="invalid-feedback" data-sb-feedback="chuyenNghanh:required">Chuyên nghành is
                                    required.</div>
                                @error('major')
                                    <p class="text-sm text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class ="d-flex w-100">
                            <div class="mb-3 w-40 me-2">
                                <input class="form-control" id="id_email" type="email" name="email"
                                    placeholder="Email" data-sb-validations="required,email"
                                    value="{{ old('email') }}" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email Email is not valid.
                                </div>
                                @error('email')
                                    <p class="text-sm text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 w-30 me-2">
                                <input class="form-control" id="id_phone" type="text" name="phone"
                                    placeholder="Số điện thoại" data-sb-validations="required"
                                    value="{{ old('phone') }}" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Số điện thoại is required.
                                </div>
                                @error('phone')
                                    <p class="text-sm text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 w-30">
                                <input class="form-control" id="id_cccd" type="text" name="cccd"
                                    placeholder="Số CMNN/CCCD" data-sb-validations="required"
                                    value="{{ old('cccd') }}" />
                                <div class="invalid-feedback" data-sb-feedback="sốCmnnCccd:required">Số CMNN/CCCD is
                                    required.
                                </div>
                                @error('cccd')
                                    <p class="text-sm text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <div class ="d-flex w-100">
                            <div class="mb-3 w-80 me-2">
                                <input class="form-control" id="id_address" type="text" name="address"
                                    placeholder="Địa chỉ" data-sb-validations="required" value="{{ old('address') }}" />
                                <div class="invalid-feedback" data-sb-feedback="dịaChỉ:required">Địa chỉ is required.
                                </div>
                                @error('address')
                                    <p class="text-sm text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 w-20">
                                <select class="form-select" id="id_gender" name="gender" aria-label="Giới tính">
                                    <option value="Nam" {{ old('gender') == 'Nam' ? 'selected' : '' }}>Nam</option>
                                    <option value="Nữ" {{ old('gender') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                    <option value="Khác" {{ old('gender') == 'Khác' ? 'selected' : '' }}>Khác</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="note" id="id_note" type="text" placeholder="Ghi chú"
                                style="height: 5rem;" data-sb-validations="required" value="{{ old('note') }}"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="ghiChu:required">Ghi chú· is required.</div>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" id="id_status" name="status" aria-label="Trạng thái">
                                <option value="1">Kích hoạt</option>
                                <option value="0">Khóa</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary "id="btn-submit">Xác nhận</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- end modals --}}

    {{-- start scrip --}}

@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('#btn-submit').prop('disabled', true);

            function checkSubmitButtonStatus() {
                var isValid = true;

                $('form input, form select, form textarea').each(function() {
                    if ($(this).prop('required') && !$(this).val()) {
                        isValid = false;
                        return false;
                    }
                });


                $('#btn-submit').prop('disabled', !isValid);
            }

            $('form input, form select, form textarea').on('change', function() {
                checkSubmitButtonStatus();
            });

            $("#btn-submit").click(function(e) {
                e.preventDefault();
                var reader_id = $("#id_reader_id").val();
                var name = $("#id_name").val();
                var class_val = $("#id_class").val();
                var faculty = $("#id_faculty").val();
                var major = $("#id_major").val();
                var phone = $("#id_phone").val();
                var email = $("#id_email").val();
                var cccd = $("#id_cccd").val();
                var address = $("#id_address").val();
                var gender = $("#id_gender").val();
                var note = $("#id_note").val();
                var status = $("#id_status").val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('readers.store') }}",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        reader_id: reader_id,
                        name: name,
                        class_val: class_val,
                        faculty: faculty,
                        major: major,
                        phone: phone,
                        email: email,
                        cccd: cccd,
                        address: address,
                        gender: gender,
                        note: note,
                        status: status
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.success) {
                            alert(data.success);
                            location.reload();
                        } else {
                            printErrorMsg(data.error);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Xử lý lỗi khi request không thành công
                        if (jqXHR.responseJSON) {
                            printErrorMsg(jqXHR.responseJSON.error);
                        } else {
                            console.log("AJAX request failed: " + textStatus, errorThrown);
                        }
                    }
                });
            });
        });

        function printErrorMsg(errors) {
            // Handle and display errors as needed
            console.log(errors);
        }
    </script>
    @if (session('message'))
        <script>
            swal("Thông báo!", "{{ session('message') }}", "success");
        </script>
    @endif
@endsection
