<!DOCTYPE html>
<html>
<head>
    <title>Select Option Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <label for="payment_method">Select Payment Method:</label>
    <select name="payment_method" id="payment_method">
        <option value="paypal">PayPal</option>
        <option value="stkr_wallet">STKR Wallet</option>
    </select>

    <div id="paypal_selected">Selected PayPal</div>
    <div id="stkr_selected" style="display: none">Selected STKR Wallet</div>

    <script>
        $(document).ready(function () {
            $("#paypal_selected").show();
            
            $("#payment_method").change(function () {
                var selectedOption = $(this).val();
                if (selectedOption === 'paypal') {
                    $("#paypal_selected").show();
                    $("#stkr_selected").hide();
                } else if (selectedOption === 'stkr_wallet') {
                    $("#paypal_selected").hide();
                    $("#stkr_selected").show();
                }
            });
        });
    </script>
</body>
</html>
