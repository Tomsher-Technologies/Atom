@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'General Settings'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>General Settings</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.store-settings') }}" enctype="multipart/form-data">
                            @csrf

                            <h2>General setting</h2>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="hidden" name="types[]" value="address">
                                <textarea class="form-control" name="address" id="address" cols="30" rows="3" >{{ old('address', get_setting('address') ?? '') }}</textarea>
                                <x-input-error name='address' />
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input type="hidden" name="types[]" value="email">
                                <input class="form-control" name="email" type="email"  value="{{ old('email',get_setting('email') ?? '') }}">
                                <x-input-error name='email' />
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number <span class="text-info">(To add multiple numbers, enter the number with '/' symbol)</span></label>
                                <input type="hidden" name="types[]" value="phone">
                                <input class="form-control" type="text" name="phone" value="{{ old('phone', get_setting('phone') ?? '') }}">
                                <x-input-error name='phone' />
                            </div>

                            <div class="form-group">
                                <h4> Footer Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Copright </label>
                                <input type="hidden" name="types[]" value="copyright">
                                <input class="form-control" type="text" name="copyright" value="{{ old('copyright', get_setting('copyright') ?? '') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Social Media Title </label>
                                <input type="hidden" name="types[]" value="footer_social_title">
                                <input class="form-control" type="text" name="footer_social_title" value="{{ old('footer_social_title', get_setting('footer_social_title') ?? '') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Designed By </label>
                                <input type="hidden" name="types[]" value="footer_designed">
                                <input class="form-control" type="text" name="footer_designed" value="{{ old('footer_designed', get_setting('footer_designed') ?? '') }}">
                            </div>
                            
                            <div class="form-group">
                                <h4> Social Links</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook</label>
                                <input type="hidden" name="types[]" value="facebook">
                                <input class="form-control" type="text" value="{{ old('facebook', get_setting('facebook') ?? '') }}" name="facebook" id="facebook">
                                <x-input-error name='facebook' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Instagram</label>
                                <input type="hidden" name="types[]" value="instagram">
                                <input class="form-control" type="text" value="{{ old('instagram', get_setting('instagram') ?? '') }}" name="instagram" id="instagram">
                                <x-input-error name='instagram' />
                            </div>

                            <div class="form-group ">
                                <label for="exampleInputEmail1">Twitter</label>
                                <input type="hidden" name="types[]" value="twitter">
                                <input class="form-control" type="text" value="{{ old('twitter', get_setting('twitter') ?? '' )}}" name="twitter" id="twitter">
                                <x-input-error name='twitter' />
                            </div>

                            <div class="form-group ">
                                <label for="exampleInputEmail1">Linkedin</label>
                                <input type="hidden" name="types[]" value="linkedin">
                                <input class="form-control" type="text" value="{{ old('linkedin', get_setting('linkedin') ?? '' )}}" name="linkedin" id="linkedin">
                                <x-input-error name='linkedin' />
                            </div>

                            <div class="form-group">
                                <h4>Main Footer Section</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Links Section 1 Title </label>
                                <input type="hidden" name="types[]" value="footer_link1_title">
                                <input class="form-control" type="text" name="footer_link1_title" value="{{ old('footer_link1_title', get_setting('footer_link1_title') ?? '') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Links Section 2 Title </label>
                                <input type="hidden" name="types[]" value="footer_link2_title">
                                <input class="form-control" type="text" name="footer_link2_title" value="{{ old('footer_link2_title', get_setting('footer_link2_title') ?? '') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Links Section 3 Title </label>
                                <input type="hidden" name="types[]" value="footer_link3_title">
                                <input class="form-control" type="text" name="footer_link3_title" value="{{ old('footer_link3_title', get_setting('footer_link3_title') ?? '') }}">
                            </div>


                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
            
                        <form method="POST" action="{{ route('admin.store-header-settings') }}" enctype="multipart/form-data">
                            @csrf

                            <h2>Header Settings</h2>

                            <h4><u>About Section</u></h4>
                            <div class="form-group">
                                <label for="exampleInputEmail1">About Content</label>
                                <input type="hidden" name="types[]" value="about_content">
                                <textarea class="form-control" name="about_content" cols="30" rows="3" >{{ old('about_content', get_setting('about_content') ?? '') }}</textarea>
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Button Text</label>
                                <input type="hidden" name="types[]" value="about_button_text">
                                <input class="form-control" name="about_button_text" type="text"  value="{{ old('about_button_text',get_setting('about_button_text') ?? '') }}">
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Button Link</label>
                                <input type="hidden" name="types[]" value="about_button_link">
                                <input class="form-control" name="about_button_link" type="text"  value="{{ old('about_button_link',get_setting('about_button_link') ?? '') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image<span class="text-info">(Please upload an image with size less than 50 KB and dimensions 612x408 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <input type="hidden" name="types[]" value="about_image">
                                    <div class="custom-file">
                                        <input name="about_image" id="img" type="file" class="custom-file-input"
                                            id="inputGroupFile02" accept="image/*">
                                        <label class="custom-file-label" id="imgname" for="inputGroupFile02">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image 1</label>
                                <img class="img-custom form-control" src="{{get_setting('about_image')}}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="hidden" name="types[]" value="about_title">
                                <input class="form-control" name="about_title" type="text"  value="{{ old('about_title',get_setting('about_title') ?? '') }}">
                            </div>
                            
                            <h4><u>Services Section</u></h4>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <input type="hidden" name="types[]" value="service_content">
                                <textarea class="form-control" name="service_content" cols="30" rows="3" >{{ old('service_content', get_setting('service_content') ?? '') }}</textarea>
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Button Text</label>
                                <input type="hidden" name="types[]" value="service_button_text">
                                <input class="form-control" name="service_button_text" type="text"  value="{{ old('service_button_text',get_setting('service_button_text') ?? '') }}">
                            </div>
    
                            <h4><u>Courses Section</u></h4>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <input type="hidden" name="types[]" value="course_content">
                                <textarea class="form-control" name="course_content" cols="30" rows="3" >{{ old('course_content', get_setting('course_content') ?? '') }}</textarea>
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Button Text</label>
                                <input type="hidden" name="types[]" value="course_button_text">
                                <input class="form-control" name="course_button_text" type="text"  value="{{ old('course_button_text',get_setting('course_button_text') ?? '') }}">
                            </div>

                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
            
                        <form method="POST" action="{{ route('admin.store-header-settings') }}" enctype="multipart/form-data">
                            @csrf

                            <h2>We are Proud Counts Settings</h2>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="hidden" name="types[]" value="count_title">
                                <input class="form-control" name="count_title" type="text"  value="{{ old('count_title',get_setting('count_title') ?? '') }}">
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sub Title</label>
                                <input type="hidden" name="types[]" value="count_sub_title">
                                <input class="form-control" name="count_sub_title" type="text"  value="{{ old('count_sub_title',get_setting('count_sub_title') ?? '') }}">
                            </div>
    
                            <h4><u>Count 1 Section</u></h4>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Count Content</label>
                                <input type="hidden" name="types[]" value="count_1_content">
                                <input class="form-control" name="count_1_content" type="text"  value="{{ old('count_1_content',get_setting('count_1_content') ?? '') }}">
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="hidden" name="types[]" value="count_1_title">
                                <input class="form-control" name="count_1_title" type="text"  value="{{ old('count_1_title',get_setting('count_1_title') ?? '') }}">
                            </div>

                            <h4><u>Count 2 Section</u></h4>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Count Content</label>
                                <input type="hidden" name="types[]" value="count_2_content">
                                <input class="form-control" name="count_2_content" type="text"  value="{{ old('count_2_content',get_setting('count_2_content') ?? '') }}">
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="hidden" name="types[]" value="count_2_title">
                                <input class="form-control" name="count_2_title" type="text"  value="{{ old('count_2_title',get_setting('count_2_title') ?? '') }}">
                            </div>

                            <h4><u>Count 3 Section</u></h4>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Count Content</label>
                                <input type="hidden" name="types[]" value="count_3_content">
                                <input class="form-control" name="count_3_content" type="text"  value="{{ old('count_3_content',get_setting('count_3_content') ?? '') }}">
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="hidden" name="types[]" value="count_3_title">
                                <input class="form-control" name="count_3_title" type="text"  value="{{ old('count_3_title',get_setting('count_3_title') ?? '') }}">
                            </div>

                            <h4><u>Count 4 Section</u></h4>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Count Content</label>
                                <input type="hidden" name="types[]" value="count_4_content">
                                <input class="form-control" name="count_4_content" type="text"  value="{{ old('count_4_content',get_setting('count_4_content') ?? '') }}">
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="hidden" name="types[]" value="count_4_title">
                                <input class="form-control" name="count_4_title" type="text"  value="{{ old('count_4_title',get_setting('count_4_title') ?? '') }}">
                            </div>
                            
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
      
        $('#img').on('change', function() {
            if (this.files[0]) {
                $('#imgname').text(this.files[0].name)
            } else {
                $('#imgname').text('Choose file')
            }
        });

    </script>



    <script src="{{ adminAsset('js/tinymce/tinymce.min.js') }}"></script>
    <x-tiny-script :editors="[
        ['id' => '#engDescription', 'dir' => 'ltr'],
        ['id' => '#arDescription', 'dir' => 'rtl'],
        ['id' => '#engContent', 'dir' => 'ltr'],
        ['id' => '#arContent', 'dir' => 'rtl'],


        ['id' => '#engSubDescription', 'dir' => 'ltr'],
        ['id' => '#arSubDescription', 'dir' => 'rtl'],

    ]" />
@endpush
