@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
   <h2>Halaman PPID</h2>

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
               <a href="{{route('ppid.create')}}" class="btn btn-success float-end"><i class="fa fa-plus"></i> Tambah</a>
            </div>
         </section>
         <div class="card">
            <div class="card-body">
               <table id="tableppid" class="table table-bordered" style="width:100%">
                  <thead>
                     <th>#</th>
                     <th>Group</th>
                     <th>Sub Group</th>
                     <th>Deskripsi</th>
                     <th>File</th>
                     <th>Aktif</th>
                     <th>Aksi</th>
                  </thead>
                  <tbody>
                     @foreach ($data as $item) 
                     <tr>
                        <td></td>
                        <td>{{$item['group']}}</td>
                        <td>
                         {{ $item['title'] }}
                        </td>
                        <td class="text-center">
                           <a href="javascript:void(0);" data-id="{{$item['id']}}" title="Preview" class="btn btn-small btn-info preview">
                              <i class="fa fa-search"></i>
                           </a>
                        </td>
                        <td class="text-center">
                           @if(!empty($item['file']))
                           <a href="{{ Storage::url('public/pdf/').$item['file'] }}" target="_blank" class="btn btn-warning"><i class="fa fa-file-pdf"></i> File</a>
                           @else
                           <a href="#" disabled class="btn btn-secondary"><i class="fa fa-file-pdf"></i> File</a>
                           @endif
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
                           <a href="{{route('ppid.show',$item['id'])}}" title="Ubah" class="btn btn-small btn-warning"><i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0);" onclick="confirmDelete('{{route('ppid.destroy',$item['id'])}}')" title="Hapus" class="btn btn-small btn-danger"><i class="fa fa-trash"></i></a>
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
<script type="text/javascript" src="https://cdn.rawgit.com/ashl1/datatables-rowsgroup/fbd569b8768155c7a9a62568e66a64115887d7d0/dataTables.rowsGroup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
$(document).ready(function () {
   $('#tableppid').DataTable( {
      responsive: true,
      'rowsGroup': [1],
      bAutoWidth: false, 
      bFilter: false,
      "lengthChange": false,
      "columns": [
         { "width": "5%" },
         null,
         null,
         { "width": "10%" },
         { "width": "10%" },
         { "width": "5%" },
         { "width": "10%" },
      ]
   });
   $('.isactive').on('click', function(){
      id = $(this).data('id');
      isactive = $('#isactiveval'+id).val();
      // console.log(id, isactive, $('#isactiveval'+id).val());
      $('#isactive'+id).html('<i class="fa fa-spinner fa-spin"></i>');
      $.ajax({
         url : '{{route('ppid.isactive')}}',
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
   $('.preview').on('click', function(){
      $('#preview').modal('show');
      $('#preview .modal-title').html('<i class="fa fa-spinner fa-spin"></i>');
      $('#preview .modal-body').html('<div class="text-center"><i class="fa fa-spinner fa-spin"></i></div>');
      id = $(this).data('id');
      $.ajax({
         url : '/ppid/'+id+'/preview',
         type: 'GET',
         dataType: 'JSON',
         success: function(data){
            $('#preview .modal-title').html(data.title);
            $('#preview .modal-body').html('<div class="p-3 row">'
                                             +'<div class="col-12">'+data.description+'</div>'
                                          +'</div>'
                                          );            
         }
      });
   });
});
$(function () {
   $('.nav-ppid').addClass('nav-active');
});
</script>
@endsection