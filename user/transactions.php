<?php ob_start(); ?>
<?php include "includes/user_header.php";
include "../includes/db.php";
?>

<?php
if (!isset($_SESSION['user_name'])) {
    header("Location: ../login.php");
    exit();
}

?>

<?php include("includes/user_navigation.php"); ?>



<!--********************** End of Header **********************-->
<!--********************** SideNav **********************-->

<!--********************** Main **********************-->
<div class="main">
    <div class="shadow alert alert-dark alert-dismissible fade show mx-2 mb-5 my-2">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>For advertisments <span class="mdi mdi-alert-box"></span></strong>
        <a href="" class="text-info" style="text-decoration: none;">Click here to promote your products.</a>
    </div>
    <!--********************* main notify **********************-->




    <!--
************************************************************************************************* -->



    <!-- body content -->


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4">Transaction History</h2>
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        All Transactions
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>


                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Date</th>
                                        <th>Receipt</th>
                                        <th>Amount</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_SESSION['user_id'])) {
                                        $the_user_id = $_SESSION['user_id'];
                                    }

                                    $query = "SELECT * FROM orders WHERE order_user_id = {$the_user_id} AND order_status = 'Deliverd' ";
                                    $select_cart_query = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($select_cart_query)) {
                                        $order_id = $row['order_id'];
                                        $order_price = $row['order_total_price'];
                                        $order_quantity = $row['order_total_quantity'];
                                        $order_status = $row['order_status'];
                                        $order_date = $row['order_date'];
                                        $order_user_id = $row['order_user_id'];

                                        if (empty($row)) {
                                            echo "No Transactons :(";
                                        }


                                        echo "<tr>";
                                        echo "<td>$order_id</td>";
                                        echo "<td>$order_date</td>";
                                        echo "<td><a href='receipt.php?r_id={$order_id}'>View Receipt</a></td>";
                                        echo "<td>$order_price</td>";
                                        echo "<td>$order_quantity</td>";
                                        if ($order_status == 'Deliverd') {
                                            echo "<td><span class='badge bg-success text-light'>Successful</span></td>";
                                        } elseif ($order_status == 'placed') {
                                            echo "<td><span class='badge bg-warning text-light'>Pending</span></td>";
                                        } else {
                                            echo "<td><span class='badge bg-danger text-light'>Failed</span></td>";
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- end of main body -->




    <!--
*************************************************************************************************** -->




</div>
<!--********************** End of Main **********************-->
<?php include "includes/user_footer.php" ?>