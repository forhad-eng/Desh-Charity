<?php
    if (isset($_GET['error']) == 'already-submitted'){
        ?>
        <script>
            alert('Your donation already submitted');
        </script>
        <?php
    }
    elseif (isset($_GET['value']) == 'success'){
        ?>
        <script>
            alert('Your request has been submitted successfully');
        </script>
        <?php
    }
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Donation Form</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
            integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/donation.css">
    </head>

    <body>
        <div class="testbox">
            <form action="donation-validation.php" method="POST" enctype="multipart/form-data">
                <div class="banner">
                    <h1>Donate Now</h1>
                </div>
                <br />
                <fieldset>
                    <legend>Donation Form</legend>
                    <div class="colums">
                        <div class="item">
                            <label class="header">Name <span>*</span> </label>
                            <input type="text" id="name" name="name" placeholder="Your Name"
                                title="Please enter your Full Name" required>
                        </div>
                        <div class="item">
                            <label class="header">Email <span>*</span> </label>
                            <input type="email" id="email" name="email" placeholder="Mail@example.com"
                                title="Please enter a Valid Email Address" required>
                        </div>
                        <div class="item">
                            <label class="header">Address</label>
                            <input type="text" id="bill" name="address" placeholder="Address"
                                title="Please enter Your Address" required>
                        </div>
                        <div class="item">
                            <label class="header">Phone Number</label>
                            <input type="tel" id="usrtel" name="phone" placeholder="Your Phone Number"
                                title="Please enter Your Phone Number" required>
                        </div>
                </fieldset>
                <br />
                <fieldset>
                    <legend>Donation Details</legend>
                    <div class="colums">
                    </div>
                    <div class="item">
                        <label class="header">Donation Type</label>
                        <input type="tel" id="usrtel" name="dType" placeholder="Clothes or Food"
                            title="Please enter Your Amount" required>
                    </div>
                    <div class="item">
                        <label class="enquiry">Donation comments</label>
                        <textarea id="message" name="comments" placeholder="Your Queries"
                            title="Please enter Your Queries"></textarea>
                    </div>
                    <div class="item">
                        <label class="enquiry">Product Image <span>*</span></label> <br>
                        <label for="myfile">Select a file:</label>
                        <input type="file" id="myfile" name="image"><br>
                    </div>
                </fieldset>
                <div class="btn-block">
                    <button type="submit" name="submit">Confirm</button>
                </div>
            </form>
        </div>
    </body>
</html>