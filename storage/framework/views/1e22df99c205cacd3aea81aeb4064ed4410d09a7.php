<?php $__env->startSection('admincontent'); ?>
<header class="page-header">
   <h2>Halaman Pengumuman</h2>

   
</header>

<!-- start: page -->
<div class="row">
   <?php echo \helper::Alert($errors); ?>

   <section class="card">
      <div class="card-body">
         <h3> 
            <strong style="color: black; padding-right:30px"> Tampilkan Pengumuman </strong>
            <input id="chkToggle" type="checkbox" onchange="changeMaster(<?php echo e($data['master']['id']); ?>)" data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
         </h3>
         <input type="hidden" id="masterval" value="<?php echo e($data['master']['isactive']); ?>">
      </div>
   </section>
   <hr>
   <section class="card m-0">
      <div class="card-body">
         <div class="card-body">
            <section class="card">
               <div class="card-body">
                  <a href="<?php echo e(route('pengumuman.create')); ?>" class="btn btn-success float-end"><i class="fa fa-plus"></i> Tambah</a>
               </div>
            </section>
            <div class="card">
               <div class="card-body">
                  <table id="tablepengumuman" class="table table-bordered" style="width:100%">
                     <thead>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aktif</th>
                        <th>Aksi</th>
                     </thead>
                     <tbody>
                        <?php
                        $i = 1;
                        ?>
                        <?php $__currentLoopData = $data['pengumuman']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <tr>
                           <td class="text-center"><?php echo e($i++); ?></td>
                           <td><?php echo e($item['title']); ?></td>
                           <td class="text-center">
                              <a href="javascript:void(0);" data-id="<?php echo e($item['id']); ?>" title="Preview" class="btn btn-small btn-info preview">
                                 <i class="fa fa-search"></i>
                              </a>
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
                              <a href="<?php echo e(route('pengumuman.show',$item['id'])); ?>" title="Ubah" class="btn btn-small btn-warning"><i class="fa fa-edit"></i></a>
                              <a href="javascript:void(0);" onclick="confirmDelete('<?php echo e(route('pengumuman.destroy',$item['id'])); ?>')" title="Hapus" class="btn btn-small btn-danger"><i class="fa fa-trash"></i></a>
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
   <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script>
      $(document).ready(function () {
         var mpv = $('#masterval').val();
         if (mpv == 1){       
            $('#chkToggle').prop('checked', true);
         }
      })
   </script>
   <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
   <script>
      $(document).ready(function () {
         $('#chkToggle').bootstrapToggle();

         $('#tablepengumuman').DataTable();
         $('.isactive').on('click', function(){
            id = $(this).data('id');
            isactive = $('#isactiveval'+id).val();
            // console.log(id, isactive, $('#isactiveval'+id).val());
            $('#isactive'+id).html('<i class="fa fa-spinner fa-spin"></i>');
            $.ajax({
               url : '<?php echo e(route('pengumuman.isactive')); ?>',
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

         $('.preview').on('click', function(){
            $('#preview').modal('show');
            $('#preview .modal-title').html('<i class="fa fa-spinner fa-spin"></i>');
            $('#preview .modal-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i></div>');
            id = $(this).data('id');
            $.ajax({
               url : '/pengumuman/'+id+'/preview',
               type: 'GET',
               dataType: 'JSON',
               success: function(data){
                  $('#preview .modal-title').html(data.title);
                  $('#preview .modal-body').html('<div class="p-3 row">'
                                                   +'<div class="col-12">'+data.description+'</div>'
                                                +'</div>'
                                                );            
               }
            });
         });
      });

      function changeMaster(id){
         var isactive = $('#masterval').val();
         $.ajax({
            url : '<?php echo e(route('masterpengumuman.isactive')); ?>',
            data: {
               id: id, isactive: isactive
            },
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'JSON',
            success: function(data){
               // console.log(id, isactive, $('#isactive'+id).val());
               if(isactive=='1'){
                  // $('#chkToggle').attr('checked');
                  $('#masterval').val(0);
               }else if(isactive=='0'){
                  // $('#chkToggle').removeAttr('checked');
                  $('#masterval').val(1);
               }
               toastr.success(data.message);
            }
         });
      }

      $(function () {
         $('.nav-pengumuman').addClass('nav-active');
      });
   </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/admin/pengumuman/pengumuman.blade.php ENDPATH**/ ?>