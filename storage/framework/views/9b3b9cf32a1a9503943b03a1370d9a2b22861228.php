<?php $__env->startSection('admincontent'); ?>
<header class="page-header">
   <h2>Faq Page</h2>

   
</header>

<!-- start: page -->
<div class="row">
   <?php echo \helper::Alert($errors); ?>

   <section class="card m-0">
      <div class="card-body">
         <section class="card">
            <div class="card-body">
               <a href="<?php echo e(route('faq.create')); ?>" class="btn btn-success float-end"><i class="fa fa-plus"></i> Tambah</a>
            </div>
         </section>
         <div class="card">
            <div class="card-body">
               <table id="tablefaq" class="table table-striped table-bordered" style="width:100%">
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
                     <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                     <tr>
                        <td class="text-center"><?php echo e($i++); ?></td>
                        <td>
                           <?php echo e($item['title']); ?>

                           <br><small><i class="fa fa-clock"></i> <?php echo e(date('d-m-Y H:i:s', strtotime($item['publish_at']))); ?></small>
                           <input type="hidden" class="show<?php echo e($item['id']); ?>" value="0">
                        </td>
                        
                        <td class="text-center">
                           <a href="javascript:void(0);" data-id="<?php echo e($item['id']); ?>" title="Lihat" class="btn btn-small btn-info preview" onclick="showPreview(<?php echo e($item['id']); ?>)">
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
                           <a href="<?php echo e(route('faq.edit',$item['id'])); ?>" title="Ubah" class="btn btn-small btn-warning"><i class="fa fa-edit"></i></a>
                           
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
   $('#tablefaq').DataTable( {
      bAutoWidth: false, 
      bFilter: false,
      "lengthChange": false,
      "columns": [
         { "width": "5%" },
         null,
         { "width": "10%" },
         { "width": "15%" },
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
         url : '<?php echo e(route('faq.isactive')); ?>',
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

   $('.showall').on('click', function(){
      id = $(this).data('id');
      show = $('.show'+id).val();
      $.ajax({
         url : '<?php echo e(route('kegiatan.showberita')); ?>',
         data: {
            id: id, show: show
         },
         type: 'POST',
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         dataType: 'JSON',
         success: function(data){
            $('.content'+id).html(data.berita);
            if(show=='0'){
               $('#showall'+id).html('[showLess]');
               $('.show'+id).val('1');
            }else{
               $('#showall'+id).html('[showAll]');
               $('.show'+id).val('0');
            }
         }
      });
   });

   // $('#btn-preview').on('click', function(){
   //    // console.log('a')
   //    $('#preview').modal('show');
   //    $('#preview .modal-title').html('<i class="fa fa-spinner fa-spin"></i>');
   //    $('#preview .modal-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i></div>');
   //    id = $(this).data('id');
   //    $.ajax({
   //       url : "<?php echo e(route('faq.preview')); ?>",
   //       type: 'GET',
   //       data: {
   //          id: id
   //       },
   //       dataType: 'JSON',
   //       success: function(data){
   //          console.log(data)
   //          var my_date_format = function(input){
   //             var d = new Date(Date.parse(input.replace(/-/g, "/")));
   //             var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
   //             var date = d.getDate() + " " + month[d.getMonth()] + " " + d.getFullYear();
   //             return (date);  
   //          };
   //          $('#preview .modal-title').html(data.title);
   //          $('#preview .modal-body').html('<div class="p-3 row">'
   //                                           +'<div class="col-12"><small>'+my_date_format(data.publish_at)+'</small></div>'
   //                                           +'<div class="col-12">'+data.deskripsi+'</div>'
   //                                        +'</div>'
   //                                        );            
   //       }
   //    });
   // });
});

function showPreview(id){
   // console.log('a')
   $('#preview').modal('show');
      $('#preview .modal-title').html('<i class="fa fa-spinner fa-spin"></i>');
      $('#preview .modal-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i></div>');
      // id = $(this).data('id');
      $.ajax({
         url : "<?php echo e(route('faq.preview')); ?>",
         type: 'GET',
         data: {
            id: id
         },
         dataType: 'JSON',
         success: function(data){
            console.log(data)
            var my_date_format = function(input){
               var d = new Date(Date.parse(input.replace(/-/g, "/")));
               var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
               var date = d.getDate() + " " + month[d.getMonth()] + " " + d.getFullYear();
               return (date);  
            };
            $('#preview .modal-title').html(data.title);
            $('#preview .modal-body').html('<div class="p-3 row">'
                                             +'<div class="col-12"><small>'+my_date_format(data.publish_at)+'</small></div>'
                                             +'<div class="col-12">'+data.deskripsi+'</div>'
                                          +'</div>'
                                          );            
         }
      });
}

$(function () {
   $('.nav-kegiatan').addClass('nav-active');
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/admin/faq/faq.blade.php ENDPATH**/ ?>