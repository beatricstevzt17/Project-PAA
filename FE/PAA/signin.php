<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="signup.php">
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
                        <a class="nav-link text-light" href="signup.php">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                height="20" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div id="formlog">
            <div class="card-body">
                <h2 class="card-title">WELCOME BACK!</h2>
                <div class="mt-3">
                    <label>Don't have a account, <a href="signup.php" class="link">Sign Up</a></label>
                </div>
                <form action="login.php" method="POST">
                    <div class="mb-4 mt-4">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="text" type="email" name="email">
                    </div>
                    <div class="mb-4 mt-4">
                        <label for="password" class="form-label">Password</label>
                        <input  class="form-control"type="password" id="password" name="password">
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </div>
                        
                        <div>
                            <h class="link" id="myBtn" data-bs-toggle="modal" data-bs-target="#myModal">Forget Password ?</a>
                        </div>
                    </div>
                    <div class="d-grid mt-4">
                        <button class="btn-login" type="submit" id="login" name="login">Login</button>
                    </div>
                </form>
                <!-- <form action="login.php" method="POST">
                    <div class="mb-4 mt-4">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Your Email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Enter Password">
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </div>
                        
                        <div>
                            <h class="link" id="myBtn" data-bs-toggle="modal" data-bs-target="#myModal">Forget Password ?</a>
                        </div>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn-login">Sign In</button>
                    </div>
                    <div id="loginalt">
                        <a>or continue with</a>
                    </div>
                    <div class="log-account">
                        <button type="submit" class="img-google1"><img src="image/google.png" alt="Gmail"
                                class="img-acc"></button>
                        <button type="submit" class="img-fb1"><img src="image/fb.png" alt="fb" class="img-acc"></button>
                    </div>
                </form> -->
            </div>
        </div>
        <div id="imglp">
            <img src="image/ProjectCover.png" alt="laptop" width="600" height="400">
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="otpform">
                        <h2>OTP Verification</h2>
                        <p>We Will send a one time password on this E-Mail</p>
                        <!-- <p class="link">evosrrq@gmail.com</p> -->
                        <div class="mb-4 mt-2">
                            <label for="text" class="form-label">Password</label>
                            <input class="form-control" type="Password" name="password" placeholder="Input Password">
                        </div>
                        <br>
                        <div class="userInput">
                            <input type="text" class="otpinput" maxlength="1">
                            <input type="text" class="otpinput" maxlength="1">
                            <input type="text" class="otpinput" maxlength="1">
                            <input type="text" class="otpinput" maxlength="1">
                        </div>
                        <br>
                        <p>00:00</p>
                        <label>Do not send OTP ? <a href="#" class="link">Send OTP</a></label>
                        <br>
                        <br>
                        <button class="otpbtn" type="submit" id="login" name="login">Login</button>
                        <!-- <button class="otpbtn">Submit</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>


