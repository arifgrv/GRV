<!DOCTYPE html>
<html lang="en">
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
        <div class="item"><b>Invoice #: <?php echo $InvoiceData[0]['invoice_number']; ?></b></div>
        <div class="item">Booking Date: <?php 
            $timestamp = strtotime($InvoiceData[0]['booking_date']);
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
                    <td><?php echo $InvoiceData[0]['customer_name']; ?></td>
                </tr>
                <tr>
                    <td>Mobile:</td>
                    <td><?php echo $InvoiceData[0]['customer_mobile']; ?></td>
                </tr>
                <tr>
                    <td>Reservation:</td>
                    <td><?php echo $InvoiceData[0]['reserve_date'].' - '.$InvoiceData[0]['movie_name'].' - '.$InvoiceData[0]['show_time']; ?></td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="item">
            <div><b>Sit Number:</b></div>
            <table>
                <tr>
                    <td>
                        <?php 
                        foreach ($InvoiceData as $key => $value) { 
                           $tiket[]= $value['sit_number'];
                         }; 

                         echo implode(', ', $tiket);

                         ?>
                    </td>
                </tr> 
            </table>
            <hr>
            <div><b>Details:</b></div>
            <table>
                <tr>
                    <td>Bill Amount:</td>
                    <td><?php echo $InvoiceData[0]['total_bill'] ;?></td>
                </tr>
                <tr>
                    <td>Payble Amount:</td>
                    <td><?php echo $InvoiceData[0]['received_amount'] ;?></td>
                </tr>
                <tr>
                    <td>Discount Avail %</td>
                    <td><?php $discount=((($InvoiceData[0]['total_bill']-$InvoiceData[0]['received_amount'])/$InvoiceData[0]['total_bill'])*100);echo number_format($discount, 2, '.', ',') ?></td>
                </tr>
            </table>
            <hr>
        </div>
        <div class="item total-amount">
            <div>Total Amount: BDT <?php echo number_format($InvoiceData[0]['received_amount'] , 2, '.', ','); ?> Tk.</div>
        </div>
        <hr>
        <p class="item">[with Includes all ADM + ACM + VAT + Movie Tax + Hall Tax]</p>
        <hr>
        <p class="item">Booking by:<?php echo $this->session->userdata('user_name') ; ?></p>
        <hr>
        <div class="footer">Thank you for choosing GRV Cineplex! Enjoy the show!</div>
    </div>
</body>

</html>
