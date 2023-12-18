<?php $__env->startSection('admincontent'); ?>
<header class="page-header">
   <h2>Visi Misi - Halaman <?php echo e(empty($data['id'])?'Buat':'Ubah'); ?> Misi</h2>
</header>

<!-- start: page -->
<div class="row">
   <div class="col">
      <section class="card card-modern card-big-info">
         <div class="card-body text-color-dark p-4">
            <form action="<?php echo e(empty($data['id'])?route('misi.insert'):route('misi.update')); ?>" method="post">
               <?php echo csrf_field(); ?>  <?php echo method_field('POST'); ?>
               <div class="row col-6">
                  <div class="form-group col-lg-6 mb-3">
                     <input type="hidden" name="id" value="<?php echo e(!empty($data['id'])?$data['id']:''); ?>">
                     <label for="periode" class="font-weight-semibold"><i class="fa fa-calendar-alt"></i> Periode</label>
                     <div id="periode" class="input-group">
                        <?php
                        if(!empty($data['periode'])){
                           $expl = explode(' - ', $data['periode']);
                           $yearStart = $expl[0];
                           $yearEnd = $expl[1];
                        }else{
                           $yearStart = '';
                           $yearEnd = '';
                        }
                        ?>
                        <input type="text" class="form-control" id="periodeStart" name="yearStart" placeholder="tahun" 									
								oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
								oninput="setCustomValidity('')"
								 required value="<?php echo e($yearStart); ?>">
                        <span class="input-group-text">to</span>
                        <input type="text" class="form-control" name="yearEnd" placeholder="tahun"  									
								oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
								oninput="setCustomValidity('')"
								required value="<?php echo e($yearEnd); ?>">
                     </div>
                  </div>
               </div>
               <div class="form-group col-12">
                  <label for="misi" class="font-weight-semibold"><i class="far fa-file-alt"></i> Misi</label>
						<label for="name" class="mb-2"> ukuran file maksimal 2 MB</label>
                  
                  <textarea class="form-control" name="misi" id="description"><?php echo !empty($data['id'])?$data['description']:''; ?></textarea>
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
<script src="<?php echo e(asset('vendor/ckeditor5/build/ckeditor.js')); ?>"></script>

<script>
	class MyUploadAdapter {
		constructor( loader ) {
			this.loader = loader;
		}
	
		upload() {
			return this.loader.file
				.then( file => new Promise( ( resolve, reject ) => {
						this._initRequest();
						this._initListeners( resolve, reject, file );
						this._sendRequest( file );
				} ) );
		}
	
		abort() {
			if ( this.xhr ) {
				this.xhr.abort();
			}
		}
	
		_initRequest() {
			const xhr = this.xhr = new XMLHttpRequest();
	
			xhr.open( 'POST', "<?php echo e(route('misi.upload', ['_token' => csrf_token() ])); ?>", true );
			xhr.responseType = 'json';
		}
	
		_initListeners( resolve, reject, file ) {
			const xhr = this.xhr;
			const loader = this.loader;
			const genericErrorText = `Tidak dapat mengunggah foto: ${ file.name }.`;
	
			xhr.addEventListener( 'error', () => {
				const response = xhr.response;
				// console.log(xhr.response);
				if ( !response || response.error ) {
					reject( response && response.error ? (response.message ? response.message : response.error.message) : genericErrorText );
				}
			})
			xhr.addEventListener( 'abort', () => reject() );
			xhr.addEventListener( 'load', () => {
				const response = xhr.response;
				// console.log(xhr.response);
				if ( !response || response.error ) {
						return reject( response && response.error ? (response.message ? response.message : response.error.message) : genericErrorText );
				}
	
				resolve( response );
			} );
	
			if ( xhr.upload ) {
				xhr.upload.addEventListener( 'progress', evt => {
						if ( evt.lengthComputable ) {
							loader.uploadTotal = evt.total;
							loader.uploaded = evt.loaded;
						}
				} );
			}
		}
	
		_sendRequest( file ) {
			const data = new FormData();
	
			data.append( 'upload', file );
	
			this.xhr.send( data );
		}
	}
	
	function MyCustomUploadAdapterPlugin( editor ) {
		editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
			return new MyUploadAdapter( loader );
		};
	}
	
	ClassicEditor
		.create( document.querySelector( '#description' ), {
			extraPlugins: [ MyCustomUploadAdapterPlugin ],
			mediaEmbed: {
				previewsInData: true
			}
		} )
		.catch( error => {
			console.error( error );
		} );
</script>
<script>
   $(document).ready(function () {
      $('#periode input').datepicker({
         format: 'yyyy',
         viewMode: 'years', 
         minViewMode: 'years',
         autoclose: true
      }); 
      
      // $('#summernote').summernote({
      //    height: 250,
      //    shortcuts: false,
      //    toolbar: [
      //       ['style', ['bold', 'italic', 'underline']],
      //       ['para', ['ul', 'ol']],
      //       ['link', ['link']]
      //    ]
      // });
      // $('#summernote').summernote('justifyFull');
      // $('#summernote').summernote('lineHeight',1.2);
      
      // var content = <?php echo json_encode(!empty($data['id'])?$data['description']:''); ?>;
      // //set the content to summernote using `code` attribute.
      // $('#summernote').summernote('code', content);
      $("#periodeStart").focus();
   });
   $(function () {
      $('.nav-visimisi').addClass('nav-active');
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/admin/visimisi/misi.blade.php ENDPATH**/ ?>