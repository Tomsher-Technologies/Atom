@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Create Blog'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Create Blog</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                <x-input-error name='title' />
                            </div>
                            
                            <div class="form-group position-relative error-l-50">
                                <label>Description 1</label>
                                <textarea class="form-control" id="engEditor" name="description1" rows="2">{{ old('description1') }}</textarea>
                                <x-input-error name='description1' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image 1 <span class="text-info">(Please upload an image with size less than 200 KB and dimensions 633x436 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image1" id="img" type="file" class="custom-file-input"
                                            id="inputGroupFile02" accept="image/*">
                                        <label class="custom-file-label" id="imgname" for="inputGroupFile02">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image1' />
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Description 2</label>
                                <textarea class="form-control" id="engEditor1" name="description2" rows="2">{{ old('description2') }}</textarea>
                                <x-input-error name='description2' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image 2 <span class="text-info">(Please upload an image with size less than 200 KB and dimensions 633x436 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image2" id="img2" type="file" class="custom-file-input"
                                            id="inputGroupFile01" accept="image/*">
                                        <label class="custom-file-label" id="imgname2" for="inputGroupFile01">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image2' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Blog Date</label>
                                <input type="text" name="blog_date" id="blog_date" class="form-control" value="{{ old('blog_date') }}">
                                <x-input-error name='blog_date' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status') == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status') == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='status' />
                            </div>
                            
                            @include('admin.common.seo_form')
                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            <a  class="btn btn-info mb-0" href="{{ route('admin.blogs.index') }}">Cancel</a>
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
        $('#img2').on('change', function() {
            if (this.files[0]) {
                $('#imgname2').text(this.files[0].name)
            } else {
                $('#imgname2').text('Choose file')
            }
        });

        $("#blog_date").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    </script>

    <script src="{{ adminAsset('js/tinymce/tinymce.min.js') }}"></script>
    <x-tiny-script :editors="[['id' => '#engEditor', 'dir' => 'ltr'], ['id' => '#engEditor1', 'dir' => 'ltr']]" />
@endpush