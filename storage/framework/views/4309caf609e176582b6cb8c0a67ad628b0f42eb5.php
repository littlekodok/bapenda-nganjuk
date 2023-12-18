<?php $__env->startSection('admincontent'); ?>
<header class="page-header">
   <h2>Page Header Create</h2>
</header>

<!-- start: page -->
<div class="row">
   <div class="col">
      <section class="card card-modern card-big-info">
         <div class="card-body text-color-dark p-4">
            <form action="<?php echo e(route('header.insert')); ?>" method="post" enctype="multipart/form-data">
               <?php echo csrf_field(); ?> <?php echo method_field('POST'); ?>
               <div class="row">
                  <div class="form-group col-lg-12 mb-3">
                     <div class="row">
                        <section class="card mb-2 col-lg-6 col-sm-12">
                           <div class="card-body">
                              <div class="bg-dark text-center col-12">
                                 <div class="p-4 text-color-light text-5 font-weight-bold appear-animation" data-appear-animation="fadeInDownShorter">
                                    INSPEKTORAT
                                 </div>
                              </div>
                              <div id="ubahlinefirst mt-3 col-12">
                                 <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text Judul</h4></label>
                                 <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="" id="linefirst" required name="text_judul">                                    
                                 </div>
                              </div>
                           </div>
                        </section>
                        <section class="card mb-2 col-lg-6 col-sm-12 m-0">
                           <div class="card-body">
                              <div class="bg-dark text-center col-12">
                                 <div class="p-4 text-color-light  text-5 font-weight-bold appear-animation" data-appear-animation="blurIn">
                                    KOTA <span class="position-relative text-danger">SURAKARTA</span>
                                 </div>
                              </div>
                              <div id="ubahlinesecond col-12">
                                 <div class="row">
                                    <div class="form-group mb-1 col-lg-6 col-sm-12">
                                       <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text Warna Putih</h4></label>
                                       <input type="text" class="form-control" value="" id="linesecondw" required name="text_putih">
                                    </div>
                                    <div class="form-group mb-1 col-lg-6 col-sm-12 m-0 p-0">
                                       <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text Warna Merah</h4></label>
                                       <input type="text" class="form-control" value="" id="linesecondr" required name="text_merah">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </section>
                        <section class="card mb-2 col-lg-6 col-sm-12">
                           <div class="card-body text-color-dark font-weight-bold">
                              <div class="p-4 bg-dark text-center col-12">
                                 <p class="text-5 text-color-light font-weight-light opacity-7 text-center mt-4"  data-appear-animation="zoomInDown" data-plugin-options="{'startDelay': 1000,'minWindowWidth': 0, 'animationSpeed': 25}">Smart, Integritas, Profesional</p>
                              </div>
                              <div id="ubahlinetrirth mt-3 col-12">
                                 <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text Slogan</h4></label>
                                 <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="" id="linetrirth" required name="text_slogan">
                                 </div>
                              </div>
                           </div>
                        </section>
                        <section class="card mb-2 col-lg-6 col-sm-12">
                           <div class="card-body text-color-dark font-weight-bold">
                              <label for="name" class="mb-2"><h4 class="m-0 p-0 font-weight-semibold text-dark"><i class="far fa-image"></i> &nbsp; Photo Background</h4></label>
                              <label for="name" class="mb-2 font-weight-semibold text-dark"> &nbsp; 1900x963 (ukuran file maksimal 2 MB)</label>
                              <div class="input-group mb-3">
                                 <input type="file" class="form-control" value="" id="linebg" required name="background">
                              </div>
                           </div>
                        </section>
                     </div>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-success float-end"><i class="fa fa-check"></i> Simpan</button>
                  </div>
               </div>
            </form>
         </div>
      </section>
   </div>
</div>
<!-- end: page -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
   $(document).ready(function () {
   });
   $(function () {
      $('.nav-header').addClass('nav-active');
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/admin/header/insertHeader.blade.php ENDPATH**/ ?>