<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>CRUD Eloquent Laravel</title>
    </head>
    <body>
 
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    CRUD Data Pegawai - <a href="" target="_blank">www.jerry.com</a>
                </div>
                <!-- <div class="card-body">
                  
                    <br/> </div>  -->
                       
                 <div class="card-header text-left">
                        <form action="/pegawai/cari" method="GET">  <a href="/pegawai/tambah" class="btn btn-primary">Input Pegawai Baru</a>
                            <input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
                            <input type="submit" value="CARI">
                        </form>
                </div>

                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $p)
                            <tr>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>
                                    <a href="/pegawai/edit/{{ $p->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/pegawai/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <br/>
                    
                        Halaman : {{ $pegawai->currentPage() }}  <br/>
                        Jumlah Record : {{ $pegawai->total() }} <br/>
                        Data Per Halaman : {{ $pegawai->perPage() }} <br/>
                        {{ $pegawai->links() }}

                </div>
            </div>
        </div>
    </body>
</html>