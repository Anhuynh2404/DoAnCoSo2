@extends('admin.layouts.app')
@section('title', 'Create Book')
@section('content')

    <h1>Tạo mới ấn phẩm</h1>
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
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex">
                    <div class="w-50">
                        <div class="d-flex w-100">
                            <div class="d-flex">
                                <div class="d-flex px-4 mt-3">
                                    <div class="btn p-0">
                                        <label class="form-label  m-0 ">
                                            <img id="selectedImage" alt="example placeholder" style="width: 100px;"
                                                src="{{ asset('admin/img/upload.png') }}" />
                                        </label>
                                        <input type="file" class="form-control d-none" id="customFile1"
                                            onchange="displaySelectedImage(event, 'selectedImage')" name="image"
                                            accept="image/*" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group w-60 mt-5">
                                <label for="example-text-input" class="form-control-label">Tên</label>
                                <input class="form-control" value="{{ old('name') }}" type="text"
                                    id="example-text-input" name="name">
                                @error('name')
                                    <p class="text-sm text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group px-4">
                            <label for="example-text-input" class="form-control-label">Mô tả</label>
                            <textarea name="description" id="description" class="form-control" cols="5" rows="8" style="width: 100%">{{ old('description') }} </textarea>

                            @error('description')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Bên phải --}}
                    <div class="w-50">
                        <div class="px-4 d-flex w-100">
                            <div class="form-group w-80 me-2">
                                <label for="exampleFormControlSelect1">Thể loại</label>
                                <select class="form-control mySelect" name="category_ids[]" multiple="multiple">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ in_array($category->id, old('category_ids', [])) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-20 " style="margin-top: 33.5px">
                                <a href="{{ route('categories.create') }}" type="button"
                                    class="btn btn-light btn-icon px-2 py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path
                                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                    </svg>
                                </a>
                            </div>
                            @error('category_ids')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>


                        <div class="d-flex px-4 w-100">
                            <div class="form-group w-80 me-2">
                                <label for="exampleFormControlSelect1">Nhà xuất bản</label>
                                <select class="form-control mySelect" name="publisher_ids[]" multiple="multiple">
                                    @foreach ($publishers as $publisher)
                                        <option value="{{ $publisher->id }}"
                                            {{ in_array($publisher->id, old('publisher_ids', [])) ? 'selected' : '' }}>
                                            {{ $publisher->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-20 " style="margin-top: 33.5px">
                                <a href="{{ route('publishers.create') }}" type="button"
                                    class="btn btn-light btn-icon px-2 py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path
                                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                    </svg>
                                </a>
                            </div>
                            @error('publisher_ids')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex w-100 px-4">
                            <div class="form-group w-80 me-2">
                                <label for="exampleFormControlSelect1">Tác giả</label>
                                <select class="form-control  mySelect" name="author_ids[]" multiple="multiple">
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}"
                                            {{ in_array($author->id, old('author_ids', [])) ? 'selected' : '' }}>
                                            {{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-20 " style="margin-top: 33.5px">
                                <a href="{{ route('categories.create') }}" type="button"
                                    class="btn btn-light btn-icon px-2 py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path
                                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                    </svg>
                                </a>
                            </div>
                            @error('author_ids')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="modal-footer px-4 mt-4 ">
                    <button type="submit" class="btn btn-white " data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark" name="submit">Send message</button>
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
        function displaySelectedImage(event, elementId) {
            const selectedImage = document.getElementById(elementId);
            const fileInput = event.target;

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    selectedImage.src = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);
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
