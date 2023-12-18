@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
   <h2>Dashboard</h2>

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
      <div class="card-body text-justify">
         <h1 >Selamat Datang di <strong style="color: #363062">Page Admin</strong>,</h1>
         <hr>
         <span class="text-6">Page ini digunakan admin website untuk mengatur atau mengisi content-content yang terdapat di halaman <strong style="color: #363062" >Website</strong> utama</span>
      </div>
   </section>
</div>
<!-- end: page -->

@endsection
@section('css')
@endsection
@section('js')
<script>
$(function () {
   $('.nav-dashboard').addClass('nav-active');
});
</script>
@endsection