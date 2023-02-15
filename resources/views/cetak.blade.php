<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Kategori</title>
</head>
<body>
    <div class="form-group">
        <P align="center"><b>Laporan Data Kategori</b></P>
        <table class="static" align="center" rules="all" border="1px" style="width:10cm">
            {{-- tabel header --}}
            <thead>
                <tr>
                    <th width="2%">No</th>
                    <th >Nama Kategori</th>
                    <th >Harga</th>
                </tr>
            </thead>

            <tbody>   
            @foreach($kategori as $isitabel)
                <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $isitabel->kategori }}</td>
                    <td>{{ $isitabel->harga }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>