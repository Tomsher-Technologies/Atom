@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Create FAQ'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1> Create FAQ</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.faq.index') }}" class="btn btn-primary btn-lg top-right-button mr-1">Go Back To List</a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="rpw">
            <div class="col-12">
                <x-status />
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <form  method="POST" enctype="multipart/form-data" action="{{ route('admin.faq.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" />
                                <x-input-error name='title' />
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description<span class="text-danger">*</span></label>
                                <div >
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" > {{ old('description') }}</textarea>
                                </div>
                                <x-input-error name='description' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control"
                                    value="{{ old('sort_order') }}">
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

                            <button type="submit" class="btn btn-primary mb-0" id='submit'>Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>                  
@endsection

@push('footer')
<script src="{{ adminAsset('js/tinymce/tinymce.min.js') }}"></script>
<script>
   
    tinymce.init({
        selector: 'textarea#description',
        height: 400,
    });
   

 
   
</script>
@endpush
