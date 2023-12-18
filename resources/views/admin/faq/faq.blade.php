@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
   <h2>Faq Page</h2>

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
   <section class="card m-0">
      <div class="card-body">
         <section class="card">
            <div class="card-body">
               <a href="{{route('faq.create')}}" class="btn btn-success float-end"><i class="fa fa-plus"></i> Tambah</a>
            </div>
         </section>
         <div class="card">
            <div class="card-body">
               <table id="tablefaq" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                     <th>No</th>
                     <th>Judul</th>
                     <th>Deskripsi</th>
                     <th>Aktif</th>
                     <th>Aksi</th>
                  </thead>
                  <tbody>
                     @php
                     $i = 1;
                     @endphp
                     @foreach ($data as $item) 
                     <tr>
                        <td class="text-center">{{$i++}}</td>
                        <td>
                           {{$item['title']}}
                           <br><small><i class="fa fa-clock"></i> {{date('d-m-Y H:i:s', strtotime($item['publish_at']))}}</small>
                           <input type="hidden" class="show{{$item['id']}}" value="0">
                        </td>
                        {{-- <td>
                           <div class="content{{$item['id']}}" id="content{{$i}}">
                              {!!\helper::potong_berita($item['content'])!!}
                           </div>
                           @if(!empty($item['content']))
                           <a href="#content{{$i}}" class="showall" id="showall{{$item['id']}}" data-id="{{$item['id']}}">[showAll]</a>
                           @endif
                        </td> --}}
                        <td class="text-center">
                           <a href="javascript:void(0);" data-id="{{$item['id']}}" title="Lihat" class="btn btn-small btn-info preview" onclick="showPreview({{$item['id']}})">
                              <i class="fa fa-search"></i>
                           </a>
                        </td>
                        <td class="text-center">
                           <a href="#" class="isactive" data-id="{{$item['id']}}" id="isactive{{$item['id']}}">
                              @if($item['isactive']==1)
                                 <i class="fa fa-check text-success"></i>
                                 <input type="hidden" value="1" id="isactiveval{{$item['id']}}">
                              @elseif($item['isactive']==0)
                                 <i class="fas fa-times text-danger"></i>
                                 <input type="hidden" value="0" id="isactiveval{{$item['id']}}">
                              @endif
                           </a>
                        </td>
                        <td class="text-center">
                           <a href="{{route('faq.edit',$item['id'])}}" title="Ubah" class="btn btn-small btn-warning"><i class="fa fa-edit"></i></a>
                           {{-- <a href="javascript:void(0);" onclick="confirmDelete('{{route('faq.destroy',$item['id'])}}')" title="Hapus" class="btn btn-small btn-danger"><i class="fa fa-trash"></i></a> --}}
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>
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
   $('#tablefaq').DataTable( {
      bAutoWidth: false, 
      bFilter: false,
      "lengthChange": false,
      "columns": [
         { "width": "5%" },
         null,
         { "width": "10%" },
         { "width": "15%" },
         { "width": "5%" },
         { "width": "15%" },
      ]
   });
   
   $('.isactive').on('click', function(){
      id = $(this).data('id');
      isactive = $('#isactiveval'+id).val();
      // console.log(id, isactive, $('#isactiveval'+id).val());
      $('#isactive'+id).html('<i class="fa fa-spinner fa-spin"></i>');
      $.ajax({
         url : '{{route('faq.isactive')}}',
         data: {
            id: id, isactive: isactive
         },
         type: 'POST',
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         dataType: 'JSON',
         success: function(data){
            // console.log(id, isactive, $('#isactive'+id).val());
            if(isactive=='1'){
               $('#isactive'+id).html('<i class="fas fa-times text-danger"></i><input type="hidden" value="0" id="isactiveval'+id+'">');
            }else if(isactive=='0'){
               $('#isactive'+id).html('<i class="fa fa-check text-success"></i><input type="hidden" value="1" id="isactiveval'+id+'">');
            }
            toastr.success(data.message);
         }
      });
   });

   $('.showall').on('click', function(){
      id = $(this).data('id');
      show = $('.show'+id).val();
      $.ajax({
         url : '{{route('kegiatan.showberita')}}',
         data: {
            id: id, show: show
         },
         type: 'POST',
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         dataType: 'JSON',
         success: function(data){
            $('.content'+id).html(data.berita);
            if(show=='0'){
               $('#showall'+id).html('[showLess]');
               $('.show'+id).val('1');
            }else{
               $('#showall'+id).html('[showAll]');
               $('.show'+id).val('0');
            }
         }
      });
   });

   // $('#btn-preview').on('click', function(){
   //    // console.log('a')
   //    $('#preview').modal('show');
   //    $('#preview .modal-title').html('<i class="fa fa-spinner fa-spin"></i>');
   //    $('#preview .modal-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i></div>');
   //    id = $(this).data('id');
   //    $.ajax({
   //       url : "{{ route('faq.preview') }}",
   //       type: 'GET',
   //       data: {
   //          id: id
   //       },
   //       dataType: 'JSON',
   //       success: function(data){
   //          console.log(data)
   //          var my_date_format = function(input){
   //             var d = new Date(Date.parse(input.replace(/-/g, "/")));
   //             var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
   //             var date = d.getDate() + " " + month[d.getMonth()] + " " + d.getFullYear();
   //             return (date);  
   //          };
   //          $('#preview .modal-title').html(data.title);
   //          $('#preview .modal-body').html('<div class="p-3 row">'
   //                                           +'<div class="col-12"><small>'+my_date_format(data.publish_at)+'</small></div>'
   //                                           +'<div class="col-12">'+data.deskripsi+'</div>'
   //                                        +'</div>'
   //                                        );            
   //       }
   //    });
   // });
});

function showPreview(id){
   // console.log('a')
   $('#preview').modal('show');
      $('#preview .modal-title').html('<i class="fa fa-spinner fa-spin"></i>');
      $('#preview .modal-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i></div>');
      // id = $(this).data('id');
      $.ajax({
         url : "{{ route('faq.preview') }}",
         type: 'GET',
         data: {
            id: id
         },
         dataType: 'JSON',
         success: function(data){
            console.log(data)
            var my_date_format = function(input){
               var d = new Date(Date.parse(input.replace(/-/g, "/")));
               var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
               var date = d.getDate() + " " + month[d.getMonth()] + " " + d.getFullYear();
               return (date);  
            };
            $('#preview .modal-title').html(data.title);
            $('#preview .modal-body').html('<div class="p-3 row">'
                                             +'<div class="col-12"><small>'+my_date_format(data.publish_at)+'</small></div>'
                                             +'<div class="col-12">'+data.deskripsi+'</div>'
                                          +'</div>'
                                          );            
         }
      });
}

$(function () {
   $('.nav-kegiatan').addClass('nav-active');
});
</script>
@endsection