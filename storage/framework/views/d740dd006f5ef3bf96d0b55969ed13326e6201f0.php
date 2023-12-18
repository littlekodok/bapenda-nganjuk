<?php $__env->startSection('admincontent'); ?>
<header class="page-header">
   <h2>Halaman Social Media</h2>

   
</header>

<!-- start: page -->
<div class="row">
   <?php echo \helper::Alert($errors); ?>

   <section class="card m-0">
      <div class="card-body">
         <section class="card">
            <div class="card-body">
               <a href="<?php echo e(route('social.create')); ?>" class="btn btn-success float-end"><i class="fa fa-plus"></i> Tambah</a>
            </div>
         </section>
         <div class="card">
            <div class="card-body">
               <table id="tablesocial" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                     <th>No</th>
                     <th>Social Media</th>
                     <th>Icon</th>
                     <th>Url</th>
                     <th>Aktif</th>
                     <th>Aksi</th>
                  </thead>
                  <tbody>
                     <?php
                     $i = 1;
                     ?>
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                     <tr>
                        <td class="text-center"><?php echo e($i++); ?></td>
                        <td><?php echo e($item['title']); ?></td>
                        <td class="text-center"><span class="text-color-primary text-5"><i class="<?php echo e($item['icon']); ?>"></i></span></td>
                        <td><?php echo e($item['url']); ?></td>
                        <td class="text-center">
                           <a href="#" class="isactive" data-id="<?php echo e($item['id']); ?>" id="isactive<?php echo e($item['id']); ?>">
                              <?php if($item['isactive']==1): ?>
                                 <i class="fa fa-check text-success"></i>
                                 <input type="hidden" value="1" id="isactiveval<?php echo e($item['id']); ?>">
                              <?php elseif($item['isactive']==0): ?>
                                 <i class="fas fa-times text-danger"></i>
                                 <input type="hidden" value="0" id="isactiveval<?php echo e($item['id']); ?>">
                              <?php endif; ?>
                           </a>
                        </td>
                        <td class="text-center">
                           <a href="<?php echo e(route('social.show',$item['id'])); ?>" title="Ubah" class="btn btn-small btn-warning"><i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0);" onclick="confirmDelete('<?php echo e(route('social.destroy',$item['id'])); ?>')" title="Hapus" class="btn btn-small btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                     </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>
</div>
<div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Default Modal Title</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
         </div>
         <div class="modal-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus.</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- end: page -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
   $(document).ready(function () {
      $('#tablesocial').DataTable( {
         bAutoWidth: false, 
         bFilter: false,
         "lengthChange": false,
         "columns": [
            { "width": "5%" },
            null,
            { "width": "10%" },
            null,
            { "width": "5%" },
            { "width": "15%" },
         ]
      });
      $('.isactive').on('click', function(){
         id = $(this).data('id');
         isactive = $('#isactiveval'+id).val();
         // console.log(id, isactive, $('#isactiveval'+id).val());
         $('#isactive'+id).html('<i class="fa fa-spinner fa-spin"></i>');
         $.ajax({
            url : '<?php echo e(route('social.isactive')); ?>',
            data: {
               id: id, isactive: isactive
            },
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'JSON',
            success: function(data){
               // console.log(id, isactive, $('#isactive'+id).val());
               if(isactive=='1'){
                  $('#isactive'+id).html('<i class="fas fa-times text-danger"></i><input type="hidden" value="0" id="isactiveval'+id+'">');
               }else if(isactive=='0'){
                  $('#isactive'+id).html('<i class="fa fa-check text-success"></i><input type="hidden" value="1" id="isactiveval'+id+'">');
               }
               toastr.success(data.message);
            }
         });
      });

      
   });

   $(function () {
      $('.nav-social').addClass('nav-active');
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/admin/social/social.blade.php ENDPATH**/ ?>