@extends('admin.layouts.app')
@section('title', 'Create User')
@section('content')

    <h1>Tạo mới người dùng</h1>
    <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center">
                <div>
                    <h6 class="font-weight-semibold text-lg mb-0">Members list</h6>
                    <p class="text-sm">See information about all members</p>
                </div>
                <div class="ms-auto d-flex">
                    <button type="button" class="btn btn-sm btn-white me-2"> View all </button>
                    <a href="{{ route('readers.create') }}" type="button"
                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                        <span class="btn-inner--icon">
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" class="d-block me-2">
                                <path
                                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                </path>
                            </svg>
                        </span>
                        <span class="btn-inner--text" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">Add
                            member</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body px-0 py-0">
            <form action="{{ route('readers.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container px-5 my-5">
                    <div class="form-floating mb-3 w-100">
                        <input type="hidden" name="reader_id" value="   ">
                        <input class="form-control" id="ten" name="name" type="text" placeholder="Họ và tên"
                            data-sb-validations="required" value="{{ old('name') }}" />
                        <label for="ten">Họ và tên</label>
                        <div class="invalid-feedback" data-sb-feedback="ten:required">Họ và tên is required.</div>
                        @error('name')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class ="d-flex w-100">
                        <div class="form-floating mb-3 w-50">
                            <input class="form-control" id="khoa" name="faculty" type="text" placeholder="Khoa"
                                data-sb-validations="required" value="{{ old('faculty') }}" />
                            <label for="khoa">Khoa</label>
                            <div class="invalid-feedback" data-sb-feedback="khoa:required">Khoa is required.</div>
                            @error('faculty')
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 w-50 px-2">
                            <input class="form-control px-3" id="chuyenNghanh" name="major" type="text"
                                placeholder="Chuyên nghành" data-sb-validations="required" value="{{ old('major') }}" />
                            <label for="chuyenNghanh" class ="px-4">Chuyên nghành</label>
                            <div class="invalid-feedback" data-sb-feedback="chuyenNghanh:required">Chuyên nghành is
                                required.</div>
                            @error('major')
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class ="d-flex w-100">
                        <div class="form-floating mb-3 w-50">
                            <input class="form-control" id="lớp" type="text" name="class" placeholder="Lớp"
                                data-sb-validations="required" value="{{ old('class') }}" />
                            <label for="lớp">Lớp</label>
                            <div class="invalid-feedback" data-sb-feedback="lớp:required">Lớp is required.</div>
                            @error('class')
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 w-50 px-2">
                            <input class="form-control" id="phone" type="text" name="phone"
                                placeholder="Số điện thoại" data-sb-validations="required" value="{{ old('phone') }}" />
                            <label for="phone" class ="px-4">Số điện thoại</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">Số điện thoại is required.</div>
                            @error('phone')
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" name="email" placeholder="Email"
                            data-sb-validations="required,email" value="{{ old('email') }}" />
                        <label for="email">Email</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email Email is not valid.</div>
                        @error('email')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="sốCmnnCccd" type="text" name="cccd"
                            placeholder="Số CMNN/CCCD" data-sb-validations="required" value="{{ old('cccd') }}" />
                        <label for="sốCmnnCccd">Số CMNN/CCCD</label>
                        <div class="invalid-feedback" data-sb-feedback="sốCmnnCccd:required">Số CMNN/CCCD is required.
                        </div>
                        @error('cccd')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class ="d-flex w-100">
                        <div class="form-floating mb-3 w-80">
                            <input class="form-control" id="dịaChỉ" type="text" name="address"
                                placeholder="Địa chỉ" data-sb-validations="required" value="{{ old('address') }}" />
                            <label for="dịaChỉ">Địa chỉ</label>
                            <div class="invalid-feedback" data-sb-feedback="dịaChỉ:required">Địa chỉ is required.</div>
                            @error('address')
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 w-20 px-2">
                            <select class="form-select" id="giớiTinh" name="gender" aria-label="Giới tính">
                                <option value="Nam" {{ old('gender') == 'Nam' ? 'selected' : '' }}>Nam</option>
                                <option value="Nữ" {{ old('gender') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                <option value="Khác" {{ old('gender') == 'Khác' ? 'selected' : '' }}>Khác</option>
                            </select>
                            <label for="giớiTinh">Giới tính</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="ngayHếtHạn" type="date" name="end_date"
                            placeholder="Ngày hết hạn" data-sb-validations="required"  value="{{ old('end_date') }}" />
                        <label for="ngayHếtHạn">Ngày hết hạn</label>
                        <div class="invalid-feedback" data-sb-feedback="ngayHếtHạn:required">Ngày hết hạn is required.
                        </div>
                        @error('end_date')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="note" id="ghiChu" type="text" placeholder="Ghi chú·"
                            style="height: 10rem;" data-sb-validations="required" value="{{ old('note')}}"></textarea>
                        <label for="ghiChu">Ghi chú·</label>
                        <div class="invalid-feedback" data-sb-feedback="ghiChu:required">Ghi chú· is required.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="trạngThai" name="status" aria-label="Trạng thái">
                            <option value="1">Kích hoạt</option>
                            <option value="0">Khóa</option>
                        </select>
                        <label for="trạngThai">Trạng thái</label>
                    </div>
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            <p>To activate this form, sign up at</p>
                            <a
                                href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Error sending message!</div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg disabled" type="submit" name="submit">Submit</button>
                        <button type="submit" class="btn btn-dark">Send message</button>
                    </div>
                </div>
                <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
            </form>

        </div>

        <script>
            function displayImage() {
                var input = document.getElementById('image');
                var img = document.getElementById('show-image');

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function displaySelectedImage(event, elementId) {
                const selectedImage = document.getElementById(elementId);
                const fileInput = event.target;

                if (fileInput.files && fileInput.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        selectedImage.src = e.target.result;
                    };

                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        </script>
        <script>
            let clickHandled = false;
            document.getElementById('selectedImage').addEventListener('click', function() {
                if (!clickHandled) {
                    document.getElementById('customFile1').click();
                    clickHandled = true;
                } else {
                    clickHandled = false;
                }
            });

            function displaySelectedImage(event, imageId) {
                const input = event.target;
                const reader = new FileReader();

                reader.onload = function() {
                    const image = document.getElementById(imageId);
                    image.src = reader.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        </script>
    @endsection
