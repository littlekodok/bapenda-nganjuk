@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
   <h2>Halaman Terkait</h2>

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
         <div class="card-body">
            <section class="card">
               <div class="card-body">
                  <a href="{{route('terkait.create')}}" class="btn btn-success float-end"><i class="fa fa-plus"></i> Tambah</a>
               </div>
            </section>
            <div class="card">
               <div class="card-body">
                  <table id="tableterkait" class="table table-bordered" style="width:100%">
                     <thead>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Url</th>
                        <th>Logo</th>
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
                              {{$item['brand']}}
                              <br><small>{{$item['caption']}}</small>
                           </td>
                           <td><a href="{{$item['link']}}">{{$item['link']}}</a></td>
                           <td class="text-center">
                              <img src="{{ Storage::url('public/img/').$item['img'] }}" height="50" style="object-fit: contain">
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
                              <a href="{{route('terkait.show',$item['id'])}}" title="Ubah" class="btn btn-small btn-warning"><i class="fa fa-edit"></i></a>
                              <a href="javascript:void(0);" onclick="confirmDelete('{{route('terkait.destroy',$item['id'])}}')" title="Hapus" class="btn btn-small btn-danger"><i class="fa fa-trash"></i></a>
                           </td>
                        </tr> 
                        @endforeach
                     </tbody>
                  </table>
               </div>
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
      $('#tableterkait').DataTable( {
         responsive: true,
         'rowsGroup': [1],
         bAutoWidth: false, 
         bFilter: false,
         "lengthChange": false,
         "columns": [
            { "width": "5%" },
            null,
            null,
            { "width": "15%" },
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
            url : '{{route('terkait.isactive')}}',
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
   });

   $(function () {
      $('.nav-terkait').addClass('nav-active');
   });
</script>
@endsection