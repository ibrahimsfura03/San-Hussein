<?php ob_start(); ?>
<?php
if (!isset($_SESSION['user_name'])) {
    header("Location: ./login.php");
    exit();
}

$user_id = $_SESSION['user_name'];
?>






<!-- <?php
        // $query = "SELECT * FROM products";
        // $select_all_product_query = mysqli_query($connection, $query);

        // while ($row = mysqli_fetch_assoc($select_all_product_query)) {
        //     $product_id = $row['product_id'];
        //     $product_name = $row['product_name'];
        //     $product_image = $row['product_image'];
        //     $product_description = $row['product_description'];
        //     $product_tag = $row['product_tag'];
        //     $product_price = $row['product_price'];
        ?>
 -->


<!-- 
    <div class="product_card">
        <div class="col-md-12 mb-5">
            <div class="card">
                <div class="text-center font-weight-bold pt-3">
                    <div class="clearfix mx-4">
                        <h6 class="float-left my-2"> <?php echo $product_name; ?> </h6>
                        <button class="float-right btn btn-outline-success btn-sm">
                            <h6 class="my-auto"><i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M7 22q-.825 0-1.413-.588T5 20q0-.825.588-1.413T7 18q.825 0 1.413.588T9 20q0 .825-.588 1.413T7 22Zm10 0q-.825 0-1.413-.588T15 20q0-.825.588-1.413T17 18q.825 0 1.413.588T19 20q0 .825-.588 1.413T17 22ZM6.15 6l2.4 5h7l2.75-5H6.15ZM7 17q-1.125 0-1.7-.988t-.05-1.962L6.6 11.6L3 4H1.975q-.425 0-.7-.288T1 3q0-.425.288-.713T2 2h1.625q.275 0 .525.15t.375.425L5.2 4h14.75q.675 0 .925.5t-.025 1.05l-3.55 6.4q-.275.5-.725.775T15.55 13H8.1L7 15h11.025q.425 0 .7.288T19 16q0 .425-.288.713T18 17H7Zm1.55-6h7h-7Z" />
                                    </svg></i>
                            </h6>
                        </button>
                    </div>
                    <h6 class=""><b class="text-danger">Price</b> $ <?php echo $product_price; ?> </h6>
                </div>
                <img src="images/<?php echo $product_image; ?>" alt="" class="img-fluid mx-auto" width="100">
                <div class="card-body mb-n3">
                    <p class=""><?php echo $product_description; ?></p>
                </div>
            </div>
        </div>
    </div> -->
<!-- <?php
        // }
        ?> -->

<div class="row">
    <?php
    $query = "SELECT * FROM products";
    $select_all_product_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_product_query)) {
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $product_image = $row['product_image'];
        $product_description = $row['product_description'];
        $product_tag = $row['product_tag'];
        $product_price = $row['product_price'];
    ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <div class="text-center font-weight-bold pt-3">
                    <div class="clearfix mx-4">
                        <h6 class="float-left my-2"> <?php echo $product_name; ?> </h6>
                        <?php echo "<a href='includes/product_select.php?p_id={$product_id}'>"; ?>
                        <button class='float-right btn btn-outline-success btn-sm' popovertarget='addcart'>
                            <h6 class='my-auto'><i><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'>
                                        <path fill='currentColor' d='M7 22q-.825 0-1.413-.588T5 20q0-.825.588-1.413T7 18q.825 0 1.413.588T9 20q0 .825-.588 1.413T7 22Zm10 0q-.825 0-1.413-.588T15 20q0-.825.588-1.413T17 18q.825 0 1.413.588T19 20q0 .825-.588 1.413T17 22ZM6.15 6l2.4 5h7l2.75-5H6.15ZM7 17q-1.125 0-1.7-.988t-.05-1.962L6.6 11.6L3 4H1.975q-.425 0-.7-.288T1 3q0-.425.288-.713T2 2h1.625q.275 0 .525.15t.375.425L5.2 4h14.75q.675 0 .925.5t-.025 1.05l-3.55 6.4q-.275.5-.725.775T15.55 13H8.1L7 15h11.025q.425 0 .7.288T19 16q0 .425-.288.713T18 17H7Zm1.55-6h7h-7Z' />
                                    </svg></i>
                            </h6>
                        </button>
                        </a>
                    </div>
                    <h6 class=""><b class="text-danger">Price</b> $ <?php echo $product_price; ?> </h6>
                </div>
                <img src="images/<?php echo $product_image; ?>" alt="" class="img-fluid mx-auto" width="100">
                <div class="card-body mb-n3">
                    <p class=""><?php echo $product_description; ?></p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>