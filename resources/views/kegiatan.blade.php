@extends('layouts.main')
@section('content')
<div class="body">

   <header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
      <div class="header-body border-top-0 bg-dark box-shadow-none">
         <div class="header-container container">
            <div class="header-row">
               <div class="header-column">
                  <div class="header-row">
                     <div class="header-logo">
                        <a href="#">
                           <img alt="Inspektorat Kota Surakarta" width="auto" height="40" src="{{ asset('img/logo-nganjuk.png')}}">
                        </a>
                     </div>
                  </div>
               </div>
               <div class="header-column justify-content-end">
                  <div class="header-row">
                     <div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
                        <div class="header-nav-main header-nav-main-font-lg header-nav-main-font-lg-upper-2 header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                           <nav class="collapse">
                              <ul class="nav nav-pills" id="mainNav">
                                 <li>
                                    <a data-hash class="nav-link active text-2" href="{{url('')}}">Home</a>
                                 </li>
                                 <li class="dropdown">
                                    <a data-hash class="nav-link  text-2" href="#home">Profil</a>
                                    <ul class="dropdown-menu">
                                       <li>
                                          <a class="dropdown-item" href="{{url('bapenda')}}">
                                             Bapenda Nganjuk
                                          </a>
                                       </li>
                                       <li>
                                          <a class="dropdown-item" href="{{url('kepalabadan')}}">
                                             Kepala Badan
                                          </a>
                                       </li>
                                       <li>
                                          <a class="dropdown-item" href="{{url('sekretariat')}}">
                                             Sekretariat
                                          </a>
                                       </li>
                                    </ul>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="{{url('')}}#pelayanan">Pelayanan</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="{{url('')}}#pembayaran">Pembayaran</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="{{url('')}}#kegiatan">Kegiatan</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="{{url('')}}#ppid">Peraturan</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="{{url('')}}#faq">FAQ</a>
                                 </li>
                                 
                              </ul>
                           </nav>
                        </div>
                        <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                           <i class="fas fa-bars"></i>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>

   <div role="main" class="main">
      <div class="container">
         <div class="text-center p-3">
            <div class="row">
               <div class="col-12" style="margin-top:50px">
                   <section class="timeline">
                       <div class="timeline-body">
                           @forelse($data['kegiatan'] as $kegiatan)
                               <div class="timeline-date">
                                   <h3 style="color:#363062"class="font-weight-bold">{{ $kegiatan->publish_at->translatedFormat('d F Y') }}</h3>
                               </div>
                               <article class="timeline-box {{ $loop->odd ? 'left': 'right' }} post post-medium">
                                   <div class="timeline-box-arrow"></div>
                                   <div class="p-2">
                                       <div class="row mb-2">

                                           <div class="col">
                                               <div class="post-image">
                                                   <img src="{{ Storage::url('public/img/kegiatan/'.$kegiatan->img) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                                                   
                                               </div>
                                           </div>
                                       </div>
                                       <div class="row">
                                           <div class="col">

                                               <div class="post-content">
                                                   <h2 class="font-weight-semibold text-5 line-height-4 mt-2 mb-2">{{ $kegiatan->title }}</h2>
                                                   {!! $kegiatan->content !!}
                                               </div>

                                           </div>
                                       </div>
                                   </div>
                               </article>
                           @empty
                               <h3>Belum ada kegiatan</h3>
                           @endforelse

                       </div>

                   </section>
               </div>
            </div>
         </div>
      </div>
   </div>

   <footer id="footer" class="border-0" style="background-color:#4d4c7d">
      <div class="container py-4">
         <div class="row justify-content-md-center py-5 mt-3">
            <div class="col-md-12 col-lg-3 d-flex align-items-center justify-content-center justify-content-lg-start mb-5 mb-lg-0">
               <a href="#" class="text-center">
                  <img src="{{asset('img/nganjuk-logo.png')}}" alt="Logo" class="img-fluid" style="max-width: 100px;">
                  <br><span class="text-color-light font-weight-extra-bold text-lg-5">Bappenda Kabupaten Nganjuk</span>
               </a>
            </div>
            <div class="col-md-6 col-lg-3 text-center text-lg-start mb-5 mb-lg-0">
               <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Pages</h5>
               <ul class="list list-unstyled text-color-light">
                  <li class="mb-1"><a href="#home" class="link-hover-style-1 text-3"> Profil</a></li>
                  <li class="mb-1"><a href="#pelayanan" class="link-hover-style-1 text-3"> Pelayanan</a></li>
                  <li class="mb-1"><a href="#pembayaran" class="link-hover-style-1 text-3"> Pembayaran</a></li>
                  {{-- <li class="mb-1"><a href="#visimisi" class="link-hover-style-1 text-3"> Visi Misi</a></li> --}}
                  <li class="mb-1"><a href="#kegiatan" class="link-hover-style-1 text-3"> Kegiatan</a></li>
                  <li class="mb-1"><a href="#ppid" class="link-hover-style-1 text-3"> Peraturan</a></li>
                  <li class="mb-1"><a href="#faq" class="link-hover-style-1 text-3"> FAQ</a></li>
                  {{-- <li class="mb-1"><a href="{{url('survey')}}" class="link-hover-style-1 text-3"> Survey Kepuasan Masyarakat</a></li> --}}
               </ul>
            </div>
            <div class="col-md-6 col-lg-3 text-center text-lg-start">
               <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Contact Us</h5>
                  <ul class="list list-icons list-icons-lg">
                     <li class="mb-1 text-3"><i class="fas fa-map-marker-alt text-color-light"></i><p class="m-0">Jl. Merdeka No. 3. Kel. Mangundikaran, Nganjuk</p></li>
                     <li class="mb-1 text-3"><i class="fas fa-phone text-color-light"></i><p class="m-0"><a href="tel:0271719653">(0271)719653 Fax. (0271)725149</a></p></li>
                     <li class="mb-1 text-3"><i class="far fa-envelope text-color-light"></i><p class="m-0"><a href="mailto:inspektorat@surakarta.go.id">inspektorat@surakarta.go.id</a></p></li>
                  </ul>
                  <ul class="social-icons">
                  @foreach ($data['sosial'] as $item)
                     <li class="social-icons-{{$item['title']}}"><a href="{{$item['url']}}" target="_blank" title="{{$item['title']}}"><i class="{{$item['icon']}}"></i></a></li>
                  @endforeach
                  </ul>
            </div>
         </div>
      </div>
      <div class="footer-copyright footer-copyright-style-2 footer-top-light-border" style="background-color: #4d4c7d">
         <div class="container py-2">
            <div class="row py-4">
               <div class="col d-flex align-items-center justify-content-center mb-4 mb-lg-0">
                  <p class="text-light text-2">© Copyright 2023. Bappenda Kabupaten Nganjuk</p>
               </div>
            </div>
         </div>
      </div>
   </footer>

</div>

{{-- <div class="aksesbility text-center text-6" style="color: white">
   <div><i class="fa fa-universal-access"></i></div>
   <div id="text-up" class="text-a mt-3"><i class='bx bx-sort-z-a'></i></div>
   <div id="text-down" class="text-a mt-4"><i class='bx bx-sort-a-z'></i></div>
   <div id="text-normal" class="text-a mt-3"><i class='bx bx-font'></i></i></div>
</div> --}}

<div class="runningtext">
   <div class="runningtext-content text-3">
      @foreach($data['runningtext'] as $item)
         <img src="{{ asset('img/runningtext-ska-icon.png')}}" alt="pembatas icon">
         {{$item->title}} : {{$item->description}}
      @endforeach
   </div>
</div>


<div class="modal fade" id="bacakegiatan" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Default Modal Title</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
         </div>
         <div class="modal-body text-3">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus.</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
<script>
$(document).ready(function () {
   $('.runningtext-content').bind('marquee', function() {
        var ob = $(this);
        var tw = ob.width();
        var ww = ob.parent().width();
        ob.css({ right: -tw });
        ob.animate({ right: ww }, 20000, 'linear', function() {
            ob.trigger('marquee');
        });
    }).trigger('marquee');

   $('#text-up').click(function() {
      updateZoom(0.1);
   });
   $('#text-down').click(function() {
      updateZoom(-0.1);
   });
   $('#text-normal').click(function() {
      zoomLevel = 1;
      $('body').css({ zoom: zoomLevel, '-moz-transform': 'scale(' + zoomLevel + ')' });
   });
   zoomLevel = 1;
   var updateZoom = function(zoom) {
      zoomLevel += zoom;
      $('body').css({ zoom: zoomLevel, '-moz-transform': 'scale(' + zoomLevel + ')' });
   }
});
</script>
@endsection
