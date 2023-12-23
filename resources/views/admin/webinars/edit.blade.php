@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Update Webinar'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Update Webinar</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.webinars.update', [
                            'webinar' => $webinar->id,
                        ]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $webinar->title) }}">
                                <x-input-error name='title' />
                            </div>
                            
                            <div class="form-group position-relative error-l-50">
                                <label>Description </label>
                                <textarea class="form-control" id="engEditor" name="description" rows="2">{{ old('description', $webinar->description) }}</textarea>
                                <x-input-error name='description' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <span class="text-info">(Please upload an image with size less than 200 KB and dimensions 633x436 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image" id="img" type="file" class="custom-file-input"
                                            id="inputGroupFile02" accept="image/*">
                                        <label class="custom-file-label" id="imgname" for="inputGroupFile02">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image </label>
                                <img class="w-100" src="{{ $webinar->getImage() }}" alt="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Video Link</label>
                                <input type="text" name="video_link" class="form-control" value="{{ old('video_link', $webinar->video_link) }}">
                                <x-input-error name='video_link' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Webinar Date</label>
                                <input type="text" name="webinar_date" id="webinar_date" class="form-control" value="{{ old('webinar_date', $webinar->webinar_date) }}" autocomplete="off">
                                <x-input-error name='webinar_date' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Location</label>
                                <input type="text" name="location" class="form-control" value="{{ old('location', $webinar->location) }}">
                                <x-input-error name='location' />
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status', $webinar->status) == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status', $webinar->status) == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='status' />
                            </div>
                            
                            <hr>
                            <h3>Presented By Section</h3>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="presented_title" class="form-control" value="{{ old('presented_title', $webinar->presented_title) }}">
                                <x-input-error name='presented_title' />
                            </div>

                            <div class="form-group position-relative error-l-50">
                                <label>Position/Designation</label>
                                <input type="text" name="presented_description" class="form-control" value="{{ old('presented_description', $webinar->presented_description) }}">
                                <x-input-error name='presented_description' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image 2 <span class="text-info">(Please upload an image with size less than 100 KB and dimensions 633x436 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image2" id="img2" type="file" class="custom-file-input"
                                            id="inputGroupFile01" accept="image/*">
                                        <label class="custom-file-label" id="imgname2" for="inputGroupFile01">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image2' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image 2</label>
                                <img class="w-100" src="{{ $webinar->getPresentedImage() }}" alt="">
                            </div>

                            
                            
                            @php   
                                $data = $webinar;
                            @endphp

                            @include('admin.common.seo_form')
                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            <a  class="btn btn-info mb-0" href="{{ route('admin.webinars.index') }}">Cancel</a>
                            <button type="button" id="delete" class="btn btn-danger mb-0 float-right">Delete</button>
                        </form>
                    </div>
                </div>
                <form id="deleteForm" method="POST"
                action="{{ route('admin.webinars.destroy', [
                    'webinar' => $webinar->id,
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ adminAsset('css/bootstrap-datetimepicker.min.css') }}" />
@endpush
@push('footer')
    <script src="{{ adminAsset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ adminAsset('js/moment.js') }}"></script>
    <script src="{{ adminAsset('js/bootstrap-datetimepicker.min.js') }}"></script>

    <script>
        $('#img').on('change', function() {
            if (this.files[0]) {
                $('#imgname').text(this.files[0].name)
            } else {
                $('#imgname').text('Choose file')
            }
        });
        $('#img2').on('change', function() {
            if (this.files[0]) {
                $('#imgname2').text(this.files[0].name)
            } else {
                $('#imgname2').text('Choose file')
            }
        });

        $("#webinar_date").datetimepicker({
            format: 'YYYY-MM-DD HH:mm', 
            useCurrent: false,
            showTodayButton: true,
            showClear: true,
            sideBySide: true,
            toolbarPlacement: 'bottom',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down",
                previous: "fa fa-chevron-left",
                next: "fa fa-chevron-right",
                today: "fa fa-clock",
                clear: "fa fa-trash"
            }
        });

        $('#delete').on('click', function() {
            if (confirm('Are you sure you want to remove this item?')) {
                $('#deleteForm').submit();
            }
        });

    </script>

    <script src="{{ adminAsset('js/tinymce/tinymce.min.js') }}"></script>
    <x-tiny-script :editors="[['id' => '#engEditor', 'dir' => 'ltr'], ['id' => '#engEditor1', 'dir' => 'ltr']]" />
@endpush