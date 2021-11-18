<div class="col-lg-12">
    <div class="dashboard_navigationbar dn db-992">
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"><span class="fa fa-bars pr10"></span> Dashboard Navigation</button>
            <ul id="myDropdown" class="dropdown-content">
                <li class="treeview"><a href="{!! route('dashboard') !!}"><span class="flaticon-layers"></span> Dashboard</a></li>
                <li><a href="{!! route('servicesForServiceProviders') !!}"><span class="fas fa-cogs"></span>  Maintence Request</a></li>
                <li><a href="{!! route('agent.service.profile.settings') !!}"><span class="flaticon-user"></span> My Profile</a></li>
                <li><a href="{!! route('welcome') !!}"><span class="flaticon-back"></span> Back To Website</a></li>
                <li><a href="{!! route('logout') !!}"><span class="flaticon-logout"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</div>
