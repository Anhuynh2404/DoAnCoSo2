@extends('admin.layouts.app')
@section('title','Create Publisher')
@section('content')

<h1>Tạo mới thể loại</h1>
<div class="card border shadow-xs mb-4">
    <div class="card-header border-bottom pb-0">
      <div class="d-sm-flex align-items-center">
        <div>
          <h6 class="font-weight-semibold text-lg mb-0">Members list</h6>
          <p class="text-sm">See information about all members</p>
        </div>
      </div>
    </div>
    <div class="card-body px-0 py-0">
            <form action="{{route('publishers.store')}}" method="POST" >
                @csrf
                <div class="form-group px-4">
                    <label for="example-text-input" class="form-control-label">Nhà xuất bản</label>
                    <input class="form-control" value="{{old('name')}}" type="text" id="example-text-input" name="name">
                    @error('name')
                        <p class="text-sm text-danger">{{$message}}</p>
                     @enderror
                </div>
                <div class="form-group px-4">
                    <label for="example-tel-input" class="form-control-label">Số điện thoại</label>
                    <input class="form-control" type="tel" value="{{old('phone')}}" id="example-tel-input" name="phone">
                    @error('phone')
                        <p class="text-sm text-danger">{{$message}}</p>
                     @enderror
                </div>
                <div class="form-group px-4">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control"  name="email" value="{{old('email')}}">
                    @error('email')
                        <p class="text-sm text-danger">{{$message}}</p>
                     @enderror
                  </div>

                  <div class="form-group px-4">
                    <label for="exampleFormControlInput1">Địa chỉ</label>
                    <input type="text" class="form-control"  name="address" value="{{old('address')}}">
                    @error('address')
                        <p class="text-sm text-danger">{{$message}}</p>
                     @enderror
                  </div>

                <div class="form-group px-4">
                    <label for="exampleFormControlTextarea1">Ghi chú</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note">{{old('note')}}</textarea>
                </div>
                <div class="modal-footer px-4 mt-4 ">
                    <div class=" px-3">
                        <a href="{{route('publishers.index')}}" type="button" class="btn btn-white " >Hủy</a>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark">Thêm mới</button>
                    </div>
                  </div>
            </form>
    </div>
</div>
@endsection
