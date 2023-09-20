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
                            <button id="submit-payment" type="submit" class="btn btn-block btn-primary py-3 w-100" data-total="<?=$Total?>">
                                Thanh toán - <?=$Total?>$
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php include_once('../app/views/shares/footer.php') ?>