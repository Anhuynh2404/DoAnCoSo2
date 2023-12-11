@extends('admin.layouts.app')
@section('title', 'Edit Role', $role->name)
@section('content')
    <div class="card border shadow-xs mb-4">
        <div class="card-body px-0 py-0">
            <form action="{{ route('roles.update', $role->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="d-flex w-100">
                    <div class="form-group px-4 mt-3 w-30">
                        <label for="example-text-input" class="form-control-label">Tên</label>
                        <input class="form-control" value="{{ old('name') ?? $role->name }}" type="text"
                            id="example-text-input" name="name">

                        @error('name')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group px-4 w-30 mt-3">
                        <label for="example-text-input" class="form-control-label">Tên hiển thị</label>
                        <input class="form-control" value="{{ old('display_name') ?? $role->display_name }}" type="text"
                            id="example-text-input" name="display_name">

                        @error('display_name')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group px-4 w-40 mt-3">
                        <label for="exampleFormControlSelect1">Group</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="group"
                            value="{{ old('group') ?? $role->group }}">
                            <option value="system">Hệ thống</option>
                            <option value="user">Người dùng</option>
                        </select>
                    </div>
                </div>

                <div class="form-group px-4">
                    <label for="exampleFormControlTextarea1">Mô tả</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ old('description') ?? $role->description }}</textarea>
                </div>

                <div class="form-group px-4">
                    <label>Phân quyền</label>
                    <div class ="row">
                        @foreach ($permissions as $groupName => $permission)
                            <div class ="col-4  px-5">
                                <h4>{{ $groupName }}</h4>
                                <div>
                                    @foreach ($permission as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                                name ="permission_ids[]"
                                                {{ $role->permissions->contains('name', $item->name) ? 'checked' : '' }}>
                                            <label class="custom-control-label">{{ $item->display_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="ms-auto d-flex px-4 mt-4 ">
                    <a href="{{ route('roles.index') }}" type="button" class="btn btn-sm btn-white me-2"> Hủy </a>
                    <button type="submit" class="btn btn-submit btn-sm btn-success btn-icon d-flex align-items-center me-2"
                        name="submit">
                        <span class="btn-inner--text">Lưu</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
