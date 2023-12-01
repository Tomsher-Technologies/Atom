@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Update Reel'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Update Reel Details</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.reels.update', [
                                'reel' => $reel,
                            ]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $reel->title) }}">
                                <x-input-error name='title' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Arabic Title</label>
                                <input type="text" name="ar_title" dir="rtl" class="form-control" value="{{ old('ar_title', $reel->ar_title) }}">
                                <x-input-error name='ar_title' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <span class="text-info">(Please upload an image with size less than 500 KB and dimensions 520x700 pixels)</span></label>
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

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="w-100" src="{{ $reel->getImage() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Video<span class="error">*</span></label>
                                <input type="file" name="video" accept="video/mp4,video/x-m4v,video/*" class="form-control" value="{{ old('video') }}">
                                <x-input-error name='video' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Video</label><br>
                                <video autoplay muted loop id="myVideo" class="w-100">
                                    <source src="{{ $reel->link }}" type="video/mp4">
                                </video>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control"
                                    value="{{ old('sort_order', $reel->sort_order) }}">
                                <x-input-error name='sort_order' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status', $reel->is_active) == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status', $reel->is_active) == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='status' />
                            </div>
                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            <a href="{{ route('admin.reels.index') }}" class="btn btn-info mb-0">Cancel</a>
                            <button type="button" id="delete" class="btn btn-danger mb-0 float-right">Delete</button>
                        </form>
                    </div>
                </div>

                <form id="deleteForm" method="POST"
                    action="{{ route('admin.reels.destroy', [
                        'reel' => $reel,
                    ]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                </form>
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

        $('#delete').on('click', function() {
            if (confirm('Are you sure you want to remove this item?')) {
                $('#deleteForm').submit();
            }
        });
    </script>
@endpush
