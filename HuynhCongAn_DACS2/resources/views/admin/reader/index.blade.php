@extends('admin.layouts.app')
@section('title', 'Roles')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Default Example <small>Users</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <div class = "d-flex">
                                    <div>
                                        <p class="text-muted font-13 m-b-30">
                                            DataTables has most features enabled by default, so all you need to do to use it
                                            with
                                            <code>$().DataTable();</code>
                                        </p>
                                    </div>
                                    <div class="ms-auto d-flex">
                                        <button type="button" class="btn btn-sm btn-white me-2"> View all </button>
                                        <a href={{ route('roles.create') }} type="button"
                                            class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                            <span class="btn-inner--icon">
                                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                                                    <path
                                                        d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <span class="btn-inner--text">Add member</span>
                                        </a>
                                    </div>
                                </div>
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Lớp</th>
                                            <th>Khoa</th>
                                            <th>Điện thoại</th>
                                            <th>Email</th>
                                            <th>Địa chỉ</th>
                                            <th>Ngày hết hạn</th>
                                            <th></th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($cards as $card)
                                            <tr>
                                                <td>{{ $card->id }}</td>
                                                <td>{{ $card->reader->name }}</td>
                                                <td>{{ $card->reader->class }}</td>
                                                <td>{{ $card->reader->major }}</td>
                                                <td>{{ $card->reader->phone }}</td>
                                                <td>{{ $card->reader->email }}</td>
                                                <td>{{ $card->reader->address }}</td>
                                                <td>{{ $card->end_date }}</td>
                                                <td>
                                                    <div class="d-flex mt-2">
                                                        <div>
                                                            <a href="" type="button"
                                                                class="btn btn-dark btn-icon px-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="px-2">
                                                            <form action="" method="post" id="form-delete">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-dark btn-icon px-3 btn-delete"
                                                                    data-id="">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="14" fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                        </path>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <a href="" type="button" class="btn btn-dark btn-icon px-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                height="14" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
