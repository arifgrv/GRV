<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>User Login</title>
    <style>
        body {
            background-color: #BB9642;
            color: #231F20;
        }

        .card {
            background-color: #231F20;
            color: #BB9642;
        }

        .btn-primary {
            background-color: #BB9642;
            border-color: #BB9642;
        }

        .btn-primary:hover {
            background-color: #231F20;
            border-color: #231F20;
        }

        a {
            color: #BB9642;
        }

        a:hover {
            color: #231F20;
        }
        .rounded-image {
            width: 150px;
            height: 150px;
            border: 5px solid #231F20; /* Black */
            border-radius: 50%;
            overflow: hidden;
            background-color:white ;
        }

    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="rounded-image mx-auto">
                   <img class="img-fluid" alt="LOGO" src="<?php echo base_url('Assets/grv-transprent-logo.png'); ?>" width="150" height="150">
                </div>
                <div class="card-header">
                    <h3 class="text-center">GRV Cineplex</h3>
                    <h5 class="text-center">User Login</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('index.php/LgoCheck') ;?>" method="POST">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email"  id="email" placeholder="Enter your email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">Don't have an account? <a href="<?php echo base_url('index.php/newUser') ?>">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
