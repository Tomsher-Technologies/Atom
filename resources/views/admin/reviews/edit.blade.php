@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Edit Review'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Edit Review</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" class="repeater" id="addCourse" action="{{ route('admin.reviews.update', [
                            'review' => $review->id,
                        ]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $review->name) }}">
                                <x-input-error name='name' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <span class="text-info">(Please upload an image with size less than 10 KB and dimensions 70x70 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <div class="input-group">
                                            <input name="image" id="img" type="file" class="custom-file-input"
                                                id="inputGroupFile02" accept="image/*">
                                            <label class="custom-file-label" id="imgname" for="inputGroupFile02">Choose
                                                file</label>
                                        </div>
                                    </div>
                                </div>
                                <x-input-error name='image' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="form-control img-custom" src="{{ $review->getImage() }}" alt="">
                            </div>

                            <div class="form-group">
                                <div class="textarea-group">
                                    <label>Comment</label>
                                    <textarea class="form-control"  name="comment" rows="5">{{old('comment', $review->comment)}}</textarea>
                                    <x-input-error name='comment' />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Position/Company</label>
                                <input type="text" name="position" class="form-control" value="{{ old('position', $review->position) }}">
                                <x-input-error name='position' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order</label>
                                <input type="number" name="sort_order" id="sort_order" class="form-control" value="{{ old('sort_order', $review->sort_order) }}">
                                <x-input-error name='sort_order' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status', $review->status) == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status', $review->status) == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='status' />
                            </div>
                            
                           
                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            <a href="{{ route('admin.reviews.index') }}" class="btn btn-info mb-0"> Cancel</a>
                            <button type="button" id="deleteBtn" class="btn btn-dark mb-0 float-right">Delete
                                Service</button>
                        </form>
                    </div>
                </div>
                <form id="deleteForm" action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
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