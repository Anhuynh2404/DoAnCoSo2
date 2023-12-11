@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="d-md-flex align-items-center mb-3 mx-2">
                <div class="mb-md-0 mb-3">
                    <h3 class="font-weight-bold mb-0">Hello, {{ $username }}</h3>
                    <p class="mb-0">Apps you might like!</p>
                </div>
                <button type="button"
                    class="btn btn-sm btn-white btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                    <span class="btn-inner--icon">
                        <span class="p-1 bg-success rounded-circle d-flex ms-auto me-2">
                            <span class="visually-hidden">New</span>
                        </span>
                    </span>
                    <span class="btn-inner--text">Messages</span>
                </button>
                <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
                    <span class="btn-inner--icon">
                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </span>
                    <span class="btn-inner--text">Sync</span>
                </button>
            </div>
        </div>
    </div>
    <hr class="my-0">
    {{-- <div class="row">
        <div class="position-relative overflow-hidden">
            <div class="swiper mySwiper mt-4 mb-2">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div>
                            <div
                                class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                                <div class="full-background bg-cover"
                                    style="background-image: url('{{ asset('admin/assets/img/img-2.jpg') }}')"></div>
                                <div class="card-body text-start px-3 py-0 w-100">
                                    <div class="row mt-12">
                                        <div class="col-sm-3 mt-auto">
                                            <h4 class="text-dark font-weight-bolder">#1</h4>
                                            <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                            <h5 class="text-dark font-weight-bolder">Secured</h5>
                                        </div>
                                        <div class="col-sm-3 ms-auto mt-auto">
                                            <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                                            <h5 class="text-dark font-weight-bolder">Banking</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                            <div class="full-background bg-cover" style="background-image: url({{ asset('admin/assets/img/img-3.jpg') }})">
                            </div>
                            <div class="card-body text-start px-3 py-0 w-100">
                                <div class="row mt-12">
                                    <div class="col-sm-3 mt-auto">
                                        <h4 class="text-dark font-weight-bolder">#2</h4>
                                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                        <h5 class="text-dark font-weight-bolder">Cyber</h5>
                                    </div>
                                    <div class="col-sm-3 ms-auto mt-auto">
                                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                                        <h5 class="text-dark font-weight-bolder">Security</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                            <div class="full-background bg-cover" style="background-image: url('{{ asset('admin/assets/img/img-4.jpg') }}')">
                            </div>
                            <div class="card-body text-start px-3 py-0 w-100">
                                <div class="row mt-12">
                                    <div class="col-sm-3 mt-auto">
                                        <h4 class="text-dark font-weight-bolder">#3</h4>
                                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                        <h5 class="text-dark font-weight-bolder">Alpha</h5>
                                    </div>
                                    <div class="col-sm-3 ms-auto mt-auto">
                                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                                        <h5 class="text-dark font-weight-bolder">Blockchain</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                            <div class="full-background bg-cover" style="background-image: url({{ asset('admin/assets/img/img-5') }})">
                            </div>
                            <div class="card-body text-start px-3 py-0 w-100">
                                <div class="row mt-12">
                                    <div class="col-sm-3 mt-auto">
                                        <h4 class="text-dark font-weight-bolder">#4</h4>
                                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                        <h5 class="text-dark font-weight-bolder">Beta</h5>
                                    </div>
                                    <div class="col-sm-3 ms-auto mt-auto">
                                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                                        <h5 class="text-dark font-weight-bolder">Web3</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                            <div class="full-background bg-cover" style="background-image: url({{ asset('admin/assets/img/img-8.jpg') }})">
                            </div>
                            <div class="card-body text-start px-3 py-0 w-100">
                                <div class="row mt-12">
                                    <div class="col-sm-3 mt-auto">
                                        <h4 class="text-dark font-weight-bolder">#5</h4>
                                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                        <h5 class="text-dark font-weight-bolder">Gama</h5>
                                    </div>
                                    <div class="col-sm-3 ms-auto mt-auto">
                                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                                        <h5 class="text-dark font-weight-bolder">Design</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="card card-background shadow-none border-radius-xl card-background-after-none align-items-start mb-0">
                            <div class="full-background bg-cover" style="background-image: url({{ asset('admin/assets/img/img-9.jpg') }})">
                            </div>
                            <div class="card-body text-start px-3 py-0 w-100">
                                <div class="row mt-12">
                                    <div class="col-sm-3 mt-auto">
                                        <h4 class="text-dark font-weight-bolder">#6</h4>
                                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Name</p>
                                        <h5 class="text-dark font-weight-bolder">Rompro</h5>
                                    </div>
                                    <div class="col-sm-3 ms-auto mt-auto">
                                        <p class="text-dark opacity-6 text-xs font-weight-bolder mb-0">Category</p>
                                        <h5 class="text-dark font-weight-bolder">Security</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div> --}}
    <div class="row mt-3">
        <div class="col-xl-3 col-sm-6 mb-xl-0">
            <div class="card border shadow-xs mb-4">
                <div class="card-body text-start p-3 w-100">
                    <div
                        class="icon icon-shape icon-sm bg-success text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                        <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
                            <path fill-rule="evenodd"
                                d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="w-100">
                                <p class="text-sm text-secondary mb-1">Số lượng ấn phẩm</p>
                                <h4 class="mb-2 font-weight-bold">$99,118.5</h4>
                                <div class="d-flex align-items-center">
                                    <span class="text-sm text-success font-weight-bolder">
                                        <i class="fa fa-chevron-up text-xs me-1"></i>55%
                                    </span>
                                    <span class="text-sm ms-1">from 243</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0">
            <div class="card border shadow-xs mb-4">
                <div class="card-body text-start p-3 w-100">
                    <div
                        class="icon icon-shape icon-sm bg-light text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                                clip-rule="evenodd" />
                            <path
                                d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z" />
                        </svg>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="w-100">
                                <p class="text-sm text-secondary mb-1">Số lượng ấn phẩm đã mượn</p>
                                <h4 class="mb-2 font-weight-bold">376</h4>
                                <div class="d-flex align-items-center">
                                    <span class="text-sm text-success font-weight-bolder">
                                        <i class="fa fa-chevron-up text-xs me-1"></i>55%
                                    </span>
                                    <span class="text-sm ms-1">from 243</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0">
            <div class="card border shadow-xs mb-4">
                <div class="card-body text-start p-3 w-100">
                    <div
                        class="icon icon-shape icon-sm bg-info text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 6a3 3 0 013-3h12a3 3 0 013 3v12a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm4.5 7.5a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0v-2.25a.75.75 0 01.75-.75zm3.75-1.5a.75.75 0 00-1.5 0v4.5a.75.75 0 001.5 0V12zm2.25-3a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0V9.75A.75.75 0 0113.5 9zm3.75-1.5a.75.75 0 00-1.5 0v9a.75.75 0 001.5 0v-9z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="w-100">
                                <p class="text-sm text-secondary mb-1">Số lượng bạn đọc</p>
                                <h4 class="mb-2 font-weight-bold">$450.53</h4>
                                <div class="d-flex align-items-center">
                                    <span class="text-sm text-success font-weight-bolder">
                                        <i class="fa fa-chevron-up text-xs me-1"></i>22%
                                    </span>
                                    <span class="text-sm ms-1">from $369.30</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card border shadow-xs mb-4">
                <div class="card-body text-start p-3 w-100">
                    <div
                        class="icon icon-shape icon-sm bg-danger text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.25 2.25a3 3 0 00-3 3v4.318a3 3 0 00.879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 005.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 00-2.122-.879H5.25zM6.375 7.5a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="w-100">
                                <p class="text-sm text-secondary mb-1">Sô lượng sách trễ hạn</p>
                                <h4 class="mb-2 font-weight-bold">$23,364.55</h4>
                                <div class="d-flex align-items-center">
                                    <span class="text-sm text-success font-weight-bolder">
                                        <i class="fa fa-chevron-up text-xs me-1"></i>18%
                                    </span>
                                    <span class="text-sm ms-1">from $19,800.40</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Báo cáo mượn trả --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-xs border">
                <div class="card-header pb-0">
                    <div class="d-sm-flex align-items-center mb-3">
                        <div>
                            <h6 class="font-weight-semibold text-lg mb-0">Báo cáo mượn trả</h6>
                            <p class="text-sm mb-sm-0 mb-2">Here you have details about the balance.</p>
                        </div>
                        <div class="ms-auto d-flex">
                            <button type="button" class="btn btn-sm btn-white mb-0 me-2">
                                View report
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Mã độc giả</th>
                                <th>Tên độc giả</th>
                                <th>Lớp</th>
                                <th>Tên ấn phẩm</th>
                                <th>Ngày mượn</th>
                                <th>Ngày hẹn trả</th>
                                <th>Trạng thái</th>
                            </thead>
                            <tbody>
                                @foreach ($reportBorrowReturn as $report)
                                    <tr>
                                        <td>{{ $report->slip->card->id}}</td>
                                        <td>{{ $report->slip->card->reader->name}}</td>
                                        <td>{{ $report->slip->card->reader->class}}</td>
                                        {{-- <td>{{ $report['details'][0]['borrowed_date']}}</td> --}}
                                        <td>{{ $report->borrowed_date}}</td>
                                        <td>{{ $report->returned_date}}</td>
                                        <td>
                                            <button type="submit"
                                                class="border border-0 bg-transparent p-0 cursor-pointer">
                                                @if ($report->status == 1)
                                                    <span
                                                        class="badge badge-sm border border-danger text-danger bg-danger">
                                                        <svg width="12" height="12"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="me-1">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg> Chưa trả
                                                    </span>
                                                @else
                                                    <span
                                                        class="badge badge-sm border border-success text-success bg-success">
                                                        <svg width="9" height="9" viewBox="0 0 10 9"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg"
                                                            stroke="currentColor" class="me-1">
                                                            <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg> Đã trả
                                                    </span>
                                                @endif
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $reportBorrowReturn->links()  }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Thống kê độc giả  --}}
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card shadow-xs border">
                <div class="card-header pb-0">
                    <div class="d-sm-flex align-items-center mb-3">
                        <div>
                            <h6 class="font-weight-semibold text-lg mb-0">Thống kê độc giả</h6>
                            <p class="text-sm mb-sm-0 mb-2">Here you have details about the balance.</p>
                        </div>
                        <div class="ms-auto d-flex">
                            <button type="button" class="btn btn-sm btn-white mb-0 me-2">
                                View report
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Salary</th>
                                <th>Country</th>
                                <th>City</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>$36,738</td>
                                    <td>Niger</td>
                                    <td>Oud-Turnhout</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>$23,789</td>
                                    <td>Curaçao</td>
                                    <td>Sinaai-Waas</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>$56,142</td>
                                    <td>Netherlands</td>
                                    <td>Baileux</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                    <td>$38,735</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Doris Greene</td>
                                    <td>$63,542</td>
                                    <td>Malawi</td>
                                    <td>Feldkirchen in Kärnten</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Mason Porter</td>
                                    <td>$78,615</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Thống kê lần mượn  --}}
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card shadow-xs border">
                <div class="card-header pb-0">
                    <div class="d-sm-flex align-items-center mb-3">
                        <div>
                            <h6 class="font-weight-semibold text-lg mb-0">Thống kê lần mượn</h6>
                            <p class="text-sm mb-sm-0 mb-2">Here you have details about the balance.</p>
                        </div>
                        <div class="ms-auto d-flex">
                            <button type="button" class="btn btn-sm btn-white mb-0 me-2">
                                View report
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Salary</th>
                                <th>Country</th>
                                <th>City</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>$36,738</td>
                                    <td>Niger</td>
                                    <td>Oud-Turnhout</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>$23,789</td>
                                    <td>Curaçao</td>
                                    <td>Sinaai-Waas</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>$56,142</td>
                                    <td>Netherlands</td>
                                    <td>Baileux</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                    <td>$38,735</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Doris Greene</td>
                                    <td>$63,542</td>
                                    <td>Malawi</td>
                                    <td>Feldkirchen in Kärnten</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Mason Porter</td>
                                    <td>$78,615</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
