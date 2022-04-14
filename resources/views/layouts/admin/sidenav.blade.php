<nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
<div class="simplebar-content" style="padding: 0px;">
    <a class="sidebar-brand" href="{{ route('admin.dashboard') }}"><span class="align-middle"> Dashboard </span></a>
        <ul class="navbar-nav align-self-stretch">
            <!-- <li class=""> 
                <a class="nav-link text-left active"  role="button" aria-haspopup="true" aria-expanded="false"><i class="flaticon-bar-chart-1"></i> <i class = "fa fa-users"></i> Users </a>
            </li> -->
            
            <!-- Start Section -->
            <li class="has-sub"> 
                <a class="nav-link collapsed text-left" href="#collapseExample2" role="button" data-toggle="collapse" ><i class="flaticon-user"></i>  <i class = "fa fa-users"></i> Users</a>
                <div class="collapse menu mega-dropdown" id="collapseExample2">
                    <div class="dropmenu" aria-labelledby="navbarDropdown">
                        <div class="container-fluid ">
                            <div class="row">
                                <div class="col-lg-12 px-2">
                                    <div class="submenu-box"> 
                                        <ul class="list-unstyled m-0">
                                            <li><a href="{{ route('admin.users.index') }}"><i class = "fa fa-user"></i> &nbsp;Drivers</a></li>
                                            <li><a href="{{ route('admin.passenger') }}"><i class = "fa fa-user"></i> &nbsp;Passengers</a></li>                                            
                                        </ul>
                                    </div>
                                </div>                
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!--End section -->

            <li class=""> 
                <a href = "{{ route('admin.ridetype.index') }}" class="nav-link text-left active"  role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"></i>  Ride Types </a>
            </li>
            <li class=""> 
                <a href = "{{ route('admin.ridepost.index') }}" class="nav-link text-left active"  role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"></i>  Ride Posts </a>
            </li>
            <li class=""> 
                <a href = "" class="nav-link text-left active"  role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"></i>  Reviews </a>
            </li>
            <!-- <li class=""> 
                <a href = "" class="nav-link text-left active"  role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-money"></i>  Withdraw Requests </a>
            </li> -->
            <!-- <li class=""> 
                <a href = "" class="nav-link text-left active"  role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-money"></i>  Withdraws </a>
            </li> -->

            <!-- Start Section -->
            <!-- <li class="has-sub"> 
                <a class="nav-link collapsed text-left" href="#collapseExample3" role="button" data-toggle="collapse" ><i class="flaticon-user"></i>  <i class = "fa fa-file"></i> Reports</a>
                <div class="collapse menu mega-dropdown" id="collapseExample3">
                    <div class="dropmenu" aria-labelledby="navbarDropdown">
                        <div class="container-fluid ">
                            <div class="row">
                                <div class="col-lg-12 px-2">
                                    <div class="submenu-box"> 
                                        <ul class="list-unstyled m-0">
                                            <li><a href=""><i class = "fa fa-users"></i> &nbsp;Users</a></li> 
                                            <li><a href=""><i class = "fa fa-sticky-note"></i> &nbsp;Posts</a></li>
                                            <li><a href=""><i class = "fa fa-list"></i> &nbsp;Ads</a></li> 
                                            <li><a href=""><i class = "fa fa-list"></i> &nbsp;Stories</a></li>                                            
                                        </ul>
                                    </div>
                                </div>                
                            </div>
                        </div>
                    </div>
                </div>
            </li> -->
            <!--End section -->

            <li class="has-sub"> 
                <a class="nav-link collapsed text-left" href="#collapseExample4" role="button" data-toggle="collapse" ><i class="flaticon-user"></i>  <i class = "fa fa-gears"></i> Settings</a>
                <div class="collapse menu mega-dropdown" id="collapseExample4">
                    <div class="dropmenu" aria-labelledby="navbarDropdown">
                        <div class="container-fluid ">
                            <div class="row">
                                <div class="col-lg-12 px-2">
                                    <div class="submenu-box"> 
                                        <ul class="list-unstyled m-0">
                                            <li><a href=""><i class = "fa fa-user"></i> &nbsp;Edit Profile</a></li> 
                                            <!-- <li><a href=""><i class = "fa fa-bell"></i> &nbsp;Notifications</a></li>                                                                                                                                   -->
                                        </ul>
                                    </div>
                                </div>                
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!--End section -->

            <!-- Start Section -->
            <!-- <li class="has-sub"> 
                <a class="nav-link collapsed text-left" href="#collapseExample3" role="button" data-toggle="collapse" ><i class="flaticon-user"></i>   Investigations</a>
                <div class="collapse menu mega-dropdown" id="collapseExample3">
                    <div class="dropmenu" aria-labelledby="navbarDropdown">
                        <div class="container-fluid ">
                            <div class="row">
                                <div class="col-lg-12 px-2">
                                    <div class="submenu-box"> 
                                        <ul class="list-unstyled m-0">
                                            <li><a href="">Pending Investigations</a></li>
                                            <li><a href="">Active Investigations</a></li> 
                                            <li><a href="">Completed Investigations</a></li>  
                                            <li><a href="">Cancelled Investigations</a></li>                                       
                                        </ul>
                                    </div>
                                </div>                
                            </div>
                        </div>
                    </div>
                </div>
            </li> -->
            <!--End section -->
        </ul>
    </div>
</nav>