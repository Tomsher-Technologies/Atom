@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Contact Us Page Contents'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Contact Us Page Contents</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.page.store-contact', [
                                'page_name' => 'contact',
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
                                <h4>Address Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Heading</label>
                                <input type="text" name="heading1" class="form-control"
                                    value="{{ old('heading1', $data->heading1) }}" >
                                <x-input-error name='heading1' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Heading</label>
                                <textarea name="content1" id="content1" class="form-control" rows="4">{{ old('content1', $data->content1) }}</textarea>
                                <x-input-error name='content1' />
                            </div>

                         
                            <div class="form-group">
                                <h4>Contact Form Section</h4>
                            </div>

                            
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Heading</label>
                                <input type="text" name="heading2" class="form-control"
                                    value="{{ old('heading2', $data->heading2) }}" >
                                <x-input-error name='heading2' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Sub Heading</label>
                                <textarea name="content2" id="content2" class="form-control" rows="4">{{ old('content2', $data->content2) }}</textarea>
                                <x-input-error name='content2' />
                            </div>
                            
                            <div class="form-group">
                                <h4>Frequently Asked Questions Section</h4>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1"> Heading</label>
                                <input type="text" name="heading3" class="form-control"
                                    value="{{ old('heading3', $data->heading3) }}" >
                                <x-input-error name='heading3' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Sub Heading</label>
                                <textarea name="content3" id="content3" class="form-control" rows="4">{{ old('content3', $data->content3) }}</textarea>
                                <x-input-error name='content3' />
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



    <script src="{{ adminAsset('js/tinymce/tinymce.min.js') }}"></script>
    <x-tiny-script :editors="[
        ['id' => '#engContent1', 'dir' => 'ltr'],
        ['id' => '#arContent1', 'dir' => 'rtl'],
        ['id' => '#engContent', 'dir' => 'ltr'],
        ['id' => '#arContent', 'dir' => 'rtl'],


    ]" />
@endpush
