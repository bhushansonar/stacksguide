<style type="text/css">
    label {
        display: block;
        margin: 5px 0px;
        color: #AAA;
    }
    input {
        display: block;
    }
    input[type=submit] {
        margin-top: 20px;
    }
</style>
<h1>Processing Please Wait...</h1>
<form action="https://globalgatewaye4.firstdata.com/pay" method="POST" name="myForm" id="myForm">

    <?php
    $x_login = "WSP-SOSIC-SzIbjQAymw"; // Take from Payment Page ID in Payment Pages interface
    $transaction_key = "dRj8_UIz4vZDTd3gqNVi"; // Take from Payment Pages configuration interface
    $x_amount = $payment_amt;
    $x_userid = $user_id;
    $x_build_advertisement_id = $build_advertisement_id;
    $x_payment_type = "advertisement";
    $x_currency_code = "USD"; // Needs to agree with the currency of the payment page
    srand(time()); // initialize random generator for x_fp_sequence
    $x_fp_sequence = rand(1000, 100000) + 123456;
    $x_fp_timestamp = time(); // needs to be in UTC. Make sure webserver produces UTC
// The values that contribute to x_fp_hash
    $hmac_data = $x_login . "^" . $x_fp_sequence . "^" . $x_fp_timestamp . "^" . $x_amount . "^" . $x_currency_code;
    $x_fp_hash = hash_hmac('MD5', $hmac_data, $transaction_key);

    echo ('<input name="x_login" value="' . $x_login . '" type="hidden">' );
    echo ('<input name="x_amount" value="' . $x_amount . '" type="hidden">' );
    echo ('<input name="x_fp_sequence" value="' . $x_fp_sequence . '" type="hidden">' );
    echo ('<input name="x_fp_timestamp" value="' . $x_fp_timestamp . '" type="hidden">' );
    echo ('<input name="x_fp_hash" value="' . $x_fp_hash . '" size="50" type="hidden">' );
    echo ('<input name="x_currency_code" value="' . $x_currency_code . '" type="hidden">');
    echo ('<input name="x_user_id" value="' . $x_userid . '" type="hidden">');
    echo ('<input name="x_payment_type" value="' . $x_payment_type . '" type="hidden">');
    echo ('<input name="x_build_advertisement_id" value="' . $x_build_advertisement_id . '" type="hidden">');
    ?>
    <input type="hidden" name="x_show_form" value="PAYMENT_FORM"/>
</form>
<script type='text/javascript'>document.myForm.submit();</script>