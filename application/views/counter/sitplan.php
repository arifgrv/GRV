<?php include 'head.php';?>

<body>

<?php include 'header.php';?>

<?php include 'sidebar.php';?>

  <main id="main" class="main">

    <?php include 'submain/pagetitle.php';?>

    <form action="<?php echo base_url("index.php/saveGeneral"); ?>" method="POST">
        <section class="section dashboard">
          <div class="row">
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
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number:</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" pattern="[0-9]{11}"  value="<?php echo set_value('mobile'); ?>" required>
                                        <small class="form-text text-muted">Please enter a 11-digit mobile number.</small>
                                    </div>
                                    <input type="hidden" name="show_name" value="<?php echo set_value('show_name'); ?>">
                                    <input type="hidden" name="show_date" value="<?php echo set_value('show_date'); ?>">
                                    <input type="hidden" name="show_time" value="<?php echo set_value('show_time'); ?>">
                                    <input type="hidden" name="CustomerType" value="<?php echo set_value('CustomerType'); ?>">
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
                        <?php if (validation_errors()): ?>
                        <div class="alert alert-danger" role="alert">
                            <h3><?php echo validation_errors(); ?></h3>
                        </div>                        
                        <?php endif ?>
                        <div class="card-body">
                            <!-- Seat Selection -->
                            <div class="form-group">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- VIP Galary 1 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            VIP Lounge: BDT-700Tk.
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time, $Movie_Name, '1', '8', 'VIP'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card text-center" style="margin: 20px auto; min-height: 100px;">Projection Room</div>
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <!-- VIP Galary 2 -->
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            VIP Lounge: BDT-700Tk.
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time, $Movie_Name, '9', '15', 'VIP'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Business Galary -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    Business Galary: BDT-400Tk.
                                                </div>
                                                <div class="card-body">
                                                    <!-- A -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time, $Movie_Name, '1', '4', 'A'); ?>
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time, $Movie_Name, '10', '13', 'A'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- B -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time, $Movie_Name, '1', '13', 'B'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- C -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time, $Movie_Name, '1', '13', 'C'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- D -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time, $Movie_Name, '1', '13', 'D'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- E -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time, $Movie_Name, '1', '13', 'E'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- F -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time, $Movie_Name, '1', '13', 'F'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- G -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time, $Movie_Name, '1', '13', 'G'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- H -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time, $Movie_Name, '1', '13', 'H'); ?>
                                                    </div>
                                                    <hr>
                                                    <!-- I -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time, $Movie_Name, '1', '13', 'I'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Economy Galary -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    Economi: BDT-350Tk.
                                                </div>
                                                <div class="card-body">
                                                    <!-- J -->
                                                    <div class="row">
                                                        <?php echo $this->seat_reservation->generateSeatCheckbox($Show_date, $show_time, $Movie_Name, '1', '13', 'J'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Seat Selection -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <b><h3 class="text-success" id="total_cost_show"></h3></b>
                    <input type="hidden" name="totalbill" id="total_cost">
                    <input type="hidden" name="submitby" value="Counter_General">
                    <button type="submit" class="btn btn-success mt-3 btn-lg">Reserve</button>
                </div>
            </div>
          </div>
        </section>
    </form>
    
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
        document.getElementById('total_cost_show').innerText = 'Total Payble : BTD - ' + totalCost + 'Tk.';
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
<script>
    function copyLinkedText(event) {
        // Prevent the default link behavior (navigation)
        event.preventDefault();

        // Get the linked text
        const linkedText = event.target.innerText;

        // Create a temporary textarea element
        const tempTextarea = document.createElement('textarea');

        // Set the value of the textarea to the linked text
        tempTextarea.value = linkedText;

        // Append the textarea to the document
        document.body.appendChild(tempTextarea);

        // Select the text in the textarea
        tempTextarea.select();
        tempTextarea.setSelectionRange(0, 99999); // For mobile devices

        // Execute the copy command
        document.execCommand('copy');

        // Remove the textarea from the document
        document.body.removeChild(tempTextarea);

        // Display a message or perform any other action
        //alert('Text copied to clipboard: ' + linkedText);
    }
</script>

  </main><!-- End #main -->

<?php include 'footer.php';?>  