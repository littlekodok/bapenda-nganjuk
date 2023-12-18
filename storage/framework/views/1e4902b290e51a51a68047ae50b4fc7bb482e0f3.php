<?php $__env->startSection('admincontent'); ?>
<header class="page-header">
   <h2>Halaman Profil</h2>
</header>

<!-- start: page -->
<div class="row">
   <div class="col">
      <?php echo \helper::Alert($errors); ?>

      <section class="card card-modern card-big-info">
         <div class="card-body">
            <div class="tabs-modern row" style="min-height: 490px;">
               <div class="col-lg-2-5 col-xl-1-5">
                  <div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link <?php echo e($from=='misi'?'':'active'); ?> text-success" id="visi-tab" data-bs-toggle="pill" data-bs-target="#visi" 
                           href="#visi" role="tab" aria-controls="visi" aria-selected="true">
                           <i class="fas fa-file-contract text-success"></i><span style="margin-left: 10px !important"> Kepala Badan</span>
                        </a>
                        <a class="nav-link <?php echo e($from=='misi'?'active':''); ?> text-primary" id="misi-tab" data-bs-toggle="pill" data-bs-target="#misi" 
                           href="#misi" role="tab" aria-controls="misi" aria-selected="false">
                           <i class="fas fa-file-alt text-primary"></i><span style="margin-left: 10px !important">Sekretariat</span>
                        </a>
                   </div>
               </div>
               <div class="col-lg-3-5 col-xl-4-5">
                  <div class="tab-content" id="tabContent">
                        <div class="tab-pane fade <?php echo e($from=='kepalabadan'?'':'show active'); ?>" id="kepalabadan" role="tabpanel" aria-labelledby="kepalabadan-tab">
                           <section class="card">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-6 bg-white">
                                       <h2 class="text-color-dark font-weight-bold p-0 m-0">Kepala Badan</h2>
                                    </div>
                                    <?php if(empty($kepalaBadan)): ?>
                                    <div class="col-6">
                                       <a href="<?php echo e(route('kepala-badan.create')); ?>" class="btn btn-success float-end"><i class="fa fa-plus"></i> Tambah</a>
                                    </div>
                                    <?php endif; ?>
                                 </div>
                              </div>
                              <hr>
                           </section>
                           <div class="card">
                              <div class="card-body">
                                 <table id="tablekepalabadan" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                       <th>No</th>
                                       <th>Periode</th>
                                       <th>Nama</th>
                                       <th>Deskripsi</th>
                                       <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $i = 1;
                                       ?>
                                       <?php $__currentLoopData = $kepalaBadan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                           
                                       <tr>
                                          <td class="text-center"><?php echo e($i++); ?></td>
                                          <td class="text-center"><?php echo e($item['periode']); ?></td>
                                          <td class="text-center text-capitalize"><?php echo e($item['nama']); ?></td>
                                          <td class="text-center">
                                             <a href="#" onclick="modalPreview(<?php echo e($item['id']); ?>);" title="Preview" class="btn btn-small btn-info preview">
                                                <i class="fa fa-search"></i>
                                             </a>
                                          </td>
                                          <td class="text-center">
                                             <a href="<?php echo e(route('kepala-badan.edit',$item['id'])); ?>" title="Ubah" class="btn btn-small btn-warning"><i class="fa fa-edit"></i></a>
                                             <a href="<?php echo e(route('misi.destroy',$item['id'])); ?>" title="Hapus" class="btn btn-small btn-danger"><i class="fa fa-trash"></i></a>
                                          </td>
                                       </tr>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade <?php echo e($from=='misi'?'show active':''); ?>" id="misi" role="tabpanel" aria-labelledby="misi-tab">
                           <section class="card">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-6 bg-white">
                                       <h2 class="text-color-dark font-weight-bold p-0 m-0">M i s i</h2>
                                    </div>
                                    <?php if(empty($visi)): ?>
                                    <div class="col-6">
                                       <a href="<?php echo e(route('misi.create')); ?>" class="btn btn-success float-end"><i class="fa fa-plus"></i> Tambah</a>
                                    </div>
                                    <?php endif; ?>
                                 </div>
                              </div>
                              <hr>
                           </section>
                           
                        </div>
                   </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</div>
<div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Default Modal Title</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
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
   $('.ubah').hide();
   $('.cancelshow').hide();

   $('#tablekepalabadan').DataTable( {
      bAutoWidth: false, 
      bFilter: false,
      "lengthChange": false,
      "columns": [
         { "width": "5%" },
         { "width": "15%" },
         null,
         { "width": "15%" },
      ]
   });

   // $('.preview').on('click', function(){
   //    $('#preview').modal('show');
   //    $('#preview .modal-title').html('<i class="fa fa-spinner fa-spin"></i>');
   //    $('#preview .modal-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i></div>');
   //    id = $(this).data('id');
   //    $.ajax({
   //       url : '/kepalabadan/'+id+'/preview',
   //       type: 'GET',
   //       dataType: 'JSON',
   //       success: function(data){
   //          $('#preview .modal-title').html('Periode '+data.periode);
   //          $('#preview .modal-body').html('<div class="p-3 row">'
   //                                           +'<div class="col-12">'+data.description+'</div>'
   //                                        +'</div>'
   //                                        );            
   //       }
   //    });
   // });
});

function modalPreview(id) {
   $('#preview').modal('show');
   $('#preview .modal-title').html('<i class="fa fa-spinner fa-spin"></i>');
   $('#preview .modal-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i></div>');
      $.ajax({
         url : '/kepalabadan/'+id+'/preview',
         type: 'GET',
         dataType: 'JSON',
         success: function(data){
            $('#preview .modal-title').html('Periode '+data.periode);
            $('#preview .modal-body').html('<div class="p-3 row">'
                                             +'<div class="text-center col-12"><img src="<?= Storage::url("public/img/kepalabadan/")?>'+data.foto+'" style="max-width: inherit;"></div>'
                                             + '<div class="text-center col-12 text-capitalize fw-bold"><h3>'+data.nama+'</h3></div>'
                                             +'<div class="col-12">'+data.description+'</div>'
                                             +'</div>'
                                          );            
         }
      });
}

function ubah(target){
   $('.ubah').hide();
   $('#ubah'+target).hide();
   $('#ubahtext'+target).show();
   $('#cancelshow'+target).show();
   $('#text'+target).focus();
}

function cancelshow(target){
   $('.ubah').hide();
   $('#cancelshow'+target).hide();
   $('#ubah'+target).show();
}

function update(target){
   var id      = $('#idvisi').val();
   var text    = $('#text'+target).val();
   var column  = $('#btn'+target).data('column');
   
   $.ajax({
      url : '<?php echo e(route('visi.update')); ?>',
      data: {
          id: id, text: text, column: column
        },
      type: 'POST',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      dataType: 'JSON',
      success: function(data){
         // console.log(id, text, column);
         $('#btn'+target).prop('disabled');
         $('#btn'+target).html('<i class="fa fa-spinner fa-spin"></i>');
         $('.h'+target).html('<i class="fa fa-spinner fa-spin"></i>');
         toastr.success(data.message);
         setTimeout(function(){
            window.location.href = "<?php echo e(route('visimisi.index')); ?>";
         }, 1500);
      }
   });
}

$(function () {
   $('.nav-visimisi').addClass('nav-active');
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/admin/profile/profile.blade.php ENDPATH**/ ?>