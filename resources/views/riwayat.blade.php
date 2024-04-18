@extends('layouts.main')
@section('content')
  <div class="">

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

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb mt-4">
    <li class="breadcrumb-item"><a style="text-decoration: none" href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Riwayat Transaksi</li>
  </ol>
</nav>
<div class="card mt-4">
  <div class="card-header bg-info">
    <h3 style="padding-left: 6px; margin-top:4px;">Daftar Booking</h3>
  </div>
  <div class="card-body">
    <table class="table table-stripped table-bordered shadow-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Penyewa</th>
          <th>Kontak Penyewa</th>
          <th>Jenis</th>
          <th>Lokasi</th>
          <th>Harga per jam</th>
          <th>Tanggal Mulai</th>
          <th>Tanggal Selesai</th>
          <th>Total Harga</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($bookings as $b)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $b->name }}</td>
            <td>{{ $b->no_tlp }}</td>
            <td>{{ $b->lapangan->jenis }}</td>
            <td>{{ $b->lapangan->lokasi }}</td>
            <td>Rp. {{ number_format($b->lapangan->price) }}</td>
            <td>{{ $b->getDateStart() }}</td>
            <td>{{ $b->getDateEnd() }}</td>
            <td>Rp. {{ number_format($b->total_price) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
