@extends('layouts.dashboard')
@section('page_title')
  Media Library
@endsection
@section('content')
  <div id="content" class="main-content">
      <div class="layout-px-spacing">
          <div class="row layout-top-spacing">
   <div id="fuMultipleFile" class="col-lg-12">
     @include('Alerts.success')
     @include('Alerts.danger')
      <div class="statbox widget box box-shadow">
          <div class="widget-header">
              <div class="row">
                  <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                      <h4>Upload media Files</h4>
                  </div>
              </div>
          </div>
          <form action="{!! route('LibraryPost') !!}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="widget-content widget-content-area">
              <div class="custom-file-container" data-upload-id="mySecondImage">
                  <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                  <label class="custom-file-container__custom-file" >
                      <input type="file" name="images[]" class="custom-file-container__custom-file__custom-file-input" multiple accept="image/*" required>
                      <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                      <span class="custom-file-container__custom-file__custom-file-control"></span>
                  </label>
                  <div class="custom-file-container__image-preview"></div>
              </div>
              <button type="submit" class="btn btn-primary mb-2 mr-2 rounded-circle rounded bs-tooltip" data-placement="right" title="Upload files"><i class="fas fa-upload"></i></button>
          </div>
        </form>

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
