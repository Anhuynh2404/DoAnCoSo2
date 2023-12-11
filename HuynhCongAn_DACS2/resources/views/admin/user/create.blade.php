@extends('admin.layouts.app')
@section('title', 'Create User')
@section('content')
    {{-- <div class="card border shadow-xs mb-4">
        <div class="card-body px-0 py-0">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group px-4 d-flex row">

                    <div class="d-flex w-100 mt-3 px-4">
                        <div class="d-flex px-4 mt-3 w-20">
                            <div class="btn p-0 rounded-circle">
                                <label class="form-label  m-0 ">
                                    <img class="rounded-circle" id="selectedImage" alt="example placeholder"
                                        style="width:150px; height:150px" src="{{ asset('admin/img/uploadUser.png') }}" />
                                </label>
                                <input type="file" class="form-control d-none" id="customFile1"
                                    onchange="displaySelectedImage(event, 'selectedImage')" name="image"
                                    accept="image/*" />
                            </div>
                        </div>

                        <div class="form-group w-80 mt-5">
                            <label for="example-text-input" class="form-control-label">Tên</label>
                            <input class="form-control" value="{{ old('name') }}" type="text" id="example-text-input"
                                name="name">
                            @error('name')
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group px-4">
                        <label for="exampleFormControlSelect1">Giới tính</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="gender">
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group px-4">
                        <label for="example-email-input" class="form-control-label">Email</label>
                        <input class="form-control" value="{{ old('email') }}" type="email" value=""
                            id="example-email-input" name="email">
                        @error('email')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group px-4">
                        <label for="example-tel-input" class="form-control-label">Phone</label>
                        <input class="form-control" type="tel" value="{{ old('phone') }}" id="example-tel-input"
                            name="phone">
                        @error('phone')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group px-4">
                        <label for="example-password-input" class="form-control-label">Password</label>
                        <input class="form-control" type="password" id="example-password-input" name="password">
                        @error('password')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group px-4">
                        <label for="example-date-input" class="form-control-label">Ngày sinh</label>
                        <input class="form-control" type="date" value="{{ old('birthday') }}" id="example-date-input"
                            name="birthday">
                    </div>
                    <div class="form-group px-4">
                        <label for="exampleFormControlTextarea1">Địa chỉ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group px-4">
                        <label>Chức năng</label>
                        <div class ="row">
                            @foreach ($roles as $groupName => $role)
                                <div class ="col-4  px-5">
                                    <h4>{{ $groupName }}</h4>
                                    <div>
                                        @foreach ($role as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $item->id }}" id="fcustomCheck1" name ="role_ids[]">
                                                <label class="custom-control-label"
                                                    for="fcustomCheck1">{{ $item->display_name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer px-4 mt-4 ">
                        <button type="submit" class="btn btn-white " data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Send message</button>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}
    <div class="card border shadow-xs mb-4">
        <div class="card-body px-0 py-0">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group px-4 d-flex row">

                    {{-- Phần bên trái --}}
                    <div class="d-flex w-50 px-4">
                        <div class="form-group w-90 mt-5">
                            <div class="d-flex px-4 mt-3 w-100">
                                <div class="btn p-0 me-2">
                                    <label class="form-label m-0">
                                        <img class="rounded-circle" id="selectedImage" alt="example placeholder"
                                            style="width:100px; height:100px"
                                            src="{{ asset('admin/img/uploadUser.png') }}" />
                                    </label>
                                    <input type="file" class="form-control d-none" id="customFile1"
                                        onchange="displaySelectedImage(event, 'selectedImage')" name="image"
                                        accept="image/*" />
                                </div>
                                <div class="w-100 mt-4">
                                    <label for="example-text-input" class="form-control-label">Tên</label>
                                    <input class="form-control" value="{{ old('name') }}" type="text"
                                        id="example-text-input" name="name">
                                    @error('name')
                                        <p class="text-sm text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex w-100">
                                <div class="w-40 me-2">
                                    <label for="exampleFormControlSelect1" class="form-control-label mt-3">Giới tính</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                        <option value="male">Nam</option>
                                        <option value="female">Nữ</option>
                                    </select>
                                </div>

                                <div class="w-60">
                                    <label for="example-date-input" class="form-control-label mt-3">Ngày sinh</label>
                                    <input class="form-control" type="date" value="{{ old('birthday') }}"
                                        id="example-date-input" name="birthday">
                                </div>
                            </div>

                            <label for="exampleFormControlTextarea1" class="form-control-label mt-3">Địa chỉ</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="text-sm text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Phần bên phải --}}
                    <div class="form-group w-50 px-4 mt-5">
                        <label for="example-tel-input" class="form-control-label">Phone</label>
                        <input class="form-control" type="tel" value="{{ old('phone') }}" id="example-tel-input"
                            name="phone">
                        @error('phone')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror

                        <label for="example-email-input" class="form-control-label mt-3">Email</label>
                        <input class="form-control" value="{{ old('email') }}" type="email" value=""
                            id="example-email-input" name="email">
                        @error('email')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror

                        <label for="example-password-input" class="form-control-label mt-3">Password</label>
                        <input class="form-control" type="password" id="example-password-input" name="password">
                        @error('password')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror

                        <label>Chức năng</label>
                        <div class="row">
                            @foreach ($roles as $groupName => $role)
                                <div class="col-6  px-5">
                                    <h4>{{ $groupName }}</h4>
                                    <div>
                                        @foreach ($role as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                                    id="fcustomCheck1" name="role_ids[]">
                                                <label class="custom-control-label"
                                                    for="fcustomCheck1">{{ $item->display_name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="modal-footer px-4 mt-4 ">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary me-2">Hủy</a>
                    <button type="submit" class="btn btn-success">Thêm</button>
                </div>
            </form>
        </div>
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
