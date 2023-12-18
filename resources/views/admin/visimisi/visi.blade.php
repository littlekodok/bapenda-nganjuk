@extends('admin/layouts/main')

@section('admincontent')
<header class="page-header">
   <h2>Visi Misi - Halaman Buat Visi</h2>
</header>

<!-- start: page -->
<div class="row">
   <div class="col">
      <section class="card card-modern card-big-info">
         <div class="card-body text-color-dark p-4">
            <form action="{{route('visi.insert')}}" method="post">
               @csrf @method('POST')
               <div class="row">
                  <div class="form-group col-lg-12 mb-3">
                     <div class="row">
                        <section class="card mb-2 col-lg-6 col-sm-12">
                           <div class="card-body text-color-dark font-weight-bold">
                              <h3 class="font-weight-bold m-none">Mewujudkan</h3>
                           </div>
                           <div class="card-body p-2" style="background-color: #ecedf0">
                              <div id="ubahtextone mt-3 col-12">
                                 <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text</h4></label>
                                 <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="" id="textone"  									
                                    oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                                    oninput="setCustomValidity('')"
                                    name="textone" required>
                                 </div>
                              </div>
                           </div>
                        </section>
                        <section class="card mb-2 col-lg-6 col-sm-12">
                           <div class="card-body text-color-dark font-weight-bold">
                              <h3 class="font-weight-bold m-none">
                                 <span class="alternative-font">Surakarta</span>
                              </h3>
                           </div>
                           <div class="card-body p-2" style="background-color: #ecedf0">
                              <div id="ubahtexttwo col-12">
                                 <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text</h4></label>
                                 <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="" id="texttwo"  									
                                    oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                                    oninput="setCustomValidity('')"
                                    name="texttwo" required>
                                 </div>
                              </div>
                           </div>
                        </section>
                        <section class="card mb-2 col-lg-6 col-sm-12">
                           <div class="card-body text-color-dark font-weight-bold">
                              <h3 class="font-weight-bold m-none">sebagai Kota Budaya yang</h3>
                           </div>
                           <div class="card-body p-2" style="background-color: #ecedf0">
                              <div id="ubahtextthree mt-3 col-12">
                                 <label for="name"><h4 class="mb-2 font-weight-semibold text-dark"><i class="fas fa-keyboard"></i> &nbsp; Text</h4></label>
                                 <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="" id="textthree"  									
                                    oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                                    oninput="setCustomValidity('')"
                                    name="textthree" required>
                                 </div>
                              </div>
                           </div>
                        </section>
                        <section class="card mb-2 col-lg-6 col-sm-12">
                           <div class="card-body text-color-dark font-weight-bold">
                              <h3 class="font-weight-bold m-none">
                                 <span class="text-color-primary wort-rotator word active" style="height: 30px;">
                                    <span class="wort-rotator-items" style="vertical-align: bottom">
                                       <span>Modern</span>
                                       <span>Tangguh</span>
                                       <span>Gesit</span>
                                       <span>Kreatif</span>
                                       <span>Sejahtera</span>
                                    </span>
                                 </span>
                              </h3>
                           </div>
                           <div class="card-body p-3" style="background-color: #ecedf0">
                              <div id="ubahtextfour mt-3 col-12">
                                 <label for="name">
                                    <h4 class="m-0 font-weight-semibold text-dark">
                                       <i class="fas fa-keyboard"></i> &nbsp; Text
                                    </h4>
                                    <span>pisahkan dengan koma (,)</span>
                                 </label>
                                 <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="" id="textfour"  									
                                    oninvalid="this.setCustomValidity('Isian tidak boleh kosong')"
                                    oninput="setCustomValidity('')"
                                    name="textfour" placeholder="Modern,Tangguh,Gesit,Kreatif,Sejahtera" required>
                                 </div>
                              </div>
                           </div>
                        </section>
                     </div>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                  </div>
               </div>
            </form>
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
   $(document).ready(function () {
   });
   $(function () {
      $('.nav-visimisi').addClass('nav-active');
   });
</script>
@endsection