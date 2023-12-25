@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Create Training Course'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Create Training Course</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" class="repeater" id="addCourse" action="{{ route('admin.training.course-store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                <x-input-error name='name' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Category</label>
                                <select name="category" class="form-control" >
                                    <option value=""> Select category</option>
                                    @foreach ($categories as $cat)
                                        <option {{ (old('category') == $cat->id) ? 'selected' : '' }} value="{{ $cat->id }}">{{$cat->name}} </option>
                                    @endforeach
                                </select>
                                <x-input-error name='name' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Image <span class="text-info">(Please upload an image with size less than 500 KB and dimensions 1920x696 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <div class="input-group">
                                            <input name="banner_image" id="img" type="file" class="custom-file-input"
                                                id="inputGroupFile02" accept="image/*">
                                            <label class="custom-file-label" id="imgname" for="inputGroupFile02">Choose
                                                file</label>
                                        </div>
                                    </div>
                                </div>
                                <x-input-error name='banner_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Banner Title</label>
                                <input type="text" name="banner_title" class="form-control" value="{{ old('banner_title') }}">
                                <x-input-error name='banner_title' />
                            </div>

                            <div class="form-group">
                                <div class="textarea-group">
                                    <label>Banner Description</label>
                                    <textarea class="form-control" id="bannerEditor" name="banner_description" rows="2"></textarea>
                                    <x-input-error name='banner_description' />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Course Description</label>
                                <textarea class="form-control" id="descEditor" name="course_description" rows="2"></textarea>
                                <x-input-error name='course_description' />
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Image<span class="text-info">(Please upload an image with size less than 100 KB and dimensions 451x316 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <div class="input-group">
                                            <input name="course_image" id="img1" type="file" class="custom-file-input"
                                            id="inputGroupFile01" accept="image/*">
                                            <label class="custom-file-label" id="imgname1" for="inputGroupFile01">Choose
                                                file</label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <x-input-error name='course_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Duration</label>
                                <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration') }}">
                                <x-input-error name='duration' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="number" name="price" id="price" class="form-control" value="{{ old('price',0) }}">
                                <x-input-error name='price' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Video Link</label>
                                <input type="text" name="video_link" class="form-control" value="{{ old('video_link') }}">
                                <x-input-error name='video_link' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Language</label>
                                <select name="language" class="form-control" >
                                    <option value=""> Select language</option>
                                    @foreach ($languages as $lang)
                                        <option {{ (old('language') == $lang->id) ? 'selected' : '' }} value="{{ $lang->id }}">{{$lang->title}} </option>
                                    @endforeach
                                </select>
                                <x-input-error name='language' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Type</label>
                                <select name="course_type" class="form-control" >
                                    <option value=""> Select course type</option>
                                    @foreach ($course_types as $type)
                                        <option {{ (old('course_type') == $type->id) ? 'selected' : '' }} value="{{ $type->id }}">{{$type->title}} </option>
                                    @endforeach
                                </select>
                                <x-input-error name='course_type' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Location</label>
                                <select name="location" id="location" class="form-control " >
                                    <option value=""> Select Location</option>
                                </select>
                                <x-input-error name='location' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order</label>
                                <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order',0) }}">
                                <x-input-error name='sort_order' />
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
                            
                            <hr>
                            <h4>Additional Course Details</h4>

                            <div data-repeater-list="additional">
                                <div data-repeater-item class="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" name="title" class="form-control" value="">
                                    </div>

                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="form-control addDesc" id="addDesc" name="content" rows="2"></textarea>
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
                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            <a href="{{ route('admin.training.categories') }}" class="btn btn-info mb-0"> Cancel</a>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection


@push('header')
    
@endpush
@push('footer')
    <script src="{{ adminAsset('js/jquery.repeater.min.js') }}"></script>
    <script src="{{ adminAsset('js/vendor/jquery.validate/jquery.validate.js') }}"></script>
    <script src="{{ adminAsset('js/vendor/jquery.validate/additional-methods.js') }}"></script>
    <script src="{{ adminAsset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#bannerEditor',
            plugins: "autosave",
            autosave_ask_before_unload: false
        });

        tinymce.init({
            selector: '#descEditor',
            plugins: "autosave",
            autosave_ask_before_unload: false
        });

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

        $('#location').select2({
            minimumInputLength: 2,
            width: 'inherit',
            theme: "bootstrap",
            placeholder: 'Select location',
            ajax: {
                url: '{{ route("admin.ajax-location") }}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        }); 

        $.validator.addMethod('filesize', function(value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, 'File size must be less than {0} bytes');

        $("#addCourse").validate({
            rules: {
                name: 'required',
                category: 'required',
                banner_title: 'required',
                banner_description: 'required',
                course_description: 'required',
                duration: 'required',
                price: 'required',
                language: 'required',
                course_type: 'required',
                location: 'required',
                banner_image: {
                    required: true,
                    extension: 'jpg|jpeg|png|ico|bmp|webp|svg',
                    filesize: 512000
                },
                course_image: {
                    required: true,
                    extension: 'jpg|jpeg|png|ico|bmp|webp|svg',
                    filesize: 204800
                }
            }, messages: {
                course_image: {
                    required: "Please upload file.",
                    extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp, webp, svg).",
                    filesize: "Please upload a file with a maximum size of 200 KB"
                },
                banner_image: {
                    required: "Please upload file.",
                    extension: "Please upload file in these format only (jpg, jpeg, png, ico, bmp, webp, svg).",
                    filesize: "Please upload a file with a maximum size of 500 KB"
                }
            },
            errorPlacement: function (error, element) {
                if(element.hasClass('select2')) {
                    error.insertAfter(element.next('.select2-container'));
                }else if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent().parent().parent());
                } else{
                    error.appendTo(element.parent("div"));
                }
            },
            submitHandler: function(form, event) {
                form.submit();
            }
        });

        var repItems = $("div[data-repeater-item]");
        var repCount = repItems.length;
        let count = parseInt(repCount) ;
        
        $('.repeater').repeater({
            initEmpty: true,
            show: function(e) {
                $(this).slideDown();
                var repeaterItems = $("div[data-repeater-item]");
                var repeatCount = repeaterItems.length;
                var cnt = parseInt(repeatCount) - 1;

                $('[name="additional['+cnt+'][content]"]').attr("id","addDesc_"+count);
                

                tinymce.init({
                    selector : "#addDesc_"+count
                });
                count = parseInt(count) + 1;
            },
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            isFirstItemUndeletable: false
        })

    </script>

@endpush