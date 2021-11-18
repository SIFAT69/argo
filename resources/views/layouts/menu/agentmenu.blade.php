<div class="col-lg-12">
    <div class="dashboard_navigationbar dn db-992">
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"><span class="fa fa-bars pr10"></span> Dashboard Navigation</button>
            <ul id="myDropdown" class="dropdown-content">
              <li><a href="{!! route('AgentDashboard') !!}"><span class="flaticon-layers"></span> Dashboard</a></li>
              <li><a href="{!! route('MyInbox') !!}"><span class="far fa-address-book"></span> Contacts</a></li>
              <li><a href="{!! route('tenant.message.index') !!}"><span class="flaticon-envelope"></span>Tenant Message</a></li>
              <li><a href="{!! route('MyProperties') !!}"><span class="flaticon-home"></span> My Properties</a></li>
              <li><a href="{!! route('MyProject') !!}"><span class="far fa-heart"></span>  My Projects</a></li>
              <li><a href="{!! route('agentsFeaturesList') !!}"><span class="far fa-file-alt"></span>  Features</a></li>
              <li><a href="{!! route('Agentfacility.index') !!}"><span class="fas fa-bezier-curve"></span>  Facilities</a></li>
              <li><a href="{!! route('Agentcatgories.index') !!}"><span class="far fa-folder-open"></span>  Categories</a></li>
              <li><a href="{!! route('Landlord.index') !!}"><span class="fas fa-house-user"></span>  Landlords</a></li>
              <li><a href="{!! route('AgentTenant') !!}"><span class="fas fa-home"></span>  Tenant</a></li>
              <li><a href="{!! route('services.agent.index') !!}"><span class="fas fa-cogs"></span>  Maintence Request</a></li>
              <li><a href="{!! route('contracts.agent.index') !!}"><span class="fas fa-funnel-dollar"></span>  Contracts</a></li>
              @if (Auth::user()->account_role == 'Agent')
              <li><a href="{!! route('agent.transaction.history') !!}"><span class="flaticon-box"></span> My Wallet</a></li>
              <li><a href="{!! route('agent.roles') !!}"> <span class="fas fa-users"></span> Roles & Permission</a></li>
              <li><a href="{!! route('users.agent.index') !!}"> <span class="fas fa-users"></span> Service Providers</a></li>
              <li><a href="{!! route('agent.stuff') !!}"> <span class="fas fa-users"></span> Staffs</a></li>
              <li><a href="{!! route('agent.task') !!}"> <span class="fas fa-list"></span> My Task</a></li>
              <li><a href="{!! route('packageHistory') !!}"><span class="flaticon-box"></span> My Package</a></li>
              <li><a href="{!! route('agent.profile') !!}"><span class="flaticon-user"></span> My Profile</a></li>
              @endif
              <li><a href="{!! route('welcome') !!}"><span class="flaticon-back"></span> Back To Website</a></li>
              <li><a href="{!! route('logout') !!}"><span class="flaticon-logout"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
{{-- <div class="col-lg-12 mb10">
    <div class="breadcrumb_content style2">
        <h2 class="breadcrumb_title">Hello, {{ Auth::user()->name }}!</h2>
        <p>We are glad to see you again!</p>
    </div>
</div> --}}
