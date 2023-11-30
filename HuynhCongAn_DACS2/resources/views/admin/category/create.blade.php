@extends('admin.layouts.app')
@section('title','Create Category')
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
            <form action="{{route('category.store')}}" method="POST" >
                @csrf
                <div class="form-group px-4">
                    <label for="example-text-input" class="form-control-label">Tên thể loại</label>
                    <input class="form-control" value="{{old('name')}}" type="text" id="example-text-input" name="name">
                    @error('name')
                        <p class="text-sm text-danger">{{$message}}</p>
                     @enderror
                </div>
                <div class="form-group px-4">
                    <label for="exampleFormControlSelect1">Thể loại cha</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="parent_id">
                        <option  value="">Chọn thể loại cha</option>
                        @foreach ($parentCategory as $item )
                            <option  value="{{$item->id}}" {{old('parent_id') == $item->id ? 'selected' : ' '}}  >{{$item->name}}</option>
                        @endforeach
                    </select>
                  </div>

                <div class="form-group px-4">
                    <label for="exampleFormControlTextarea1">Mô tả</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{old('description')}}</textarea>
                </div>
                <div class="modal-footer px-4 mt-4 ">
                    <a href="{{route('category.index')}}" type="button" class="btn btn-white " >Hủy</a>
                    <button type="submit" class="btn btn-dark">Tạo mới</button>
                  </div>
            </form>
    </div>
</div>
@endsection
