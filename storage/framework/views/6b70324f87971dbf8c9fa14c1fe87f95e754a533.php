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
                           <img alt="Inspektorat Kota Surakarta" width="auto" height="40" src="<?php echo e(asset('img/logo-ska.png')); ?>">
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
                                    <a data-hash class="nav-link active text-2" href="<?php echo e(url('')); ?>">Home</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="<?php echo e(url('')); ?>#visimisi">Visi Misi</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="<?php echo e(url('')); ?>#kegiatan">Kegiatan</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="<?php echo e(url('')); ?>#pelayanan">Pelayanan</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="<?php echo e(url('')); ?>#ppid">PPID</a>
                                 </li>
                                 <li>
                                    <a class="nav-link text-2" data-hash data-hash-offset="0" data-hash-offset-lg="68" href="<?php echo e(url('survey')); ?>">Survey Kepuasan Masyarakat</a>
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
                  <iframe class="stream-element survey" marginheight="0" marginwidth="0" height="100%" width="100%" 
                     display="block" outline="none" margin="none" 
                     src="https://egov.phicos.co.id/surakarta/sop-surakarta/skm/instrumen/isi/46" scrolling="yes" seamless="yes" 
                     allowfullscreen="yes" frameborder="0"></iframe>
                  
               </div>
            </div>
         </div>
      </div>
   </div>

   <footer id="footer" class="border-0" style="background-image: url(<?php echo e(asset('img/footer.jpg')); ?>)">
      <div class="container py-4">
         <div class="row justify-content-md-center py-5 mt-3">
            <div class="col-md-12 col-lg-3 d-flex align-items-center justify-content-center justify-content-lg-start mb-5 mb-lg-0">
               <a href="#" class="text-center">
                  <img src="<?php echo e(asset('img/surakarta.png')); ?>" alt="Logo" class="img-fluid" style="max-width: 100px;">
                  <br><span class="text-color-light font-weight-extra-bold text-lg-5">Inspektorat Kota Surakarta</span>
               </a>
            </div>
            <div class="col-md-6 col-lg-3 text-center text-lg-start mb-5 mb-lg-0">
               <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Pages</h5>
               <ul class="list list-unstyled text-color-light">
                  <li class="mb-1"><a href="<?php echo e(url('')); ?>#visimisi" class="link-hover-style-1 text-3"> Visi Misi</a></li>
                  <li class="mb-1"><a href="<?php echo e(url('')); ?>#kegiatan" class="link-hover-style-1 text-3"> Kegiatan</a></li>
                  <li class="mb-1"><a href="<?php echo e(url('')); ?>#pelayanan" class="link-hover-style-1 text-3"> Pelayanan</a></li>
                  <li class="mb-1"><a href="<?php echo e(url('')); ?>#ppid" class="link-hover-style-1 text-3"> PPID</a></li>
                  <li class="mb-1"><a href="<?php echo e(url('survey')); ?>" class="link-hover-style-1 text-3"> Survey Kepuasan Masyarakat</a></li>
               </ul>
            </div>
            <div class="col-md-6 col-lg-3 text-center text-lg-start mb-5 mb-lg-0">
               <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Links</h5>
               <ul class="list list-unstyled text-color-light" >
                  <?php $__currentLoopData = $data['terkait']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="mb-1 text-3" title="<?php echo e($item['caption']); ?>"><a href="<?php echo e($item['link']); ?>" target="_blank" class="link-hover-style-1"> <?php echo e($item['brand']); ?></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </ul>
            </div>
            <div class="col-md-6 col-lg-3 text-center text-lg-start">
               <h5 class="text-5 text-transform-none font-weight-semibold text-color-light mb-4">Contact Us</h5>
                  <ul class="list list-icons list-icons-lg">
                     <li class="mb-1 text-3"><i class="fas fa-map-marker-alt text-color-primary"></i><p class="m-0">Jl. Adisucipto No. 139 Surakarta</p></li>
                     <li class="mb-1 text-3"><i class="fas fa-phone text-color-primary"></i><p class="m-0"><a href="tel:0271719653">(0271)719653 Fax. (0271)725149</a></p></li>
                     <li class="mb-1 text-3"><i class="far fa-envelope text-color-primary"></i><p class="m-0"><a href="mailto:inspektorat@surakarta.go.id">inspektorat@surakarta.go.id</a></p></li>
                  </ul>
                  <ul class="social-icons">                     
                  <?php $__currentLoopData = $data['sosial']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li class="social-icons-<?php echo e($item['title']); ?>"><a href="<?php echo e($item['url']); ?>" target="_blank" title="<?php echo e($item['title']); ?>"><i class="<?php echo e($item['icon']); ?>"></i></a></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
            </div>
         </div>
      </div>
      <div class="footer-copyright footer-copyright-style-2 bg-danger footer-top-light-border">
         <div class="container py-2">
            <div class="row py-4">
               <div class="col d-flex align-items-center justify-content-center mb-4 mb-lg-0">
                  <p class="text-light text-2">© Copyright 2022. Inspektorat Kota Surakarta</p>
               </div>
            </div>
         </div>
      </div>
   </footer>

</div>

<div class="aksesbility text-center text-6" style="color: white">
   <div><i class="fa fa-universal-access"></i></div>
   <div id="text-up" class="text-a mt-3"><i class='bx bx-sort-z-a'></i></div>
   <div id="text-down" class="text-a mt-4"><i class='bx bx-sort-a-z'></i></div>
   <div id="text-normal" class="text-a mt-3"><i class='bx bx-font'></i></i></div>
</div>

<div class="runningtext">
   <div class="runningtext-content text-3">
      <?php $__currentLoopData = $data['runningtext']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <img src="<?php echo e(asset('img/runningtext-ska-icon.png')); ?>" alt="pembatas icon">
         <?php echo e($item->title); ?> : <?php echo e($item->description); ?>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/survey.blade.php ENDPATH**/ ?>