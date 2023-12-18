@extends('../admin/layouts/loginapp')

@section('logincontent')
<div class="center-sign">
   <a href="/" class="logo float-left">
      <img src="{{ asset('img/logo-nganjuk-black.png')}}" height="70" />
   </a>
   
   <div class="panel card-sign mt-5">
      {{-- <div class="card-title-sign mt-3 text-end">
         <h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle me-1 text-6 position-relative top-5"></i> Sign In</h2>
      </div> --}}
      <div class="card-body">
         <div class="icon-login d-flex align-items-center justify-content-center">
            <span class=" fas fa-sign-in-alt"></span>
         </div>
         <h3 class="text-center">Login</h3>
         
         <form action="{{route('login')}}" method="post">
            @csrf
            <div class="form-group mb-3">
               <label>Email</label>
               <div class="input-group">
                  <span class="input-group-text">
                     <i class="bx bx-user text-4"></i>
                  </span>
                  <input name="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus />
                  @error('email')
                     <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
            </div>

            <div class="form-group mb-3">
               <div class="clearfix">
                  <label class="float-left">Password</label>
                  {{-- <a href="pages-recover-password.html" class="float-end">Lost Password?</a> --}}
               </div>
               <div class="input-group">
                  <span class="input-group-text">
                     <i class="bx bx-lock text-4"></i>
                  </span>
                  <input id="password" name="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" required autocomplete="current-password" />
                  <div class="input-group-prepend">
                     <span class="input-group-text bi bi-eye" id="togglePassword"><i class="text-4">&nbsp;</i></span>
                  </div>
                  @error('password')
                     <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
            </div>

            <div class="row">
               <div class="col-sm-8">
                  <div class="checkbox-custom checkbox-default">
                     <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                     <label for="RememberMe">Ingat Saya</label>
                  </div>
               </div>
               <div class="col-sm-4 text-end">
                  <button type="submit" class="btn mt-2" style="background-color: #21325b;color: #FFF;">Masuk</button>
               </div>
            </div>
         </form>
      </div>
   </div>

   <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2023. Bapenda Kabupaten Nganjuk.</p>
</div>
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
   });
</script>
@endsection