@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
   <h2>{{empty($data['id'])?'Buat':'Ubah'}} Terkait</h2>
</header>

<!-- start: page -->
<div class="row">
   <div class="col">
      {!!\helper::Alert($errors)!!}
      <section class="card card-modern card-big-info">
         <div class="card-body text-color-dark p-4">
            <div class="col-6">
               <form action="{{empty($data['id'])?route('terkait.insert'):route('terkait.update')}}" method="post" enctype="multipart/form-data">
                  @csrf @method('POST')
                  <div class="form-group mb-3">
                     <input type="hidden" name="id" value="{{!empty($data['id'])?$data['id']:''}}">
                     <label for="brand" class="font-weight-semibold"><i class="fa fa-keyboard"></i> Judul</label>
                     <input type="text" id="brand" class="form-control" name="brand"  									
                     oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                     oninput="setCustomValidity('')"
                     value="{{!empty($data['id'])?$data['brand']:''}}" required>
                  </div>
                  <div class="form-group mb-3">
                     <label for="caption" class="font-weight-semibold"><i class="fa fa-keyboard"></i> Keterangan</label>
                     <input type="text" class="form-control" name="caption"  									
                     oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                     oninput="setCustomValidity('')"
                     value="{{!empty($data['id'])?$data['caption']:''}}" required>
                  </div>
                  <div class="form-group mb-3">
                     <label for="link" class="font-weight-semibold"><i class="fa fa-keyboard"></i> URL</label>
                     <input type="text" class="form-control" name="link"  									
                     oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                     oninput="setCustomValidity('')"
                     value="{{!empty($data['id'])?$data['link']:''}}" required>
                  </div>
                  <div class="form-group">
                     <label for="name" class="mb-2"><h4 class="m-0 p-0 font-weight-semibold text-dark"><i class="far fa-image"></i> &nbsp; File Logo</h4></label>
                     <label for="name" class="mb-2">390x73 (max 1 MB)</label>
                     <input type="file" class="form-control" name="img">
                     @if(!empty($data['img']))
                     <img class="mt-3 mb-4" src="{{ Storage::url('public/img/').$data['img'] }}" height="50" style="object-fit: contain">
                     @endif
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
   </div>
</div>
<!-- end: page -->

@endsection
@section('css')
@endsection
@section('js')
<script>
   $(function () {
      $("#brand").focus();
      $('.nav-terkait').addClass('nav-active');
   });
</script>
@endsection