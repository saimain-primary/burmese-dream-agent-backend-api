     <div class="vertical-menu">

         <div data-simplebar class="h-100">

             <!--- Sidemenu -->
             <div id="sidebar-menu">
                 <!-- Left Menu Start -->
                 <ul class="metismenu list-unstyled" id="side-menu">
                     <li class="menu-title">Main</li>

                     <li>
                         <a href="{{ url('/admin') }}" class="waves-effect">
                             <i class="ti-home"></i>
                             <span>Dashboard</span>
                         </a>
                     </li>
                     <li class="menu-title">Account</li>

                     <li>
                         <a href="{{ route('admin.account.index') }}" class="waves-effect">
                             <i class="ti-lock"></i>
                             <span>Admin</span>
                         </a>
                     </li>

                     <li>
                         <a href="{{ route('admin.user.index') }}" class="waves-effect">
                             <i class="ti-user"></i>
                             <span>User</span>
                         </a>
                     </li>
                 </ul>

             </div>
             <!-- Sidebar -->
         </div>
     </div>
