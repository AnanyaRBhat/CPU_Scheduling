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
				.box{
					ba;
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
				
            </style>
        </head>
        <body><center>
            <div class="box" style="text-align: center;">
                <p>Successful entered</p>
                <p>Name: <?php echo $name; ?></p>
                <p>Gender: <?php echo $gender; ?></p>
                <p>Email: <?php echo $email; ?></p>
                <p>Course: <?php echo $course; ?></p>
				<p>Name of the book: <?php echo $book; ?></p>
                <p>Price: <?php echo $price; ?></p>
                
				<h4>Pay to complete the Registration</h4>
    <h4>Choose a convinient Payment Method </h4>
    
    <div class = "cg">
    <input type="radio" id="myCheckbox" name="choice">
    <label for="myCheckbox">Google Pay</label>

    <input type="radio" id="checkbox2" name="choice">
    <label for="checkbox2">Credit/Debit Card</label>
    <p id="demo" style="font-family: 'Times New Roman', Times, serif; font-weight: 300; font-size: x-large;"></p>
<button style="font-family: 'Times New Roman', Times, serif;" id="paymentButton" type="button" onclick='document.getElementById("demo").innerHTML =  "<img src =\"paytick.jpg\"><br>ALL THE BEST !"; document.getElementById("paymentButton").style.display = "none";'><img src="qrcode.jpg"><br><br><br>Click on the above QR Code to scan and complete the payment</button><br>


            </div>
			</center>
        </body>
        </html>



<?php
    }
} else {
    echo "Are you a genuine visitor?";
}
?>