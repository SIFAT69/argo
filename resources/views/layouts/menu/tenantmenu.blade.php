@php
  $name = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp
<div class="col-md-12">
<div class="dashboard_navigationbar dn db-992">
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
        <ul id="myDropdown" class="dropdown-content">
            <li><a href="{!! route('TanentDashboard') !!}"><span class="flaticon-layers"></span> Dashboard</a></li>
            <li><a href="{!! route('tenant.message.tenantIndex', [$name->name, $name->id]) !!}"><span class="flaticon-envelope"></span>Tenant Message</a></li>
            <li><a href="{!! route('tanents.properties.index') !!}"><span class="flaticon-home"></span>  My Properties</a></li>
            <li><a href="{!! route('tanents.projects.index') !!}"><span class="flaticon-heart"></span>  My Projects</a></li>
            <li><a href="{!! route('services.request.index') !!}"><span class="fas fa-cogs"></span>  Service Requests</a></li>
            <li><a href="{!! route('contracts.tenant.index') !!}"><span class="fas fa-funnel-dollar"></span>  Contracts</a></li>
            <li><a href="{!! route('tenant.payments.history') !!}"><span class="flaticon-user"></span> My Payments</a></li>
            <li><a href="{!! route('tanent.profile') !!}"><span class="flaticon-user"></span> My Profile</a></li>
            <li><a href="{!! route('welcome') !!}"><span class="flaticon-back"></span> Back To Website</a></li>
            <li><a href="{!! route('logout') !!}"><span class="flaticon-logout"></span> Logout</a></li>
        </ul>
    </div>
</div>
</div>
