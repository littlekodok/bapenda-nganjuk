<?php $__env->startSection('admincontent'); ?>
<header class="page-header">
   <h2><?php echo e(empty($data['id'])?'Buat':'Ubah'); ?> Operator</h2>
</header>

<!-- start: page -->
<div class="row">
   <div class="col">
      <?php echo \helper::Alert($errors); ?>

      <section class="card card-modern card-big-info">
         <div class="card-body text-color-dark p-4">
            <div class="col-6">
               <form action="<?php echo e(empty($data['id'])?route('user.insert'):route('user.update')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?> <?php echo method_field('POST'); ?>
                  <div class="form-group mb-3">
                  <div class="form-group col-md-6">
                     <input type="hidden" name="id" value="<?php echo e(!empty($data['id'])?$data['id']:''); ?>">
                     <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-user-circle"></i> &nbsp; Nama Lengkap</h4></label>
                     <input type="text" class="form-control" name="name" id="name" value="<?php echo e(empty($data['id'])?'':$data['name']); ?>"  									
                     oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                     oninput="setCustomValidity('')"
                     required>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="email"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-envelope"></i> &nbsp; Email</h4></label>
                     <input type="email" class="form-control" name="email" id="email" value="<?php echo e(empty($data['id'])?'':$data['email']); ?>"  									
                     oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                     oninput="setCustomValidity('')"
                     required>
                  </div>
                  <div class="form-group col-md-6 row">
                     <div class="col-6">
                        <h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-clock"></i> &nbsp; Dibuat tanggal</h4>
                        <?php if(empty($data['updated_at'])): ?>
                           <p>-</p>                      
                        <?php else: ?>
                           <p><?php echo e(\helper::dateFormat(date('d-m-Y', strtotime($data['created_at'])))); ?></p>
                        <?php endif; ?>
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
                        <input class="form-control" id="password" name="password" type="password"  									
                        oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                        oninput="setCustomValidity('')"
                        required/>
                        <div class="input-group-prepend">
                           <span class="input-group-text bi bi-eye" id="togglePassword">&nbsp;</span>
                        </div>
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="repasword"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-key"></i> &nbsp; re-Password</h4></label>
                     <div class="input-group">
                        <input class="form-control" id="repassword" name="repassword" type="password"  									
                        oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                        oninput="setCustomValidity('')"
                        required/>
                        <div class="input-group-prepend">
                           <span class="input-group-text bi bi-eye" id="toggleRepassword">&nbsp;</span>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
   </div>
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
      $("#toggleRepassword").click(function() {
         $(this).toggleClass("bi-eye bi-eye-slash");
         var input = $("#repassword");
         if (input.attr("type") == "password") {
            input.attr("type", "text");
         } else {
            input.attr("type", "password");
         }
      });

      $("#brand").focus();
      $('.nav-user').addClass('nav-active');
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/admin/user/insertUser.blade.php ENDPATH**/ ?>