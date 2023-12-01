@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Edit Consultancy Service'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Edit Consultancy Service</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" class="repeater" id="addCourse" action="{{ route('admin.consultancy.service-update', [
                            'service' => $service->id,
                        ]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $service->name) }}">
                                <x-input-error name='name' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Listing Image<span class="text-info">(Please upload an image with size less than 100 KB and dimensions 416x780 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <div class="input-group">
                                            <input name="list_image" id="img3" type="file" class="custom-file-input"
                                            id="inputGroupFile03" accept="image/*">
                                            <label class="custom-file-label" id="imgname3" for="inputGroupFile03">Choose
                                                file</label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <x-input-error name='list_image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Listing Image</label>
                                <img class="form-control img-custom" src="{{ $service->getListingImage() }}" alt="">
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
                                <label for="exampleInputEmail1">Current Banner Image</label>
                                <img class="w-100" src="{{ $service->getBannerImage() }}" alt="">
                            </div>

                            <div class="form-group">
                                <div class="textarea-group">
                                    <label>Banner Content</label>
                                    <textarea class="form-control" id="bannerEditor" name="banner_description" rows="2">{{old('banner_description', $service->banner_content)}}</textarea>
                                    <x-input-error name='banner_description' />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $service->title) }}">
                                <x-input-error name='title' />
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="descEditor" name="description" rows="2">{{ old('description', $service->description) }}</textarea>
                                <x-input-error name='description' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Heading 1</label>
                                <input type="text" name="heading1" id="heading1" class="form-control" value="{{ old('heading1', $service->heading1) }}">
                                <x-input-error name='heading1' />
                            </div>
                            
                            <div class="form-group">
                                <label>Content 1</label>
                                <textarea class="form-control" id="descEditor" name="content1" rows="2">{{ old('content1', $service->content1) }}</textarea>
                                <x-input-error name='content1' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image 1<span class="text-info">(Please upload an image with size less than 100 KB and dimensions 714x697 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <div class="input-group">
                                            <input name="image1" id="img1" type="file" class="custom-file-input"
                                            id="inputGroupFile01" accept="image/*">
                                            <label class="custom-file-label" id="imgname1" for="inputGroupFile01">Choose
                                                file</label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <x-input-error name='image1' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image 1</label>
                                <img class="img-custom form-control" src="{{ $service->getImage1() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail2">Heading 2</label>
                                <input type="text" name="heading2" id="heading2" class="form-control" value="{{ old('heading2', $service->heading2) }}">
                                <x-input-error name='heading2' />
                            </div>
                            
                            <div class="form-group">
                                <label>Content 2</label>
                                <textarea class="form-control" id="descEditor" name="content2" rows="2">{{ old('content2', $service->content2) }}</textarea>
                                <x-input-error name='content2' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image 2<span class="text-info">(Please upload an image with size less than 100 KB and dimensions 714x697 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <div class="input-group">
                                            <input name="image2" id="img2" type="file" class="custom-file-input"
                                            id="inputGroupFile03" accept="image/*">
                                            <label class="custom-file-label" id="imgname2" for="inputGroupFile03">Choose
                                                file</label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <x-input-error name='image2' />
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image 2</label>
                                <img class="img-custom form-control" src="{{ $service->getImage2() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order</label>
                                <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', $service->sort_order) }}">
                                <x-input-error name='sort_order' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status', $service->status) == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status', $service->status) == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='status' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Display In Header</label>
                                <select name="header_display" class="form-control select2-single mb-3">
                                    <option {{ old('header_display', $service->header_display) == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('header_display', $service->header_display) == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='header_display' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Display In Footer</label>
                                <select name="footer_display" class="form-control select2-single mb-3">
                                    <option {{ old('footer_display', $service->footer_display) == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('footer_display', $service->footer_display) == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='footer_display' />
                            </div>
                            
                            @php   
                                $data = $service;
                            @endphp

                            @include('admin.common.seo_form')
                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            <a href="{{ route('admin.consultancy.services') }}" class="btn btn-info mb-0"> Cancel</a>
                            <button type="button" id="deleteBtn" class="btn btn-dark mb-0 float-right">Delete
                                Service</button>
                        </form>
                    </div>
                </div>
                <form id="deleteForm" action="{{ route('admin.consultancy.service-delete', $service->id) }}" method="POST">
                    @csrf
                    
                </form>

            </div>
        </div>
    </div>
@endsection


@push('header')
    
@endpush
@push('footer')

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

        $('#img2').on('change', function() {
            if (this.files[0]) {
                $('#imgname2').text(this.files[0].name)
            } else {
                $('#imgname2').text('Choose file')
            }
        });

        $('#deleteBtn').on('click', function() {
            $confirm = confirm("Do you want to delete this service?");
            if ($confirm) {
                $('#deleteForm').submit();
            }
        });

    </script>

@endpush