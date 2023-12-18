<?php $__env->startSection('logincontent'); ?>
<div class="center-sign">
   <a href="/" class="logo float-left">
      <img src="<?php echo e(asset('img/logo-nganjuk-black.png')); ?>" height="70" />
   </a>
   
   <div class="panel card-sign mt-5">
      
      <div class="card-body">
         <div class="icon-login d-flex align-items-center justify-content-center">
            <span class=" fas fa-sign-in-alt"></span>
         </div>
         <h3 class="text-center">Login</h3>
         
         <form action="<?php echo e(route('login')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-3">
               <label>Email</label>
               <div class="input-group">
                  <span class="input-group-text">
                     <i class="bx bx-user text-4"></i>
                  </span>
                  <input name="email" type="email" class="form-control form-control-lg <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus />
                  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                     </span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
               </div>
            </div>

            <div class="form-group mb-3">
               <div class="clearfix">
                  <label class="float-left">Password</label>
                  
               </div>
               <div class="input-group">
                  <span class="input-group-text">
                     <i class="bx bx-lock text-4"></i>
                  </span>
                  <input id="password" name="password" type="password" class="form-control form-control-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required autocomplete="current-password" />
                  <div class="input-group-prepend">
                     <span class="input-group-text bi bi-eye" id="togglePassword"><i class="text-4">&nbsp;</i></span>
                  </div>
                  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <span class="invalid-feedback" role="alert">
                           <strong><?php echo e($message); ?></strong>
                     </span>
                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
               </div>
            </div>

            <div class="row">
               <div class="col-sm-8">
                  <div class="checkbox-custom checkbox-default">
                     <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>/>
                     <label for="RememberMe">Ingat Saya</label>
                  </div>
               </div>
               <div class="col-sm-4 text-end">
                  <button type="submit" class="btn mt-2" style="background-color: #21325b;color: #FFF;">Masuk</button>
               </div>
            </div>
         </form>
      </div>
   </div>

   <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2023. Bapenda Kabupaten Nganjuk.</p>
</div>
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
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../admin/layouts/loginapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/auth/login.blade.php ENDPATH**/ ?>