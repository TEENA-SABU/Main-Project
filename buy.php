<?
include('auth_session.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <style>
        body {
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #04AA6D;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['name'])) {
        // removes backslashes
        $name = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
        $name = mysqli_real_escape_string($con, $name);


        $address   = stripslashes($_REQUEST['address']);
        $address    = mysqli_real_escape_string($con, $address);
        $city   = stripslashes($_REQUEST['city']);
        $city    = mysqli_real_escape_string($con, $city);

        $pin  = stripslashes($_REQUEST['pin']);
        $pin    = mysqli_real_escape_string($con, $pin);
        $phone  = stripslashes($_REQUEST['phone']);
        $phone    = mysqli_real_escape_string($con, $phone);


        $query    = "INSERT into `buy` (name,address,city,pin,phone)
                     VALUES ('$name','$address','$city','$pin','$phone')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            //echo "<div class='form'>
            echo '<script>alert("SUCSESS")</script>';

            header("Location: paymentindex.php");
            //</div>";
        } else {
            echo "<div class='form'>
                  <h3>FAILED.</h3><br/>
                  <p class='link'>Click here to <a href='buy.php'>complaints</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <form class="form" name="user_form" action="" method="post">

            <h2>CHECK OUT</h2>
            <!--<p>Resize the browser window to see the effect. When the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other.</p>-->
            <div class="row">
                <div class="col-75">
                    <div class="container">
                        <form action="/action_page.php">

                            <div class="row">
                                <div class="col-50">

                                    <!-- <form class="form" action="" method="post">-->
                                    <h3>Billing Address</h3>



                                    <label for="name"><i class="fa fa-user"></i> Name</label>
                                    <input type="text" id="name" name="name" oninput="usercheck();" required />
                                    <span style="color:red;" id="out_user"></span>


                                    <!-- <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com">-->
                                    <label for="address"><i class="fa fa-address-card-o"></i> Address</label>
                                    <input type="text" id="address" name="address" oninput="addresscheck();" required />
                                    <span style="color:red;" id="out_address"></span>


                                    <label for="city"><i class="fa fa-institution"></i> City</label>
                                    <input type="text" id="city" name="city" oninput="usercheck();" required />
                                    <span style="color:red;" id="out_user"></span>


                                    <div class="row">
                                        <div class="col-50">
                                            <label for="state">Phone Number</label>
                                            <input type="text" id="out_phonevalue" name="phone" oninput="mobilecheck();" required />
                                            <span style="color:red;" id="out_phone"></span>
                                        </div>

                                        <div class="col-50">
                                            <label for="zip">Pin</label>
                                            <input type="text" id="out_pinvalue" name=" pin" oninput="pincheck();" required />
                                            <span style="color:red;" id="out_pin"></span>
                                        </div>
                                        <input type="date" name="startdate" id='sdate' required="required">
                                        <script>
                                            var today = new Date().toISOString().split('T')[0];
                                            document.getElementsByName("startdate")[0].setAttribute('min', today);
                                        </script>
                                    </div>
                                </div>
                            </div>



                            <!-- <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>-->

                            <center> <input type="submit" name="submit" value="CHECK OUT" style=background-color:#45a049 "login-button">
                                <center>

                                    <!--<button onclick="generate()">CHECK OUT</button>-->

                                    <!--<input type="submit" name="submit" value="CHECK OUT" class="login-button" id="uniqueID">-->


                                <?php
                            }
                                ?>
                                <script src="validation.js"></script>
                    </div>
                </div>

            </div>

</body>

</html>