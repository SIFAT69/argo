@extends('layouts.tanent')
@section('page_title')
  All projects
@endsection
@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  <section class="our-dashbord dashbord bgc-f7 pb50">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
        <div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
          <div class="row">
            @include('layouts.menu.tenantmenu')
            <div class="col-lg-4 col-xl-4 mb10">
              <div class="breadcrumb_content style2 mb30-991">
                <h2 class="breadcrumb_title">My Documents</h2>
              </div>
            </div>
            <div class="col-lg-8 col-xl-8">

              <div class="candidate_revew_select style2 text-right mb30-991">
                <ul class="mb0">
                  <li class="list-inline-item">
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#uploadDocs">Upload Documents</a>
                  </li>
                  <li class="list-inline-item">
                    <div class="candidate_revew_search_box course fn-520">
                      <form class="form-inline my-2">
                          <input class="form-control mr-sm-2" type="search" id="myInput" placeholder="Search Documents" aria-label="Search">
                          <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
                        </form>
                    </div>
                  </li>
                </ul>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="uploadDocs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Documents</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{!! route('documents.store') !!}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="modal-body">
                    <label for="">Upload documents : </label>
                    <input type="file" class="form-control-file" name="docs[]" multiple>
                    <input type="hidden" class="form-control" name="tenant_id" value="{{ Auth::id() }}">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                  </div>
                </form>
                </div>
              </div>
            </div>


            <div class="col-lg-12">
              @include('Alerts.success')
              @include('Alerts.danger')
              <div class="my_dashboard_review mb40">
                <div class="property_table">
                  <div class="table-responsive mt0">
                    <table class="table">
                      <thead class="thead-light">
                          <tr>
                            <th scope="col">Documents</th>
                          </tr>
                      </thead>
                      <tbody id="myTable">
                        @forelse ($docs as $doc)
                          <tr>
                            <td> <a href="{!! asset('uploads') !!}/docs/{{ $doc->documents }}">{{ $doc->documents }}</a> </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="5" class="text-center">No project found!</td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                  <div class="mbp_pagination">
                    <ul class="page_navigation">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#"><span class="flaticon-right-arrow"></span></a>
                        </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt10">
            <div class="col-lg-12">
              <div class="copyright-widget text-center">
                <p>©2021 Argo. Made By SifzTech.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
