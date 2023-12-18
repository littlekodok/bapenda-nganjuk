<?php $__env->startSection('admincontent'); ?>
<header class="page-header">
   <h2>Halaman Akun</h2>

   
</header>

<!-- start: page -->
<div class="row">
   <section class="card m-0">
      <?php echo \helper::Alert($errors); ?>

      <div class="card-body">
         <div class="thumb-info mb-4">
            <img src="" class="rounded img-fluid" alt="John Doe">
            <div class="thumb-info-title">
               <span class="thumb-info-inner"><?php echo e($data['name']); ?></span>
               <span class="thumb-info-type">
                  <?php if($data['isAdmin']): ?>
                  Admin
                  <?php else: ?>
                  Operator
                  <?php endif; ?>
               </span>
            </div>
         </div>
         <form class="form-horizontal form-bordered" method="post">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <div class="form-group col-md-6">
               <input type="hidden" name="id" value="<?php echo e($data['id']); ?>">
               <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-user-circle"></i> &nbsp; Nama</h4></label>
               <input type="text" class="form-control" name="name" id="name" value="<?php echo e($data['name']); ?>"  									
               oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
               oninput="setCustomValidity('')"
               required>
            </div>
            <div class="form-group col-md-6">
               <label for="email"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-envelope"></i> &nbsp; Email</h4></label>
               <input type="email" class="form-control" name="email" id="email" value="<?php echo e($data['email']); ?>"  									
               oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
               oninput="setCustomValidity('')"
               required>
            </div>
            <div class="form-group col-md-6 row">
               <div class="col-6">
                  <h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-clock"></i> &nbsp; Dibuat tanggal</h4>
                  <p><?php echo e(\helper::dateFormat(date('d-m-Y', strtotime($data['created_at'])))); ?></p>
               </div>
               <div class="col-6">
                  <h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-clock"></i> &nbsp; Diubah tanggal</h4>
                  <?php if(empty($data['updated_at'])): ?>
                     <p>-</p>                      
                  <?php else: ?>
                     <p><?php echo e(\helper::dateFormat(date('d-m-Y', strtotime($data['created_at'])))); ?></p>
                  <?php endif; ?>
               </div>
            </div>
            <div class="form-group col-md-6">
               <label for="pasword"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-key"></i> &nbsp; Password</h4></label>
               <div class="input-group">
                  <input type="password" class="form-control" name="password" id="password">
                  <div class="input-group-prepend">
                     <span class="input-group-text bi bi-eye" id="togglePassword">&nbsp;</span>
                  </div>
               </div>
            </div>
            <div class="form-group col-md-6">
               <input type="submit" class="btn btn-info" value="Update">
            </div>
         </form>
      </div>
   </section>
</div>
<!-- end: page -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<style>
   .input-group-text{
      cursor: pointer;
      font-size: 18px;
   }
</style>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
$(function () {
   $("#togglePassword").click(function() {
         $(this).toggleClass("bi-eye bi-eye-slash");
         var input = $("#password");
         if (input.attr("type") == "password") {
            input.attr("type", "text");
         } else {
            input.attr("type", "password");
         }
      });
   $('.nav-account').addClass('nav-active');
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/admin/account.blade.php ENDPATH**/ ?>