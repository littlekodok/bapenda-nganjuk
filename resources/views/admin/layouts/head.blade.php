<header class="header">
   <div class="logo-container">
      <a href="/" class="logo">
         <img src="{{ asset('img/logo-nganjuk.png')}}" width="auto" height="35" alt="Admin" />
      </a>

      <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
         <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
      </div>

   </div>

   <!-- start: search & user box -->
   <div class="header-right">

      <div id="userbox" class="userbox">
         <a href="#" data-bs-toggle="dropdown">
            <figure class="profile-picture">
               <img src="{{ asset('admin/img/user.png')}}" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg" />
            </figure>
            <div class="profile-info">
               <span class="name">{{Auth::user()->name}}</span>
               <span class="role">
                  @if(Auth::user()->isAdmin)
                     Admin
                  @else
                     Operator
                  @endif   
               </span>
            </div>

            <i class="fa custom-caret"></i>
         </a>

         <div class="dropdown-menu">
            <ul class="list-unstyled mb-2">
               <li class="divider"></li>
               <li>
                  <a role="menuitem" tabindex="-1" href="/account">
                     <i class="bx bx-user-circle"></i> User Account
                  </a>
               </li>
               <li>
                  <a role="menuitem" tabindex="-1" href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     <i class="bx bx-power-off"></i> Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <!-- end: search & user box -->
</header>