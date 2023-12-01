@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Home Page Contents'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Home Page Contents</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.page.store-home', [
                                'page_name' => 'home',
                            ]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <h4>Banner Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Title</label>
                                <input type="text" name="heading7" class="form-control"
                                    value="{{ old('heading7', $data->heading7) }}" >
                                <x-input-error name='heading7' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Sub Title</label>
                                <input type="text" name="heading8" class="form-control"
                                    value="{{ old('heading8', $data->heading8) }}" >
                                <x-input-error name='heading8' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Search Placeholder</label>
                                <input type="text" name="heading3" class="form-control"
                                    value="{{ old('heading3', $data->heading3) }}" >
                                <x-input-error name='heading3' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Advanced Search Title</label>
                                <input type="text" name="content3" class="form-control"
                                    value="{{ old('content3', $data->content3) }}" >
                                <x-input-error name='content3' />
                            </div>

                            <h4><u>Icon 1</u></h4>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Icon Image <span class="text-info">(Please upload an image with size less than 10 KB and dimensions 50x50 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image3" id="img3" type="file" class="custom-file-input" accept="image/*">
                                        <label class="custom-file-label" id="image3">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image3' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="img-custom form-control" style="background:black;" src="{{ $data->getImage3() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="heading4" class="form-control"
                                    value="{{ old('heading4', $data->heading4) }}" >
                                <x-input-error name='heading4' />
                            </div>

                            
                            <h4><u>Icon 2</u></h4>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Icon Image <span class="text-info">(Please upload an image with size less than 10 KB and dimensions 50x50 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image4" id="img4" type="file" class="custom-file-input" accept="image/*">
                                        <label class="custom-file-label" id="image4">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image4' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="img-custom form-control" style="background:black;" src="{{ $data->getImage4() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="heading5" class="form-control"
                                    value="{{ old('heading5', $data->heading5) }}" >
                                <x-input-error name='heading5' />
                            </div>


                            <h4><u>Icon 3</u></h4>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Icon Image <span class="text-info">(Please upload an image with size less than 10 KB and dimensions 50x50 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image5" id="img5" type="file" class="custom-file-input" accept="image/*">
                                        <label class="custom-file-label" id="image5">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image5' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="img-custom form-control" style="background:black;" src="{{ $data->getImage5() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="heading6" class="form-control"
                                    value="{{ old('heading6', $data->heading6) }}" >
                                <x-input-error name='heading6' />
                            </div>


                            <div class="form-group">
                                <h4>Popular Courses Section</h4>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="popular_title" class="form-control"
                                    value="{{ old('popular_title', $data->title) }}" >
                                <x-input-error name='popular_title' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title</label>
                                <input type="text" name="popular_sub_title" class="form-control"
                                    value="{{ old('popular_sub_title', $data->sub_title) }}" >
                                <x-input-error name='popular_sub_title' />
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Courses</label>
                                <select name="courses[]" multiple id="courses" class="form-control mb-3">
                                    @php
                                        $cour = old('courses', json_decode($data->courses));
                                    @endphp

                                    @foreach ($courses as $cr)
                                        @php
                                            if(in_array($cr->id, $cour)){
                                                $selected = 'selected';
                                            }else {
                                                $selected = '';
                                            }
                                        @endphp
                                        <option {{$selected}}  value="{{ $cr->id }}">{{ $cr->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error name='courses' />
                            </div>


                            <div class="form-group">
                                <h4>Training Courses Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="training_title" class="form-control"
                                    value="{{ old('training_title', $data->heading1) }}" >
                                <x-input-error name='training_title' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <textarea name="training_content" class="form-control">{{ old('training_content', $data->content1) }}</textarea>
                                <x-input-error name='training_content' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <span class="text-info">(Please upload an image with size less than 300 KB and dimensions 1199x505 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="training_image" id="img" type="file" class="custom-file-input"
                                           accept="image/*">
                                        <label class="custom-file-label" id="image1">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='training_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage1() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Button Text</label>
                                <input type="text" name="training_btn_text" class="form-control"
                                    value="{{ old('training_btn_text', $data->btn_text1) }}" >
                                <x-input-error name='training_btn_text' />
                            </div>


                            <div class="form-group">
                                <h4>Consulting Services Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="service_title" class="form-control"
                                    value="{{ old('service_title', $data->heading2) }}" >
                                <x-input-error name='service_title' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <textarea name="service_content" class="form-control">{{ old('service_content', $data->content2) }}</textarea>
                                <x-input-error name='service_content' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <span class="text-info">(Please upload an image with size less than 300 KB and dimensions 1199x505 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="service_image" id="img2" type="file" class="custom-file-input" accept="image/*">
                                        <label class="custom-file-label" id="image2">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='service_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage2() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Button Text</label>
                                <input type="text" name="service_btn_text" class="form-control"
                                    value="{{ old('service_btn_text', $data->btn_text2) }}" >
                                <x-input-error name='service_btn_text' />
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
      
    </style>
@endpush
@push('footer')
    <script src="{{ adminAsset('js/vendor/select2.full.js') }}"></script>

    <script>
       
        $('#img').on('change', function() {
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

        $('#img5').on('change', function() {
            if (this.files[0]) {
                $('#image5').text(this.files[0].name)
            } else {
                $('#image5').text('Choose file')
            }
        });

        $("#courses").select2({
            placeholder: "",
            width: '100%'
        });
    </script>



    <script src="{{ adminAsset('js/tinymce/tinymce.min.js') }}"></script>
    <x-tiny-script :editors="[
        ['id' => '#engDescription', 'dir' => 'ltr'],
        ['id' => '#arDescription', 'dir' => 'rtl'],
        ['id' => '#engContent', 'dir' => 'ltr'],
        ['id' => '#arContent', 'dir' => 'rtl'],


        ['id' => '#engContent2', 'dir' => 'ltr'],
        ['id' => '#arContent2', 'dir' => 'rtl'],

        ['id' => '#engContent3', 'dir' => 'ltr'],
        ['id' => '#arContent3', 'dir' => 'rtl'],

        ['id' => '#engContent4', 'dir' => 'ltr'],
        ['id' => '#arContent4', 'dir' => 'rtl'],

    ]" />
@endpush
