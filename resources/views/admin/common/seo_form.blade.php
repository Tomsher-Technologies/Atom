<div>
    <hr>
    <h3>Seo Section</h3>
    <div class="form-group">
        <label for="exampleInputEmail1">SEO Title</label>
        @php       
            $seo_title          =  $data->seo[0]->seo_title ?? ($data->seo_title ?? '' );
            $og_title           =  $data->seo[0]->og_title ?? ($data->og_title ?? '' );
            $twitter_title      =  $data->seo[0]->twitter_title ?? ($data->twitter_title ?? '' );
            $seo_description    =  $data->seo[0]->seo_description ?? ($data->seo_description ?? '' );
            $og_description     =  $data->seo[0]->og_description ?? ($data->og_description ?? '' );
            $twitter_description =  $data->seo[0]->twitter_description ?? ($data->twitter_description ?? '' );
            $keywords           =  $data->seo[0]->keywords ?? ($data->keywords ?? '' );
        @endphp
        <input name="seotitle" id="seotitle" class="form-control" value="{{ old('seotitle', $seo_title)}}"/>
        @error('seotitle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">OG Title</label>
        <input name="ogtitle" id="ogtitle" class="form-control" value="{{ old('ogtitle', $og_title) }}"/>
        @error('ogtitle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Twitter Title</label>
        <input name="twtitle" id="twtitle" class="form-control"  value="{{ old('twtitle', $twitter_title) }}"/>
        @error('twtitle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">SEO Description</label>
        <textarea  name="seodescription" id="seodescription" cols="30" rows="3" class="form-control">{{ old('seodescription', $seo_description)}}</textarea>
        @error('seodescription')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">OG Description</label>
        <textarea name="og_description" id="og_description" cols="30" rows="3" class="form-control">{{ old('og_description', $og_description) }}</textarea>
        @error('og_description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Twitter Description</label>
        <textarea name="twitter_description" id="twitter_description" cols="30" rows="3" class="form-control">{{ old('twitter_description', $twitter_description) }}</textarea>
        @error('twitter_description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Keywords</label>
        <input name="seokeywords" id="seokeywords" class="form-control"  value="{{ old('seokeywords', $keywords )}}"/>
        @error('seokeywords')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

</div>
