<?php
// database connection code
if(isset($_POST['name']))
{
    // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
    $con = mysqli_connect('localhost', 'root', '', 'webtec');

    // get the post records
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $course = $_POST['course'];
	$book = $_POST['book'];
    $price = $_POST['price'];

    // database insert SQL code
    $sql = "INSERT INTO webtec.form(Name, Gender, Email, Course, Book, Price) VALUES ('$name', '$gender', '$email', '$course', '$book', '$price')";

    // insert in database
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        $message = 1;
?>
<html>
    <head>
        <title>Form Data</title>
        <style>
            body {
                background-image: url('./home_bg.jpg');
            }
            .box {
                display: flex;
                flex-direction: column;
                align-items: center;
                border: 1px solid #ccc;
                border-radius: 10px;
                padding: 30px;
                text-align: center;
                box-shadow: 0px 2px 4px 0px;
                transition: transform 0.3s;
                cursor: pointer;
                font-family: 'Lobster', cursive;
                font-size: 25px;
                color: #8B008B;
                margin: 20px;
                width: 500px; 
            }
            .paymentButton {
                font-family: 'Times New Roman', Times, serif;
                background-color: #8B008B;
                color: white;
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                font-size: 20px;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            .paymentButton:hover {
                background-color: #6A0072;
            }
            .qrCode {
                display: none;
            }
            .paytickImage {
                display: none;
            }
        </style>
    </head>
    <body>
        <center>
            <div class="box">
                <p>Successful entered</p>
                <p>Name: <?php echo $name; ?></p>
                <p>Gender: <?php echo $gender; ?></p>
                <p>Email: <?php echo $email; ?></p>
                <p>Course: <?php echo $course; ?></p>
                <p>Name of the book: <?php echo $book; ?></p>
                <p>Price: <?php echo $price; ?></p>
                
                <h4>Pay to complete the Registration</h4>
            
                
                <div class="cg">
                    <div class="qrCode" id="qrCode">
                        <img src="qrcode.jpg" onclick="showPaytick()">
                        <br><br>
                        Click on the QR Code to scan and complete the payment
                    </div>
                    <div class="paytickImage" id="paytickImage">
                        <img src="paytick.jpg">
                        <br><br>
                        We will contact you soon through email for the delivery details .
                    </div>

                    <p id="paymentConfirmation" style="display: none; font-family: 'Times New Roman', Times, serif; font-weight: 300; font-size: x-large;"></p>
                    <button class="paymentButton" id="paymentButton" type="button" onclick="showQRCode()">Make Payment</button>
                    <br>
                </div>
            </div>
        </center>

        <script>
            function showQRCode() {
                document.getElementById("qrCode").style.display = "block";
                document.getElementById("paymentButton").style.display = "none";
            }

            function showPaytick() {
                document.getElementById("paytickImage").style.display = "block";
                document.getElementById("qrCode").style.display = "none";
            }
        </script>
    </body>
</html>





<?php
    }
} else {
    echo "Are you a genuine visitor?";
}
?>