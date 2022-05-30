<?php
session_start();
$totalsum = $_SESSION['totsum'];
?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        body {
            background-image: url("https://wallpaperaccess.com/full/4597119.jpg");
            background-size: cover;




            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            /* background: linear-gradient(135deg, #71b7e6, #9b59b6); */
        }

        input {
            border-radius: 4px;
            width: 250px;
            height: 50px;
            border: none;
            border-bottom: 2px solid red;

        }

        h1 {
            color: red;
            margin-left: 80px;
        }
    </style>
    <meta charset="utf-8" />
    <title>add product</title>
    <link rel="stylesheet" href="style1.css" />
</head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<body>
    <form>
        <input type="textbox" name="name" id="name" placeholder="Enter your name" /><br /><br />
        <input type="text" readonly name="amt" id="amt" value="<?php echo $_SESSION['totsum']; ?>" /><br /><br />

        <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()" />
    </form>

    <script>
        function pay_now() {
            var name = jQuery('#name').val();
            var amt = jQuery('#amt').val();

            jQuery.ajax({
                type: 'post',
                url: 'payment_process.php',
                data: "amt=" + amt + "&name=" + name,
                success: function(result) {
                    var options = {
                        "key": "rzp_test_vyaXKQqMCZHdCM",
                        "amount": amt * 100,
                        "currency": "INR",
                        "name": "Acme Corp",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function(response) {
                            console.log(response);
                            jQuery.ajax({
                                type: 'post',
                                url: 'payment_process.php',
                                data: "payment_id=" + response.razorpay_payment_id,
                                success: function(result) {
                                    window.location.href = "last.php"
                                }
                            });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }
            });


        }
    </script>
</body>

</html>