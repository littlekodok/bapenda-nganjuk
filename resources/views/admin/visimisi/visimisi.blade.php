@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
   <h2>Halaman Visi Misi</h2>
</header>

<!-- start: page -->
<div class="row">
   <div class="col">
      {!!\helper::Alert($errors)!!}
      <section class="card card-modern card-big-info">
         <div class="card-body">
            <div class="tabs-modern row" style="min-height: 490px;">
               <div class="col-lg-2-5 col-xl-1-5">
                  <div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link {{$from=='misi'?'':'active'}} text-success" id="visi-tab" data-bs-toggle="pill" data-bs-target="#visi" 
                           href="#visi" role="tab" aria-controls="visi" aria-selected="true">
                           <i class="fas fa-file-contract text-success"></i><span style="margin-left: 10px !important"> Visi</span>
                        </a>
                        <a class="nav-link {{$from=='misi'?'active':''}} text-primary" id="misi-tab" data-bs-toggle="pill" data-bs-target="#misi" 
                           href="#misi" role="tab" aria-controls="misi" aria-selected="false">
                           <i class="fas fa-file-alt text-primary"></i><span style="margin-left: 10px !important"> Misi</span>
                        </a>
                   </div>
               </div>
               <div class="col-lg-3-5 col-xl-4-5">
                  <div class="tab-content" id="tabContent">
                        <div class="tab-pane fade {{$from=='misi'?'':'show active'}}" id="visi" role="tabpanel" aria-labelledby="visi-tab">
                           <input type="hidden" id="idvisi" value="{{!empty($visi) ? $visi['id'] : '';}}">
                           <section class="card">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-6 bg-white">
                                       <h2 class="text-color-dark font-weight-bold p-0 m-0">V i s i</h2>
                                    </div>
                                    @if (empty($visi))
                                    <div class="col-6">
                                       <a href="{{route('visi.create')}}" class="btn btn-success float-end"><i class="fa fa-plus"></i> Tambah</a>
                                    </div>                                        
                                    @endif
                                 </div>
                              </div>
                              <hr>
                           </section>
                           <section class="card mb-4">
                              <div class="card-body text-color-dark font-weight-bold">
                                 <h3 class="font-weight-bold m-none hone">
                                    {{!empty($visi['textfirst'])?$visi['textfirst']:'Mewujudkan'}}
                                 </h3>
                                 <div class="card-actions">
                                    <a id="ubahone" href="#" onclick="ubah('one')" class="font-weight-semibold text-color-primary">ubah</a>
                                    <a id="cancelshowone" href="#" onclick="cancelshow('one')" class="cancelshow font-weight-semibold">batal</a>
                                 </div>
                              </div>
                              <div class="card-body p-3" style="background-color: #ecedf0">
                                 <div id="ubahtextone" class="ubah mt-3 col-12">
                                    <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text</h4></label>
                                    <div class="input-group mb-3">
                                       <input type="text" class="form-control" value="{{!empty($visi['textfirst'])?$visi['textfirst']:''}}"  									
                                       oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                                       oninput="setCustomValidity('')"
                                       id="textone" required>
                                       @if(!empty($visi['id']))
                                       <button id="btnone" class="btn btn-success" data-column="textfirst" type="button" onclick="update('one')">
                                          <i class="fas fa-check"></i> Perbaharui
                                       </button>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </section>
                           <section class="card mb-4">
                              <div class="card-body text-color-dark font-weight-bold">
                                 <h3 class="font-weight-bold m-none htwo">
                                    <span class="alternative-font">{{!empty($visi['textalternative'])?$visi['textalternative']:'Surakarta'}}</span>
                                 </h3>
                                 <div class="card-actions">
                                    <a id="ubahtwo" href="#" onclick="ubah('two')" class="font-weight-semibold text-color-primary">ubah</a>
                                    <a id="cancelshowtwo" href="#" onclick="cancelshow('two')" class="cancelshow font-weight-semibold">batal</a>
                                 </div>
                              </div>
                              <div class="card-body p-3" style="background-color: #ecedf0">
                                 <div id="ubahtexttwo" class="ubah mt-3 col-12">
                                    <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text</h4></label>
                                    <div class="input-group mb-3">
                                       <input type="text" class="form-control" value="{{!empty($visi['textalternative'])?$visi['textalternative']:''}}" 									
                                       oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                                       oninput="setCustomValidity('')"
                                        id="texttwo" required>
                                       @if(!empty($visi['id']))
                                       <button id="btntwo" class="btn btn-success" data-column="textalternative" type="button" onclick="update('two')">
                                          <i class="fas fa-check"></i> Perbaharui
                                       </button>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </section>
                           <section class="card mb-4">
                              <div class="card-body text-color-dark font-weight-bold">
                                 <h3 class="font-weight-bold m-none hthree">
                                    {{!empty($visi['textsecond'])?$visi['textsecond']:'sebagai Kota Budaya yang';}}
                                 </h3>
                                 <div class="card-actions">
                                    <a id="ubahthree" href="#" onclick="ubah('three')" class="font-weight-semibold text-color-primary">ubah</a>
                                    <a id="cancelshowthree" href="#" onclick="cancelshow('three')" class="cancelshow font-weight-semibold">batal</a>
                                 </div>
                              </div>
                              <div class="card-body p-3" style="background-color: #ecedf0">
                                 <div id="ubahtextthree" class="ubah mt-3 col-12">
                                    <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text</h4></label>
                                    <div class="input-group mb-3">
                                       <input type="text" class="form-control" value="{{!empty($visi['textsecond'])?$visi['textsecond']:''}}"  									
                                       oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                                       oninput="setCustomValidity('')"
                                       id="textthree" required>
                                       @if(!empty($visi['id']))
                                       <button id="btnthree" class="btn btn-success" data-column="textsecond" type="button" onclick="update('three')">
                                          <i class="fas fa-check"></i> Perbaharui
                                       </button>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </section>
                           <section class="card mb-4">
                              <div class="card-body text-color-dark font-weight-bold">
                                 <h3 class="font-weight-bold m-none hfour">
                                    <span class="text-color-primary wort-rotator word active" style="height: 30px;">
                                       <span class="wort-rotator-items" style="vertical-align: bottom">
                                          @if(!empty($visi['textanimation']))
                                             @php
                                             $textanim = explode(',',$visi['textanimation']);
                                             for ($i=0; $i < count($textanim); $i++) { 
                                                echo '<span>'.$textanim[$i].'</span>';
                                             }    
                                             @endphp
                                          @else
                                             <span>Modern</span>
                                             <span>Tangguh</span>
                                             <span>Gesit</span>
                                             <span>Kreatif</span>
                                             <span>Sejahtera</span>
                                          @endif
                                       </span>
                                    </span>
                                 </h3>
                                 <div class="card-actions">
                                    <a id="ubahfour" href="#" onclick="ubah('four')" class="font-weight-semibold text-color-primary">ubah</a>
                                    <a id="cancelshowfour" href="#" onclick="cancelshow('four')" class="cancelshow font-weight-semibold">batal</a>
                                 </div>
                              </div>
                              <div class="card-body p-3" style="background-color: #ecedf0">
                                 <div id="ubahtextfour" class="ubah mt-3 col-12">
                                    <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text</h4></label>
                                    <div class="input-group mb-3">
                                       <input type="text" class="form-control" value="{{!empty($visi['textanimation'])?$visi['textanimation']:''}}" id="textfour" required>
                                       @if(!empty($visi['id']))
                                       <button id="btnfour" class="btn btn-success" data-column="textanimation" type="button" onclick="update('four')">
                                          <i class="fas fa-check"></i> Perbaharui
                                       </button>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                           </section>
                        </div>
                        <div class="tab-pane fade {{$from=='misi'?'show active':''}}" id="misi" role="tabpanel" aria-labelledby="misi-tab">
                           <section class="card">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-6 bg-white">
                                       <h2 class="text-color-dark font-weight-bold p-0 m-0">M i s i</h2>
                                    </div>
                                    @if (empty($visi))
                                    <div class="col-6">
                                       <a href="{{route('misi.create')}}" class="btn btn-success float-end"><i class="fa fa-plus"></i> Tambah</a>
                                    </div>
                                    @endif
                                 </div>
                              </div>
                              <hr>
                           </section>
                           <div class="card">
                              <div class="card-body">
                                 <table id="tablemisi" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                       <th>No</th>
                                       <th>Periode</th>
                                       <th>Deskripsi</th>
                                       <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                       @php
                                       $i = 1;
                                       @endphp
                                       @foreach ($misi as $item)                                           
                                       <tr>
                                          <td class="text-center">{{$i++}}</td>
                                          <td class="text-center">{{$item['periode']}}</td>
                                          <td class="text-center">
                                             <a href="javascript:void(0);" data-id="{{$item['id']}}" title="Preview" class="btn btn-small btn-info preview">
                                                <i class="fa fa-search"></i>
                                             </a>
                                          </td>
                                          <td class="text-center">
                                             <a href="{{route('misi.show',$item['id'])}}" title="Ubah" class="btn btn-small btn-warning"><i class="fa fa-edit"></i></a>
                                             <a href="{{route('misi.destroy',$item['id'])}}" title="Hapus" class="btn btn-small btn-danger"><i class="fa fa-trash"></i></a>
                                          </td>
                                       </tr>
                                       @endforeach
                                    </tbody>
                                 </table>
                              </div>
                           </div>
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

   $('#tablemisi').DataTable( {
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

   $('.preview').on('click', function(){
      $('#preview').modal('show');
      $('#preview .modal-title').html('<i class="fa fa-spinner fa-spin"></i>');
      $('#preview .modal-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i></div>');
      id = $(this).data('id');
      $.ajax({
         url : '/misi/'+id+'/preview',
         type: 'GET',
         dataType: 'JSON',
         success: function(data){
            $('#preview .modal-title').html('Periode '+data.periode);
            $('#preview .modal-body').html('<div class="p-3 row">'
                                             +'<div class="col-12">'+data.description+'</div>'
                                          +'</div>'
                                          );            
         }
      });
   });
});

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
      url : '{{route('visi.update')}}',
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
            window.location.href = "{{route('visimisi.index')}}";
         }, 1500);
      }
   });
}

$(function () {
   $('.nav-visimisi').addClass('nav-active');
});
</script>
@endsection