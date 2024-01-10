<div class="container" style="margin-top:80px;">
    <h1 class="text-center">Manage Orders</h1>
    <hr><br>
    <div class="table-wrapper">
        <div class="table-title" style="border-radius: 14px;">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Order <b>Details</b></h2>
                </div>
            </div>
        </div>
        
        <table class="table table-striped table-hover text-center" id="NoOrder">
            <thead style="background-color: rgb(111 202 203);">
                <tr>
                    <th>Order Id</th>
                    <th>User Id</th>
                    <th>Address</th>
                    <th>Phone No</th>
                    <th>Amount</th>						
                    <th>Payment Mode</th>
                    <th>Order Date</th>				
                    <th>Items</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM `orders`";
                    $result = mysqli_query($conn, $sql);
                    $counter = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $Id = $row['userId'];
                        $orderId = $row['orderId'];
                        $address = $row['address'];
                        $zipCode = $row['zipCode'];
                        $phoneNo = $row['phoneNo'];
                        $amount = $row['amount'];
                        $orderDate = $row['orderDate'];
                        $paymentMode = $row['paymentMode'];

                        if($paymentMode == 0) {
                            $paymentMode = "Cash on Delivery";
                        }
                        else {
                            $paymentMode = "Online";
                        }
                        $orderStatus = $row['orderStatus'];
                        $counter++;
                        
                        echo '<tr>
                                <td>' . $orderId . '</td>
                                <td>' . $Id . '</td>
                                <td data-toggle="tooltip" title="' .$address. '">' . substr($address, 0, 20) . '...</td>
                                <td>' . $phoneNo . '</td>
                                <td>' . $amount . '</td>
                                <td>' . $paymentMode . '</td>
                                <td>' . $orderDate . '</td>
                                <td><a href="#" data-toggle="modal" data-target="#orderItem' . $orderId . '" class="view" title="View Details"><i class="fa-solid fa-arrow-up-right-from-square fs-4"></i></a></td>
                            </tr>';
                    }
                    if($counter==0) {
                        ?><script> document.getElementById("NoOrder").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not Recieve any Order!	</div>';</script> <?php
                    } 
                ?>
            </tbody>
        </table>
    </div>
</div> 

<?php 
    include 'partials/_orderItemModal.php';
?>

<link rel="stylesheet" href="fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.css">
<style>
    .tooltip.show {
        top: -62px !important;
    }
    .table-title {
        color: #fff;
        background: #4b5366;        
        padding: 16px 25px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 80px;
    }
    table {
        counter-reset: section;
    }

    .count:before {
        counter-increment: section;
        content: counter(section);
    }
    
    

</style>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>