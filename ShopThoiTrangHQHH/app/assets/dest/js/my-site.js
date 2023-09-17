$(document).on('click', '.remove', function () {
    debugger;
    var Id = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: '?route=delete-cart-item',
        data: { Id: Id },
        success: function (response) {
            var data = JSON.parse(response);
            if (data.success) {
                // $('#phieu-container div#'+maSoPhieu).remove();
                $('.shop_table').load(" .shop_table");
                $('.beta-select').load(" .beta-select");
                $('.cart-body').load(" .cart-body");
                alert("Xoa thanh cong!");
            } else {
                alert("Xoa khong thanh cong!");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
});

// var qty = document.getElementById("product-quantity<?= $cart['Id']; ?>");
// 									var product = document.querySelector("#product-quantity<?= $cart['Id']; ?>");
// 									// Add an event listener to the input field
// 									qty.addEventListener("input", function() {
// 										// Get the current value of the input field
// 										var qtyValue = qty.value;
// 										var Id = product.dataset.id;
// 										// let matches = CartId.match(/\d+/);
// 										// let Id = matches ? parseInt(matches[0]) : null;
// 										var MauSp = product.dataset.mausp;
// 										var SizeSp = product.dataset.sizesp;

// 										var xhr = new XMLHttpRequest();
// 										xhr.onreadystatechange = function() {
// 											if (xhr.readyState == 4 && xhr.status == 200) {
// 												location.reload();
// 											}
// 										}
// 										xhr.open("POST", "?route=update-cart-item");
// 										xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// 										xhr.send("Id=" + encodeURIComponent(Id) + "&soluong=" + encodeURIComponent(qtyValue) + "&MauSp=" + encodeURIComponent(MauSp) + "&SizeSp=" + encodeURIComponent(SizeSp));
// 										// Update the result element with the new value
// 									});

$(document).ready(function () {
    $(".EditForm").submit(function (e) {
        debugger;
        e.preventDefault(); // prevent default form submission
        $.ajax({
            url: "?route=update-ajax", // URL of PHP script
            type: "POST", // request method
            data: $(this).serializeArray(),
            // data: $(this).serialize(), // serialize form data
            success: function (response) {
                var data = JSON.parse(response);
                debugger;
                if (data.success) {
                    alert("Sua thanh cong!");
                    // var values = {};
                    // $.each($('.EditForm').serializeArray(), function(i, field) {
                    //     values[field.name] = field.value;
                    // });
                    // $('#'+values['masophieu']+'').load(' #'+values['masophieu']+'');
                    $('.shop_table').load(" .shop_table");
                    $('.beta-select').load(" .beta-select");
                    $('.cart-body').load(" .cart-body");
                } else {
                    alert("Sua khong thanh cong!");
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});


// $(document).ready(function () {
//     $("#payment-form").submit(function (e) {
//         debugger;
//         e.preventDefault(); // prevent default form submission

//         $.ajax({
//             url: "?route=stripe", // URL of PHP script
//             type: "POST", // request method
//             data: $(this).serialize(), // serialize form data
//             success: function (response) {
//                 var data = JSON.parse(response);
//                 debugger;
//                 if (data.success) {
//                     alert("Thanh toan thanh cong");
//                     // var values = {};
//                     // $.each($('.EditForm').serializeArray(), function(i, field) {
//                     //     values[field.name] = field.value;
//                     // });
//                     // $('#'+values['masophieu']+'').load(' #'+values['masophieu']+'');

//                     stripe.confirmCardPayment(data.clientSecret, {
//                         payment_method: {
//                             card: cardNumber,
//                         },
//                     }).then(function (result) {
//                         if (result.error) {
//                             // Display any errors to the customer
//                             var errorElement = document.getElementById('card-errors');
//                             errorElement.textContent = result.error.message;
//                         } else {
//                             // Payment is successful, you can redirect or show a success message
//                             console.log(result.paymentIntent);

//                             // Use clientSecret in your JavaScript code as needed
//                             // console.log('Client Secret:', clientSecret);
//                             // console.log('Public key:', publishableKey);

//                             // The rest of your client-side JavaScript code here...
//                         }
//                     });

//                 } else {
//                     alert("Thanh toan khong thanh cong!");
//                 }
//             },
//             error: function (xhr) {
//                 console.log(xhr.responseText);
//             }
//         });

//     });
// });


// $(document).on('click','.update-phieu', function(e){
//     debugger;
//     e.preventDefault();
//     // var button_id = $(this).attr('masophieu');
//     // $('#'+button_id).click(function(){
//     //   // your function here
//     //    alert(button_id); // just to see if ID is retrieved
//     // });
//     var masophieu = $(this).data('masophieu');
//     var hoten = $(this).data('hoten');
//     var masinhvien = $(this).data('masinhvien');
//     var chuyennganh = $(this).data('chuyennganh');
//     var congty = $(this).data('congty');
//     $.ajax({
//         type: 'POST',
//         url: '?route=update-ajax',
//         data: { masophieu: masophieu, hoten: hoten, masinhvien: masinhvien, chuyennganh: chuyennganh, congty: congty },
//         success: function(response){
//             var data = JSON.parse(response);
//             if(data.success){
//                 alert("Sua thanh cong!");
//             }else{
//                 alert("Sua khong thanh cong!");
//             }
//         },
//         error: function(xhr){
//             console.log(xhr.responseText);
//         }
//     });
// });