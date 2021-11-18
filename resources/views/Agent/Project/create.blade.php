@extends('layouts.agent')
@section('page_title')
  - Create a new project
@endsection
@section('content')
<section class="our-dashbord dashbord bgc-f7 pb50">
  @include('layouts.menu.agentmenu')
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
        <div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
              @include('Alerts.success')
              @include('Alerts.danger')
          <div class="widget-content widget-content-area br-6">
              <a href="{!! route('MyProject') !!}" class="btn btn-primary float-right" style="margin: 1rem">Back</a>
              <br>
              <br>
              <br>
              <br>
              <form class="needs-validation" novalidate action="{!! route('agency.createProjectPost') !!}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                      <div class="col-md-12 mb-4">
                          <label for="validationCustom01">Title:</label>
                          <input type="text" class="form-control" placeholder="Enter a title" required name="title" required>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-12 mb-4">
                          <label for="validationCustom01">Meta Description:</label>
                          <textarea type="text" class="form-control" placeholder="Enter a meta description" required name="meta_desc" required></textarea>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-12">
                          <div class="">
                              <div class="widget-content">
                                <textarea name="description" class="form-control" rows="30"></textarea>
                                <script>
                                        CKEDITOR.replace( 'description' );
                                </script>
                              </div>
                          </div>
                      </div>
                  </div>
                  <hr>
                  <h4>Images:</h4>
                  <hr>
                  <div class="widget-content widget-content-area">
                      <div class="custom-file-container" data-upload-id="mySecondImage">
                          <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                          <label class="custom-file-container__custom-file">
                              <input type="file" name="images[]" class="custom-file-container__custom-file__custom-file-input" multiple accept="image/*" required>
                              <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                              <span class="custom-file-container__custom-file__custom-file-control"></span>
                          </label>
                          <div class="custom-file-container__image-preview"></div>
                      </div>
                  </div>
                  <hr>
                  <h4>Landloard:</h4>
                  <hr>
                  @php
                    $landloards = DB::table('landlords')->where('added_by', Auth::id())->get();
                  @endphp
                  <div class="form-row">
                      <div class="col-md-12 mb-4">
                          <label for="validationCustom01">Landloard:</label>
                          <select class="form-control" name="landloard">
                              @foreach ($landloards as $landloard)
                              <option value="{{ $landloard->name }}">{{ $landloard->name }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <hr>
                  <h4>Location:</h4>
                  <hr>
                  <div class="form-row">
                      <div class="col-md-12 mb-4">
                          <label for="validationCustom01">City:</label>
                          <select class="form-control" name="city">
                              @foreach ($cities as $city)
                              <option value="{{ $city->city }}">{{ $city->city }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-12 mb-4">
                          <label for="validationCustom01">States:</label>
                          <select class="form-control" name="state">
                              @foreach ($states as $state)
                              <option value="{{ $state->states }}">{{ $state->states }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-12 mb-4">
                          <label for="validationCustom01">Country:</label>
                          <select class="form-control" name="country">
                              @foreach ($countries as $country)
                              <option value="{{ $country->name }}">{{ $country->name }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-12 mb-4">
                          <label for="validationCustom01">Address:</label>
                          <textarea name="address" class="form-control" rows="8" cols="80"></textarea>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-6 mb-4">
                          <label for="validationCustom01">Latitude:</label>
                          <input type="text" class="form-control mb-2" name="latitude" value="">
                          <div class="alert alert-primary">
                              <a target="_blank" href="https://www.latlong.net/convert-address-to-lat-long.html">Go here to get Latitude from address.</a>
                          </div>
                      </div>
                      <div class="col-md-6 mb-4">
                          <label for="validationCustom01">Longitude:</label>
                          <input type="text" class="form-control mb-2" name="longitude" value="">
                          <div class="alert alert-primary">
                              <a target="_blank" href="https://www.latlong.net/convert-address-to-lat-long.html">Go here to get Longitude from address.</a>
                          </div>
                      </div>
                  </div>
                  <hr>
                  <h4>Project Info:</h4>
                  <hr>
                  <div class="form-row">
                      <div class="col-md-4 mb-4">
                          <label for="validationCustom01">Number blocks:</label>
                          <input type="text" class="form-control" name="flat_blocks" value="">
                      </div>
                      <div class="col-md-4 mb-4">
                          <label for="validationCustom01">Number Floor:</label>
                          <input type="text" class="form-control" name="flat_floors" value="">
                      </div>
                      <div class="col-md-4 mb-4">
                          <label for="validationCustom01">Number flats:</label>
                          <input type="text" class="form-control" name="flat_number" value="">
                      </div>
                      <div class="col-md-6 mb-4">
                          <label for="validationCustom01">Lowest price:</label>
                          <input type="text" class="form-control" name="low_price" placeholder="Currency (USD)" value="">
                      </div>
                      <div class="col-md-6 mb-4">
                          <label for="validationCustom01">Max price:</label>
                          <input type="text" class="form-control" name="max_price" placeholder="Currency (USD)" value="">
                      </div>
                      <div class="col-md-12 mb-4">
                          <label for="validationCustom01">Category:</label>
                          <select class="form-control" name="category">
                              @foreach ($categories as $category)
                              <option value="{{ $category->name }}">{{ $category->name }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <hr>
                  <h4>Facility Section:</h4>
                  <hr>
                  @foreach ($realstatefacilities as $facility)
                  <div class="form-row Facility">
                      <div class="col-md-6 mb-4">
                          <label for="validationCustom01">Select Facility:</label>
                          <select class="form-control" name="facility[]">
                              @foreach ($realstatefacilities as $facility)
                              <option value="{{ $facility->facilities }}">{{ $facility->facilities }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="col-md-6 mb-4">
                          <label for="validationCustom01">Distance:</label>
                          <input type="text" class="form-control mb-2" name="distance[]" placeholder="Distance (KM)" value="">
                      </div>
                  </div>
                  @endforeach
                  <hr>
                  <h4>Features:</h4>
                  <hr>
                  <div class="form-row">
                      <div class="col-md-12 mb-4">
                          @foreach ($realstatefeatures as $feature)
                          <div class="n-chk">
                              <label class="new-control new-checkbox new-checkbox-rounded checkbox-outline-success">
                                  <input type="checkbox" class="new-control-input" name="features[]" value="{{ $feature->feature }}">
                                  <span class="new-control-indicator"></span>{{ $feature->feature }}
                              </label>
                          </div>
                          @endforeach
                      </div>
                  </div>
                  <hr>
                  <h4>Youtube:</h4>
                  <hr>
                  <div class="form-row">
                      <div class="col-md-12 mb-4">
                          <label for="validationCustom01">Youtube Thumbnail:</label>
                          <input type="file" class="form-control-file mb-2" name="youtube_thumb" value="">
                      </div>
                      <div class="col-md-12 mb-4">
                          <label for="validationCustom01">Youtube Link:</label>
                          <input type="link" class="form-control mb-2" name="youtube_link" placeholder="https://youtu.be/RDCEkbq13Sk3w" value="">
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
</div>
</div>
</div>
                    </section>
@endsection
