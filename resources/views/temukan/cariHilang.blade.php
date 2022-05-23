@extends('temukan.layouts.mainTemukan')
@section('container')
@include('sweetalert::alert')

<div class="container-xxl py-5">
    <div class="container">
        <center>
            <h1><b>TEMUKAN BARANGMU</b></h1>
        </center> <br><br><br>
        <h3 style="color:black ;"><b>Cari Barang yang Hilang</b></h3>
        <div>  
            <ul>       
                {{Helper::Category()}}
            </ul>
        </div>
        <div class='body'>
            <div class="row g-5">
            @foreach($hilang as $h)
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <img src="/BarangHilang/{{$h->gambar}}" alt="" width="300px" height="300px">
                </div>
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.5s">
                    <h3 class="mb-4"><b>Detail Barang</b></h3>
                    <hr>
                    <p><b>Nama Barang</b> : {{$h->nama_barang}}</p>
                    <hr>
                    <p><b>Lokasi Hilang :</b> {{$h->lokasi}}</p>
                    <hr>
                    <p><b>Waktu Hilang</b> : {{$h->tanggal}}</p>
                    <hr>
                    <p><b>Ciri - ciri Barang :</b> {{$h->deskripsi}}</p>
                    <hr>
                    @if(Auth()->User()->role== 'admin')
                    <a class=" btn btn-warning btn-xs" href="{{route ('hilang.edit', $h->id) }}"> edit</a>
                    <form method="POST" action="{{route('hilang.destroy',$h->id)}}" onclick="return confirm('Are you sure want to delete?')">
                        @csrf
                        @method('DELETE')
                        <button button style="width:100px" class="btn btn-danger btn-xs" data-id="{{$h->id}}" data-toggle="tooltip" data-placement="bottom" title="Delete">Hapus</button>
                    </form>
                    @endif
                </div>
                @endforeach
            </div>
            <hr><br><br>
            <!-- kedua -->
        </div>
    </div>
    <hr><br><br>
</div>

@endsection