@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Create Reel'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Create Reel</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.reels.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title<span class="error">*</span></label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                <x-input-error name='title' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Title<span class="error">*</span></label>
                                <input type="text" name="ar_title" dir="rtl" class="form-control" value="{{ old('ar_title') }}">
                                <x-input-error name='ar_title' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image<span class="error">*</span> <span class="text-info">(Please upload an image with size less than 500 KB and dimensions 520x700 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image" id="image" type="file" class="custom-file-input"
                                            id="inputGroupFile02" accept="image/*">
                                        <label class="custom-file-label" id="imgname" for="inputGroupFile02">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image' />
                            </div>

                            <div class="form-group d-none">
                                <label for="exampleInputEmail1">Video Link<span class="error">*</span></label>
                                <input type="text" name="link" class="form-control" value="{{ old('link') }}">
                                <x-input-error name='link' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Video<span class="error">*</span></label>
                                <input type="file" name="video" accept="video/mp4,video/x-m4v,video/*" class="form-control" value="{{ old('video') }}">
                                <x-input-error name='video' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control"
                                    value="{{ old('sort_order') }}">
                                <x-input-error name='sort_order' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status<span class="error">*</span></label>
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
                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            <a href="{{ route('admin.reels.index') }}" class="btn btn-info mb-0"> Cancel</a>
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
@endpush
@push('footer')
    <script src="{{ adminAsset('js/vendor/select2.full.js') }}"></script>

    <script>
        $('#image').on('change', function() {
            if (this.files[0]) {
                $('#imgname').text(this.files[0].name)
            } else {
                $('#imgname').text('Choose file')
            }
        });
    </script>
@endpush
