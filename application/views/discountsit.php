<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>Home Page</title>
    <style>
        body {
            background-color: #231F20; /* Black */
            color: #BB9642; /* Golden */
        }

        .rounded-image {
            width: 150px;
            height: 150px;
            border: 5px solid #231F20; /* Black */
            border-radius: 50%;
            overflow: hidden;
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Welcome to GRV Cineplex! </h1>
                        <img class="rounded-image" src="<?php echo base_url('Assets/grv-transprent-logo.png'); ?>" width="100" height="100">
                        <h4 class="mb-0">Customer Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url("index.php/DiscountMakeResurve"); ?>" method="POST">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile Number:</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" pattern="[0-9]{11}" required>
                                <small class="form-text text-muted">Please enter a 11-digit mobile number.</small>
                            </div>
                            <?php echo form_hidden('show_name', $Movie_Name['MovieName']); ?>
                            <?php echo form_hidden('show_date', $Show_date); ?>
                            <?php echo form_hidden('show_time', $show_time['ShowTime']); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-success">Select Your Sit(s)</h3>
                    <i class="fa-solid fa-chair text-danger"> - Sold Out</i>
                    &emsp;
                    <i class="fa-solid fa-chair text-primary"> - Available</i>
                </div>
                <div class="card-body">
                    <!-- Seat Selection -->
                    <div class="form-group">
                        <div class="container">
                            <!-- VIP Galary 1 -->
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            VIP Galary 1:
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '8', 'VIP'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- VIP Galary 2 -->
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            VIP Galary 2:
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '9', '15', 'VIP'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- General Galary -->
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            General Galary:
                                        </div>
                                        <div class="card-body">
                                            <!-- A -->
                                            <div class="row">
                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '4', 'A'); ?>
                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '10', '13', 'A'); ?>
                                            </div>
                                            <hr>
                                            <!-- B -->
                                            <div class="row">
                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'B'); ?>
                                            </div>
                                            <hr>
                                            <!-- C -->
                                            <div class="row">
                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'C'); ?>
                                            </div>
                                            <hr>
                                            <!-- D -->
                                            <div class="row">
                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'D'); ?>
                                            </div>
                                            <hr>
                                            <!-- E -->
                                            <div class="row">
                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'E'); ?>
                                            </div>
                                            <hr>
                                            <!-- F -->
                                            <div class="row">
                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'F'); ?>
                                            </div>
                                            <hr>
                                            <!-- G -->
                                            <div class="row">
                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'G'); ?>
                                            </div>
                                            <hr>
                                            <!-- H -->
                                            <div class="row">
                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'H'); ?>
                                            </div>
                                            <hr>
                                            <!-- I -->
                                            <div class="row">
                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'I'); ?>
                                            </div>
                                            <hr>
                                            <!-- J -->
                                            <div class="row">
                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time['ShowTime'], $Movie_Name['MovieName'], '1', '13', 'J'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h5 id="total_cost_show"></h5>
                        <div class="row">
                            <input type="hidden" name="totalbill" id="total_cost">
                            <div class="col-md-6">Received Amount : BDT <input type="text" name="discount_amount" id="discount_amount"> Tk.</div>
                            <div class="col-md-6">Discount Voucher Code : <input type="text" name="discount_ref" id="discount_ref"></div>
                        </div>
                        <button type="submit" class="btn btn-success mt-3 btn-lg">Reserve</button>
                    </div>
                    <!-- End Seat Selection -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="mt-5">
        Design and Developed by: www.iarifbd.com
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Function to calculate total cost
    function calculateTotal() {
        // Define ticket prices
        var vipPrice = 700;
        var aPrice = 350;
        var generalPrice = 400;

        // Get the number of selected seats
        var selectedSeats = document.querySelectorAll('input[name="seatcheckbox[]"]:checked').length;

        // Calculate total cost based on the selected seats
        var totalCost = 0;

        document.querySelectorAll('input[name="seatcheckbox[]"]:checked').forEach(function (checkbox) {
            var sitNumber = checkbox.id.toUpperCase(); // Convert to uppercase for case-insensitive comparison
            if (sitNumber.includes('VIP')) {
                totalCost += vipPrice;
            } else if (sitNumber.includes('J')) {
                totalCost += aPrice;
            } else {
                totalCost += generalPrice;
            }
        });

        // Display the total cost
        document.getElementById('total_cost_show').innerText = 'Total Amount : BTD - ' + totalCost + 'Tk.';
         document.getElementById('total_cost').value = totalCost;
    }

    // Attach the calculateTotal function to the change event of seat checkboxes
    var seatCheckboxes = document.querySelectorAll('input[name="seatcheckbox[]"]');
    seatCheckboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', calculateTotal);
    });

    // Calculate total cost once on page load
    calculateTotal();
</script>



</body>

</html>
