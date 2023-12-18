<?php $__env->startSection('admincontent'); ?>
<header class="page-header">
   <h2>Dashboard</h2>

   
</header>

<!-- start: page -->
<div class="row">
   <section class="card m-0">
      <?php echo \helper::Alert($errors); ?>

      <div class="card-body text-justify">
         <h1 >Selamat Datang di <strong style="color: #363062">Page Admin</strong>,</h1>
         <hr>
         <span class="text-6">Page ini digunakan admin website untuk mengatur atau mengisi content-content yang terdapat di halaman <strong style="color: #363062" >Website</strong> utama</span>
      </div>
   </section>
</div>
<!-- end: page -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
$(function () {
   $('.nav-dashboard').addClass('nav-active');
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>