<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{ asset('images/logo2.png') }}" alt="Logo"></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/adminpanel"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Manage System</h3>
     
        @role('superadmin') 
        <li>
            <a href="/managers"> <i class="menu-icon fa fa-user"></i>Manage Managers</a>
        </li>
        @endrole
        @role('manager|superadmin') 
     
        <li>
            <a href="/receptionists"> <i class="menu-icon fa fa-user"></i>Manage Receptionsts</a>
        </li>
       
        <li>
                <a href="/floors"> <i class="menu-icon   fa fa-sitemap"></i>Manage Floors</a>
        </li>  
        <li>
                <a href="/rooms"> <i class="menu-icon   fa fa-institution"></i>Manage Rooms</a>
        </li>
        @endrole
        @role('receptionist|superadmin|manager') 
        <li>
                <a href="/users"> <i class="menu-icon   fa fa-child"></i>Manage Clients</a>
        </li>
        <li>
                <a href="/users"> <i class="menu-icon   fa fa-child"></i>Clients Reservations</a>
        </li>
        <li>
                <a href="/users/approve"> <i class="menu-icon   fa fa-institution"></i> Clients Pending Approval</a>
        </li>
      @endrole


                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->
