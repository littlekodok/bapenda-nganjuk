@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
   <h2>{{empty($data['id'])?'Buat':'Ubah'}} Running Text</h2>
</header>

<!-- start: page -->
<div class="row">
   <div class="col">
      {!!\helper::Alert($errors)!!}
      <section class="card card-modern card-big-info">
         <div class="card-body text-color-dark p-4">
            <div class="col-6">
               <form action="{{empty($data['id'])?route('runningtext.insert'):route('runningtext.update')}}" method="post" enctype="multipart/form-data">
                  @csrf @method('POST')
                  <div class="form-group mb-3">
                     <input type="hidden" name="id" value="{{!empty($data['id'])?$data['id']:''}}">
                     <label for="title" class="font-weight-semibold"><i class="fa fa-keyboard"></i> Judul</label>
                     <input type="text" id="title" class="form-control" name="title"  									
                     oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                     oninput="setCustomValidity('')"
                     value="{{!empty($data['id'])?$data['title']:''}}" required>
                  </div>
                  <div class="form-group mb-3">
                     <label for="description" class="font-weight-semibold"><i class="fa fa-keyboard"></i> Deskripsi</label>
                     <input type="text" class="form-control" name="description"  									
                     oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                     oninput="setCustomValidity('')"
                     value="{{!empty($data['id'])?$data['description']:''}}" required>
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
      $('.nav-runningtext').addClass('nav-active');
   });
</script>
@endsection