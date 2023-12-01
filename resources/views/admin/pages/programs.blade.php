@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'All Trainings/Programs Page Contents'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>All Trainings/Programs Page Contents</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.page.store-programs', [
                                'page_name' => 'programs',
                            ]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $data->title) }}" >
                                <x-input-error name='title' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title</label>
                                <input type="text" name="sub_title" class="form-control"
                                    value="{{ old('sub_title', $data->sub_title) }}" >
                                <x-input-error name='sub_title' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $data->description) }}</textarea>
                                <x-input-error name='description' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <span class="text-info">(Please upload an image with size less than 500 KB and dimensions 1920x600 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image" class="img" type="file" class="custom-file-input"
                                            id="image1" accept="image/*">
                                        <label class="custom-file-label" for="image1">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage1('image1') }}" alt="">
                            </div>

                           

                            @include('admin.common.seo_form')

                            <button type="submit" class="btn btn-primary mb-0">Update</button>
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
    <style>
        .img-custom{
            width: 350px !important;
            height: 200px !important;
        }
    </style>
@endpush
@push('footer')
    <script src="{{ adminAsset('js/vendor/select2.full.js') }}"></script>

    <script>
        $('.img').on('change', function() {
            var text = 'Choose file';

            if (this.files[0]) {
                text = this.files[0].name
            }
            console.log($(this));
            $(this).siblings('label').text(text)
        });

    </script>


@endpush
