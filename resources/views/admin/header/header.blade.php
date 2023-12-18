@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
   <h2>Halaman Header</h2>

   {{-- <div class="right-wrapper text-end">
      <ol class="breadcrumbs">
         <li>
            <a href="index.html">
               <i class="bx bx-home-alt"></i>
            </a>
         </li>

         <li><span>Layouts</span></li>

         <li><span>Sidebar Size SM</span></li>

      </ol>

      <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
   </div> --}}
</header>

<!-- start: page -->
<div class="row">
   {!!\helper::Alert($errors)!!}
{{--   <section class="card">--}}
{{--      <div class="card-body">--}}
{{--         <a href="{{route('header.create')}}" class="btn btn-success float-end"><i class="fa fa-plus"></i> Tambah</a>--}}
{{--      </div>--}}
{{--   </section>--}}
   <section class="card mb-3">
      <div class="card-body">
         <div class="row">
            <div class="bg-dark text-center col-12">
               <div class="p-4 text-color-light text-5 font-weight-bold appear-animation hone" data-appear-animation="fadeInDownShorter">
                  {{!empty($data['linefirst'])?$data['linefirst']:'INSPEKTORAT'}}
               </div>
            </div>
            <div class="col-12 mt-2">
               <a id="ubahone" href="#ubahtextone" onclick="ubah('one')" class="float-end font-weight-semibold text-color-secondary">ubah</a>
               <a id="cancelshowone" href="#ubahtextone" onclick="cancelshow('one')" class="float-end cancelshow font-weight-semibold">batal</a>
            </div>
            <div id="ubahtextone" class="ubah col-12">
               <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text Judul</h4></label>
               <div class="input-group mb-3">
                  <input type="text" class="form-control" value="{{!empty($data['linefirst'])?$data['linefirst']:''}}" id="textone" required>
                  @if(!empty($data))
                  <button id="btnone" class="btn btn-success" data-column="linefirst" type="button" onclick="update('one')">
                     <i class="fas fa-check"></i> Perbaharui
                  </button>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<div class="row">
   <section class="card m-0">
      <div class="card-body">
         <div class="row">
            <div class="bg-dark text-center col-12">
               <p class="htwo text-color-danger text-center font-weight-extra-bold text-lg-18 text-md-14-15 text-sm-13 text-xs-14 mb-4 mt-4 appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="500" data-plugin-options="{'startDelay': 500, 'minWindowWidth': 0}">
                  {{!empty($data['linesecondw'])?$data['linesecondw']:'KOTA'}} <span class="position-relative text-secondary">{{!empty($data['linesecondr'])?$data['linesecondr']:'SURAKARTA'}}</span>
               </p>
            </div>
            <div class="col-12 mt-2">
               <a id="ubahtwo" href="#ubahtexttwo" onclick="ubah('two')" class="float-end font-weight-semibold text-color-secondary">ubah</a>
               <a id="cancelshowtwo" href="#ubahtexttwo" onclick="cancelshow('two')" class="float-end cancelshow font-weight-semibold">batal</a>
            </div>
            <div id="ubahtexttwo" class="ubah col-12">
               <div class="form-group mb-1">
                  <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text Warna Merah</h4></label>
                  <input type="text" class="form-control" value="{{!empty($data['linesecondw'])?$data['linesecondw']:''}}" id="texttwow">
               </div>
               <div class="form-group mb-1">
                  <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text Warna Kuning</h4></label>
                  <input type="text" class="form-control" value="{{!empty($data['linesecondr'])?$data['linesecondr']:''}}" id="texttwor">
               </div>
               <div class="form-group mb-1">
                  @if(!empty($data))
                  <button id="btntwo" class="btn btn-success" data-column="linesecond" type="button" onclick="update('two')">
                     <i class="fas fa-check"></i> Perbaharui
                  </button>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<div class="row">
   <section class="card mb-3">
      <div class="card-body">
         <div class="row">
            <div class="bg-dark text-center col-12">
               <p class="hthree text-5 text-color-light font-weight-light opacity-7 text-center mt-4"  data-appear-animation="zoomInDown" data-plugin-options="{'startDelay': 1000,'minWindowWidth': 0, 'animationSpeed': 25}">{{!empty($data['linethrith'])?$data['linethrith']:'Smart, Integritas, Profesional'}}</p>
            </div>
            <div class="col-12 mt-2">
               <a id="ubahthree" href="#ubahtextthree" onclick="ubah('three')" class="float-end font-weight-semibold text-color-secondary">ubah</a>
               <a id="cancelshowthree" href="#ubahtextthree" onclick="cancelshow('three')" class="float-end cancelshow font-weight-semibold">batal</a>
            </div>
            <div id="ubahtextthree" class="ubah col-12">
               <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text Slogan</h4></label>
               <div class="input-group mb-3">
                  <input type="text" class="form-control" value="{{!empty($data['linethrith'])?$data['linethrith']:''}}" id="textthree">
                  @if(!empty($data))
                  <button id="btnthree" class="btn btn-success" data-column="linethrith" type="button" onclick="update('three')">
                     <i class="fas fa-check"></i> Perbaharui
                  </button>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<div class="row">
   <section class="card mb-3">
      <div class="card-body">
         <div class="row">
            <div class="col-12">
               <div class="hfour owl-item position-relative overlay overlay-show overlay-op-8 pt-5" style="background-image: url({{!empty($data['background'])?Storage::url('public/img/').$data['background']:asset('/img/herobg.jpeg')}}); background-size: contain; background-position: center; height: 300px; background-repeat: no-repeat;"></div>
            </div>
            <div class="col-12 mt-2">
               <a id="ubahfour" href="#ubahtextfour" onclick="ubah('four')" class="float-end font-weight-semibold text-color-primary">ubah</a>
               <a id="cancelshowfour" href="#ubahtextfour" onclick="cancelshow('four')" class="float-end cancelshow font-weight-semibold">batal</a>
            </div>
            <div id="ubahtextfour" class="ubah col-12">
               <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="far fa-image"></i> &nbsp; File Backgound</h4></label>
               <label for="name" class="mb-2 font-weight-semibold text-dark"> &nbsp; 1900x963  (ukuran file maksimal 2 MB)</label>
               <form action="{{route('header.updatebg')}}" method="POST" enctype="multipart/form-data" id="image-upload">
                  @csrf
                  <div class="input-group mb-3">
                     <input type="hidden" name="id" id="id" value="{{!empty($data) ? $data['id'] : '';}}">
                     <input type="file" class="form-control textfour" id="background" name="background">
                     @if(!empty($data))
                     <button id="btnfour" type="submit" class="btn btn-success" data-column="background">
                        <i class="fas fa-check"></i> Perbaharui
                     </button>
                     @endif
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>
</div>
<!-- end: page -->

@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
   $(document).ready(function () {
      $('.ubah').hide();
      $('.cancelshow').hide();
   });

   function ubah(target){
      $('.ubah').hide();
      $('#ubah'+target).hide();
      $('#ubahtext'+target).show();
      $('#cancelshow'+target).show();
      if (target=='two'){
         $('#text'+target+'w').focus();
      }else{
         $('#text'+target).focus();
      }
   }

   function cancelshow(target){
      $('.ubah').hide();
      $('#cancelshow'+target).hide();
      $('#ubah'+target).show();
   }

   function update(target){
      var id      = $('#id').val();
      var column  = $('#btn'+target).data('column');
      if (target=='two'){
         var text    = $('#text'+target+'w').val()+'_'+$('#text'+target+'r').val();
      }else{
         var text    = $('#text'+target).val();
      }
      $.ajax({
         url : '{{route('header.update')}}',
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
               window.location.href = "{{route('header.index')}}";
            }, 1500);
         }
      });
   }

   $(function () {
      $('.nav-header').addClass('nav-active');
   });
</script>
@endsection
