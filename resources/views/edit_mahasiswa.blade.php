<div class="container my-5">
    <h2 class="text-center mb-4">{{ $judul }}</h2>
    
    @if(session('fail'))
        <div class="text-center">
            <div class="alert alert-danger mx- mt-3" role="alert">
                {{ session('fail') }}
            </div>
        </div>
    @endif

    <form action="add-mahasiswa/new" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nrp" class="form-label">NRP</label>
            <input type="text" class="form-control" name="nrp" id="nrp" placeholder="Masukkan NRP" value="{{  $detail[0]->nrp }}" readonly>

            @error('nrp')
                <small>{{ $message }}</small>
            @enderror
            
        </div>
        
        <div class="mb-3"> 
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="{{ $detail[0]->nama }}">

            @error('nama')
                <small>{{ $message }}</small>
            @enderror

        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{ $detail[0]->email }}">

            @error('email')
                <small>{{ $message }}</small>
            @enderror
            
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>