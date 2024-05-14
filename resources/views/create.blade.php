<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ASSET WAREHOUSE</title>
    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
        integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
    <!-- custom css -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <style>
        li {
            list-style: none;
            margin: 20px 0 20px 0;
        }

        a {
            text-decoration: none;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            margin-left: -300px;
            transition: 0.4s;
        }

        .active-main-content {
            margin-left: 250px;
        }

        .active-sidebar {
            margin-left: 0;
        }

        #main-content {
            transition: 0.4s;
        }
    </style>
</head>

<body>
    <div>
        <div class="sidebar p-4 bg-primary btn-block" id="sidebar">
            <h4 class="mb-5 text-white">ASSET WAREHOUSE</h4>
            <li>
                <a class="text-white" href="#">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a class="text-white" href="{{ route('home') }}">
                    <i class="bi bi-box-seam-fill"></i>
                    Asset Inventory
                </a>
            </li>
            <li>
                <a class="text-white" href="#">
                    <i class="bi bi-send"></i>
                    Send
                </a>
            </li>
            <li>
                <a class="text-white" href="{{ route('logoutaksi') }}">
                    <i class="bi bi-box-arrow-left"></i>
                    Logout
                </a>
            </li>
        </div>
    </div>
    <div class="p-4" id="main-content">
        <button class="btn btn-primary" id="button-toggle">
            <i class="bi bi-list"></i>
        </button>

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <form action="{{ route('home.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="form-group">
                                    <label for="image" class="font-weight-bold">PICTURE</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image">

                                    <!-- error message untuk title -->
                                    @error('image')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="asset_number" class="font-weight-bold">No. ASSET</label>
                                    <input type="text"
                                        class="form-control @error('asset_number') is-invalid @enderror"
                                        name="asset_number" value="{{ old('asset_number') }}"
                                        placeholder="Masukkan No. Asset">

                                    <!-- error message untuk no asset -->
                                    @error('asset_number')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title" class="font-weight-bold">ASSET NAME</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" placeholder="Masukkan Nama Asset">

                                    <!-- error message untuk nama asset -->
                                    @error('title')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="item_type" class="font-weight-bold">ASSET TYPE</label>
                                    <select class="form-control @error('item_type') is-invalid @enderror"
                                        name="item_type">
                                        <option value="">Pilih Jenis Asset</option>
                                        <option value="TV" {{ old('item_type') === 'TV' ? 'selected' : '' }}>TV
                                        </option>
                                        <option value="Kursi" {{ old('item_type') === 'Kursi' ? 'selected' : '' }}>
                                            Kursi
                                        </option>
                                        <option value="Meja" {{ old('item_type') === 'Meja' ? 'selected' : '' }}>Meja
                                        </option>
                                        <option value="Kamera" {{ old('item_type') === 'Kamera' ? 'selected' : '' }}>
                                            Kamera
                                        </option>
                                        <option value="CCTV" {{ old('item_type') === 'CCTV' ? 'selected' : '' }}>CCTV
                                        </option>
                                        <option value="Handphone"
                                            {{ old('item_type') === 'Handphone' ? 'selected' : '' }}>
                                            Handphone
                                        </option>
                                        <option value="Meja Kerja"
                                            {{ old('item_type') === 'Meja Kerja' ? 'selected' : '' }}>
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



                                {{-- <div class="form-group">
                                    <label for="entry_date" class="font-weight-bold">TANGGAL MASUK</label>
                                    <input type="date" class="form-control @error('entry_date') is-invalid @enderror"
                                        name="entry_date" value="{{ old('entry_date') }}"
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
                                        name="exit_date" value="{{ old('exit_date') }}"
                                        placeholder="Masukkan Tanggal Keluar Asset"> --}}

                                <!-- error message untuk tanggal keluar -->
                                {{-- @error('exit_date')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div> --}}

                                <div class="form-group">
                                    <label for="status" class="font-weight-bold">STATUS</label>
                                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="">Choose Status</option>
                                        <option value="Available"
                                            {{ old('status') === 'Available' ? 'selected' : '' }}>
                                            Available
                                        </option>
                                        <option value="Not Available"
                                            {{ old('status') === 'Not Available' ? 'selected' : '' }}>
                                            Not Available
                                        </option>

                                    </select>

                                    <!-- error message untuk jenis asset -->
                                    @error('status')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="content" class="font-weight-bold">NOTE</label>
                                    <textarea class="form-control @error('content')
                                is-invalid @enderror" name="content"
                                        placeholder="Masukkan Catatan" style="height: 28px;">
                                {{ old('content') }}</textarea>

                                    <!-- error message untuk content -->
                                    @error('content')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                        </div>




                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    </div>

    <script>
        // event will be executed when the toggle-button is clicked
        document.getElementById("button-toggle").addEventListener("click", () => {

            // when the button-toggle is clicked, it will add/remove the active-sidebar class
            document.getElementById("sidebar").classList.toggle("active-sidebar");

            // when the button-toggle is clicked, it will add/remove the active-main-content class
            document.getElementById("main-content").classList.toggle("active-main-content");
        });
    </script>
</body>

</html>
