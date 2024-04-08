<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 Side Bar Navigation</title>
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
                    Receive
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
        <div class="card mt-5">
            <div class="card-body">
                <h4>Lorem Ipsum</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque
                    animi maxime at minima. Totam vero omnis ducimus commodi placeat
                    accusamus, repudiandae nemo, harum magni aperiam esse voluptates.
                    Non, sapiente vero?
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
