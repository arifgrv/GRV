<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
    <title>Home Page</title>
    <style>
        body {
            background-color: #231F20; /* Black */
            color: #BB9642; /* Golden */
        }

        .jumbotron {
            background-color: #BB9642; /* Golden */
            color: #231F20; /* Black */
            padding: 100px 20px;
            text-align: center;
        }

        .movie-section {
            padding: 50px 0;
        }

        .movie-card {
            margin-bottom: 30px;
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

<div class="jumbotron">
    <div class="rounded-image mx-auto my-3">
       <img class="img-fluid" alt="LOGO" src="<?php echo base_url('Assets/grv-transprent-logo.png'); ?>" width="150" height="150">
     </div>
    <h1 class="display-4"><b>Welcome to GRV Cineplex</b></h1>
    <p class="lead">Where luxury meets entertainment! <br/> Experience a delightful stay and immerse yourself in a world of cinematic indulgence at our premier hotel.</p>
    <hr class="my-4">
    <p>Book your tickets now and enjoy a cinematic journey like never before!</p>
    <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Get Tickets</a> -->
</div>

<div class="container movie-section">
    <h2 class="text-center mb-4" style="color: #BB9642;">Movie List</h2>
    <div class="row">
        <?php foreach ($homepage as $key => $value) {?>
        <div class="col-md-4">
            <div class="card movie-card">
                <img src="<?php echo  base_url($value['poster']); ?>" class="card-img-top" alt="Movie A" width="300" height="300">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $value['Show_Name']; ?></h3>
                    <h5 class="card-text"><?php echo $value['Show_Date']; ?></h5>
                    <p class="card-text"><?php echo $value['Show_Time']; ?></p>
                    <a href="<?php echo base_url('index.php/login'); ?>" class="btn btn-primary">login</a>
                </div>
            </div>
        </div>
        <?php } ;?>
    </div>
</div>
<footer class="mt-5">
  Design and Developed by : www.iarifbd.com
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
