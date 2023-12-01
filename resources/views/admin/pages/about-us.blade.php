@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'About Us Page Contents'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>About Us Page Contents</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" class="repeater"
                            action="{{ route('admin.page.store-about', [
                                'page_name' => 'about',
                            ]) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <h4>Banner Section </h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="banner_title" class="form-control"
                                    value="{{ old('banner_title', $data->title) }}" >
                                <x-input-error name='banner_title' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title</label>
                                <input type="text" name="banner_sub_title" class="form-control"
                                    value="{{ old('banner_sub_title', $data->sub_title) }}" >
                                <x-input-error name='banner_sub_title' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <textarea name="banner_content" class="form-control">{{ old('banner_content', $data->description) }}</textarea>
                                <x-input-error name='banner_content' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <span class="text-info">(Please upload an image with size less than 200 KB and dimensions 1199x505 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="banner_image" id="img1" type="file" class="custom-file-input"
                                         accept="image/*">
                                        <label class="custom-file-label" id="image1">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='banner_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage1() }}" alt="">
                            </div>

                            <div class="form-group">
                                <h4>Second Section</h4>
                            </div>
                          
                            <div class="form-group">
                                <label for="exampleInputEmail1">Heading</label>
                                <input type="text" name="heading1" class="form-control"
                                    value="{{ old('heading1', $data->heading1) }}" >
                                <x-input-error name='heading1' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <textarea name="content1" id="content1" class="form-control">{{ old('content1', $data->content1) }}</textarea>
                                <x-input-error name='content1' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Big Image <span class="text-info">(Please upload an image with size less than 100 KB and dimensions 714x697 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="big_image" id="img2" type="file" class="custom-file-input"
                                            accept="image/*">
                                        <label class="custom-file-label" id="image2">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='big_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Big Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage2() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Small Image <span class="text-info">(Please upload an image with size less than 100 KB and dimensions 198x172 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="small_image" id="img3" type="file" class="custom-file-input"
                                            accept="image/*">
                                        <label class="custom-file-label" id="image3">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='small_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Small Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage3() }}" alt="">
                            </div>

                            <div class="form-group">
                                <h4>Third Section (Video Section)</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="heading2" class="form-control"
                                    value="{{ old('heading2', $data->heading2) }}" >
                                <x-input-error name='heading2' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title</label>
                                <input type="text" name="heading3" class="form-control"
                                    value="{{ old('heading3', $data->heading3) }}" >
                                <x-input-error name='heading3' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Button Text</label>
                                <input type="text" name="btn_text1" class="form-control"
                                    value="{{ old('btn_text1', $data->btn_text1) }}" >
                                <x-input-error name='btn_text1' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Button Link</label>
                                <input type="text" name="button_link_1" class="form-control"
                                    value="{{ old('button_link_1', $data->button_link_1) }}" >
                                <x-input-error name='button_link_1' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Video</label>
                                <input type="file"  accept="video/mp4,video/x-m4v,video/*" name="video_link" class="form-control" >
                                <x-input-error name='video_link' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Video</label><br>
                                <video  class="w-100" autoplay muted loop id="myVideo">
                                    <source src="{{ $data->video_link }}" type="video/mp4">
                                </video>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Video Image <span class="text-info">(Please upload an image with size less than 100 KB and dimensions 1882x669 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="video_image" id="img4" type="file" class="custom-file-input"
                                            accept="image/*">
                                        <label class="custom-file-label" id="image4">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='video_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Video Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage4() }}" alt="">
                            </div>

                            <div class="form-group">
                                <h4>Fourth Section </h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="heading4" class="form-control"
                                    value="{{ old('heading4', $data->heading4) }}" >
                                <x-input-error name='heading4' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <textarea name="content4" id="content4" class="form-control">{{ old('content4', $data->content4) }}</textarea>
                                <x-input-error name='content4' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Button Text</label>
                                <input type="text" name="btn_text2" class="form-control"
                                    value="{{ old('btn_text2', $data->btn_text2) }}" >
                                <x-input-error name='btn_text2' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Button Link</label>
                                <input type="text" name="button_link_2" class="form-control"
                                    value="{{ old('button_link_2', $data->button_link_2) }}" >
                                <x-input-error name='button_link_2' />
                            </div>


                            <h5>Right side Points</h5>

                            <div data-repeater-list="additional">
                                <div data-repeater-item class="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" name="title" class="form-control" value="">
                                    </div>
                                    <div class="text-right col-sm-12 mb-10 d-block">
                                        <input data-repeater-delete class="btn btn-danger d-initial" type="button" value="Delete" />
                                    </div>
                                </div> 
                            </div>

                            <div class=" px-sm-40 px-20 col-sm-12 mb-10">
                                <input data-repeater-create class="btn btn-success my-3" type="button" value="Add New" />
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
    <script src="{{ adminAsset('js/jquery.repeater.min.js') }}"></script>
    <script src="{{ adminAsset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ adminAsset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
         $('#img1').on('change', function() {
            if (this.files[0]) {
                $('#image1').text(this.files[0].name)
            } else {
                $('#image1').text('Choose file')
            }
        });

        $('#img2').on('change', function() {
            if (this.files[0]) {
                $('#image2').text(this.files[0].name)
            } else {
                $('#image2').text('Choose file')
            }
        });
        $('#img3').on('change', function() {
            if (this.files[0]) {
                $('#image3').text(this.files[0].name)
            } else {
                $('#image3').text('Choose file')
            }
        });

        $('#img4').on('change', function() {
            if (this.files[0]) {
                $('#image4').text(this.files[0].name)
            } else {
                $('#image4').text('Choose file')
            }
        });

        tinymce.init({
            selector: '#content1',
            plugins: "autosave",
            autosave_ask_before_unload: false
        });

        tinymce.init({
            selector: '#content4',
            plugins: "autosave",
            autosave_ask_before_unload: false
        });

        let repCount = 0;
        var repeater =   $('.repeater').repeater({
            initEmpty: true,
            show: function(e) {
                if(repCount < 5 ){
                    repCount = parseInt(repCount) + 1;
                    $(this).slideDown();
                }else{
                    alert("You can't create more than 5 items");
                }
            },
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    repCount = parseInt(repCount) - 1;
                    $(this).slideUp(deleteElement);
                }
            },
            isFirstItemUndeletable: false
        })


        var additionals = {!! $data->courses !!};
        repeater.setList(additionals);
    </script>

    
@endpush
