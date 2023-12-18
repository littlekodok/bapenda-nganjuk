<?php $__env->startSection('admincontent'); ?>
<header class="page-header">
   <h2><?php echo e(empty($data['id'])?'Buat':'Ubah'); ?> Social Media</h2>
</header>

<!-- start: page -->
<div class="row">
   <div class="col">
      <?php echo \helper::Alert($errors); ?>

      <section class="card card-modern card-big-info">
         <div class="card-body text-color-dark p-4">
               <form action="<?php echo e(empty($data['id'])?route('social.insert'):route('social.update')); ?>" method="post">
                  <?php echo csrf_field(); ?> <?php echo method_field('POST'); ?>
                  <div class="form-group col-6">
                     <input type="hidden" name="id" value="<?php echo e(!empty($data['id'])?$data['id']:''); ?>">
                     <label for="judul" class="font-weight-semibold"><i class="fa fa-keyboard"></i> Social Media</label>
                     <select class="form-control col-8" id="title" name="title">
                        <option value=""></option>
                        <option  <?php if(!empty($data['id'])): ?>
                                 <?php if($data['title']=='instagram'): ?>
                                    <?php echo e('selected="selected"'); ?>

                                 <?php endif; ?>
                                 <?php endif; ?>
                                 value="instagram">Instagram</option>
                        <option  <?php if(!empty($data['id'])): ?>
                                 <?php if($data['title']=='facebook'): ?>
                                    <?php echo e('selected="selected"'); ?>

                                 <?php endif; ?>
                                 <?php endif; ?>
                                  value="facebook">Facebook</option>
                        <option  <?php if(!empty($data['id'])): ?>
                                 <?php if($data['title']=='twitter'): ?>
                                    <?php echo e('selected="selected"'); ?>

                                 <?php endif; ?>
                                 <?php endif; ?>
                                 value="twitter">Twitter</option>
                        <option  <?php if(!empty($data['id'])): ?>
                                 <?php if($data['title']=='youtube'): ?>
                                    <?php echo e('selected="selected"'); ?>

                                 <?php endif; ?>
                                 <?php endif; ?>
                                 value="youtube">Youtube</option>
                        <option  <?php if(!empty($data['id'])): ?>
                                 <?php if($data['title']=='tiktok'): ?>
                                    <?php echo e('selected="selected"'); ?>

                                 <?php endif; ?>
                                 <?php endif; ?>
                                 value="tiktok">Tiktok</option>
                        <option  <?php if(!empty($data['id'])): ?>
                                 <?php if($data['title']=='whatsapp'): ?>
                                    <?php echo e('selected="selected"'); ?>

                                 <?php endif; ?>
                                 <?php endif; ?>
                                  value="whatsapp">Whatsapp</option>
                        <option  <?php if(!empty($data['id'])): ?>
                                 <?php if($data['title']=='telegram'): ?>
                                    <?php echo e('selected="selected"'); ?>

                                 <?php endif; ?>
                                 <?php endif; ?>
                                  value="telegram">Telegram</option>
                     </select>
                  </div>
                  <div class="form-group col-6">
                     <label for="url" class="font-weight-semibold"><i class="fa fa-keyboard"></i> Url</label>
                     <input type="text" class="form-control" name="url"  									
							oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
							oninput="setCustomValidity('')"
							value="<?php echo e(!empty($data['id'])?$data['url']:''); ?>" required>
                     <small>Isi url diharuskan lengkap seperti : https://google.com, agar bisa dibaca oleh sistem</small><br>
                  </div>
                  <div class="form-group col-6">
                     <label for="name" class="font-weight-semibol"><i class="fa fa-keyboard"></i> Icon</label>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text p-2" id="toggleRepassword">                              
                              &nbsp;<i id="fa-icon" class="<?php echo e(!empty($data['id'])?$data['icon']:''); ?>"></i>&nbsp;
                           </span>
                        </div>
                        <input type="text" class="form-control" value="<?php echo e(!empty($data['id'])?$data['icon']:''); ?>"
                        id="icon" name="icon" readonly placeholder="fas fa-user">
                     </div>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                  </div>
               </form>
         </div>
      </section>
   </div>
</div>
<!-- end: page -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script>
   $(document).ready(function () {
      $("#title").focus();
      $("#title").select2({
         placeholder: 'Pilih/Tambah Social Media'
      });

      $("#title").change(function(){
         if ($(this).val() == 'instagram'){
            $("#icon").val('fab fa-instagram');
            $("#fa-icon").removeClass();
            $("#fa-icon").addClass('fab fa-instagram');
         }else if ($(this).val() == 'facebook'){
            $("#icon").val('fab fa-facebook-f');
            $("#fa-icon").removeClass();
            $("#fa-icon").addClass('fab fa-facebook-f');
         }else if ($(this).val() == 'twitter'){
            $("#icon").val('fab fa-twitter');
            $("#fa-icon").removeClass();
            $("#fa-icon").addClass('fab fa-twitter');
         }else if ($(this).val() == 'youtube'){
            $("#icon").val('fab fa-youtube');
            $("#fa-icon").removeClass();
            $("#fa-icon").addClass('fab fa-youtube');
         }else if ($(this).val() == 'tiktok'){
            $("#icon").val('fab fa-tiktok');
            $("#fa-icon").removeClass();
            $("#fa-icon").addClass('fab fa-tiktok');
         }else if ($(this).val() == 'whatsapp'){
            $("#icon").val('fab fa-whatsapp');
            $("#fa-icon").removeClass();
            $("#fa-icon").addClass('fab fa-whatsapp');
         }else if ($(this).val() == 'telegram'){
            $("#icon").val('fab fa-telegram');
            $("#fa-icon").removeClass();
            $("#fa-icon").addClass('fab fa-telegram');
         }
         $("#url").focus();
      });
   });
   $(function () {
      $('.nav-social').addClass('nav-active');
   });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin/layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/admin/social/insertSocial.blade.php ENDPATH**/ ?>