@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
   <h2>{{empty($data['id'])?'Buat':'Ubah'}} Operator</h2>
</header>

<!-- start: page -->
<div class="row">
   <div class="col">
      {!!\helper::Alert($errors)!!}
      <section class="card card-modern card-big-info">
         <div class="card-body text-color-dark p-4">
            <div class="col-6">
               <form action="{{empty($data['id'])?route('user.insert'):route('user.update')}}" method="post" enctype="multipart/form-data">
                  @csrf @method('POST')
                  <div class="form-group mb-3">
                  <div class="form-group col-md-6">
                     <input type="hidden" name="id" value="{{!empty($data['id'])?$data['id']:''}}">
                     <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-user-circle"></i> &nbsp; Nama Lengkap</h4></label>
                     <input type="text" class="form-control" name="name" id="name" value="{{empty($data['id'])?'':$data['name']}}"  									
                     oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                     oninput="setCustomValidity('')"
                     required>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="email"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-envelope"></i> &nbsp; Email</h4></label>
                     <input type="email" class="form-control" name="email" id="email" value="{{empty($data['id'])?'':$data['email']}}"  									
                     oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                     oninput="setCustomValidity('')"
                     required>
                  </div>
                  <div class="form-group col-md-6 row">
                     <div class="col-6">
                        <h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-clock"></i> &nbsp; Dibuat tanggal</h4>
                        @if(empty($data['updated_at']))
                           <p>-</p>                      
                        @else
                           <p>{{\helper::dateFormat(date('d-m-Y', strtotime($data['created_at'])))}}</p>
                        @endif
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
                        <input class="form-control" id="password" name="password" type="password"  									
                        oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                        oninput="setCustomValidity('')"
                        required/>
                        <div class="input-group-prepend">
                           <span class="input-group-text bi bi-eye" id="togglePassword">&nbsp;</span>
                        </div>
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="repasword"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fa fa-key"></i> &nbsp; re-Password</h4></label>
                     <div class="input-group">
                        <input class="form-control" id="repassword" name="repassword" type="password"  									
                        oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                        oninput="setCustomValidity('')"
                        required/>
                        <div class="input-group-prepend">
                           <span class="input-group-text bi bi-eye" id="toggleRepassword">&nbsp;</span>
                        </div>
                     </div>
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
      $("#toggleRepassword").click(function() {
         $(this).toggleClass("bi-eye bi-eye-slash");
         var input = $("#repassword");
         if (input.attr("type") == "password") {
            input.attr("type", "text");
         } else {
            input.attr("type", "password");
         }
      });

      $("#brand").focus();
      $('.nav-user').addClass('nav-active');
   });
</script>
@endsection