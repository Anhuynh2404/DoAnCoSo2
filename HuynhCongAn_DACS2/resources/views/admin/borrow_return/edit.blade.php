@extends('admin.layouts.app')
@section('title', 'Chỉnh sửa độc giả')
@section('content')
    <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center">
                <div>
                    <h6 class="font-weight-semibold text-lg mb-0">Chỉnh sửa độc giả</h6>
                    <p class="text-sm">See information about all members</p>
                </div>
            </div>
        </div>
        <div class="card-body px-0 py-0">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="container-fluid px-5 my-5">
                    <div class="form-floating mb-3 w-100">
                        <input type="hidden" name="reader_id" value="   ">
                        <input class="form-control" id="ten" name="name" type="text" placeholder="Họ và tên"
                            data-sb-validations="required" value="{{ old('name') ?? $reader->name }}" />
                        <label for="ten">Họ và tên</label>
                        <div class="invalid-feedback" data-sb-feedback="ten:required">Họ và tên is required.</div>
                        @error('name')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class ="d-flex w-100">
                        <div class="form-floating mb-3 w-50 me-2">
                            <input class="form-control" id="khoa" name="faculty" type="text" placeholder="Khoa"
                                data-sb-validations="required" value="{{ old('faculty') ?? $reader->faculty  }}" />
                            <label for="khoa">Khoa</label>
                            <div class="invalid-feedback" data-sb-feedback="khoa:required">Khoa is required.</div>
                            @error('faculty')
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 w-50">
                            <input class="form-control px-3" id="chuyenNghanh" name="major" type="text"
                                placeholder="Chuyên nghành" data-sb-validations="required" value="{{ old('major') ?? $reader->major  }}" />
                            <label for="chuyenNghanh" class ="px-4">Chuyên nghành</label>
                            <div class="invalid-feedback" data-sb-feedback="chuyenNghanh:required">Chuyên nghành is
                                required.</div>
                            @error('major')
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class ="d-flex w-100">
                        <div class="form-floating mb-3 w-50 me-2">
                            <input class="form-control" id="lớp" type="text" name="class" placeholder="Lớp"
                                data-sb-validations="required" value="{{ old('class') ?? $reader->class  }}" />
                            <label for="lớp">Lớp</label>
                            <div class="invalid-feedback" data-sb-feedback="lớp:required">Lớp is required.</div>
                            @error('class')
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 w-50">
                            <input class="form-control" id="phone" type="text" name="phone"
                                placeholder="Số điện thoại" data-sb-validations="required" value="{{ old('phone') ?? $reader->phone  }}" />
                            <label for="phone" class ="px-4">Số điện thoại</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">Số điện thoại is required.</div>
                            @error('phone')
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" name="email" placeholder="Email"
                            data-sb-validations="required,email" value="{{ old('email') ?? $reader->email  }}" />
                        <label for="email">Email</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email Email is not valid.</div>
                        @error('email')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="sốCmnnCccd" type="text" name="cccd"
                            placeholder="Số CMNN/CCCD" data-sb-validations="required" value="{{ old('cccd') ?? $reader->cccd }}" />
                        <label for="sốCmnnCccd">Số CMNN/CCCD</label>
                        <div class="invalid-feedback" data-sb-feedback="sốCmnnCccd:required">Số CMNN/CCCD is required.
                        </div>
                        @error('cccd')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class ="d-flex w-100">
                        <div class="form-floating mb-3 w-80 me-2">
                            <input class="form-control" id="dịaChỉ" type="text" name="address"
                                placeholder="Địa chỉ" data-sb-validations="required" value="{{ old('address') ?? $reader->address  }}" />
                            <label for="dịaChỉ">Địa chỉ</label>
                            <div class="invalid-feedback" data-sb-feedback="dịaChỉ:required">Địa chỉ is required.</div>
                            @error('address')
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 w-20">
                            <select class="form-select" id="giớiTinh" name="gender" aria-label="Giới tính">
                                <option value="Nam" {{ old('gender') ?? $reader->gender  == 'Nam' ? 'selected' : '' }}>Nam</option>
                                <option value="Nữ" {{ old('gender') ?? $reader->gender  == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                <option value="Khác" {{ old('gender') ?? $reader->gender  == 'Khác' ? 'selected' : '' }}>Khác</option>
                            </select>
                            <label for="giớiTinh">Giới tính</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="ngayHếtHạn" type="date" name="end_date"
                            data-sb-validations="required"  value="{{ old('end_date') ?? $card->end_date}}" />
                        <label for="ngayHếtHạn">Ngày hết hạn</label>
                        <div class="invalid-feedback" data-sb-feedback="ngayHếtHạn:required">Ngày hết hạn is required.
                        </div>
                        @error('end_date')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="note" id="ghiChu" type="text" placeholder="Ghi chú"
                            style="height: 10rem;" data-sb-validations="required" v alue="">{{ old('note') ?? $reader->note}}</textarea>
                        <label for="ghiChu">Ghi chú·</label>
                        <div class="invalid-feedback" data-sb-feedback="ghiChu:required">Ghi chú· is required.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="trạngThai" name="status" aria-label="Trạng thái">
                            <option value="1" {{ old('status') ?? $card->status == '1' ? 'selected' : '' }}>Kích hoạt</option>
                            <option value="0" {{ old('status') ?? $card->status == '0' ? 'selected' : '' }}>Khóa</option>
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
                    <div class="mt-4 d-flex justify-content-end">
                        <a class="btn btn-white btn-lg me-2" type="submit" href="{{ route('readers.index') }}">Hủy</a>
                        <button type="submit" class="btn btn-dark btn-lg">Xác nhận</button>
                    </div>
                </div>
                <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
            </form>

        </div>
    @endsection
