@extends('admin.layouts.app')
@section('title','Edit User'.$user->name)
@section('content')

<h1>Chỉnh sửa người dùng</h1>
<div class="card border shadow-xs mb-4">
    <div class="card-header border-bottom pb-0">
      <div class="d-sm-flex align-items-center">
        <div>
          <h6 class="font-weight-semibold text-lg mb-0">Members list</h6>
          <p class="text-sm">See information about all members</p>
        </div>
        <div class="ms-auto d-flex">
          <button type="button" class="btn btn-sm btn-white me-2"> View all </button>
          <a href="{{route('user.create')}}" type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
            <span class="btn-inner--icon">
              <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
              </svg>
            </span>
            <span class="btn-inner--text" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">Add member</span>
          </a>
        </div>
      </div>
    </div>
    <div class="card-body px-0 py-0">
            <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group px-4 d-flex row">
                    <div class="mr-3 col-8">
                        <label for="image">Hình ảnh</label>
                        <input class="form-control" type="file" name="image" id="image" accept="image/*" onchange="displayImage()">
                        @error('image')
                            <p class="text-sm text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="d-flex flex-column align-items-end col-4">
                        <img src="{{ $user->images->count() >0 ? asset('/upload/users/'.$user->images->first()->url) : 'upload/users/default.png'  }}" alt="" id="show-image" style="max-width: 100%; max-height: 150px;">
                    </div>
                </div>

                <div class="form-group px-4">
                    <label for="example-text-input" class="form-control-label">Tên</label>
                    <input class="form-control" value="{{old('name') ?? $user->name}}" type="text" id="example-text-input" name="name">
                    @error('name')
                <p class="text-sm text-danger">{{$message}}</p>
            @enderror
                </div>
                <div class="form-group px-4">
                    <label for="exampleFormControlSelect1">Giới tính</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="gender" value ='{{$user->gender}}'>
                      <option value="male">Nam</option>
                      <option value="female">Nữ</option>
                    </select>
                  </div>
                <div class="form-group px-4">
                    <label for="example-email-input" class="form-control-label">Email</label>
                    <input class="form-control" value="{{old('email') ?? $user->email}}" type="email" value="" id="example-email-input" name="email">
                    @error('email')
                <p class="text-sm text-danger">{{$message}}</p>
            @enderror
                </div>
                <div class="form-group px-4">
                    <label for="example-tel-input" class="form-control-label">Phone</label>
                    <input class="form-control" type="tel" value="{{old('phone') ?? $user->phone}}" id="example-tel-input" name="phone">
                    @error('phone')
                <p class="text-sm text-danger">{{$message}}</p>
            @enderror
                </div>
                <div class="form-group px-4">
                    <label for="example-password-input" class="form-control-label">Password</label>
                    <input class="form-control" type="password"  id="example-password-input" name="password">
                    @error('password')
                <p class="text-sm text-danger">{{$message}}</p>
            @enderror
                </div>
                <div class="form-group px-4">
                    <label for="example-date-input" class="form-control-label">Ngày sinh</label>
                    <input class="form-control" type="date" value="{{old('birthday') ?? $user->birthday}}" id="example-date-input" name="birthday">
                </div>
                <div class="form-group px-4">
                    <label for="exampleFormControlTextarea1">Địa chỉ</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{old('address')?? $user->address}}</textarea>
                    @error('address')
                <p class="text-sm text-danger">{{$message}}</p>
            @enderror
                </div>
                <div class="form-group px-4">
                    <label>Chức năng</label>
                    <div class ="row">
                    @foreach($roles as $groupName => $role)
                            <div class ="col-4  px-5">
                                <h4>{{$groupName}}</h4>
                                <div>
                                    @foreach($role as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$item->id}}" id="fcustomCheck1"  name ="role_ids[]" {{ $user->roles->contains('id',$item->id)?'checked':''}}>
                                        <label class="custom-control-label" for="fcustomCheck1">{{$item->display_name}}</label>
                                      </div>
                                    @endforeach
                                </div>
                            </div>
                    @endforeach
                    </div>
                </div>
                <div class="ms-auto d-flex px-4 mt-4">
                    <a href="{{route('user.index')}}" type="button" class="btn btn-sm btn-white me-2"> Hủy </a>
                    <button  type="submit" class="btn btn-submit btn-sm btn-dark btn-icon d-flex align-items-center me-2" name="submit">
                      <span class="btn-inner--icon">
                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                          <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                        </svg>
                      </span>
                      <span class="btn-inner--text">Lưu</span>
                    </button>
                  </div>
            </form>


    </div>
</div>

<script>
    function displayImage() {
        var input = document.getElementById('image');
        var img = document.getElementById('show-image');

        // Kiểm tra xem có tệp được chọn không
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Gán URL hình ảnh cho thuộc tính src của thẻ img
                img.src = e.target.result;
            };

            // Đọc dữ liệu hình ảnh dưới dạng URL
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
