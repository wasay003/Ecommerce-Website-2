<?php include('dbcon.php'); ?>
<?php require('session_include.php'); ?>



<?php include('dbcon.php'); ?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT `order_id` FROM `orders` WHERE `user_id` = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        $order_ids = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $order_ids[] = $row['order_id'];
        }

        if (!empty($order_ids)) {
            foreach ($order_ids as $order_id) {
                $query = "DELETE FROM `order_items` WHERE `order_id` = '$order_id'";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    die("Failed to delete from order_items: " . mysqli_error($connection));
                }

                $query = "DELETE FROM `orders` WHERE `order_id` = '$order_id'";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    die("Failed to delete from orders: " . mysqli_error($connection));
                }
            }
        }

        $query = "DELETE FROM `users` WHERE `id` = '$id'";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Failed to delete user: " . mysqli_error($connection));
        }

        header("location:admin_panel1.php");
    }
} else {
    echo "No user ID provided.";
}

?>