

function updateCart(key, quantity, productPrice) {
    let newPrice = productPrice * quantity;
    
    document.getElementById("product_price_" + key).innerHTML =
    "$" + newPrice.toFixed(2);
    
    $.ajax({
        url: "update_cart.php",
        type: "POST",
        data: {
            key: key,
            quantity: quantity,
        },
        success: function(response) {
            console.log("Cart updated:", response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error updating cart:", textStatus, errorThrown);
        }
    });
}
  
  