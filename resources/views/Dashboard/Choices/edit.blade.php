@extends('layouts.dashboard')
@section('page_title')
Edit choice
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                <div class="widget-content widget-content-area br-6">
                    <a href="{!! route('choices.index') !!}" class="btn btn-primary float-right" style="margin: 1rem">Back</a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <form class="needs-validation" novalidate action="{!! route('choices.update', $choice->id) !!}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Title:</label>
                                <input type="text" class="form-control" placeholder="Enter a title" name="title" value="{{ old('title') ?? $choice->title }}" required>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Description:</label>
                                <input type="text" class="form-control" placeholder="Enter a meta description" name="description" value="{{ old('description') ?? $choice->title }}"  required></input>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <div>
                                    <img src="{{ asset('/uploads/' . $choice->icon) }}" width="100px" class="mb-3" alt="choice icon">
                                </div>
                                <label for="validationCustom01">Icon:</label>
                                <input type="file" class="form-control-file mb-2" name="icon" value="">
                                @error('icon')
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
