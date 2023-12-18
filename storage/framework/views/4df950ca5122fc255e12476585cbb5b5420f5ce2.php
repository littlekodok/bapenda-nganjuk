<?php $__env->startSection('admincontent'); ?>
<header class="page-header">
   <h2>Halaman Terkait</h2>

   
</header>

<!-- start: page -->
<div class="row">
   <?php echo \helper::Alert($errors); ?>

   <section class="card m-0">
      <div class="card-body">
         <div class="card-body">
            <section class="card">
               <div class="card-body">
                  <a href="<?php echo e(route('terkait.create')); ?>" class="btn btn-success float-end"><i class="fa fa-plus"></i> Tambah</a>
               </div>
            </section>
            <div class="card">
               <div class="card-body">
                  <table id="tableterkait" class="table table-bordered" style="width:100%">
                     <thead>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Url</th>
                        <th>Logo</th>
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
                           <td>
                              <?php echo e($item['brand']); ?>

                              <br><small><?php echo e($item['caption']); ?></small>
                           </td>
                           <td><a href="<?php echo e($item['link']); ?>"><?php echo e($item['link']); ?></a></td>
                           <td class="text-center">
                              <img src="<?php echo e(Storage::url('public/img/').$item['img']); ?>" height="50" style="object-fit: contain">
                           </td>
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
                              <a href="<?php echo e(route('terkait.show',$item['id'])); ?>" title="Ubah" class="btn btn-small btn-warning"><i class="fa fa-edit"></i></a>
                              <a href="javascript:void(0);" onclick="confirmDelete('<?php echo e(route('terkait.destroy',$item['id'])); ?>')" title="Hapus" class="btn btn-small btn-danger"><i class="fa fa-trash"></i></a>
                           </td>
                        </tr> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
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
      $('#tableterkait').DataTable( {
         responsive: true,
         'rowsGroup': [1],
         bAutoWidth: false, 
         bFilter: false,
         "lengthChange": false,
         "columns": [
            { "width": "5%" },
            null,
            null,
            { "width": "15%" },
            { "width": "5%" },
            { "width": "10%" },
         ]
      });
      $('.isactive').on('click', function(){
         id = $(this).data('id');
         isactive = $('#isactiveval'+id).val();
         // console.log(id, isactive, $('#isactiveval'+id).val());
         $('#isactive'+id).html('<i class="fa fa-spinner fa-spin"></i>');
         $.ajax({
            url : '<?php echo e(route('terkait.isactive')); ?>',
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
      $('.nav-terkait').addClass('nav-active');
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/admin/terkait/terkait.blade.php ENDPATH**/ ?>