@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
	<h2>{{empty($data['id'])?'Buat':'Ubah'}} Pengumuman</h2>
</header>

<!-- start: page -->
<div class="row">
	<div class="col">
		{!!\helper::Alert($errors)!!}
		<section class="card card-modern card-big-info">
			<div class="card-body text-color-dark p-4">
				<form action="{{empty($data['id'])?route('pengumuman.insert'):route('pengumuman.update')}}" method="post" enctype="multipart/form-data">
					@csrf @method('POST')
					<div class="form-group mb-3 col-6">
						<input type="hidden" name="id" value="{{!empty($data['id'])?$data['id']:''}}">
						<label for="title" class="font-weight-semibold"><i class="fa fa-keyboard"></i> Judul</label>
						<input type="text" id="title" class="form-control" name="title"  									
						oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
						oninput="setCustomValidity('')"
						value="{{!empty($data['id'])?$data['title']:''}}" required>
					</div>
					<div class="form-group mb-3">
						<label for="description" class="font-weight-semibold"><i class="fa fa-keyboard"></i> Deskripsi</label>
						<label for="name" class="mb-2"> ukuran file maksimal 2 MB</label>
						<textarea class="form-control" name="description" id="description">{!! !empty($data['id'])?$data['description']:'' !!}</textarea>
						{{-- <input type="text" class="form-control" name="description" value="{{!empty($data['id'])?$data['description']:''}}" required> --}}
					</div>
					<div class="form-group col-8">
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
@endsection
@section('js')
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
	
			xhr.open( 'POST', "{{route('pengumuman.upload', ['_token' => csrf_token() ])}}", true );
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
<script type="text/javascript">
	$(document).ready(function () {
		
	});

	$(function () {
		$("#brand").focus();
		$('.nav-pengumuman').addClass('nav-active');
	});
</script>
@endsection