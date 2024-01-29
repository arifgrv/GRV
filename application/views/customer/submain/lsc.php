<!-- Left side columns -->
<div class="col-lg-12">
  <div class="row">

    <div class="container movie-section">
        <h2 class="text-center mb-4" style="color: #BB9642;">Welcome To Our Grand River View Cineplex!</h2>
        <div class="row">
            <?php foreach ($homepage as $key => $value) {?>
            <div class="col-md-4">
                <div class="card movie-card">
                    <img src="<?php echo  base_url($value['poster']); ?>" class="card-img-top" alt="Movie A" width="300" height="300">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $value['Show_Name']; ?></h3>
                        <h5 class="card-text"><?php echo $value['Show_Date']; ?></h5>
                        <p class="card-text"><?php echo $value['Show_Time']; ?></p>
                        <a href="<?php echo base_url('index.php/UserBookTicket/1'); ?>" class="btn btn-primary">Booking</a>
                    </div>
                </div>
            </div>
            <?php } ;?>
        </div>
    </div>
    
  </div>
</div><!-- End Left side columns -->