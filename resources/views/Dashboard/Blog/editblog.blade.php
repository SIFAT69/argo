@extends('layouts.dashboard')
@section('page_title')
  Edit Blog
@endsection
@section('content')
  <div id="content" class="content">


                      <div id="basic" class="row layout-spacing  layout-top-spacing">
                          <div class="col-md-12">
                            @include('Alerts.success')
                            @include('Alerts.danger')
                            <form class="" action="{!! route('UpdateBlog') !!}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="statbox widget box box-shadow">

                                <input type="hidden" class="form-control mb-3" name="id" value="{{ $blog->id }}">

                                  <div class="widget-header">
                                      <div class="row">
                                          <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                              <h4> Edit blog </h4>
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
                                    <input type="text" class="form-control mb-3" name="title" value="{{ $blog->title }}">
                                    <label for="">Meta Description:</label>
                                      <textarea class="form-control mb-3" name="meta_desc">
                                        {{ $blog->meta_desc }}
                                      </textarea>
                                    <label for="">Category:</label>
                                    <select class="form-control mb-3" name="category">
                                      <option value="Test" @if($blog->category == "Test") selected @endif>Test</option>
                                    </select>
                                    <label for="">Status:</label>
                                    <select class="form-control mb-3" name="status">
                                      <option value="Published" @if($blog->status == "Published") selected @endif>Published</option>
                                      <option value="Draft" @if($blog->status == "Draft") selected @endif>Draft</option>
                                      <option value="Pending" @if($blog->status == "Pending") selected @endif>Pending</option>
                                    </select>
                                    <label for="">Meta Image:</label>
                                    <br>
                                    <img src="../uploads/{{ $blog->meta_image }}" class="mb-3" width="120px" alt="">
                                    <input type="file" class="form-control-file mb-3" name="meta_image" accept="image/*">

                                     <label for="demo1">Blog description:</label>
                                      <textarea id="demo1" name="description">
                                        {{ $blog->description }}
                                      </textarea>
                                      <button type="submit" class="btn btn-primary" name="button">Save</button>
                                      <a href="{!! route('blogList') !!}" class="btn btn-danger" name="button">Cancel</a>
                                  </div>
                              </div>
                            </form>
                          </div>
                      </div>

          </div>
@endsection
