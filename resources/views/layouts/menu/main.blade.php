<nav id="menu" class="stylehome1">
    <ul>
      <li>
          <a href="{!! route('welcome') !!}"><span class="title">Home</span></a>
      </li>
      <li>
          <a href="{!! route('properties_lists') !!}"><span class="title">Properties</span></a>
      </li>
      <li>
          <a href="{!! route('projects_lists') !!}"><span class="title">Projects</span></a>
      </li>
      <li>
          <a href="{!! route('agencies_lists') !!}"><span class="title">Agencies</span></a>
      </li>
      <li>
          <a href="{!! route('blogs_lists') !!}"><span class="title">Blogs</span></a>

      </li>
      <li>
          <a href="{!! route('contact') !!}"><span class="title">Contact</span></a>
      </li>
      @php
      $subCheck = DB::table('subscriptions')->where('user_id', Auth::id())->value('stripe_status');
      @endphp
      @if ($subCheck != "active" && !empty(Auth::user()))
        <li class="last">
          <a href="{!! route('package_index') !!}"><span class="title">Be An Agent</span></a>
        </li>
      @endif
      @if (Auth::check())
        <li class="list-inline-item list_s"><a href="{!! route('dashboard') !!}" class="btn flaticon-user"> <span>Dashboard</span></a></li>
      @else

        <li class="list-inline-item list_s"><a href="#" class="btn flaticon-user" data-toggle="modal" data-target=".bd-example-modal-lg"> <span class="dn-lg">Login/Register</span></a></li>
      @endif
    </ul>
</nav>
