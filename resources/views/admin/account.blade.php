@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
   <h2>Halaman Akun</h2>

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
   <section class="card m-0">
      {!!\helper::Alert($errors)!!}
      <div class="card-body">
         <div class="thumb-info mb-4">
            <img src="" class="rounded img-fluid" alt="John Doe">
            <div class="thumb-info-title">
               <span class="thumb-info-inner">{{$data['name']}}</span>
               <span class="thumb-info-type">
                  @if($data['isAdmin'])
                  Admin
                  @else
                  Operator
                  @endif
               </span>
            </div>
         </div>
         <form class="form-horizontal form-bordered" method="post">
            @csrf @method('PUT')
            <div class="form-group col-md-6">
               <input type="hidden" name="id" value="{{$data['id']}}">
               <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-user-circle"></i> &nbsp; Nama</h4></label>
               <input type="text" class="form-control" name="name" id="name" value="{{$data['name']}}"  									
               oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
               oninput="setCustomValidity('')"
               required>
            </div>
            <div class="form-group col-md-6">
               <label for="email"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-envelope"></i> &nbsp; Email</h4></label>
               <input type="email" class="form-control" name="email" id="email" value="{{$data['email']}}"  									
               oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
               oninput="setCustomValidity('')"
               required>
            </div>
            <div class="form-group col-md-6 row">
               <div class="col-6">
                  <h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-clock"></i> &nbsp; Dibuat tanggal</h4>
                  <p>{{\helper::dateFormat(date('d-m-Y', strtotime($data['created_at'])))}}</p>
               </div>
               <div class="col-6">
                  <h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-clock"></i> &nbsp; Diubah tanggal</h4>
                  @if(empty($data['updated_at']))
                     <p>-</p>                      
                  @else
                     <p>{{\helper::dateFormat(date('d-m-Y', strtotime($data['created_at'])))}}</p>
                  @endif
               </div>
            </div>
            <div class="form-group col-md-6">
               <label for="pasword"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-key"></i> &nbsp; Password</h4></label>
               <div class="input-group">
                  <input type="password" class="form-control" name="password" id="password">
                  <div class="input-group-prepend">
                     <span class="input-group-text bi bi-eye" id="togglePassword">&nbsp;</span>
                  </div>
               </div>
            </div>
            <div class="form-group col-md-6">
               <input type="submit" class="btn btn-info" value="Update">
            </div>
         </form>
      </div>
   </section>
</div>
<!-- end: page -->

@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<style>
   .input-group-text{
      cursor: pointer;
      font-size: 18px;
   }
</style>    
@endsection
@section('js')
<script>
$(function () {
   $("#togglePassword").click(function() {
         $(this).toggleClass("bi-eye bi-eye-slash");
         var input = $("#password");
         if (input.attr("type") == "password") {
            input.attr("type", "text");
         } else {
            input.attr("type", "password");
         }
      });
   $('.nav-account').addClass('nav-active');
});
</script>
@endsection