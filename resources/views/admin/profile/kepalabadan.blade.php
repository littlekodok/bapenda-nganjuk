@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
   <h2>{{empty($data['id'])?'Buat':'Ubah'}}  Kepala Badan</h2>
</header>

<!-- start: page -->
<div class="row">
   <div class="col">
      {!!\helper::Alert($errors)!!}
      <section class="card card-modern card-big-info">
         <div class="card-body text-color-dark p-4">
               <form action="{{empty($data['id'])?route('kepala-badan.insert'):route('kepala-badan.update')}}" method="post" enctype="multipart/form-data">
                  @csrf @method('POST')
				  <div class="row col-6">
					
                        <div class="form-group col-lg-6 mb-3">
                            <input type="hidden" name="id" value="{{!empty($data['id'])?$data['id']:''}}">
                            <label for="periode" class="font-weight-semibold"><i class="fa fa-calendar-alt"></i> Periode</label>
                            <div id="periode" class="input-group">
                                @php
                                if(!empty($data['periode'])){
                                $expl = explode(' - ', $data['periode']);
                                $yearStart = $expl[0];
                                $yearEnd = $expl[1];
                                }else{
                                $yearStart = '';
                                $yearEnd = '';
                                }
                                @endphp
                                <input type="text" class="form-control" id="periodeStart" name="yearStart" placeholder="tahun" 									
                                        oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                                        oninput="setCustomValidity('')"
                                        required value="{{$yearStart}}">
                                <span class="input-group-text">to</span>
                                <input type="text" class="form-control" name="yearEnd" placeholder="tahun"  									
                                        oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                                        oninput="setCustomValidity('')"
                                        required value="{{$yearEnd}}">
                            </div>
                        </div>
                    
				  </div>
                  <div class="row col-6">
                     <div class="form-group mb-3">
                        <input type="hidden" name="id" value="{{!empty($data['id'])?$data['id']:''}}">
                        <label for="nama" class="font-weight-semibold"><i class="fa fa-keyboard"></i> Nama Kepala Badan</label>
                        <input id="title" type="text" class="form-control" name="nama" required  									
								oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
								oninput="setCustomValidity('')"
								value="{{!empty($data['id'])?$data['nama']:''}}">
                     </div>
                  </div>
                  <div class="form-group col-12">
                     <label for="description" class="font-weight-semibold"><i class="far fa-file-alt"></i> Deskripsi</label>
							<label for="description" class="mb-2"> ukuran file maksimal 2 MB</label>
                     <textarea id="description" name="description" class="form-contol">{!! !empty($data['id'])?$data['description']:'' !!}</textarea>
                  </div>
                  <div class="form-group col-6">
                        <label for="name" class="mb-2"><h4 class="m-0 p-0 font-weight-semibold text-dark"><i class="far fa-image"></i> &nbsp; File Foto</h4></label>
                        <label for="name" class="mb-2">1280x720 (ukuran file maksimal 2 MB)</label>
                        <input type="file" class="form-control" name="foto">
                        @if(!empty($data['foto']))
                        <img class="mt-3 mb-4" src="{{ Storage::url('public/img/kepalabadan/').$data['foto'] }}" height="50" style="object-fit: contain">
                        @endif
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

@endsection
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('vendor/ckeditor5/build/ckeditor.js') }}"></script>
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
	
			xhr.open( 'POST', "{{route('kegiatan.upload', ['_token' => csrf_token() ])}}", true );
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
		} )
		.catch( error => {
			console.error( error );
		} );
</script>
<script>
   $(document).ready(function () {		
		$('#publish').datepicker({
			format: 'dd-mm-yyyy',
         autoclose: true
		});

      $('#periode input').datepicker({
         format: 'yyyy',
         viewMode: 'years', 
         minViewMode: 'years',
         autoclose: true
      }); 
      
      $("#title").focus();
   });
   $(function () {
      $('.nav-kegiatan').addClass('nav-active');
   });
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
      
      // var content = {!! json_encode(!empty($data['id'])?$data['description']:'') !!};
      // //set the content to summernote using `code` attribute.
      // $('#summernote').summernote('code', content);
      $("#periodeStart").focus();
   });
</script>
@endsection