@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
   <h2>{{empty($data['id'])?'Buat':'Ubah'}} PPID</h2>
</header>

<!-- start: page -->
<div class="row">
   <div class="col">
      {!!\helper::Alert($errors)!!}
      <section class="card card-modern card-big-info">
         <div class="card-body text-color-dark p-4">
            <form action="{{empty($data['id'])?route('ppid.insert'):route('ppid.update')}}" method="post" enctype="multipart/form-data">
               @csrf @method('POST')
               <div class="form-group mb-3 col-6">
                  <input type="hidden" name="id" value="{{!empty($data['id'])?$data['id']:''}}">
                  <label for="group" class="font-weight-semibold"><i class="fa fa-keyboard"></i> Group
                  </label>
                  {{-- <input id="group" type="text" class="form-control" name="group" required value="{{!empty($data['id'])?$data['group']:''}}"> --}}
						<select name="group" id="groups" class="form-control">
                     <option></option>
                     @foreach($group as $item)
                     <option {{!empty($data['id'])?($data['group']==$item->group?'selected':''):''}} value="{{$item->group}}">{{$item->group}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group mb-3 col-6">
                  <label for="title" class="font-weight-semibold"><i class="fa fa-keyboard"></i> SubGroup</label>
                  <input type="text" class="form-control" name="title" value="{{!empty($data['id'])?$data['title']:''}}">
               </div>
               <div class="form-group col-12">
                  <label for="description" class="font-weight-semibold"><i class="far fa-file-alt"></i> Deskripsi</label>
						<label for="name" class="mb-2"> ukuran file maksimal 2 MB</label>
                  <textarea id="description" name="description" class="form-contol">{!! !empty($data['id'])?$data['description']:'' !!}</textarea>
               </div>
               <div class="form-group col-6">
                  <label for="name" class="mb-2"><h4 class="m-0 p-0 font-weight-semibold text-dark"><i class="far fa-file-pdf"></i> &nbsp; File PDF</h4></label>
                  <label for="name" class="mb-2">Maximal 1Mb</label>
                  <input type="file" class="form-control" value="" name="pdf">
                  @if(!empty($data['file']))
                  <a href="{{ Storage::url('public/pdf/').$data['file'] }}" target="_blank" class="btn btn-warning mt-2"><i class="fa fa-file-pdf"></i><br>File</a>
                  @endif
               </div>
               <div class="form-group col-6">
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
	
			xhr.open( 'POST', "{{route('ppid.upload', ['_token' => csrf_token() ])}}", true );
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
      $('#groups').select2({
         placeholder: "Select Group",
         allowClear: true,
         tags: true
      });
      
      $("#group").focus();
   });
   $(function () {
      $('.nav-ppid').addClass('nav-active');
   });
</script>
@endsection