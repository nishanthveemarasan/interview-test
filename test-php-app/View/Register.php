<?php
include "../Classes/CommonService.class.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Register Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TEST MENU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container-fluid mt-5">
        <div class="row mb-5">
            <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12">
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                <?php include_once "../Error/inputError.php" ?>
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            Registration Form
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="submitRegisterForm" name="submitRegisterForm" method="POST" action="../Controller/singupController.php">
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name">
                                    <div> <span id="name_error" class="text-danger"></span></div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email">
                                    <div> <span id="email_error" class="text-danger"></span></div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password">
                                    <div> <span id="password_error" class="text-danger"></span></div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="confirm_password" class="col-sm-3 col-form-label">Confirm Password </label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="btnsubmit" class="btn btn-primary w-25">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">

            </div>
        </div>

        <div class="row mt-5" style="height:20vh">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $data = CommonService::get_api_details();
                    for ($i = 0; $i < count($data); $i++) {
                    ?>
                        <div class="carousel-item <?php if ($i === 0) echo 'active' ?>">
                            <img src="<?php echo $data[$i]['image_url'] ?>" class="d-block w-100" alt="..." style="height: 500px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo $data[$i]['location'] ?></h5>
                                <p><?php echo $data[$i]['title'] ?></p>
                            </div>
                        </div>

                    <?php } ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </main>
    
</body>
<script src="../Scripts/signup.js"></script>

</html>