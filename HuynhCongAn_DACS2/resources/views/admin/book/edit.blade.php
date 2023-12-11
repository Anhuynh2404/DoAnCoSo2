@extends('admin.layouts.app')
@section('title', 'Edit Book')
@section('content')
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
            <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex w-100">
                    <div class="w-50">
                        <div class="d-flex w-100">
                            <div class="d-flex ">
                                <div class="d-flex px-4 mt-3">
                                    <div class="btn p-0">
                                        <label class="form-label  m-0 ">
                                            <img id="selectedImage" alt="example placeholder" style="width: 100px;"
                                                src="{{ $book->images->count() > 0 ? asset('/upload/' . $book->images->first()->url) : 'upload/default.png' }}" />
                                        </label>
                                        <input type="file" class="form-control d-none" id="customFile1"
                                            onchange="displaySelectedImage(event, 'selectedImage')" name="image" accept="image/*" />
                                    </div>
                                    @error('image')
                                        <p class="text-sm text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-4 w-60">
                                <label for="example-text-input" class="form-control-label">Tên</label>
                                <input class="form-control" value="{{ old('name') ?? $book->name }}" type="text"
                                    id="example-text-input" name="name">
                                @error('name')
                                    <p class="text-sm text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group px-4">
                            <label for="example-text-input" class="form-control-label">Mô tả</label>
                            <textarea name="description" id="description" class="form-control" cols="5" rows="8" style="width: 100%">{{ old('description') ?? $book->description }} </textarea>

                            @error('description')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Bên phải --}}
                    <div class="w-50">
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
                    </div>
                </div>


                <div class="modal-footer px-4 mt-4 ">
                    <div class=" px-3">
                        <a href="{{route('books.index')}}" type="button" class="btn btn-white " >Hủy</a>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-success">Xác nhận</button>
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
