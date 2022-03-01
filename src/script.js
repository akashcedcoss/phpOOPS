$(document).ready(function () {
  //AJAX request on page load
  $.ajax({
    url: "ajax.php",
    method: "POST",
    data: {
      action: "onload",
    },
    datatype: "JSON",
  }).done(function (response) {
    var responseData = $.parseJSON(response);
    displayCart(responseData);
  });

  //On Clicking Add to Cart Button
  $("body").on("click", ".add-to-cart", function (e) {
    e.preventDefault();

    $.ajax({
      url: "ajax.php",
      method: "POST",
      data: {
        // 'p_id':p_id
        id: $(this).data("pid"),
        action: "add",
      },
      datatype: "JSON",
    }).done(function (response) {
      var responseData = $.parseJSON(response);
      displayCart(responseData);
    });
  });

  //Remove Single Product from Cart
  $("body").on("click", ".rmBtn", function (e) {
    e.preventDefault();
    var del_id = $(this).data("rm_id");
    console.log(del_id); //fetching id of product to be deleted from cart
    $.ajax({
      url: "ajax.php",
      method: "POST",
      data: {
        del_id: del_id,
      },
      datatype: "JSON",
    }).done(function (response) {
      responseData = $.parseJSON(response);
      displayCart(responseData);
    });
  });

  //Empty Cart
  $("body").on("click", ".emptyCart", function (e) {
    e.preventDefault();
    $.ajax({
      url: "ajax.php",
      method: "POST",
      data: {
        emptyCart: "emptyCart",
      },
      datatype: "JSON",
    }).done(function (response) {
      responseData = $.parseJSON(response);
      displayCart(responseData);
    });
  });

  $('body').on('click', '.update_button', function(e){
    e.preventDefault();
    $updateInd = $(this).data('updateindex')
    $textId = $(this).data('textid');
    $.ajax({
        'url':'ajax.php',
        'method':'POST',
        'data':{
            'updateInd':$updateInd,
            'qty':$('#'+$textId).val()
        },
        datatype:'JSON'
    }).done(function(response){
        responseData = $.parseJSON(response);
        displayCart(responseData);
    })
});
});



function displayCart(cartArray) {
  if (cartArray.length != 0){
    var cartTable = `<div><div class="fl_l"><span>Cart</span></div><div class = "fl_r"><a href = "#" class = "emptyCart">Empty Cart</a></div></div><div><table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Update Quantity</th>
                    <th>Total Price</th>
                    <th>Remove Item</th>
                </tr>`;
  for (var i = 0; i < cartArray.length; i++) {
    cartTable += `<tr>
     <td>${cartArray[i].id}</td>
     <td>${cartArray[i].name}</td>
     <td><img src = "images/${cartArray[i].image}"></td>
     <td>${cartArray[i].price}</td>
     <td>${cartArray[i].quantity}</td>
     <td><input class = "update_id" type = "number" id = "${cartArray[i].id}">
          <input type = "button" data-updateindex="${i}" data-textid="${
      cartArray[i].id
    }" class = "update_button" value="Update">
     </td>
     <td>${cartArray[i].price * cartArray[i].quantity}</td>
     <td><a href = "#" class = "rmBtn" data-rm_id = "${i}">X</a></td>
   </tr>`;
  }
  cartTable += `</table></div>`;
}else{
  var cartTable = `<h2>Cart is Empty</h2>`
}

  $("#cartDiv").html(cartTable);
  var s = cartSum(cartArray);
  $("table").after(`<div class = "cartPrice">Total Price = ${s}</div>`);
}

function cartSum(cartArray) {
  var sum = 0;
  for (var i = 0; i < cartArray.length; i++) {
    sum += cartArray[i].quantity * cartArray[i].price;
  }
  return sum;
}
