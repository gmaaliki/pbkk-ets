@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @foreach ($barangs as $barang)
        <p>
            Nama: {{ $barang->nama}} <br>
            Kondisi: {{ $barang->kondisi}} <br>
            Keterangan: {{ $barang->keterangan}} <br>
            Kecacatan: {{ $barang->kecacatan}} <br>
            Jumlah: {{ $barang->jumlah}} <br>
            <img src="{{ $barang->gambar }}" width="100px" height="100px;">
            <a href="{{ route('barang.delete', $barang->id)}}">Hapus</a>
            <a href="{{ route('barang.edit', $barang->id)}}">Edit</a>
        </p>
        @endforeach
        </div>
    </div>
</div>
@endsection
