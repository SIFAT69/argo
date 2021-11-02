@extends('layouts.tanent')
@section('page_title')
- {{ $name }}
@endsection
@section('content')
<section class="our-dashbord dashbord bgc-f7 pb50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
            <div class="col-lg-9 col-xl-10 maxw100flex-992">
                <div class="row">
                    @include('layouts.menu.tenantmenu')
                    <div class="col-lg-12">
                        @include('Alerts.success')
                        @include('Alerts.danger')
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <a href="{!! route('dashboard') !!}" class="btn btn-danger mb-3"> Back </a>
                                <div class="message_container">
                                    <div class="user_heading">
                                        <a href="#">
                                            <div class="wrap">
                                                <span class="contact-status online"></span>
                                                <img class="img-fluid" src="{{ asset('uploads') }}/{{ $myAgent->avatar }}" width="55px" alt="s5.jpg" />
                                                <div class="meta">
                                                    <h5 class="name">{{ $myAgent->name }}</h5>
                                                      <p class="badge badge-dark">Write a message</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="inbox_chatting_box" style="margin-bottom: 5rem">
                                        <ul class="chatting_content">
                                          @forelse ($messages as $message)
                                            @if ( $message->receiver_id == $user_id)
                                            <li class="media sent">
                                              <img class="img-fluid align-self-start mr-3" src="{{ asset('uploads') }}/{{ $myAgent->avatar }}"  width="55px" alt="s6.jpg" />
                                              <div class="media-body">
                                                <div class="date_time">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</div>
                                                <p>{{ $message->message }}</p>
                                              </div>
                                            </li>
                                            @endif
                                            {{-- sender --}}
                                            @if (Auth::id() == $message->sender_id)
                                              <li class="media reply first mt-2">
                                                <div class="media-body text-right">
                                                  <div class="date_time">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</div>
                                                  <p>{{ $message->message }}</p>
                                                </div>
                                              </li>
                                            @endif
                                          @empty
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-md-12 text-center">
                                                  <p class="badge badge-primary ">No message found!</p>
                                                </div>
                                              </div>
                                            </div>
                                          @endforelse
                                        </ul>
                                    </div>
                                    <div class="mi_text">
                                        <div class="message_input">
                                            <form class="form-inline" action="{!! route('tenant.message.messageSentPost', $myAgent->id) !!}" method="post">
                                              @csrf
                                                <input class="form-control" type="text" name="message" placeholder="Enter text here..." aria-label="Search">
                                                <button class="btn" type="submit">Send Message</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt50">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="copyright-widget text-center">
                            <p>© 2021 Argo. Made with SifzTech.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
