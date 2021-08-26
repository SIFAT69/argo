@extends('layouts.dashboard')
@section('page_title')
Edit testimonial
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                <div class="widget-content widget-content-area br-6">
                    <a href="{!! route('testimonials.index') !!}" class="btn btn-primary float-right" style="margin: 1rem">Back</a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <form class="needs-validation" novalidate action="{!! route('testimonials.update', $testimonial->id) !!}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">User Name:</label>
                                <input type="text" class="form-control" placeholder="Enter a name" name="user_name" value="{{ old('user_name') ?? $testimonial->user_name }}" required>
                                @error('user_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">User Position:</label>
                                <input type="text" class="form-control" placeholder="Enter a position" name="user_position" value="{{ old('user_position') ?? $testimonial->user_position }}" required>
                                @error('user_position')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Comment:</label>
                                <input type="text" class="form-control" placeholder="Enter a comment" name="comment" value="{{ old('comment') ?? $testimonial->comment }}"  required></input>
                                @error('comment')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <div>
                                    @if($testimonial->avatar)
                                        <img src="{{ asset('/uploads/' . $testimonial->avatar) }}" width="100px" class="mb-3" alt="user avatar">
                                    @endif
                                </div>
                                <label for="validationCustom01">User Image:</label>
                                <input type="file" class="form-control-file mb-2" name="avatar" value="">
                                @error('avatar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="{!! asset('BackAsset') !!}/plugins/file-upload/file-upload-with-preview.min.js"></script>
<script>
    //Second upload
    var secondUpload = new FileUploadWithPreview('mySecondImage')
</script>
@endsection
