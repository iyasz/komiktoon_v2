@extends('layout.contribute')
@section('contract-active', 'text-primary')

@section('content')
<div class="modal fade" id="modalInfo" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content border-0">
        <div class="modal-body my-4 mx-3 ">
          <div class="">
            <div class="mb-4">
                <h5 class="mb-1">1. Click Tambah Serial </h5>
                <p class="mb-2 fs-sm text-gray">Klik tambah serial pada menu karyaku</p>
                <img src="{{asset('img/alur_pembuatan/add.png')}}" width="60%" alt="">
            </div>
            <div class="mb-4">
                <h5 class="mb-1">2. Isi Semua Data Content </h5>
                <p class="mb-2 fs-sm text-gray">Isi semua data yang diperlukan untuk kebutuhan konten anda <br>Lalu klik tombol buat draft untuk melanjutkan proses</p>
                <img src="{{asset('img/alur_pembuatan/create_content.png')}}" width="60%" alt="">
            </div>
            <div class="mb-4">
                <h5 class="mb-1">3. Isi Semua Data Chapter </h5>
                <p class="mb-2 fs-sm text-gray">Setelah semua data memuat chapter diisi, dilanjutkan dengan <br>Menekan tombol Simpan Chapter</p>
                <img src="{{asset('img/alur_pembuatan/create_chapter.png')}}" width="60%" alt="">
            </div>
            <div class="mb-4">
                <h5 class="mb-1">4. Tahap Konfirmasi </h5>
                <p class="mb-2 fs-sm text-gray">Setelah membuat chapter, diharapkan agar Admin <br> memvalidasi Konten buatan anda</p>
            </div>
            <div class="mb-4">
                <h5 class="mb-1">5. Tambah data </h5>
                <p class="mb-2 fs-sm text-gray">Setelah admin mengkonfirmasi Konten anda, <br> anda bisa melanjutkan dengan menambahkan beberapa <br> data untuk ditampilkan</p>
                <img src="{{asset('img/alur_pembuatan/updated_data.png')}}" width="60%" alt="">
            </div>
            <div class="mb-4">
                <h5 class="mb-1">6. Klik Terbitkan Sekarang </h5>
                <p class="mb-2 fs-sm text-gray">Setelah mengisi data tersebut, dilanjutkan dengan <br> mengklik tombol terbitkan sekarang untuk <br> menerbitkan konten anda</p>
            </div>
          </div>
          <div class="d-flex justify-content-center mt-5 mx-3">
              <button class="btn bg-dark text-white py-3 px-5 border-0 rounded-pill" data-bs-dismiss="modal">YA</button>
            </div>
        </div>
      </div>
    </div>
  </div>

    <div class="mb-3">
        <div class="row">

            <div class="col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                        <div class="border p-3">
                            <div class="text-center">
                                <h4 class="fw-600">Penjelasan Kontrak</h4>
                                <p class="fs-s-sm text-gray">Penjelasan tentang persyaratan kontrak anda dengan <span class="text-primary fw-500">Komiktoon</span><br> Pastikan membaca dengan teliti agar tidak menjadi kesalahan saat kalian membuat kontrak</p>
                                <hr class="mx-lg-5 mx-2">
                            </div>
    
                            <div class="row">
                                <div class="col-12 mb-3 text-end">
                                    <button class="btn btn-primary border-0 rounded-1 btn-sm fs-s-sm py-2 px-3" data-bs-toggle="modal" data-bs-target="#modalInfo">Alur Pembuatan Content</button>
                                </div>
                            </div>
                            <div class="border p-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h6 class="mb-3">Syarat ketentuan :</h6>
                                            <ol type="1" class="fs-sm text-gray">
                                                <li class="pb-2">Ketika karya telah diunggah ke platform, pastikan untuk membuat chapter minimal 1.</li>
                                                <li class="pb-2">Admin akan memberi persetujuan ketika anda sudah mengisi persyaratan yang berlaku.</li>
                                                <li class="pb-2">Author harus menjamin karya yang akan dikontrakkan merupakan karya orisinil dan memiliki hak cipta lengkap, karya tidak boleh merupakan karya plagiat, rendahan, tentang politik dan isi cerita lainnya yang melanggar aturan.</li>
                                                <li class="pb-2">
                                                    Karya yang tidak cocok untuk dikontrak:
                                                    <ul>
                                                        <li class="pb-1 pt-2"> Karya yang telah dikontrak oleh website/platform lain;</li>
                                                        <li class="pb-1"> Karya yang melanggar hukum;</li>
                                                        <li class="pb-1"> Karya yang tidak jelas alur ceritanya;</li>
                                                        <li class="pb-1">Karya yang tidak cocok dengan pandangan anak muda atau karya yang memiliki cerita yang tidak layak untuk dipublikasikan secara umum</li>
                                                    </ul>
                                                </li>
                                            </ol>
                                        </div>
                                        <div class="mb-3">
                                            <h6 class="mb-3">Kewajiban Author :</h6>
                                            <ol type="1" class="fs-sm text-gray">
                                                <li class="pb-2">Author harus menjamin karya kontrak merupakan karya orisinil dan memiliki hak cipta lengkap, dan tidak memiliki isi cerita berunsur pornografi, politik dan berbagai isi cerita yang melanggar aturan.</li>
                                                <li class="pb-2">Dalam masa kontrak, author memberikan hak cipta online dan hak penerbitan kepada platform kami.</li>
                                                <li class="pb-2">Dalam masa kontrak, author tidak boleh mempublikasikan karya kontrak ke platform lainnya, jika sudah dipublikasikan maka harus dihapus.</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>

         
    </div>
@endsection

