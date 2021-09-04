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
                     <li class="menu-title">Products</li>
                     <li>
                         <a href="{{ route('admin.categories.index') }}" class="waves-effect">
                             <i class="ti-layers-alt"></i>
                             <span>Categories</span>
                         </a>
                     </li>
                     <li>
                         <a href="javascript: void(0);" class="has-arrow waves-effect">
                             <i class=" ti-package"></i>
                             <span>Products</span>
                         </a>
                         <ul class="sub-menu" aria-expanded="false">
                             <li><a href="{{ route('admin.products.index') }}">View</a></li>
                             <li><a href="{{ route('admin.products.create') }}">Create</a></li>
                         </ul>
                     </li>

                     <li>

                     </li>
                     <li class="menu-title">Account</li>

                     <li>
                         <a href="{{ route('admin.accounts.index') }}" class="waves-effect">
                             <i class="ti-lock"></i>
                             <span>Admin</span>
                         </a>
                     </li>

                     <li>
                         <a href="{{ route('admin.users.index') }}" class="waves-effect">
                             <i class="ti-user"></i>
                             <span>Agents</span>
                         </a>
                     </li>
                 </ul>

             </div>
             <!-- Sidebar -->
         </div>
     </div>
