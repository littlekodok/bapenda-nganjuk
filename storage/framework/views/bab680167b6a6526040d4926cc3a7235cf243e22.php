<?php $__env->startSection('admincontent'); ?>
<header class="page-header">
   <h2><?php echo e(empty($data['id'])?'Buat':'Ubah'); ?> Pelayanan</h2>
</header>

<!-- start: page -->
<div class="row">
   <div class="col">
      <?php echo \helper::Alert($errors); ?>

      <section class="card card-modern card-big-info">
         <div class="card-body text-color-dark p-4">
               <form action="<?php echo e(empty($data['id'])?route('pelayanan.insert'):route('pelayanan.update')); ?>" method="post">
                  <?php echo csrf_field(); ?> <?php echo method_field('POST'); ?>
                  <div class="form-group col-6">
                     <input type="hidden" name="id" value="<?php echo e(!empty($data['id'])?$data['id']:''); ?>">
                     <label for="judul" class="font-weight-semibold"><i class="fa fa-keyboard"></i> Judul</label>
                     <input type="text" class="form-control" name="title" id="title"  									
							oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
							oninput="setCustomValidity('')"
							value="<?php echo e(!empty($data['id'])?$data['title']:''); ?>" required focused>
                  </div>
                  <div class="form-group col-6">
                     <label for="deskripsi_singkat" class="font-weight-semibold"><i class="fa fa-keyboard"></i> Deskripsi Singkat</label>
                     <input type="text" class="form-control" name="deskripsi_singkat"  									
							oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
							oninput="setCustomValidity('')"
							value="<?php echo e(!empty($data['id'])?$data['deskripsi_singkat']:''); ?>" required>
                  </div>
				  <div class="form-group col-6">
					<label for="link" class="font-weight-semibold"><i class="fa fa-keyboard"></i> Link Aplikasi</label>
					<input type="text" class="form-control" name="link"  									
						   oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
						   oninput="setCustomValidity('')"
						   value="<?php echo e(!empty($data['id'])?$data['link']:''); ?>" required>
				 </div>
                  
                  <div class="form-group col-6">
                        <label for="name" class="mb-2"><h4 class="m-0 p-0 font-weight-semibold text-dark"><i class="fa fa-keyboard"></i> &nbsp; Icon</h4></label>
                        <input type="text" class="form-control" value="<?php echo e(!empty($data['id'])?$data['icon']:''); ?>"  									
								oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
								oninput="setCustomValidity('')"
								id="linebg" required name="icon" placeholder="fas fa-user">
                        <small>Cari Icon di : <a href="https://fontawesome.com/v5/search?o=r&m=free" target="_blank">https://fontawesome.com/v5/search?o=r&m=free</a></small><br>
                        <small>Klik Icon yang dipilih copykan yang ada didalam tanda petik <code>&lt;i class="<span class="highlight">fas fa-user</span>"&gt;&lt;/i&gt;</code></small><br>
                        <small>Lalu copy paste (fas fa-user) di input <strong>Icon</strong></small>
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
	
			xhr.open( 'POST', "<?php echo e(route('pelayanan.upload', ['_token' => csrf_token() ])); ?>", true );
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
      //    placeolder: 'Type Here...',
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
      $("#title").focus();
   });
   $(function () {
      $('.nav-pelayanan').addClass('nav-active');
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/admin/pelayanan/insertPelayanan.blade.php ENDPATH**/ ?>