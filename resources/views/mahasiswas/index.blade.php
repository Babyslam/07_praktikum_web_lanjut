@extends('mahasiswas.layout')

@section('content')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mt-2">
                    <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
                </div>
                <div class="float-right my-2">
                    <a class="btn btn-success" href="{{ route('mahasiswas.create') }}"> Input Mahasiswa</a>
                </div>
                <form class="float-right form-inline" id="searchForm" method="get" action="{{ route('mahasiswas.index') }}" role="search">
            <div class="form-group">
                <input type="text" name="keyword" class="form-control" id="Keyword" aria-describedby="Keyword" placeholder="Keyword" value="{{request()->query('keyword')}}">
            </div>
            <button type="submit" class="btn btn-primary mx-2">Cari</button>
        </form>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>No_Handphone</th>
            <th>Email</th>
            <th>Tgl_lahir</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($mahasiswas as $Mahasiswa)
    <tr>
    
        <td>{{ $Mahasiswa->NIM }}</td>
        <td>{{ $Mahasiswa->Nama }}</td>
        <td>{{ $Mahasiswa->Kelas }}</td>
        <td>{{ $Mahasiswa->Jurusan }}</td>
        <td>{{ $Mahasiswa->No_Handphone }}</td>
        <td>{{ $Mahasiswa->Email }}</td>
        <td>{{ $Mahasiswa->Tgl_lahir }}</td>
        <td>
        <form action="{{ route('mahasiswas.destroy',$Mahasiswa->NIM) }}" method="POST">
    
            <a class="btn btn-info" href="{{ route('mahasiswas.show',$Mahasiswa->NIM) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('mahasiswas.edit',$Mahasiswa->NIM) }}">Edit</a>
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
    </tr>
    @endforeach
    </table>

@endsection