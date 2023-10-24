@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Form Pendataan Barang</h1>
            <form action="/submit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-item my-2">
                    <label for="nama">Nama : </label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-item my-2">
                    <label for="jenis">Jenis : </label>
                    <select class="form-control" id="jenis" name="jenis" required focus>
                        <option value="Pekakas"  selected>Perkakas</option>
                        <option value="Alat masak"  selected>Alat masak</option>
                        <option value="Mainan" selected>Mainan</option>
                        <option value="Select Role" disabled selected>Select Role</option>
                    </select>
                </div>
                <div class="form-item my-2">
                    <label for="kondisi">Kondisi : </label>
                    <select class="form-control" id="kondisi" name="kondisi" required focus>
                        <option value="Bagus"  selected>Bagus</option>
                        <option value="Cukup"  selected>Cukup</option>
                        <option value="Kurang" selected>Kurang</option>
                        <option value="Select Role" disabled selected>Select Role</option>
                    </select>
                </div>
                <div class="form-item my-2">
                    <label for="keterangan">Keterangan : </label>
                    <input type="text" name="keterangan" class="form-control">
                </div>
                <div class="form-item my-2">
                    <label for="kecacatan">Kecacatan : </label>
                    <input type="text" name="kecacatan" class="form-control">
                </div>
                <div class="form-item my-2">
                    <label for="jumlah">Jumlah : </label>
                    <input type="text" name="jumlah" class="form-control">
                </div>
                <div class="form-item my-2">
                    <label for="gambar">Gambar : </label>
                    <input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}">
                </div>
                <button class="btn btn-dark mt-5" type="submit">submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
