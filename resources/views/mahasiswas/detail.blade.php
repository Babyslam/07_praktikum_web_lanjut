@extends('mahasiswas.layout')
 
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Detail Mahasiswa
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>NIM: </b>{{$Mahasiswa->NIM}}</li>
                    <li class="list-group-item"><b>Nama: </b>{{$Mahasiswa->Nama}}</li>
                    <li class="list-group-item"><b>Kelas: </b>{{$Mahasiswa->Kelas}}</li>
                    <li class="list-group-item"><b>Jurusan: </b>{{$Mahasiswa->Jurusan}}</li>
                    <li class="list-group-item"><b>No_Handphone: </b>{{$Mahasiswa->No_Handphone}}</li>
                    <li class="list-group-item"><b>Email: </b>{{$Mahasiswa->Email}}</li>
                    <li class="list-group-item"><b>Tgl_lahir: </b>{{$Mahasiswa->Tgl_lahir}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('mahasiswas.index') }}">Kembali</a>
            <div class="d-flex justify-content-between">
                <a class="btn m-3 {{isset($prev->nim) ? 'btn-outline-primary' : 'enabled' }}" href="{{ isset($prev->nim) ? route('mahasiswa.show', $prev->nim) : '' }}"><i class="fas fa-chevron-left"></i> Sebelumnya</i></a>
                <a class="btn m-3 {{isset($next->nim) ? 'btn-outline-primary' : 'enabled' }}" href="{{ isset($next->nim) ? route('mahasiswa.show', $next->nim) : '' }}">Selanjutnya <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection