<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #bb9642;
            color: #231f20;
        }

        .card {
            background-color: #231f20;
            color: #bb9642;
        }

        .list-group-item a {
            color: #bb9642;
        }

        .list-group-item a:hover {
            color: #231f20;
        }

        .jumbotron {
            background-color: #231f20;
            color: #bb9642;
        }

        .rounded-image {
            width: 100px;
            height: 100px;
            border: 5px solid #231F20; /* Black */
            border-radius: 50%;
            overflow: hidden;
            background-color:white ;
        }

    </style>
    <title>Dashboard</title>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                     Dashboard
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#">Home</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('index.php/BookTicket'); ?>" target="_blank">Book Sit</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('index.php/Discount'); ?>" target="_blank">Discount Offer</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('index.php/reprint/211'); ?>"  target="_blank">Reprint</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('index.php/accountsreport'); ?>"  target="_blank">Accounts</a></li>
                    <li class="list-group-item"><a href="#">Change Password</a></li>
                    <li class="list-group-item"><a href="<?php echo base_url('index.php/logout'); ?>">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="jumbotron">
                <div class="rounded-image mx-auto mt-2">
                   <img class="img-fluid" alt="LOGO" src="<?php echo base_url('Assets/grv-transprent-logo.png'); ?>" width="100" height="100">
                </div>
                <h1>Hi! <?php echo $this->session->userdata('user_email'); ?></h1>
                <h3 class="display-4">Welcome to GRV Cineplex!</h3>
                <p class="lead">Where luxury meets entertainment! <br/>Experience a delightful stay and immerse yourself in a world of cinematic indulgence at our premier hotel.</p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
