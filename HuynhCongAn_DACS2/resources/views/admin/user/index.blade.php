@extends('admin.layouts.app')
@section('title','Roles')
<style>
    .pagination .active .page-link {
    background-color: #1e293b;
    color: #fff;
    border: 1px solid #1e293b;
}

    .pagination a:hover {
        background-color: #1e293b;
        color: #fff;
        border: 1px solid #1e293b;
    }
</style>
@section('content')
<h2>Danh sách người dùng</h2>
<div class="card border shadow-xs mb-4">
    <div class="card-header border-bottom pb-0">
      <div class="d-sm-flex align-items-center">
        <div>
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
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead class="bg-gray-100">
            <tr>
              <th class="text-secondary text-xs font-weight-semibold opacity-7">Tên</th>
              <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Email</th>
              <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Số điện thoại</th>
              <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Ngày sinh</th>
              <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Địa chỉ</th>
              <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Giới tính</th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user )
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                        <div class="d-flex align-items-center">
                            <img src="{{ $user->images->count() >0 ? asset('/upload/'.$user->images->last()->url) : 'upload/default.png'  }}" class="avatar avatar-sm rounded-circle me-2" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center ms-1">
                            <h6 class="mb-0 text-sm font-weight-semibold">{{$user->name}}</h6>
                        </div>
                        </div>
                     </td>

                    <td class="align-middle">
                        <p class="text-sm text-secondary mb-0">{{$user->email}}</p>
                    </td>
                    <td class="align-middle text-center">
                        <p class="text-sm text-dark font-weight-semibold mb-0">{{$user->phone}}</p>
                    </td>
                    <td class="align-middle text-center">
                        <span class="text-secondary text-sm font-weight-normal">{{$user->birthday}}</span>
                    </td>
                    <td class="align-middle" style="white-space: pre-line;">
                        <p class="text-sm text-dark font-weight-semibold mb-0">{{$user->address}}</p>
                    </td>

                    <td class="align-middle text-center">
                        <span class="text-secondary text-sm font-weight-normal">{{$user->gender}}</span>
                    </td>
                    <td class="align-middle">
                        <div class="d-flex mt-2">
                            <div>
                                <a href="{{route('user.edit',$user->id)}}" type="button" class="btn btn-dark btn-icon px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </a>
                               </div>
                               <div class="px-2">
                                <form action="{{route('user.destroy',$user->id)}}" method="post" id="form-delete{{$user->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark btn-icon px-3 btn-delete"  data-id="{{$user->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                           </div>
                      </td>
                </tr>
            @endforeach
          </tbody>

        </table>
        <div class="px-3 mt-3">
            {{$users->links()}}
        </div>
      </div>
    </div>
  </div>


@endsection

@section('script')
     @if (session('message'))
        <script>
            swal("Thông báo!", "{{ session('message') }}", "success");
        </script>
     @endif
@endsection
