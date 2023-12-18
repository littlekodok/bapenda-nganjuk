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
                                    <a data-hash class="nav-link  text-2" href="{{url('')}}">Home</a>
                                 </li>
                                 <li class="dropdown">
                                    <a data-hash class="nav-link active text-2" href="#home">Profil</a>
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
                                          <a class="dropdown-item" href=" {{url('sekretariat')}}">
                                             Sekretariat
                                          </a>
                                       </li>
                                    </ul>
                                 </li>
                                 {{-- <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="{{url('')}}#visimisi">Visi Misi</a>
                                 </li> --}}
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
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="{{url('')}}#ppid">PPID</a>
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

				<section class="page-header page-header-modern bg-color-grey page-header-md ">
					<div class="container-fluid">
						<div class="row align-items-center">

							

							<div class="col">
								<div class="row">
									<div class="col-md-12 align-self-center p-static order-2 text-center">
										<div class="overflow-hidden pb-2">
											<h1 class="mb-2 text-dark font-weight-bold text-9 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="100" style="animation-delay: 100ms;">Kepala Badan</h1>
                                 <br>
                                 <span class="mt-3">Periode {{ $data['kepalabadan']['periode'] }}</span>
										</div>
									</div>
									<div class="col-md-12 align-self-center order-1">
										<ul class="breadcrumb d-block text-center appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" data-appear-animation-delay="300" style="animation-delay: 300ms;">
											<li><a href="#">Profil</a></li>
											<li class="active">Kepala Badan</li>
										</ul>
									</div>
								</div>
							</div>

							

						</div>
					</div>
				</section>

				<div class="container py-4">

               <div class="row">
						<div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">

							<div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark nav-lg d-block overflow-hidden" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'autoHeight': true}" style="height: 510px;">
								<div>
									<div class="img-thumbnail border-0 border-radius-0 p-0 d-block">
										<img src="{{ Storage::url('public/img/kepalabadan/'.$data['kepalabadan']['foto']) }}" class="img-fluid border-radius-0" alt="">
									</div>
								</div>
							</div>

						</div>
					<div class="row pt-4 mt-2 mb-5">
						<div class="col-md-12 mb-4 mb-md-0">

							<h2 class="text-color-dark text-center text-capitalize font-weight-normal text-5 mb-2"> <strong class="font-weight-extra-bold">{{ $data['kepalabadan']['nama'] }}</strong></h2>
                     {!! $data['kepalabadan']['description'] !!}
							<hr class="solid my-5">
						</div>
					</div>
				</div>
			</div>

   {{-- <div role="main" class="main">

      <section class="page-header page-header-modern bg-color-white page-header-md">
         <div class="container">
            <div class="row">
               <div class="col-md-12 align-self-center p-static order-2 text-center">
                  <h1 class="text-dark mt-3 font-weight-bold text-8">Profil Kepala Badan</h1>
               </div>
               <div class="col-md-12 align-self-center order-1">
                  <ul class="breadcrumb d-block text-center">
                     <li><a href="#">Profil</a></li>
                     <li class="active">Kepala Badan</li>
                  </ul>
               </div>
            </div>
         </div>
      </section>

      <div class="container py-4">

         <div class="row">
            <div class="col">
               <div class="blog-posts single-post">

                  <article class="post post-large blog-single-post border-0 m-0 p-0">
                     <div class="post-image ms-0">
                        <a href="blog-post.html">
                           <img src="{{ Storage::url('public/img/kegiatan/'.$data['kegiatan']['img']) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="">
                        </a>
                     </div>
                     <div class="post-content ms-0">

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lectus lacus, rutrum sit amet placerat et, bibendum nec mauris. Duis molestie, purus eget placerat viverra, nisi odio gravida sapien, congue tincidunt nisl ante nec tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis, massa fringilla consequat blandit, mauris ligula porta nisi, non tristique enim sapien vel nisl. Suspendisse vestibulum lobortis dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent nec tempus nibh. Donec mollis commodo metus et fringilla. Etiam venenatis, diam id adipiscing convallis, nisi eros lobortis tellus, feugiat adipiscing ante ante sit amet dolor. Vestibulum vehicula scelerisque facilisis. Sed faucibus placerat bibendum. Maecenas sollicitudin commodo justo, quis hendrerit leo consequat ac. Proin sit amet risus sapien, eget interdum dui. Proin justo sapien, varius sit amet hendrerit id, egestas quis mauris.</p>
                        <p>Ut ac elit non mi pharetra dictum nec quis nibh. Pellentesque ut fringilla elit. Aliquam non ipsum id leo eleifend sagittis id a lorem. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam massa mauris, viverra et rhoncus a, feugiat ut sem. Quisque ultricies diam tempus quam molestie vitae sodales dolor sagittis. Praesent commodo sodales purus. Maecenas scelerisque ligula vitae leo adipiscing a facilisis nisl ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                        <p>Curabitur non erat quam, id volutpat leo. Nullam pretium gravida urna et interdum. Suspendisse in dui tellus. Cras luctus nisl vel risus adipiscing aliquet. Phasellus convallis lorem dui. Quisque hendrerit, lectus ut accumsan gravida, leo tellus porttitor mi, ac mattis eros nunc vel enim. Nulla facilisi. Nam non nulla sed nibh sodales auctor eget non augue. Pellentesque sollicitudin consectetur mauris, eu mattis mi dictum ac. Etiam et sapien eu nisl dapibus fermentum et nec tortor.</p>
                        <p>Curabitur nec nulla lectus, non hendrerit lorem. Quisque lorem risus, porttitor eget fringilla non, vehicula sed tortor. Proin enim quam, vulputate at lobortis quis, condimentum at justo. Phasellus nec nisi justo. Ut luctus sagittis nulla at dapibus. Aliquam ullamcorper commodo elit, quis ornare eros consectetur a. Curabitur nulla dui, fermentum sed dapibus at, adipiscing eget nisi. Aenean iaculis vehicula imperdiet. Donec suscipit leo sed metus vestibulum pulvinar. Phasellus bibendum magna nec tellus fringilla faucibus. Phasellus mollis scelerisque volutpat. Ut sed molestie turpis. Phasellus ultrices suscipit tellus, ac vehicula ligula condimentum et.</p>
                        <p>Aenean metus nibh, molestie at consectetur nec, molestie sed nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec euismod urna. Donec gravida pharetra ipsum, non volutpat ipsum sagittis a. Phasellus ut convallis ipsum. Sed nec dui orci, nec hendrerit massa. Curabitur at risus suscipit massa varius accumsan. Proin eu nisi id velit ultrices viverra nec condimentum magna. Ut porta orci quis nulla aliquam at dictum mi viverra. Maecenas ultricies elit in tortor scelerisque facilisis. Mauris vehicula porttitor lacus, vel pretium est semper non. Ut accumsan rhoncus metus non pharetra. Quisque luctus blandit nisi, id tempus tellus pulvinar eu. Nam ornare laoreet mi a molestie. Donec sodales scelerisque congue. </p> 
                     </div>
                  </article>
               </div>
            </div>
         </div>  
      </div>
   </div> --}}

   <footer id="footer" class="border-0" style="background-color:#363062">
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
                  <li class="mb-1"><a href="{{ route('landing') }}#home" class="link-hover-style-1 text-3"> Profil</a></li>
                  <li class="mb-1"><a href="{{ route('landing') }}#pelayanan" class="link-hover-style-1 text-3"> Pelayanan</a></li>
                  <li class="mb-1"><a href="{{ route('landing') }}#pembayaran" class="link-hover-style-1 text-3"> Pembayaran</a></li>
                  {{-- <li class="mb-1"><a href="#visimisi" class="link-hover-style-1 text-3"> Visi Misi</a></li> --}}
                  <li class="mb-1"><a href="{{ route('landing') }}#kegiatan" class="link-hover-style-1 text-3"> Kegiatan</a></li>
                  <li class="mb-1"><a href="{{ route('landing') }}#ppid" class="link-hover-style-1 text-3"> Peraturan</a></li>
                  <li class="mb-1"><a href="{{ route('landing') }}#faq" class="link-hover-style-1 text-3"> FAQ</a></li>
                  {{-- <li class="mb-1"><a href="{{url('survey')}}" class="link-hover-style-1 text-3"> Survey Kepuasan Masyarakat</a></li> --}}
               </ul>
            </div>
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
      <div class="footer-copyright footer-copyright-style-2  footer-top-light-border" style="background-color: #363062">
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
