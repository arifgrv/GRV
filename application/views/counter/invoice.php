<!DOCTYPE html>
<html lang="en">
<?php echo "<pre>"; ?>
<?php print_r($reservation); ?>
<?php echo '<br/>customer' ;?>
<?php print_r($customer); ?>
<?php echo '<br/>Accounts'; ?>
<?php print_r($accounts); ?>
<?php echo "</pre>"; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .invoice {
            max-width: 300px;
            margin: 0 auto;
            text-align: center;
            padding: 10px;
        }

        .header {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .item {
            margin-bottom: 5px;
            text-align: left;
            font-size: 12px;
        }

        .footer {
            margin-top: 10px;
            font-size: 12px;
        }

        h2 {
            font-size: 14px;
        }

        table {
            width: 100%;
            margin-top: 5px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 5px;
            font-size: 12px;
        }

        th {
            background-color: #f2f2f2;
        }

        hr {
            border-top: 1px dashed #000;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .total-amount {
            font-weight: bold;
        }
    </style>
    <title>GRV Cineplex Invoice</title>
</head>

<body>
    <div class="invoice">
        <div class="header">GRV Cineplex</div>
        <p>BIN: 004214822-1101<br/>232, Kazihata Rajshahi, Bangladesh.</p>
        <div class="item"><b>Invoice #: <?php echo $invoice_number; ?></b></div>
        <div class="item">Booking Date: <?php 
            $timestamp = strtotime($booking_date);
            $formattedDate = date('d-m-Y', $timestamp);
            echo $formattedDate;
        ?></div>
        <hr>
        <h2>MOVIE TICKET</h2>
        <hr>
        <div class="item">
            <div><u><b>Customer Information:</b></u></div>
        </div>
        <div class="item">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><?php echo $customer['full_name']; ?></td>
                </tr>
                <tr>
                    <td>Mobile:</td>
                    <td><?php echo $customer['mobile']; ?></td>
                </tr>
                <tr>
                    <td>Reservation:</td>
                    <td><?php echo $reserve_date.' - '.$movie_name.' - '.$show_time; ?></td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="item">
            <div><b>Details:</b></div>
            <table>
                <tr>
                    <th>SL#</th>
                    <th>Seat No</th>
                    <th>Unit Price</th>
                </tr>
                <?php $totalAmount = 0; foreach ($invoice_record as $key => $value) { ?>
                    <tr>
                        <td><?php echo ($key + 1); ?></td>
                        <td><?php echo $value->seat_number; ?></td>
                        <td><?php echo $value->price; ?></td>
                    </tr>
                    <?php $totalAmount += $value->price; }; ?>
            </table>
            <hr>
        </div>
        <div class="item total-amount">
            <div>Total Amount: BDT <?php echo number_format($totalAmount, 2, '.', ','); ?> Tk.</div>
        </div>
        <hr>
        <p class="item">[with Includes all ADM + ACM + VAT + Movie Tax + Hall Tax]</p>
        <hr>
        <div class="footer">Thank you for choosing GRV Cineplex! Enjoy the show!</div>
    </div>
</body>

</html>
