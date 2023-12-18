
<?php $__env->startSection('content'); ?>
<div class="body">

   <header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
      <div class="header-body border-top-0 bg-dark box-shadow-none">
         <div class="header-container container">
            <div class="header-row">
               <div class="header-column">
                  <div class="header-row">
                     <div class="header-logo">
                        <a href="#">
                           <img alt="Inspektorat Kota Surakarta" width="auto" height="40" src="<?php echo e(asset('img/logo-nganjuk.png')); ?>">
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
                                    <a data-hash class="nav-link  text-2" href="<?php echo e(url('')); ?>">Home</a>
                                 </li>
                                 <li class="dropdown">
                                    <a data-hash class="nav-link active text-2" href="#home">Profil</a>
                                    <ul class="dropdown-menu">
                                       <li>
                                          <a class="dropdown-item" href="<?php echo e(url('bapenda')); ?>">
                                             Bapenda Nganjuk
                                          </a>
                                       </li>
                                       <li>
                                          <a class="dropdown-item" href="<?php echo e(url('kepalabadan')); ?>">
                                             Kepala Badan
                                          </a>
                                       </li>
                                       <li>
                                          <a class="dropdown-item" href=" <?php echo e(url('sekretariat')); ?>">
                                             Sekretariat
                                          </a>
                                       </li>
                                    </ul>
                                 </li>
                                 
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="<?php echo e(url('')); ?>#pelayanan">Pelayanan</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="<?php echo e(url('')); ?>#pembayaran">Pembayaran</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="<?php echo e(url('')); ?>#kegiatan">Kegiatan</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="<?php echo e(url('')); ?>#ppid">PPID</a>
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

				<section class="page-header page-header-modern bg-color-grey page-header-md ">
					<div class="container-fluid">
						<div class="row align-items-center">

							

							<div class="col">
								<div class="row">
									<div class="col-md-12 align-self-center p-static order-2 text-center">
										<div class="overflow-hidden pb-2">
											<h1 class="mb-2 text-dark font-weight-bold text-9 appear-animation animated maskUp appear-animation-visible" data-appear-animation="maskUp" data-appear-animation-delay="100" style="animation-delay: 100ms;">Kepala Badan</h1>
                                 <br>
                                 <span class="mt-3">Periode <?php echo e($data['kepalabadan']['periode']); ?></span>
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
										<img src="<?php echo e(Storage::url('public/img/kepalabadan/'.$data['kepalabadan']['foto'])); ?>" class="img-fluid border-radius-0" alt="">
									</div>
								</div>
							</div>

						</div>
					<div class="row pt-4 mt-2 mb-5">
						<div class="col-md-12 mb-4 mb-md-0">

							<h2 class="text-color-dark text-center text-capitalize font-weight-normal text-5 mb-2"> <strong class="font-weight-extra-bold"><?php echo e($data['kepalabadan']['nama']); ?></strong></h2>
                     <?php echo $data['kepalabadan']['description']; ?>

							<hr class="solid my-5">
						</div>
					</div>
				</div>
			</div>

   

   <footer id="footer" class="border-0" style="background-color:#363062">
      <div class="container py-4">
         <div class="row justify-content-md-center py-5 mt-3">
            <div class="col-md-12 col-lg-3 d-flex align-items-center justify-content-center justify-content-lg-start mb-5 mb-lg-0">
               <a href="#" class="text-center">
                  <img src="<?php echo e(asset('img/nganjuk-logo.png')); ?>" alt="Logo" class="img-fluid" style="max-width: 100px;">
                  <br><span class="text-color-light font-weight-extra-bold text-lg-5">Bapenda Kabupaten Nganjuk</span>
               </a>
            </div>

            <div class="col-md-6 col-lg-3 text-center text-lg-start mb-5 mb-lg-0">
               <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Pages</h5>
               <ul class="list list-unstyled text-color-light">
                  <li class="mb-1"><a href="<?php echo e(route('landing')); ?>#home" class="link-hover-style-1 text-3"> Profil</a></li>
                  <li class="mb-1"><a href="<?php echo e(route('landing')); ?>#pelayanan" class="link-hover-style-1 text-3"> Pelayanan</a></li>
                  <li class="mb-1"><a href="<?php echo e(route('landing')); ?>#pembayaran" class="link-hover-style-1 text-3"> Pembayaran</a></li>
                  
                  <li class="mb-1"><a href="<?php echo e(route('landing')); ?>#kegiatan" class="link-hover-style-1 text-3"> Kegiatan</a></li>
                  <li class="mb-1"><a href="<?php echo e(route('landing')); ?>#ppid" class="link-hover-style-1 text-3"> Peraturan</a></li>
                  <li class="mb-1"><a href="<?php echo e(route('landing')); ?>#faq" class="link-hover-style-1 text-3"> FAQ</a></li>
                  
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
                  <?php $__currentLoopData = $data['sosial']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li class="social-icons-<?php echo e($item['title']); ?>"><a href="<?php echo e($item['url']); ?>" target="_blank" title="<?php echo e($item['title']); ?>"><i class="<?php echo e($item['icon']); ?>"></i></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/profile/kepalabadan.blade.php ENDPATH**/ ?>