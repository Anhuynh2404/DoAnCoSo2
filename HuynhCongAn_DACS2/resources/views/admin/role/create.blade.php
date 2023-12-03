@extends('admin.layouts.app')
@section('title','Create Role')
@section('content')

<h1>Roles List</h1>

<div class="card border shadow-xs mb-4">
    <div class="card-header border-bottom pb-0">
      <div class="d-sm-flex align-items-center">
        <div>
            @if (session('message'))
          <h6 class="font-weight-semibold text-lg mb-0">{{session('message')}}</h6>
          @endif
          <p class="text-sm">See information about all members</p>

        </div>
      </div>
    </div>
    <div class="card-body px-0 py-0">
        <form action="{{route('roles.store')}}" method="post">
            @csrf
            <div class="form-group px-4 mt-3">
                <label for="example-text-input" class="form-control-label">Tên</label>
                <input class="form-control" value="{{old('name')}}" type="text"  id="example-text-input" name="name">

                @error('name')
                    <p class="text-sm text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group px-4 ">
                <label for="example-text-input" class="form-control-label">Tên hiển thị</label>
                <input class="form-control" value="{{old('display_name')}}" type="text"  id="example-text-input" name="display_name">

                @error('display_name')
                <p class="text-sm text-danger">{{$message}}</p>
            @enderror
            </div>

            <div class="form-group px-4">
              <label for="exampleFormControlSelect1">Group</label>
              <select class="form-control" id="exampleFormControlSelect1" name="group">
                <option value="system">Hệ thống</option>
                <option value="user">Người dùng</option>
              </select>
            </div>

            <div class="form-group px-4">
                <label for="exampleFormControlTextarea1">Mô tả</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
            </div>
            <div class="form-group px-4">
                <label>Phân quyền</label>
                <div class ="row">
                @foreach($permissions as $groupName => $permission)
                        <div class ="col-4  px-5">
                            <h4>{{$groupName}}</h4>
                            <div>
                                @foreach($permission as $item)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$item->id}}" id="fcustomCheck1"  name ="permission_ids[]">
                                    <label class="custom-control-label" for="fcustomCheck1">{{$item->display_name}}</label>
                                  </div>
                                @endforeach
                            </div>
                        </div>
                @endforeach
                </div>
            </div>
            <div class="ms-auto d-flex px-4 mt-4">
                <a href="{{route('roles.index')}}" type="button" class="btn btn-sm btn-white me-2"> Hủy </a>
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

@endsection
