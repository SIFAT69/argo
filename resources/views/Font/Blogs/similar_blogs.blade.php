@php
  $blogs = DB::table('blogs')->limit(4)->inRandomOrder()->get();
  $author = DB::table('users')->where('id', $blog->posted_by)->first();
@endphp

<div class="row">
  <div class="col-lg-12 mb20">
    <h4>Related Posts</h4>
  </div>
  @forelse ($blogs as $blog)
    <div class="col-md-6 col-lg-6">
    <div class="for_blog feat_property">
      <div class="thumb">
        <img class="img-whp" src="../uploads/{{ $blog->meta_image }}" alt="1.jpg">
      </div>
      <div class="details">
        <div class="tc_content">
          <h4>{{ $blog->title }}</h4>
          <ul class="bpg_meta">
            <li class="list-inline-item"><a href="#"><i class="flaticon-calendar"></i></a></li>
            <li class="list-inline-item"><a href="#"> {{ Carbon\Carbon::parse($blog->created_at)->format('M-d-Y') }} </a></li>
          </ul>
          <p>{{\Illuminate\Support\Str::limit($blog->meta_desc, 40)}}</p>
        </div>
        <div class="fp_footer">
          <ul class="fp_meta float-left mb0">
            <li class="list-inline-item"><a href="{!! route('agenency_details', $blog->posted_by) !!}"><img src="../uploads/{{ $author->avatar }}" style="width: 50px; border-radius: 50px" alt="pposter1.png"></a></li>
            <li class="list-inline-item"><a href="{!! route('agenency_details', $blog->posted_by) !!}">{{ $author->name }}</a></li>
          </ul>
          <a class="fp_pdate float-right text-thm" href="{!! route('blog_details', $blog->slug) !!}">Read More <span class="flaticon-next"></span></a>
        </div>
      </div>
    </div>
  </div>
  @empty

  @endforelse
</div>
