@extends('layouts.main')

@section('content')
    <style>
        @font-face {
            font-family: 'Plus Jakarta Sans';
            src: url('fonts/PlusJakartaSans-Medium.ttf');
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .back-image {
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            filter: blur(2px);
        }
    </style>
    <div class="container mt-4 ">
        <div class="row justify-content-center" style="min-height: 90vh">
            <div class="col-md-7 card border-black">
                    <div class="card-body">
                        <div class="text-center">
                            {{-- <a class="navbar-brand">
                                <h1 style="font-family: 'Poppins', sans-serif;">N-Field</h1>      
                              </a> --}}
                            <h3 class="mt-3">Tata Cara Penyewaan Lapangan</h3>
                        </div>
                        <ol class="mt-4">
                            <h4 class="mb-4">Selamat datang di penyewaan lapangan futsal N-Field, silahkan baca tata cara penyewaan lapangan dibawah ini sebelum menyewa lapangan.</h4>
                            <li>Pilih lapangan yang tersedia (Indoor/Outdoor).</li>
                            <li>Pilih jenis lapangan sesuai kebutuhan (Reguler/Matras/Rumput).</li>
                            <li>Anda juga dapat menyewa kostum dan sepatu sebagai opsi tambahan.</li>
                            <li>Isi formulir penyewaan dengan lengkap.</li>
                            <li>Lakukan pembayaran sesuai dengan petunjuk yang tertera.</li>
                            <li class="mb-4">Setelah pembayaran telah berhasil dilakukan, pihak penyewa akan menghubungi anda melalui nomor telepon yang telah anda masukkan.</li>
                        </ol>
                        

                        <!-- Modal Konfirmasi Keluar -->
                        <div id="confirmModal" class="modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin keluar?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button id="konfirmasiKeluarButton" type="button" class="btn btn-danger">Ya, Keluar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Konfirmasi Keluar -->
                    </div>

                    <div class="card-group mb-3">
                        <div class="card border-primary">
                            <div class="card-header border-primary text-center">
                                Biaya Sewa Lapangan   <span><strong>Indoor</strong></span>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>Indoor Reguler : Rp 300.000/Jam</li>
                                    <li>Indoor Matras : Rp 250.000/Jam</li>
                                    <li>Indoor Rumput : Rp 200.000/Jam</li>
                                </ul>
                            </div>
                        </div>
                    
                        <div class="card border-primary outdoor">
                            <div class="card-header border-primary text-center">
                                Biaya Sewa Lapangan   <span><strong>Outdoor</strong></span>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>Outdoor Reguler : Rp 250.000/Jam</li>
                                    <li>Outdoor Matras : Rp 200.000/Jam</li>
                                    <li>Outdoor Rumput : Rp 150.000/Jam</li>
                                </ul>
                            </div>
                        </div>
                    
                        <div class="card border-primary">
                            <div class="card-header text-center border-primary">
                                Biaya Sewa Tambahan   <span><strong>Sepatu & Kostum</strong></span>
                            </div>
                            <div class="card-body">
                                <p><strong>Sewa Sepatu:</strong> Rp 50.000/Jam</p>
                                <p><strong>Sewa Kostum:</strong> Rp 45.000/Jam</p>
                            </div>
                        </div>
                    </div>
   
        </div>
    </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $('#keluarButton').click(function() {
                $('#confirmModal').modal('show');
            });

            $('#konfirmasiKeluarButton').click(function() {
                // Tambahkan kode di sini untuk menangani keluar
                // Misalnya, mengarahkan pengguna ke halaman keluar
            });
        });
    </script>
@endsection
