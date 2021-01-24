<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--Stylesheets-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
        </script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #031D44;">
            <div class="container-fluid">
                <!--LOGO-->
                <a class="navbar-brand" href="/home"><img src="/logo.png" style="width:auto; height:65px;"></a>
                <!--Hamburger Button-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <!--Search Form-->
                    <form class="row row-cols-lg-auto align-items-center">
                        <div class="col-12">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search">
                                <button class="btn btn-secondary" type="button" id="button-search"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profilelist">Profiles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/jobs">Jobs</a>
                        </li>
                        <!--Someway get this to change to the user's name when they log in-->
                        <li class="nav-item">
                            <a class="nav-link" href="/myprofile">My Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
