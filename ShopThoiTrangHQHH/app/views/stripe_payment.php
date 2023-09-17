<?php include_once('../app/views/shares/header.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Stripe Payment</title>

</head>

<body>
    <div>

        <div class="row justify-content-center">
            <div class="col-10 col-lg-5">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h1 class="text-center mb-4">Thông tin thẻ</h1>
                        <form id="payment-form" method="post" action="?route=stripe-ajax">
                            <div class="form-group">
                                <label for="card-number">Số thẻ</label>
                                <div id="card-number" class="form-control">
                                    <!-- A Stripe Element will be inserted here for the card number. -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="card-expiry">Hạn thẻ</label>
                                <div id="card-expiry" class="form-control">
                                    <!-- A Stripe Element will be inserted here for the card expiry date. -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="card-cvc">Số CVC</label>
                                <div id="card-cvc" class="form-control">
                                    <!-- A Stripe Element will be inserted here for the card CVC. -->
                                </div>
                            </div>
                            <div id="card-errors" role="alert"></div>
                            <button id="submit-payment" type="submit" class="btn btn-block btn-primary py-3 w-100">
                                Thanh toán - <span id="totalPrice"></span>đ
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script>
        // Set your Stripe Publishable Key dynamically using a PHP variable
        var publishableKey = '<?php echo $publishableKey; ?>';
    
        // Load Stripe.js with your Publishable Key
        var stripe = Stripe(publishableKey);
    
        // Create an instance of Elements.
        var elements = stripe.elements();
    
        var cardNumber = elements.create('cardNumber');
    
        // Create an instance of the card Element for card expiry.
        var cardExpiry = elements.create('cardExpiry');
    
        // Create an instance of the card Element for card CVC.
        var cardCvc = elements.create('cardCvc');
    
        // Add the card Number Element into the `card-number` div.
        cardNumber.mount('#card-number');
    
        // Add the card Expiry Element into the `card-expiry` div.
        cardExpiry.mount('#card-expiry');
    
        // Add the card CVC Element into the `card-cvc` div.
        cardCvc.mount('#card-cvc');
    
        // Handle real-time validation errors from the card Element.
        cardNumber.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        </script>
        <script>
        $('#submit-payment').on('click', function() {
            // Prevent the form from submitting before confirming the payment
            event.preventDefault();

            // Fetch the client secret from the server using AJAX
            $.ajax({
                type: 'POST',
                url: '?route=stripe',
                success: function(response) {
                    var data = JSON.parse(response);
                    // Use the client secret to confirm the payment
                    stripe.confirmCardPayment(data.clientSecret, {
                        payment_method: {
                            card: cardNumber,
                        },
                    }).then(function(result) {
                        if (result.error) {
                            // Display any errors to the customer
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                        } else {
                            // Payment is successful, you can redirect or show a success message
                            console.log(result.paymentIntent);
                        }
                    });
                },
                error: function(error) {
                    console.error('Error fetching client secret:', error);
                }
            });
        });
    </script>
    </div>
</body>

</html>
<?php include_once('../app/views/shares/footer.php') ?>