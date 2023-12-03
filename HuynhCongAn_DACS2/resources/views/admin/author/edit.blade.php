@extends('admin.layouts.app')
@section('title','Edit Author')
@section('content')

<h1>Chỉnh sửa thể loại</h1>
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
            <form action="{{route('authors.update', $author->id)}}" method="POST" >
                @csrf
                @method('PUT')
                <div class="form-group px-4">
                    <label for="example-text-input" class="form-control-label">Tên tác giả</label>
                    <input class="form-control" value="{{old('name') ?? $author->name}}" type="text" id="example-text-input" name="name">
                    @error('name')
                        <p class="text-sm text-danger">{{$message}}</p>
                     @enderror
                </div>

                <div class="form-group px-4">
                    <label for="exampleFormControlTextarea1">Mô tả</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{old('description') ?? $author->description}}</textarea>
                </div>
                <div class="modal-footer px-4 mt-4 ">
                    <div class=" px-3">
                        <a href="{{route('authors.index')}}" type="button" class="btn btn-white " >Hủy</a>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark">Chỉnh sửa</button>
                    </div>
                  </div>
            </form>
    </div>
</div>
@endsection
