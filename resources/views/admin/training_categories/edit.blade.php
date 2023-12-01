@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Edit Training Category'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Edit Training Category</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.training.category-update', [
                                'category' => $category->id,
                            ]) }}"
                            enctype="multipart/form-data">
                            @csrf
                           
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
                                <x-input-error name='name' />
                            </div>
                           
                            <div class="form-group position-relative error-l-50">
                                <label>Description</label>
                                <textarea class="form-control" id="engEditor" name="description" rows="2">{{ old('description', $category->description) }}</textarea>
                                <x-input-error name='description' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <span class="text-info">(Please upload an image with size less than 500 KB and dimensions 1920x696 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image" id="img" type="file" class="custom-file-input"
                                            id="inputGroupFile02" accept="image/*">
                                        <label class="custom-file-label" id="imgname" for="inputGroupFile02">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="w-100" src="{{ $category->getImage() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Home Icon <span class="text-info">(Please upload an image with size less than 50 KB and dimensions 66x66 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="home_icon" id="img1" type="file" class="custom-file-input"
                                            id="inputGroupFile01" accept="image/*">
                                        <label class="custom-file-label" id="imgname1" for="inputGroupFile01">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='home_icon' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Home Icon</label>
                                <img class="img-custom form-control " src="{{ $category->getHomeIcon() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Listing Section Image <span class="text-info">(Please upload an image with size less than 150 KB and dimensions 600x480 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="listing_image" id="img2" type="file" class="custom-file-input"
                                            id="inputGroupFile01" accept="image/*">
                                        <label class="custom-file-label" id="imgname2" for="inputGroupFile01">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='listing_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Listing Section Image</label>
                                <img class="img-custom form-control " src="{{ $category->getListingImage() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order</label>
                                <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', $category->sort_order) }}"
                                    >
                                <x-input-error name='sort_order' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status', $category->status) == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status', $category->status) == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='status' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Display In Header</label>
                                <select name="header_display" class="form-control select2-single mb-3">
                                    <option {{ old('header_display', $category->header_display) == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('header_display', $category->header_display) == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='header_display' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Display In Footer</label>
                                <select name="footer_display" class="form-control select2-single mb-3">
                                    <option {{ old('footer_display', $category->footer_display) == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('footer_display', $category->footer_display) == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='footer_display' />
                            </div>

                            @php   
                                $data = $category;
                            @endphp
                            @include('admin.common.seo_form')


                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                            <a href="{{ route('admin.training.categories') }}" class="btn btn-info mb-0"> Cancel</a>
                        </form>
                    </div>
                </div>
               

            </div>
        </div>
    </div>
@endsection


@push('header')
    <link rel="stylesheet" href="{{ adminAsset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ adminAsset('css/vendor/select2-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ adminAsset('css/vendor/bootstrap-datepicker3.min.css') }}" />
@endpush
@push('footer')
    <script src="{{ adminAsset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ adminAsset('js/vendor/bootstrap-datepicker.js') }}"></script>

    <script>
        $('#img').on('change', function() {
            if (this.files[0]) {
                $('#imgname').text(this.files[0].name)
            } else {
                $('#imgname').text('Choose file')
            }
        });
        $('#img1').on('change', function() {
            if (this.files[0]) {
                $('#imgname1').text(this.files[0].name)
            } else {
                $('#imgname1').text('Choose file')
            }
        });

        $('#img2').on('change', function() {
            if (this.files[0]) {
                $('#imgname2').text(this.files[0].name)
            } else {
                $('#imgname2').text('Choose file')
            }
        });


    </script>

    <script src="{{ adminAsset('js/tinymce/tinymce.min.js') }}"></script>
    <x-tiny-script :editors="[['id' => '#engEditor', 'dir' => 'ltr'], ['id' => '#arEditor', 'dir' => 'rtl']]" />
@endpush
