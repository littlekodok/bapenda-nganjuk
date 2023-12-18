<aside id="sidebar-left" class="sidebar-left">

   <div class="sidebar-header">
       <div class="sidebar-title">
           Menu
       </div>
       <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
           <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
       </div>
   </div>

   <div class="nano">
      <div class="nano-content">
         <nav id="menu" class="nav-main" role="navigation">

            <ul class="nav nav-main">
               <li class="nav-dashboard">
                  <a class="nav-link" href="/foradmin">
                     <i class="bx bx-home-alt" aria-hidden="true"></i>
                     <span>Dashboard</span>
                  </a>                        
               </li>
               <li class="nav-header">
                  <a class="nav-link" href="/header">
                     <i class="bx bx-window-alt" aria-hidden="true"></i>
                     <span>Header</span>
                  </a>                        
               </li>
               {{-- <li class="nav-visimisi">
                  <a class="nav-link" href="/visimisi">
                     <i class="bx bx-book-alt" aria-hidden="true"></i>
                     <span>VIsi Misi</span>
                  </a>                        
               </li>  --}}
               <li class="nav-kegiatan">
                  <a class="nav-link" href="/kegiatan">
                     <i class="bx bx-news" aria-hidden="true"></i>
                     <span>Kegiatan</span>
                  </a>                        
               </li>
               <li class="nav-pelayanan">
                  <a class="nav-link" href="/pelayanan">
                     <i class="bx bx-street-view" aria-hidden="true"></i>
                     <span>Pelayanan</span>
                  </a>                        
               </li>
               <li class="nav-ppid">
                  <a class="nav-link" href="/ppid">
                     <i class="bx bx-collection" aria-hidden="true"></i>
                     <span>Peraturan</span>
                  </a>                        
               </li>
               <li class="nav-pembayaran">
                  <a class="nav-link" href="/terkait">
                     <i class="bx bx-link-alt" aria-hidden="true"></i>
                     <span>Pembayaran</span>
                  </a>                        
               </li>
               <li class="nav-runningtext">
                  <a class="nav-link" href="/runningtext">
                     <i class='bx bx-text' aria-hidden="true"></i>
                     <span>Running Text</span>
                  </a>                        
               </li>
               <li class="nav-pengumuman">
                  <a class="nav-link" href="/pengumuman">
                     <i class='bx bx-chalkboard' aria-hidden="true"></i>
                     <span>Pengumuman</span>
                  </a>                        
               </li>
               <li class="nav-faq">
                  <a class="nav-link" href="/faq">
                     <i class='bx bxs-comment-detail' aria-hidden="true"></i>
                     <span>FaQ</span>
                  </a>                        
               </li>
               <li class="nav-social">
                  <a class="nav-link" href="/social">
                     <i class='bx bx-mobile' aria-hidden="true"></i>
                     <span>Social Media</span>
                  </a>                        
               </li>
               <li class="nav-profile">
                  <a class="nav-link" href="/profil">
                     <i class='bx bxs-user' aria-hidden="true"></i>
                     <span>Profile</span>
                  </a>                        
               </li>
               
               @if(auth()->user()->isAdmin)
               <li class="nav-user">
                  <a class="nav-link" href="/user">
                     <i class='bx bx-user-circle' aria-hidden="true"></i>
                     <span>User Account</span>
                  </a>                        
               </li>
               @endif
               <hr class="separator" />
               <li class="nav-account">
                  <a class="nav-link" href="/account">
                     <i class="bx bx-key" aria-hidden="true"></i>
                     <span>Change Password</span>
                  </a>                        
               </li>
            </ul>
         </nav>
      </div>

       <script>
           // Maintain Scroll Position
           if (typeof localStorage !== 'undefined') {
               if (localStorage.getItem('sidebar-left-position') !== null) {
                   var initialPosition = localStorage.getItem('sidebar-left-position'),
                       sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                   sidebarLeft.scrollTop = initialPosition;
               }
           }
       </script>

   </div>

</aside>