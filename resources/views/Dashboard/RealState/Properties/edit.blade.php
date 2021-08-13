@extends('layouts.dashboard')
@section('page_title')
Edit Property
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <a href="{!! route('property_list') !!}" class="btn btn-primary float-right" style="margin: 1rem">Back</a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <form class="needs-validation" novalidate action="{!! route('createPropertyEditPost', $project->id) !!}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Title:</label>
                                <input type="text" class="form-control" placeholder="Enter a title" required name="title" value="{{ $project->title }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Meta Description:</label>
                                <textarea type="text" class="form-control" placeholder="Enter a meta description" required name="meta_desc"  required>{{ $project->meta_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Type :</label>
                                <select class="form-control" required name="status" name="type">
                                  <option @if($project->status == "Sale") selected @endif value="Sale">Sale</option>
                                  <option @if($project->status == "Rent") selected @endif value="Rent">Rent</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="">
                                    <div class="widget-content">
                                      <textarea name="description">{{ $project->description }}</textarea>
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
                        @foreach ($variable =json_decode($project->images) as $image)
                          @php
                            $imageName = DB::table('libraries')->where('id', $image)->value('file_name');
                          @endphp

                          <img src="../uploads/{{ $imageName }}" width="120px" alt="">
                        @endforeach
                        <hr>
                        <h4>Location:</h4>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">City:</label>
                                <select class="form-control" name="city">
                                    @foreach ($cities as $city)
                                    <option @if($project->city == $city->city) selected @endif value="{{ $city->city }}">{{ $city->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">States:</label>
                                <select class="form-control" name="state">
                                    @foreach ($states as $state)
                                    <option value="{{ $state->states }}" @if($project->states == $city->city) selected @endif>{{ $state->states }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Country:</label>
                                <select class="form-control" name="country">
                                    @foreach ($countries as $country)
                                    <option @if($project->location == $country->name) selected @endif value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom01">Latitude:</label>
                                <input type="text" class="form-control mb-2" name="latitude" value="{{ $project->latitude }}">
                                <div class="alert alert-primary">
                                    <a href="https://www.latlong.net/convert-address-to-lat-long.html">Go here to get Latitude from address.</a>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom01">Longitude:</label>
                                <input type="text" class="form-control mb-2" name="longitude" value="{{ $project->longitude }}">
                                <div class="alert alert-primary">
                                    <a href="https://www.latlong.net/convert-address-to-lat-long.html">Go here to get Longitude from address.</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4>Project Info:</h4>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-4 mb-4">
                                <label for="validationCustom01">Number Beds:</label>
                                <input type="text" class="form-control" name="flat_beds" value="{{ $project->flat_beds }}">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="validationCustom01">Baths:</label>
                                <input type="text" class="form-control" name="flat_baths" value="{{ $project->flat_baths }}">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="validationCustom01">Number floors:</label>
                                <input type="text" class="form-control" name="flat_floors" value="{{ $project->flat_floors }}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom01">Price:</label>
                                <input type="text" class="form-control" name="price" placeholder="Currency (USD)" value="{{ $project->price }}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom01">Size(m<sup>2</sup>):</label>
                                <input type="text" class="form-control" name="size" placeholder="Currency (USD)" value="{{ $project->size }}">
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Category:</label>
                                <select class="form-control" name="category">
                                    @foreach ($categories as $category)
                                    <option @if($project->category == $category->name) selected @endif value="{{ $category->name }}">{{ $category->name }}</option>
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
                                  <option value="Null">Null</option>
                                  @foreach ($variable =json_decode($project->facilities) as $faci)
                                    <option @if($faci == $facility->facility) selected @endif value="{{ $faci }}">{{ $faci }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom01">Distance (km):</label>
                                  @foreach ($variable = json_decode($project->distance) as $dis)
                                    @php
                                      $distance[] = $dis;
                                    @endphp
                                  @endforeach
                                 <input type="text" class="form-control mb-2" name="distance[]" placeholder="Distance (KM)" value="{{ $distance[$loop->index] }}">
                            </div>
                        </div>
                        @endforeach
                        <hr>
                        <h4>Features:</h4>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-12 mb-4">
                              <p>Currently selected: </p>
                              @foreach ($fec = json_decode($project->features) as $key => $value)
                                {{ $value  }},
                              @endforeach
                              <hr>
                              <label for="">Please select category again: </label>
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
                              <img src="../uploads/{{ $project->youtube_thumb }}" width="120px" class="mb-3" alt=""> <br>
                                <label for="validationCustom01">Youtube Thumbnail:</label>
                                <input type="file" class="form-control-file mb-2" name="youtube_thumb" value="{{ $project->youtube_thumb }}">
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom01">Youtube Link:</label>
                                <input type="link" class="form-control mb-2" name="youtube_link" placeholder="https://youtu.be/RDCEkbq13Sk3w" value="{{ $project->youtube_link }}">
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
