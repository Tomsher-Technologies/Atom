@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Home - Training Page Contents'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Home - Training Page Contents</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
             
                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" class="repeater"
                            action="{{ route('admin.page.store-home-training', [
                                'page_name' => 'training_home',
                            ]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <h4>Banner Section</h4>
                            </div>
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
                                <label for="">Button Text</label>
                                <input type="text" name="btn_text1" class="form-control"
                                    value="{{ old('btn_text1', $data->btn_text1) }}" >
                                <x-input-error name='btn_text1' />
                            </div>

                            <div class="form-group">
                                <label for="">Button Link</label>
                                <input type="text" name="button_link_1" class="form-control"
                                    value="{{ old('button_link_1', $data->button_link_1) }}" >
                                <x-input-error name='button_link_1' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Big Image <span class="text-info">(Please upload an image with size less than 200 KB and dimensions 437x531 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image1" id="img" type="file" class="custom-file-input"
                                           accept="image/*">
                                        <label class="custom-file-label" id="image1">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image1' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Big Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage1() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Top Small Image <span class="text-info">(Please upload an image with size less than 100 KB and dimensions 437x395 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image2" id="img2" type="file" class="custom-file-input"
                                           accept="image/*">
                                        <label class="custom-file-label" id="image2">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image2' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Top Small Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage2() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Bottom Small Image <span class="text-info">(Please upload an image with size less than 100 KB and dimensions 437x395 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image3" id="img3" type="file" class="custom-file-input"
                                           accept="image/*">
                                        <label class="custom-file-label" id="image3">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image3' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Bottom Small Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage3() }}" alt="">
                            </div>


                            <div class="form-group">
                                <h4>Search Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="heading1" class="form-control"
                                    value="{{ old('heading1', $data->heading1) }}" >
                                <x-input-error name='heading1' />
                            </div>

                            <div class="form-group">
                                <label for="">Sub Title</label>
                                <input type="text" name="content1" class="form-control"
                                    value="{{ old('content1', $data->content1) }}" >
                                <x-input-error name='content1' />
                            </div>


                            <div class="form-group">
                                <h4>Course Category Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="heading2" class="form-control"
                                    value="{{ old('heading2', $data->heading2) }}" >
                                <x-input-error name='heading2' />
                            </div>

                            <div class="form-group">
                                <label for="">Sub Title</label>
                                <input type="text" name="content2" class="form-control"
                                    value="{{ old('content2', $data->content2) }}" >
                                <x-input-error name='content2' />
                            </div>

                            <div class="form-group">
                                <h4>Popular Courses Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="heading3" class="form-control"
                                    value="{{ old('heading3', $data->heading3) }}" >
                                <x-input-error name='heading3' />
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
                                <h4>About ATOM Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="heading4" class="form-control"
                                    value="{{ old('heading4', $data->heading4) }}" >
                                <x-input-error name='heading4' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <textarea name="content4" class="form-control">{{ old('content4', $data->content4) }}</textarea>
                                <x-input-error name='content4' />
                            </div>

                            <div class="form-group">
                                <label for="">Big Image <span class="text-info">(Please upload an image with size less than 200 KB and dimensions 714x697 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image4" id="img4" type="file" class="custom-file-input"
                                           accept="image/*">
                                        <label class="custom-file-label" id="image4">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image4' />
                            </div>

                            <div class="form-group">
                                <label for="">Current Big Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage4() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="">Small Image <span class="text-info">(Please upload an image with size less than 50 KB and dimensions 198x172  pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image5" id="img5" type="file" class="custom-file-input"
                                           accept="image/*">
                                        <label class="custom-file-label" id="image5">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image5' />
                            </div>

                            <div class="form-group">
                                <label for="">Current Small Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage5() }}" alt="">
                            </div>

                            <h5> Point 1</h5>

                            <div class="form-group">
                                <label for="">Icon <span class="text-info">(Please upload an image with size less than 10 KB and dimensions 54x51  pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image6" id="img6" type="file" class="custom-file-input"
                                           accept="image/*">
                                        <label class="custom-file-label" id="image6">Choose
                                            file</label>
                                        <x-input-error name='image6' />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Current Icon</label>
                                <img class="img-custom form-control" src="{{ $data->getImage6() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="heading7" class="form-control" value="{{ old('heading7', $data->heading7) }}" >
                                <x-input-error name='heading7' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title</label>
                                <textarea name="content7" class="form-control">{{ old('content7', $data->content7) }}</textarea>

                            </div>

                            <h5> Point 2</h5>

                            <div class="form-group">
                                <label for="">Icon <span class="text-info">(Please upload an image with size less than 10 KB and dimensions 54x51  pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image7" id="img7" type="file" class="custom-file-input"
                                           accept="image/*">
                                        <label class="custom-file-label" id="image7">Choose
                                            file</label>
                                        <x-input-error name='image7' />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Current Icon</label>
                                <img class="img-custom form-control" src="{{ $data->getImage7() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="heading8" class="form-control" value="{{ old('heading8', $data->heading8) }}" >
                                <x-input-error name='heading8' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title</label>
                                <textarea name="content8" class="form-control">{{ old('content8', $data->content8) }}</textarea>
                            </div>

                            <h5> Point 3</h5>

                            <div class="form-group">
                                <label for="">Icon <span class="text-info">(Please upload an image with size less than 10 KB and dimensions 54x51  pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image8" id="img8" type="file" class="custom-file-input"
                                           accept="image/*">
                                        <label class="custom-file-label" id="image8">Choose
                                            file</label>
                                        <x-input-error name='image8' />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Current Icon</label>
                                <img class="img-custom form-control" src="{{ $data->getImage8() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="heading9" class="form-control" value="{{ old('heading9', $data->heading9) }}" >
                                <x-input-error name='heading9' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title</label>
                                <textarea name="content9" class="form-control">{{ old('content9', $data->content9) }}</textarea>
                            </div>

                            <h5> Point 4</h5>

                            <div class="form-group">
                                <label for="">Icon <span class="text-info">(Please upload an image with size less than 10 KB and dimensions 54x51  pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image9" id="img9" type="file" class="custom-file-input"
                                           accept="image/*">
                                        <label class="custom-file-label" id="image9">Choose
                                            file</label>
                                        <x-input-error name='image9' />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Current Icon</label>
                                <img class="img-custom form-control" src="{{ $data->getImage9() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="heading10" class="form-control" value="{{ old('heading10', $data->heading10) }}" >
                                <x-input-error name='heading10' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title</label>
                                <textarea name="content10" class="form-control">{{ old('content10', $data->content10) }}</textarea>
                            </div>



                            <div class="form-group">
                                <h4>Video Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="heading5" class="form-control"
                                    value="{{ old('heading5', $data->heading5) }}" >
                                <x-input-error name='heading5' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title</label>
                                <input type="text" name="content5" class="form-control"
                                    value="{{ old('content5', $data->content5) }}" >
                                <x-input-error name='content5' />
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
                                        <input name="video_image" id="img10" type="file" class="custom-file-input"
                                            accept="image/*">
                                        <label class="custom-file-label" id="image10">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='video_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Video Image</label>
                                <img class="img-custom form-control" src="{{ $data->getImage10() }}" alt="">
                            </div>


                            <div class="form-group">
                                <h4>Review Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="heading6" class="form-control"
                                    value="{{ old('heading6', $data->heading6) }}" >
                                <x-input-error name='heading6' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title</label>
                                <input type="text" name="content6" class="form-control"
                                    value="{{ old('content6', $data->content6) }}" >
                                <x-input-error name='content6' />
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
<script src="{{ adminAsset('js/jquery.repeater.min.js') }}"></script>
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



        $('#img6').on('change', function() {
            if (this.files[0]) {
                $('#image6').text(this.files[0].name)
            } else {
                $('#image6').text('Choose file')
            }
        });

        $('#img7').on('change', function() {
            if (this.files[0]) {
                $('#image7').text(this.files[0].name)
            } else {
                $('#image7').text('Choose file')
            }
        });

        $('#img8').on('change', function() {
            if (this.files[0]) {
                $('#image8').text(this.files[0].name)
            } else {
                $('#image8').text('Choose file')
            }
        });

        $('#img9').on('change', function() {
            if (this.files[0]) {
                $('#image9').text(this.files[0].name)
            } else {
                $('#image9').text('Choose file')
            }
        });

        $('#img10').on('change', function() {
            if (this.files[0]) {
                $('#image10').text(this.files[0].name)
            } else {
                $('#image10').text('Choose file')
            }
        });



        $("#courses").select2({
            placeholder: "",
            width: '100%'
        });

        let repCount = 0;
        var repeater =   $('.repeater').repeater({
            initEmpty: true,
            show: function(e) {
                if(repCount < 4 ){
                    repCount = parseInt(repCount) + 1;
                    $(this).slideDown();
                }else{
                    alert("You can't create more than 4 items");
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
