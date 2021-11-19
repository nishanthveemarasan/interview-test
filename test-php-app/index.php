<?php
session_start();
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
    <link rel="stylesheet" href="Style/style.css">
    <title>Home Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid d-flex justify-content-end">
            <a class="navbar-brand" href="#">TEST MENU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./View/Register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container-fluid mt-5">
        <div class="show-images"></div>
        <div class="row">
            <div class="image-container">
                <div class="flex-item">
                    <img src="./Images/image-one.jpg" class="flex-image" />
                    <div class="flex-info">
                        <p class="flex-title">click anywhere in the image</p>
                    </div>
                </div>
                <div class="flex-item">
                    <img src="./Images/image-two.jpg" class="flex-image" />
                    <div class="flex-info">
                        <p class="flex-title">click anywhere in the image</p>
                    </div>
                </div>
                <div class="flex-item">
                    <img src="./Images/image-three.jpg" class="flex-image" />
                    <div class="flex-info">
                        <p class="flex-title">click anywhere in the image</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <h1 class="title"> Choose Your Plans</h1>
            <div class="col-md-4 col-sm-12">
                <article class="plan align-middle">
                    <h1 class="plan__title">FREE</h1>
                    <h2 class="plan__price">$0/month</h2>
                    <h3>For hobby projects or small teams.</h3>
                    <ul class="plan__features">
                        <li class="plan__feature">1 Workspace</li>
                        <li class="plan__feature">Unlimited Traffic</li>
                        <li class="plan__feature">10GB Storage</li>
                        <li class="plan__feature">Basic Support</li>
                    </ul>
                    <div>
                        <button class="button">CHOOSE PLAN</button>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-12">
                <article class="plan plan--highlighted">
                    <h1 class="plan__annotation">RECOMMENDED</h1>
                    <h1 class="plan__title">PLUS</h1>
                    <h2 class="plan__price">$29/month</h2>
                    <h3>For ambitious projects.</h3>
                    <ul class="plan__features">
                        <li class="plan__feature">5 Workspaces</li>
                        <li class="plan__feature">Unlimited Traffic</li>
                        <li class="plan__feature">100GB Storage</li>
                        <li class="plan__feature">Plus Support</li>
                    </ul>
                    <div>
                        <button class="button">CHOOSE PLAN</button>
                    </div>
                </article>
            </div>
            <div class="col-md-4 col-sm-12">
                <article class="plan">
                    <h1 class="plan__title">PREMIUM</h1>
                    <h2 class="plan__price">$99/month</h2>
                    <h3>Your enterprise solution.</h3>
                    <ul class="plan__features">
                        <li class="plan__feature">10 Workspaces</li>
                        <li class="plan__feature">Unlimited Traffic</li>
                        <li class="plan__feature">Unlimited Storage</li>
                        <li class="plan__feature">Priority Support</li>
                    </ul>
                    <div>
                        <button class="button">CHOOSE PLAN</button>
                    </div>
                </article>
            </div>
        </div>
        <footer class="main-footer">
            <nav>
                <ul class="main-footer_links">
                    <li class="main-footer_link">
                        <a href="#">Contact Us</a>
                    </li>
                    <li class="main-footer_link">
                        <a href="#"> Terms and Conditions</a>
                    </li>
                </ul>
            </nav>
        </footer>

    </main>


</body>
<script src="Scripts/script.js"></script>

</html>