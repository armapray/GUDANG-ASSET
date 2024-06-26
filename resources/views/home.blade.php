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
                <a class="text-white" href="#">
                    <i class="bi bi-box-seam-fill"></i>
                    Asset Inventory
                </a>
            </li>
            <li>
                <a class="text-white" href="{{ route('create') }}">
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
        <div class="card mt-5">
            <div class="card-body">
                <h2>ASSET INVENTORY</h2>
                <p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">PICTURE</th>
                            <th scope="col">NO ASSET</th>
                            <th scope="col">ASSET NAME</th>
                            <th scope="col">ASSET TYPE</th>
                            <th scope="col">NOTE</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('/storage/posts/' . $post->image) }}" class="rounded"
                                        style="width: 150px">
                                </td>
                                <td>{{ $post->asset_number }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->item_type }}</td>
                                <td>{!! $post->content !!}</td>
                                <td>{{ $post->status }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('home.destroy', $post->id) }}" method="POST">
                                        <a href="{{ route('home.show', $post->id) }}"
                                            class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('home.edit', $post->id) }}"
                                            class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Post belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $posts->links() }}
                </table>
                </p>
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
