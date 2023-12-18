@extends('layouts.main')

@section('content')
<div class="body">

   <input type="hidden" value="{{$data['masterpengumuman'][0]->isactive}}" id="pengumumanval">

   <header id="header" class="header-transparent header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
      <div class="header-body border-top-0 bg-dark box-shadow-none">
         <div class="header-container container">
            <div class="header-row">
               <div class="header-column">
                  <div class="header-row">
                     <div class="header-logo">
                        <a href="#">
                           <img alt="Bappenda Kabupaten Ngajuk" width="auto" height="40" src="{{ asset('img/logo-nganjuk.png')}}">
                        </a>
                     </div>
                  </div>
               </div>
               <div class="header-column justify-content-end">
                  <div class="header-row">
                     <div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
                        <div class="header-nav-main header-nav-main-font-lg header-nav-main-font-lg-upper-2 header-nav-main-mobile-dark header-nav-main-square  header-nav-main-effect-2 header-nav-main-sub-effect-1">
                           <nav class="collapse">
                              <ul class="nav nav-pills" id="mainNav">
                                 <li class="dropdown">
                                    <a data-hash class="nav-link active text-2" href="#home">Home</a>
                                    
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

                                 {{-- <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="#visimisi">Visi Misi</a>
                                 </li> --}}
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="#pelayanan">Pelayanan</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="#pembayaran">Pembayaran</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="#kegiatan">Kegiatan</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="#ppid">Peraturan</a>
                                 </li>
                                  <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="#faq">FAQ</a>
                                 </li>
                                 {{-- <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="{{url('survey')}}">Survey Kepuasan Masyarakat</a>
                                 </li> --}}
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
      <div id="home" class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual mb-0" data-plugin-options="{'autoplayTimeout': 7000}" style="height: 100vh;">
         <div class="particles-wrapper z-index-1">
            <div id="particles-2"></div>
         </div>
         <div class="owl-stage-outer">
            <div class="owl-stage">
               @for($i=0;$i<=1;$i++)
               <!-- Carousel Slide 1 $color-secondary-->
               <div class="owl-item position-relative overlay overlay-show overlay-op-8 pt-5" style="background-image: url({{Storage::url('public/img/').$data['header']['background']}}); background-size: cover; background-position: center; background-color: #35383d;">
                  <div class="container position-relative z-index-3 h-100">
                     <div class="row justify-content-center align-items-center h-100">
                        <div class="col-lg-12">
                           <div class="d-flex flex-column align-items-center">
                              <p class="positive-ls-2 position-relative text-color-light text-5 line-height-5 font-weight-bold px-4 mb-4 appear-animation" data-appear-animation="fadeInDownShorterPlus" data-plugin-options="{'minWindowWidth': 0}">
                                 <span class="position-absolute right-100pct top-50pct transform3dy-n50 opacity-3">
                                    <img src="{{ asset('img/slides/slide-title-border.png')}}" class="w-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
                                 </span>
                                    {{$data['header']['linefirst']}}
                                 <span class="position-absolute left-100pct top-50pct transform3dy-n50 opacity-3">
                                    <img src="{{ asset('img/slides/slide-title-border.png')}}" class="w-auto appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
                                 </span>
                              </p>
                              <p class="text-color-primary text-center font-weight-extra-bold text-lg-18 text-md-14-15 text-sm-13 text-xs-14 mb-4 mt-4 appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="500" data-plugin-options="{'startDelay': 500, 'minWindowWidth': 0}">
                                 {{$data['header']['linesecondw']}} <span class="position-relative text-secondary">{{$data['header']['linesecondr']}}<span class="position-absolute left-50pct transform3dx-n50 bottom-0"></span></span>
                              </p>
                              {{-- <p class="text-5 text-color-light font-weight-light opacity-7 text-center mt-4" data-appear-animation="zoomInDown" data-plugin-options="{'startDelay': 1000, 'startDelay': 1000, 'minWindowWidth': 0, 'animationSpeed': 25}">{{$data['header']['linethrith']}}</p> --}}
                              <p class="text-5 text-color-light font-weight-light opacity-7 text-center mt-4"  data-plugin-animated-letters data-plugin-options="{'animationName': 'fadeInUpShorter', 'animationSpeed': 100, 'startDelay': 1000, 'minWindowWidth': 992}">{{$data['header']['linethrith']}}</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endfor
            </div>
         </div>
         {{-- <div class="owl-nav">
            <button type="button" role="presentation" class="owl-prev"></button>
            <button type="button" role="presentation" class="owl-next"></button>
         </div>
         <div class="owl-dots mb-5">
            <button role="button" class="owl-dot active"><span></span></button>
            <button role="button" class="owl-dot"><span></span></button>
         </div> --}}
      </div>
    
      <section id="pelayanan" class="section appear-animation mb-0 p-relative" data-appear-animation="fadeIn" style="background-color:#ffffff">
         <div class="particles-wrapper z-index-1">
            <div id="particles-3"></div>
         </div>
         <div class="container z-index-2">
            <div class="row pt-4">
               @foreach ($data['pelayanan'] as $item)
               <div class="col-lg-4 mb-4 appear-animation animated fadeInLeftShorter appear-animation-visible" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                  <div class="feature-box feature-box-style-2">
                     <div class="feature-box-icon">
                        <i class="{{ $item['icon'] }}"></i>
                     </div>
                     <div class="feature-box-info">
                        <h4 class="pelayanan font-weight-bold mb-2">{{ $item['title'] }}</h4>
                        <p class="mb-4">{{ $item['deskripsi_singkat'] }}</p>
                        <a class="btn btn-secondary" href="{{ $item['link'] }}">Akses Aplikasi</a>
                     </div>
                     
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </section>

      <section id="pembayaran">
         <div class="container">
            <div class="row py-5 my-5">
               <div class="col">
            
                  <div class="owl-carousel owl-theme mb-0" data-plugin-options="{'responsive': {'0': {'items': 1}, '476': {'items': 1}, '768': {'items': 5}, '992': {'items': 7}, '1200': {'items': 7}}, 'autoplay': true, 'autoplayTimeout': 3000, 'dots': false}">
                     @foreach ($data['terkait'] as $item)
                     <div>
                        <a href="{{$item['link']}}" class="terkait">
                           <img class="img-fluid opacity-2" src="{{Storage::url('public/img/').$item['img']}}" alt="" title="{{$item['caption']}}">
                        </a>
                     </div>
                     @endforeach
                    
                  </div>
                  
               </div>
            </div>
         </div>
      </section>
      {{-- <section id="visimisi" class="section section-height-3 border-0 m-0 appear-animation p-relative" data-appear-animation="fadeIn">
         <div class="container my-3">
            <div class="row">
               <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">

                  <div class="tabs tabs-bottom tabs-center tabs-simple">
                     <ul class="nav nav-tabs ">
                        <li class="nav-item tabs">
                           <a class="nav-link font-weight-bold text-5 active" href="#tabsNavigationSimple1" data-bs-toggle="tab"><span class="font-weight-medium text-6">VISI</span></a>
                        </li>
                        <li class="nav-item tabs">
                           <a class="nav-link font-weight-bold text-5" href="#tabsNavigationSimple2" data-bs-toggle="tab"><span class="highlighted-word font-weight-bold text-6">MISI</span></a>
                        </li>
                     </ul>
                     <div class="tab-content">
                        <div class="tab-pane text-center active" id="tabsNavigationSimple1">
                           <div class="word-rotator text-color-dark font-weight-bold slide text-lg-5-6 text-md-4-5 text-xs-7 mt-5 mb-3 appear-animation" data-appear-animation="fadeInUpShorter">
                              <span>{{$data['visi']['textfirst']}} <span class="highlighted-word font-weight-bold text-lg-5-6 text-md-4-5 text-xs-7">{{$data['visi']['textalternative']}}</span> {{$data['visi']['textsecond']}} </span>
                              <span class="word-rotator-words text-color-primary text-lg-5-6 text-md-4-5 text-xs-6" style="vertical-align: bottom">
                                 @php
                                 $anim = explode(',',$data['visi']['textanimation']);
                                 echo '<b class="is-visible">'.$anim[0].'</b>';
                                 for($i=1;$i<count($anim);$i++){
                                    echo '<b>'.$anim[$i].'</b>';
                                 }
                                 @endphp
                              </span>
                           </div>
                        </div>
                        <div class="tab-pane text-center" id="tabsNavigationSimple2">
                           <p class="font-weight-extra-bold text-color-dark text-lg-5-6 text-md-5-6 text-xs-7 appear-animation" data-appear-animation="bounceIn">
                              Periode {{$data['misi']['periode']}}
                           </p>
                           <div class="de-flex flex-column text-lg-4-5 text-md-4-5 text-xs-5 appear-animation" data-appear-animation="bounceIn" data-appear-animation-delay="400">
                              {!!$data['misi']['description']!!}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section> --}}

      <section id="kegiatan" class="section section-height-3 border-0 m-0 appear-animation" data-appear-animation="fadeIn"  style="background-color:#363062">
         <div class="container-fluid px-5 mx-2">
            <div class="row mb-4">
               <div class="col flex-warp appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                  <h2 class="word-rotator text-white font-weight-semi-bold slide mb-2">
                     <span>Kegiatan Bapenda Kabupaten </span>
                     <span class="word-rotator-words" style="width: 160.117px;background-color: #ffffff;color:#4D4C7D">
                        <b class="is-visible">Nganjuk</b>
                        <b class="is-hidden">Nganjuk</b>
               
                     </span>
                  
                  </h2>
               </div>
                <p><a  class="btn btn-secondary" href="{{ route('kegiatan-all') }}" style="color: white"> Semua Kegiatan</a></p>
            </div>
            <div class="row recent-posts appear-animation mt-2" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
               @php $delay = 400 @endphp
               @foreach($data['kegiatan'] as $item)
               <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <article class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="{{$delay}}">
                     <div class="row">
                        <div class="col">
                           <a href="#" class="text-decoration-none">
                              <img src="{{Storage::url('public/img/kegiatan/').$item['img']}}" class="img-fluid hover-effect-2 mb-3" alt="" style="object-fit: fill; height:100px" />
                           </a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-auto pe-0">
                           <div class="date">
                              <span class="day bg-color-light text-color-dark font-weight-extra-bold">{{date('d', strtotime($item['publish_at']))}}</span>
                              <span class="month bg-color-light font-weight-semibold text-color-tertiary text-1">{{\helper::namaBulanSingkat(date('m', strtotime($item['publish_at'])))}}</span>
                           </div>
                        </div>
                        <div class="col ps-1">
                           <h4 class="line-height-3 text-4"><a href="#kegiatan" class="text-light showmodal" data-id="{{$item['id']}}">{{\Illuminate\Support\Str::limit($item['title'], 24)}}</a></h4>
                           <p class="text-color-light line-height-5 opacity-6 pe-4 mb-1 text-3">{!! substr(strip_tags($item['content']),0,33) . "..." !!}</p>
                           <a href="#kegiatan" class="read-more showmodal  font-weight-semibold text-2" data-id="{{$item['id']}}">read more <i class="fas fa-chevron-right text-1 ms-1"></i></a>
                        </div>
                     </div>
                  </article>
               </div>
               @php $delay += 200 @endphp
               @endforeach
            </div>
         </div>
      </section>
     
      <section id="ppid" class="section bg-color-light border-0 py-0 m-0 pb-5">
         <div class="container">
            <div class="row mt-5">
               <div class="col">
                  <div class="col appear-animation mb-4" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                     <h2 class="word-rotator font-weight-semi-bold letters scale mb-2  text-7" style="color:#363062">
                        <span class="word-rotator-words">
                           <b class="is-visible">Peraturan</b>
                           <b>Peraturan</b>
                        </span>
                     </h2>
                  </div>
                  <div class="row appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
                      <div class="col-lg-4">
                        <div class="tabs tabs-vertical tabs-right tabs-navigation tabs-navigation-simple">
                           <ul class="nav nav-tabs col-sm-3">
                              @php $i = 0; @endphp
                              @foreach ($data['ppid'] as $item)
                              <li class="nav-item">
                                 <a class="nav-link text-4 {{$i==0?'active':''}} ppid-item" data-id="{{$item['group']}}" href="#tabsNavigationVertSimple" data-bs-toggle="tab">{{$item['group']}}</a>
                                 <input type="hidden" class="input-ppid{{$i==0?'active':''}}" value="{{$item['group']}}">
                              </li>
                              @php  $i++; @endphp
                              @endforeach
                           </ul>
                        </div>
                      </div>
                     <div class="col-lg-8">
                        <div class="div-ppid-content tab-pane tab-pane-navigation active" id="tabsNavigationVertSimple">
                        </div>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </section>

      <hr>
      
      <section id="faq" class="section bg-color-light border-0 py-0 m-0 pb-5 appear-animation" data-appear-animation="fadeIn">
         <div class="container-fluid px-5 mx-2">
            <div class="row pb-4">
               <div class="col">
                  <h4 style="color: #363062">Frequently Asked Question (FAQ)</h4>
                  @foreach ($data['faq'] as $item)
                  <div class="toggle toggle-primary" data-plugin-toggle="">
                     <section class="toggle">
                        <a class="toggle-title" data-bs-target="#collapse{{ $item['id'] }}One" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="collapse100One">{{ $item['title'] }}</a>
                        <div id="collapse{{ $item['id'] }}One" class="collapse" aria-labelledby="collapse100HeadingOne" data-bs-parent="#accordion100">
                           <div class="card-body">
                              <p class="mb-0"> {!! $item['deskripsi'] !!}</p>
                           </div>
                        </div>
                     </section>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </section>
   </div>
   
   <footer id="footer" class="border-0" style="">
      <div class="container py-4">
         <div class="row justify-content-md-center py-5 mt-3">
            <div class="col-md-12 col-lg-3 d-flex align-items-center justify-content-center justify-content-lg-start mb-5 mb-lg-0">
               <a href="#" class="text-center">
                  <img src="{{asset('img/nganjuk-logo.png')}}" alt="Logo" class="img-fluid" style="max-width: 100px;">
                  <br><span class="text-color-light font-weight-extra-bold text-lg-5">Bapenda Kabupaten Nganjuk</span>
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
            {{-- <div class="col-md-6 col-lg-3 text-center text-lg-start mb-5 mb-lg-0">
               <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Links</h5>
               <ul class="list list-unstyled text-color-light" >
                  @foreach ($data['terkait'] as $item)
                  <li class="mb-1 text-3" title="{{$item['caption']}}"><a href="{{$item['link']}}" target="_blank" class="link-hover-style-1"> {{$item['brand']}}</a></li>
                  @endforeach
               </ul>
            </div> --}}
            <div class="col-md-6 col-lg-3 text-center text-lg-start">
               <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Contact Us</h5>
                  <ul class="list list-icons list-icons-lg">
                     <li class="mb-1 text-3"><i class="fas fa-map-marker-alt text-color-light"></i><p class="m-0">Jl. Merdeka No. 3. Kel. Mangundikaran, Nganjuk</p></li>
                     <li class="mb-1 text-3"><i class="fas fa-phone text-color-light"></i><p class="m-0"><a href="tel:0358325222">(0358) 325222</a></p></li>
                     <li class="mb-1 text-3"><i class="far fa-envelope text-color-light"></i><p class="m-0"><a href="mailto:bapendanganjuk@gmail">bapendanganjuk@gmail.com</a></p></li>
                  </ul>
                  <ul class="social-icons">
                  @foreach ($data['sosial'] as $item)
                     <li class="social-icons-{{$item['title']}}"><a href="{{$item['url']}}" target="_blank" title="{{$item['title']}}"><i class="{{$item['icon']}}"></i></a></li>
                  @endforeach
                  </ul>
            </div>
         </div>
      </div>
      <div class="footer-copyright footer-copyright-style-2  footer-top-light-border" style="background-color: #4d4c7d">
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

<div class="runningtext pb-3">
   <div class="runningtext-content text-3">
      @foreach($data['runningtext'] as $item)
         <img src="{{ asset('img/runningtext-nganjuk.png')}}" alt="pembatas icon">
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

<div class="modal fade" id="pengumuman" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel1" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel1">Pengumuman</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
         </div>
         <div class="modal-body text-3">
            @if(!empty($data['pengumuman']))
               {!! $data['pengumuman']['description'] !!}
            @endif
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
   /* ppid content */
   var id = $('.input-ppidactive').val();
   $('.div-ppid-content').html('<i class="fa fa-spinner fa-spin"></i>');
   // $.ajax({
   //    url : '/ppid/'+id+'/content',
   //    type: 'GET',
   //    dataType: 'JSON',
   //    success: function(data){
   //       $('.div-ppid-content').html('');
   //       data.forEach(function (item){
   //          if(item.description == null){
   //             description = '';
   //          }else{
   //             description = item.description;
   //          }

   //          if(item.file == null){
   //             pdffile = '<a href="#" disabled class="btn btn-modern btn-primary"><i class="fa fa-file-pdf text-7 mb-2"></i></a>';
   //          }else{
   //             pdffile = '<a href="/storage/pdf/'+item.file+'" target="_blank" class="btn btn-modern btn-primary"><i class="fa fa-file-pdf text-7 mb-2"></i><br>Download</a>';
   //          }

   //          $('.div-ppid-content').append('<section class="call-to-action featured featured-primary mb-5">'
   //                                     +'<div class="col-sm-9 col-lg-9">'
   //                                     +'<div class="call-to-action-content text-left">'
   //                                     +'<h4>'+item.title+'</h4>'
   //                                     +'<span class="text-left text-3">'+description+'</span>'
   //                                     +'</div>'
   //                                     +'</div>'
   //                                     +'<div class="col-sm-3 col-lg-3">'
   //                                     +'<div class="call-to-action-btn">'
   //                                     + pdffile
   //                                     +'</div>'
   //                                     +'</div>'
   //                                     +'</section>'
   //                                     );
   //       });
   //    }
   // });
   /* */

   if ($('#pengumumanval').val() == 1){
      $('#pengumuman').modal('show');
   }

   $('.showmodal').on('click', function(){
      $('#bacakegiatan').modal('show');
      $('#bacakegiatan .modal-title').html('<i class="fa fa-spinner fa-spin"></i>');
      $('#bacakegiatan .modal-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i></div>');
      id = $(this).data('id');
      $.ajax({
         url : '/kegiatan/'+id+'/show',
         type: 'GET',
         dataType: 'JSON',
         success: function(data){
            var my_date_format = function(input){
               var d = new Date(Date.parse(input.replace(/-/g, "/")));
               var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
               var date = d.getDate() + " " + month[d.getMonth()] + " " + d.getFullYear();
               return (date);
            };

            // console.log(my_date_format("2014-07-12 11:28:13"));
            $('#bacakegiatan .modal-title').html(data.title);
            $('#bacakegiatan .modal-body').html('<div class="p-3 row">'
                                                +'<div class="text-center col-12"><img src="<?= Storage::url("public/img/kegiatan/")?>'+data.img+'" style="max-width: inherit;"></div>'
                                                +'<div class="col-12"><small>'+my_date_format(data.publish_at)+'</small></div>'
                                                +'<div class="col-12 mt-4 text-justify">'+data.content+'</div>'
                                                +'</div>'
                                                );
         }
      });
   });

   $('.ppid-item').on('click', function(){
      var id = $(this).data('id');
      $('.div-ppid-content').html('<i class="fa fa-spinner fa-spin"></i>');
      $.ajax({
         url : '/ppid/'+id+'/content',
         type: 'GET',
         dataType: 'JSON',
         success: function(data){
            $('.div-ppid-content').html('');
            data.forEach(function (item){
               if(item.description == null){
                  description = '';
               }else{
                  description = item.description;
               }

               if(item.file == null){
                  pdffile = '<a href="#" disabled class="btn btn-modern btn-secondary"><i class="fa fa-file-pdf text-7 mb-2"></i></a>';
               }else{
                  pdffile = '<a href="/storage/pdf/'+item.file+'" target="_blank" class="btn btn-modern btn-primary"><i class="fa fa-file-pdf text-7 mb-2"></i><br>Download</a>';
               }

               $('.div-ppid-content').append('<section class="call-to-action featured featured-primary mb-5">'
                                          +'<div class="col-sm-9 col-lg-9">'
                                          +'<div class="call-to-action-content text-left">'
                                          +'<h4>'+item.title+'</h4>'
                                          +'<span class="text-left text-3">'+description+'</span>'
                                          +'</div>'
                                          +'</div>'
                                          +'<div class="col-sm-3 col-lg-3">'
                                          +'<div class="call-to-action-btn">'
                                          + pdffile
                                          +'</div>'
                                          +'</div>'
                                          +'</section>'
                                          );
            });
         }
      });
   });

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
