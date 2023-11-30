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
<h2>Danh sách ấn phẩm</h2>
<div class="card border shadow-xs mb-4">
    <div class="card-header border-bottom pb-0">
      <div class="d-sm-flex align-items-center">
        <div>
          <p class="text-sm">See information about all members</p>
        </div>
        <div class="ms-auto d-flex">
          <button type="button" class="btn btn-sm btn-white me-2"> View all </button>
          <a href="{{route('book.create')}}" type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
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
              <th class="text-secondary text-xs font-weight-semibold opacity-7">Hình ảnh</th>
              <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Tên</th>
              <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Tác giả</th>
              <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Nhà xuất bản</th>
              <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Thể loại</th>
              <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Mô tả</th>
              <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Trạng thái</th>
              <th class="text-secondary opacity-7"></th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($books as $book )
                <tr>
                    <td class="w-10">
                        <div class="d-block blur-shadow-image">
                            <img src="{{ $book->images->count() >0 ? asset('upload/'.$book->images->last()->url) : 'upload/default.png'  }}"  class="img-fluid shadow border-radius-lg" alt="Sách {{ $book->name }}">
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center ms-1">
                            <h6 class="mb-0 text-sm font-weight-semibold">{{$book->name}}</h6>
                        </div>
                        </div>
                     </td>
                     <td class="align-middle">
                        <p class="text-sm text-secondary mb-0">
                            @foreach ($book->authors as $author)
                                {{ $author->name }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </p>
                    </td>

                     <td class="align-middle">
                        <p class="text-sm text-secondary mb-0">
                            @foreach ($book->publishers as $publisher)
                                {{ $publisher->name }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </p>
                    </td>

                    <td class="align-middle">
                        <p class="text-sm text-secondary mb-0">
                            @foreach ($book->categories as $category)
                                {{ $category->name }}
                                @if (!$loop->last) {{-- Add a comma if it's not the last publisher --}}
                                    ,
                                @endif
                            @endforeach
                        </p>
                    </td>

                    <td class="align-middle" style="white-space: pre-line;">
                        {!! $book->description !!}
                    </td>

                    <td class="align-middle text-center">
                        <span class="text-secondary text-sm font-weight-normal">{{$book->gender}}</span>
                    </td>
                    <td class="align-middle text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="d-flex mt-2">
                            <div>
                                <a href="{{route('book.edit',$book->id)}}" type="button" class="btn btn-dark btn-icon px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                </a>
                               </div>
                               <div class="px-2">
                                <form action="{{route('book.destroy',$book->id)}}" method="post" id="form-delete{{$book->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-dark btn-icon px-3 btn-delete"  data-id="{{$book->id}}">
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
            {{$books->links()}}
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
