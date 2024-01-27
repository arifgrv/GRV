<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Day wise Accounts Report</title>
    <style type="text/css">


        .rounded-image {
            width: 100px;
            height: 100px;
            border: 5px solid #231F20; /* Black */
            border-radius: 50%;
            overflow: hidden;
            background-color: white;
        }

        .container {
            margin-top: 30px;
        }

        h3 {
            color: #BB9642; /* Golden */
        }

        .bg-light {
            background-color: #BB9642; /* Golden */
            color: #231F20; /* Black */
        }

        .btn-primary {
            background-color: #BB9642; /* Golden */
            border-color: #BB9642; /* Golden */
        }

        .btn-primary:hover {
            background-color: #7F5D1D; /* Darker Golden */
            border-color: #7F5D1D; /* Darker Golden */
        }


        #salesTable th,
        #salesTable td {
            border-color: #231F20; /* Black */
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="mb-5" style="text-align: center;">
            <img class="rounded-image" src="<?php echo base_url('Assets/grv-transprent-logo.png'); ?>" width="100" height="100">
            <h3><u>GRV Cineplex Sales Report</u></h3>
        </div>

        <form action="<?php echo base_url("index.php/AccountsDReport"); ?>" method="POST">
            <div class="row bg-light p-3">
                <div class="col-md-4">
                    <label for="Date_From">From:</label>
                    <input class="form-control" type="date" name="Date_From" required>
                </div>
                <div class="col-md-4">
                    <label for="Date_TO">To:</label>
                    <input class="form-control" type="date" name="Date_TO" required>
                </div>
                <div class="col-md-4 text-center mt-2">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <table id="salesTable" class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Invoice Number</th>
                    <th>Booking Date</th>
                    <th>Customer Name</th>
                    <th>Customer Mobile</th>
                    <th>Show Information</th>
                    <th>Seat Numbers</th>
                    <th>Ticket Price</th>
                </tr>
            </thead>
            <tbody>

                <?php $TotalSit = 0;
                $TotalCollection = 0; ?>
                <?php foreach ($accReport as $key => $row) { ?>
                    <tr>
                        <td><?php echo ($key + 1) ?></td>
                        <td><?php echo $row['invoice_number']; ?></td>
                        <td><?php echo $row['currentdate']; ?></td>
                        <td><?php echo $row['customer_name']; ?></td>
                        <td><?php echo $row['customer_mobile']; ?></td>
                        <td><?php echo $row['reserve_date'] . ' - ' . $row['movie_name'] . ' - ' . $row['show_time']; ?></td>
                        <td><?php echo $row['seat_number']; ?></td>
                        <td><?php echo $row['totalbill']; ?></td>
                    </tr>
                    <?php
                    $TotalSit = ($TotalSit + 1);
                    $TotalCollection = $TotalCollection + $row['totalbill'];
                }; ?>

                <!-- Sales data will be dynamically loaded here -->
                <tr>
                    <td colspan="9"> <b>Total Sit : <?php echo $TotalSit; ?></b></td>
                </tr>
                <tr>
                    <td colspan="9"> <b>Total Collection : BDT <?php echo number_format($TotalCollection, 2); ?> Tk.</b></td>
                </tr>
            </tbody>

        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
