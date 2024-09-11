<div class="container my-5">
    <div class="row">

        <h2 class="text-center my-4">Data Mahasiswa</h2>
        
        <div class="mb-3 text-end">
            <a class="btn btn-success" href="{{ url('/add-mahasiswa') }}">Tambah Data</a>
        </div>

        @if(session('success'))
            <div class="text-center">
                <div class="alert alert-success mx- mt-3" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @elseif(session('fail'))
            <div class="text-center">
                <div class="alert alert-danger mx- mt-3" role="alert">
                    {{ session('fail') }}
                </div>
            </div>
        @endif

        <table id="display" class="table table-striped">
            <thead>
                <tr>
                    <th>NRP</th>
                    <th width="40%">Nama</th>
                    <th width="40%">Email</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $item)
                    <tr>
                        
                        <td>{{ $item->nrp }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ url('/edit-mahasiswa/'.$item->nrp) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ url('/delete-mahasiswa/'.$item->nrp) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>