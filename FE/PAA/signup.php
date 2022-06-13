<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="signin.php">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>HiTech</title>
</head>

<body class="bodylr">
    <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand"><strong>HiTech</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown">English</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Bahasa Indonesia</a></li>
                            <li><a class="dropdown-item" href="#">Bahasa Melayu</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="signin.php">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <form action="daftar.php" method="POST" id="formregist">
        <h2 class="title-rgs">HiTech</h2>
        <div class="row">
            <div class="col">
                <div class="mb-4 mt-4">
                    <label for="text" class="form-label">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Input Username">
                </div>
            </div>
            <div class="col">
                <div class="mb-4 mt-4">
                    <label for="text" class="form-label">email</label>
                    <input class="form-control" type="email" name="email" placeholder="Input Email">
                </div>
            </div>
        <div>
        <div class="row">
            <div class="col">
                <div class="mb-4 mt-2">
                    <label for="text" class="form-label">Password</label>
                    <input class="form-control" type="Password" name="password" placeholder="Input Password">
                </div>
            </div>
            <div class="col">
                <div class="mb-4 mt-2">
                    <label for="text" class="form-label">Password</label>
                    <input class="form-control" type="Password" name="retypePassword" placeholder="Input Password Ulang">
                </div>
            </div>
        <div>
        <div class="row">
            <div class="col">
                <div class="mb-4 mt-2">
                    <label for="text" class="form-label">image</label>
                    <input class="form-control" type="text" name="image" placeholder="Input link gambar">
                </div>
            </div>
            <div class="col">
                <div class="mb-4 mt-2">
                    <label for="text" class="form-label">Address</label>
                    <input class="form-control"type="text" name="address" placeholder="Input Alamat">
                </div>
            </div>
        <div>
        <div class="d-grid mt-4">
            <button class="btn-regist" type="submit" id="Daftar" name="Daftar">Daftar</button>
        </div>
    </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>