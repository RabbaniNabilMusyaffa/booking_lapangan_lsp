@extends('layouts.main')
@push('heads')
  <style>
    @font-face {
        font-family: 'Plus Jakarta Sans';
        src: url('fonts/PlusJakartaSans-Medium.ttf');
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .text-fit {
      width: 9px;
      white-space: nowrap;
    }
  </style>
@endpush
@section('content')

  <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb">
    <ol class="breadcrumb mt-4">
      <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('booking.index') }}">Booking Lapangan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Checkout</li>
    </ol>
  </nav>
  <div class="row mt-5 justify-content-center">
    <div class="col-lg-5">
      <div class="card border-dark">
        <div class="card-header bg-primary">
          <h4 style="margin-top: 6px; padding-left:4px; color: white;" class="text-center">Detail Booking Anda</h4>
        </div>
        <div class="card-body bg-dark">
          <form action="{{route('checkout')}}" method="POST">
            @csrf
            <table class="table ">
              <tbody>
                <tr>
                  <td class="text-fit fw-bold">Atas Nama</td>
                  <td class="text-fit">:</td>
                  <td>{{ $name }}</td>
                  <input type="hidden" name="name" value="{{$name}}">
                </tr>
                <tr>
                  <td class="text-fit fw-bold">Nomor Telepon</td>
                  <td class="text-fit">:</td>
                  <td>{{ $no_tlp }}</td>
                  <input type="hidden" name="no_tlp" value="{{$no_tlp}}">
                </tr>
                <input type="hidden" name="selected_lapangan_id" value="{{$selected_lapangan->id}}">
                <tr>
                  <td class="text-fit fw-bold">Jenis Lapangan</td>
                  <td class="text-fit">:</td>
                  <td>{{ $selected_lapangan->jenis }}</td>
                </tr>
                <tr>
                  <td class="fw-bold">Lokasi Lapangan</td>
                  <td class="text-fit">:</td>
                  <td>{{ $selected_lapangan->lokasi }}</td>
                </tr>
                <tr>
                  <td class="fw-bold text-fit">Harga per jam</td>
                  <td class="text-fit">:</td>
                  <td>Rp. {{ number_format($selected_lapangan->price) }}</td>
                </tr>
                @if ($sewa_sepatu)
                  <tr>
                    <td class="fw-bold text-fit">Sewa Sepatu</td>
                    <td class="text-fit">:</td>
                    <td>
                      Rp. 50,000/jam
                    </td>
                    <input type="hidden" name="sewa_sepatu" value="{{$sewa_sepatu}}">
                  </tr>
                  @endif
                @if ($sewa_kostum)
                  <tr>
                    <td class="fw-bold text-fit">Sewa Kostum</td>
                    <td class="text-fit">:</td>
                    <td>
                      Rp. 45,000/jam
                    </td>
                    <input type="hidden" name="sewa_kostum" value="{{$sewa_kostum}}">
                  </tr>
                @endif
                <tr>
                  <td class="fw-bold text-fit">Tanggal Mulai</td>
                  <td class="text-fit">:</td>
                  <td>
                    <input class="form-control py-0" type="datetime-local" name="date_start" id=""
                      value="{{ $date_start }}">
                  </td>
                </tr>
                <tr>
                  <td class="fw-bold text-fit">Tanggal Selesai</td>
                  <td class="text-fit">:</td>
                  <td>
                    <input class="form-control py-0" type="datetime-local" name="date_end" id=""
                      value="{{ $date_end }}">
                  </td>
                </tr>
            
              </tbody>
            </table>
            <h4 class="d-flex justify-content-between text-primary">
              <span>Total Harga : </span>
              <span class="text-primary fw-bold">Rp. {{ number_format($total_harga) }}</span>
              <input type="hidden" name="total_harga" id="total-harga" value="{{$total_harga}}">
            </h4>
            <h4 class="d-flex justify-content-between mt-4 text-primary">
              <span>Jumlah : </span>
              <div class="d-flex">
                <input type="number" style="text-align: end; padding-right: 0" class="form-control  " id="input-tunai" min="{{$total_harga}}" value="0" name="pay" >
              </div>
            </h4>
            <h4 class="d-flex justify-content-between mt-3 text-primary">
              <span>Kembalian : </span>
              <span class=" fw-bold" id="kembalian">Rp.0</span>
            </h4>

            <button class="btn btn-primary w-100 mt-3 border-dark" type="submit">Booking</button>
          </form>

        </div>
      </div>

    </div>
    @if (session('is_exist')[0] ?? false)
      <div class="col-lg-7">
        <div class="alert alert-danger" role="alert">
          Jadwal yang anda masukkan telah di pesan oleh seseorang, harap memasukkan jadwal booking yang lain
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Lokasi</th>
              <th>Jenis</th>
              <th>Tgl mulai</th>
              <th>Tgl selesai</th>
            </tr>
          </thead>
          <tbody>
            @foreach (session('is_exist') as $b)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $b->lokasi }}</td>
                <td>{{ $b->jenis }}</td>
                <td>{{ $b->date_start }}</td>
                <td>{{ $b->date_end }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>
@endsection
@push('scripts')
    <script>
      $('#input-tunai').keyup(function (e) { 
       let tunai = $('#input-tunai').val();
       let total_harga =  $('#total-harga').val();
       let kembalian = tunai - total_harga;
       if (kembalian <= 0) {
           $('#kembalian').text('Rp.0');
       } else {
           $('#kembalian').text('Rp.' + kembalian.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
       }
      });
    </script>
@endpush
