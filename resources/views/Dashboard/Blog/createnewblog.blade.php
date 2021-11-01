@extends('layouts.dashboard')
@section('page_title')
  Create a new blog
@endsection
@section('content')
  <div id="content" class="content">

                      <div id="basic" class="row layout-top-spacing">
                          <div class="col-md-12">
                            @include('Alerts.success')
                            @include('Alerts.danger')
                            <form class="" action="{!! route('createNewBlogStore') !!}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="widget">
                                  <div class="widget-header">
                                      <div class="row">
                                          <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                              <h4> Create a new blog </h4>
                                          </div>
                                      </div>
                                  </div>
                                  @if ($errors->any())
                                      <div class="alert alert-danger">
                                          <ul>
                                              @foreach ($errors->all() as $error)
                                                  <li>{{ $error }}</li>
                                              @endforeach
                                          </ul>
                                      </div>
                                  @endif
                                  <div class="widget-content widget-content-area">
                                    <label for="">Title:</label>
                                    <input type="text" class="form-control mb-3" name="title" value="{{ old('title') }}">
                                    <label for="">Meta Description:</label>
                                      <textarea class="form-control mb-3" name="meta_desc">
                                        {{ old('meta_desc') }}
                                      </textarea>
                                    <label for="">Category:</label>
                                    <select class="form-control mb-3" name="category">
                                      @foreach ($categories as $category)
                                        <option value="{{ $category->title }}">{{ $category->title }}</option>
                                      @endforeach
                                    </select>
                                    <label for="">Status:</label>
                                    <select class="form-control mb-3" name="status">
                                      <option value="Published">Published</option>
                                      <option value="Draft">Draft</option>
                                      <option value="Pending">Pending</option>
                                    </select>
                                    <label for="">Meta Image:</label>
                                    <input type="file" class="form-control-file mb-3" name="meta_image" accept="image/*">

                                     <label for="demo1">Blog description:</label>
                                      <textarea id="demo1" name="description">
                                        {{ old('description') }}
                                      </textarea>
                                      <button type="submit" class="btn btn-primary" name="button">Save</button>

                                  </div>
                              </div>
                            </form>
                          </div>
                      </div>
          </div>
@endsection
