<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="image" class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label for="asset_number" class="font-weight-bold">No. ASSET</label>
                                <input type="text" class="form-control @error('asset_number') is-invalid @enderror"
                                    name="asset_number" value="{{ old('asset_number', $post->asset_number) }}"
                                    placeholder="Masukkan No. Asset Post">

                                <!-- error message untuk no asset -->
                                @error('asset_number')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="title" class="font-weight-bold">NAMA ASSET</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title', $post->title) }}"
                                    placeholder="Masukkan Nama Asset Post">

                                <!-- error message untuk nama asset -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="item_type" class="font-weight-bold">JENIS ASSET</label>
                                <select class="form-control @error('item_type') is-invalid @enderror" name="item_type">
                                    <option value="">Pilih Jenis Asset</option>
                                    <option value="TV"
                                        {{ old('item_type', $post->item_type) === 'TV' ? 'selected' : '' }}>TV</option>
                                    <option value="Kursi"
                                        {{ old('item_type', $post->item_type) === 'Kursi' ? 'selected' : '' }}>Kursi
                                    </option>
                                    <option value="Meja"
                                        {{ old('item_type', $post->item_type) === 'Meja' ? 'selected' : '' }}>Meja
                                    </option>
                                    <option value="Kamera"
                                        {{ old('item_type', $post->item_type) === 'Kamera' ? 'selected' : '' }}>Kamera
                                    </option>
                                    <option value="CCTV"
                                        {{ old('item_type', $post->item_type) === 'CCTV' ? 'selected' : '' }}>CCTV
                                    </option>
                                    <option value="Handphone"
                                        {{ old('item_type', $post->item_type) === 'Handphone' ? 'selected' : '' }}>
                                        Handphone
                                    </option>
                                    <option value="Meja Kerja"
                                        {{ old('item_type', $post->item_type) === 'Meja Kerja' ? 'selected' : '' }}>
                                        Meja
                                        Kerja
                                </select>

                                <!-- error message untuk jenis asset -->
                                @error('item_type')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label for="entry_date" class="font-weight-bold">TANGGAL MASUK</label>
                                <input type="date" class="form-control @error('entry_date') is-invalid @enderror"
                                    name="entry_date" value="{{ old('entry_date', $post->entry_date) }}"
                                    placeholder="Masukkan Tanggal Masuk Asset">

                                <!-- error message untuk tanggal masuk -->
                                @error('entry_date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exit_date" class="font-weight-bold">TANGGAL KELUAR</label>
                                <input type="date" class="form-control @error('exit_date') is-invalid @enderror"
                                    name="exit_date" value="{{ old('exit_date', $post->exit_date) }}"
                                    placeholder="Masukkan Tanggal Keluar Asset">

                                <!-- error message untuk tanggal keluar -->
                                @error('exit_date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content" class="font-weight-bold">CATATAN</label>
                                <textarea class="form-control @error('content')
                                is-invalid @enderror" name="content"
                                    placeholder="Masukkan Catatan">
                                {{ old('content', $post->content) }}</textarea>

                                <!-- error message untuk content -->
                                @error('content')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>






                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        // CKEDITOR.replace('content');
    </script>
</body>

</html>
