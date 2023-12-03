@extends('admin.layouts.app')
@section('title', 'Create Book')
@section('content')

    <h1>Cập nhật ấn phẩm</h1>
    <div class="card border shadow-xs mb-4">
        <div class="card-header border-bottom pb-0">
            <div class="d-sm-flex align-items-center">
                <div>
                    <h6 class="font-weight-semibold text-lg mb-0">Members list</h6>
                    <p class="text-sm">See information about all members</p>
                </div>
                <div class="ms-auto d-flex">
                    <button type="button" class="btn btn-sm btn-white me-2"> View all </button>
                    <a href="{{ route('books.create') }}" type="button"
                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                        <span class="btn-inner--icon">
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" class="d-block me-2">
                                <path
                                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                                </path>
                            </svg>
                        </span>
                        <span class="btn-inner--text" data-bs-toggle="modal" data-bs-target="#exampleModalMessage">Add
                            member</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body px-0 py-0">
            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex">
                    <div class="d-flex px-4 mt-3">
                        <div class="btn p-0">
                            <label class="form-label  m-0 ">
                                <img id="selectedImage" alt="example placeholder" style="width: 100px;"
                                    src="{{ $book->images ? asset('upload/'.$book->images->last()->url) : asset('admin/img/upload.png')}}" />
                            </label>
                            <input type="file" class="form-control d-none" id="customFile1"
                                onchange="displaySelectedImage(event, 'selectedImage')" name="image" accept="image/*" />
                        </div>
                        @error('image')
                            <p class="text-sm text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group px-4">
                    <label for="example-text-input" class="form-control-label">Tên</label>
                    <input class="form-control" value="{{ old('name') ?? $book->name }}" type="text"
                        id="example-text-input" name="name">
                    @error('name')
                        <p class="text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group px-4">
                    <label for="example-text-input" class="form-control-label">Mô tả</label>
                    <textarea name="description" id="description" class="form-control" cols="5" rows="8" style="width: 100%">{{ old('description') ?? $book->description }} </textarea>

                    @error('description')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group px-4">
                    <label for="exampleFormControlSelect1">Thể loại</label>
                    <select class="form-control mySelect" name="category_ids[]" multiple="multiple">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $book->categories->contains('id', $category->id) ? 'selected' : '' }}>
                                {{-- {{ in_array($category->id, old('category_ids', [])) ? 'selected' : '' }} --}}
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_ids')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group px-4">
                    <label for="exampleFormControlSelect1">Nhà xuất bản</label>
                    <select class="form-control mySelect" name="publisher_ids[]" multiple="multiple">
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}" {{ $book->publishers->contains('id', $publisher->id) ?'selected' :'' }}>
                                {{ $publisher->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('publisher_ids')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group px-4">
                    <label for="exampleFormControlSelect1">Tác giả</label>
                    <select class="form-control  mySelect" name="author_ids[]" multiple="multiple">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}"
                                {{ $book->authors->contains('id', $author->id) ? 'selected' :'' }}>
                                {{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author_ids')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>


                <div class="modal-footer px-4 mt-4 ">
                    <div class=" px-3">
                        <a href="{{route('books.index')}}" type="button" class="btn btn-white " >Hủy</a>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark">Chỉnh sửa</button>
                    </div>
                  </div>
            </form>

        </div>
    </div>


@endsection

@section('script')
    <script src="{{ asset('plugin/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        function displayImage() {
            var input = document.getElementById('image');
            var img = document.getElementById('show-image');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    img.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.mySelect').select2();
        });
    </script>

<script>
    let clickHandled = false;
    document.getElementById('selectedImage').addEventListener('click', function() {
        if (!clickHandled) {
            document.getElementById('customFile1').click();
            clickHandled = true;
        } else {
            clickHandled = false;
        }
    });

    function displaySelectedImage(event, imageId) {
        const input = event.target;
        const reader = new FileReader();

        reader.onload = function() {
            const image = document.getElementById(imageId);
            image.src = reader.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
</script>
    <script src="{{ asset('admin/assets/js/books/book.js') }}"></script>
@endsection
