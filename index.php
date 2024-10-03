<?php require('session_include.php');  ?>
<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


<nav>
    <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Contact</a></li>
       
        <li>
        <?php
          if (isset($_SESSION['Email'])) {
              echo  "<b style='color:#aliceblue'> Welcome " . $_SESSION['Email'] . "</b>";

          }
          else{
              echo "<b style='color:#aliceblue'> Welcome Guest </b>";
          }
          ?>

        </li>
        
        <li>
        <?php
        if (isset($_SESSION['Email'])) {
            echo "<a href='sign-out.php'>
                    Sign out
                  </a>";
        } else {
            echo "<a href='Sign-in.php' style='color:#aliceblue'>
                    Sign In
                  </a>";
        }

        ?>    
        
        </li>
        <?php
          if (isset($_SESSION['Email'])) {
              $id = $_SESSION['id'];
              echo  " <li><a href='User_View_Order.php?id=$id' style='color:#aliceblue'> View Orders </a></li>";

          }
          ?>
         

        <button type="button" class="cart-btn" data-bs-toggle="modal" data-bs-target="#shoppingCartModal">
         <i class="ri-shopping-cart-2-line"></i>
      </button>
    </ul>
</nav>
<div class="modal fade" id="shoppingCartModal" tabindex="-1" aria-labelledby="shoppingCartModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="shoppingCartModalLabel">
              Shopping Cart
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  
                  
                </tr>
              </thead>
              <tbody>
<?php
if (!empty($_SESSION['cart'])) {
    $_SESSION['total'] = 0;

    foreach($_SESSION['cart'] as $key => $item) { ?>
        <tr>
            <td><?php echo $item['product_name']; ?></td>
            <td id="product_price_<?php echo $key; ?>">$<?php echo $item['product_price']; ?></td>
            <?php $_SESSION['total'] += $item['product_price']; ?>
            <td>
              <input type="hidden" name="key" value="<?php echo $key; ?>">
              
              <input 
                type="number" 
                name="quantity" 
                id="quantity_<?php echo $key; ?>" 
                min="1" 
                max="10" 
                value="1" 
                style="text-align:center;" 
                onkeydown="return false" 
                onchange="updateCart(<?php echo $key; ?>, this.value, <?php echo $item['product_price']; ?>)" 
                >
              

            </td>

            <td>
                <a class="btn btn-sm btn-danger" href="delete_items.php?key=<?php echo $key; ?>">Remove</a>
            </td>
        </tr>
    <?php
    }
} else {
    echo "<tr><td colspan='3'>Your cart is empty.</td></tr>";
}
?>
        
<tr>
    <td colspan="2" class="text-end">Total:</td>
    <td>$<?php echo empty($_SESSION['cart']) ? 0 : $_SESSION['total']; ?></td>
</tr>
</tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <a href="checkout.php">
            <button type="button" class="btn btn-primary" name="checkout-btn">
              Proceed to Checkout 
            </button>
            </a>
          </div>
        </div>
      </div>
    </div>

<div class="products">
<?php


$query = "select * from `products`";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("query failed");
} else {

    while ($row = mysqli_fetch_assoc($result)) {
?>

    <div class="card" style="width: 18rem;">
        <img src="<?php echo $row['product_image']?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $row['product_name']?> - <?php echo $row['product_category']?></h5>
            <p class="card-text"><?php echo $row['product_description']?></p>
            <a href="order_place.php?id=<?php echo $row['id']; ?>" class="btn btn-success" name="order_button">Add to Cart</a>
            
        </div>
        
    </div>
    
    <?php } 
    }
    ?>
    </div>
<?php include('footer.php'); ?>
