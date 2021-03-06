<?php
include_once '../login/dbh_connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/e627d5dbde.js" crossorigin="anonymous"></script>
    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="../assets/css/style-starter.css">
    <style>
        main{
            margin-bottom: 150px;
        }
    </style>
</head>

<body>
    <!-- header -->
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
        <a class="navbar-brand h3 fw-bold ps-lg-5 d-flex align-items-center" href="../index.php">
            <a class="navbar-brand h3 fw-bold" href="../index.php"><i
                    class="fas fa-hand-holding-heart  fs-1" style="color: red"></i> Desh Charity</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 pe-5 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <?php
                        if(isset($_SESSION['admin'])){
                            echo "<li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"approved.php\">Collection Status</a>
                                </li>";
                            echo "<li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"volunteers.php\">Volunteer Lists</a>
                                </li>";
                            echo "<li class=\"nav-item\">
                                        <a class=\"nav-link\" href=\"admin-logout.php\">Logout</a>
                                </li>";
                        }else{
                            echo "<li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"login.php\">Login</a>
                        </li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

<main class="container-fluid mt-5 pt-5">
        <section>
            <div class="row gap-3">
                <!-- Donation Request Part -->
                <div class="col-8 mx-auto shadow-lg rounded p-3">
                <h2>All Donation Requests</h2>
                    <table class="table table-primary">
                        <tr class="text-center table-active">
                            <th>Donor Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Donation Type</th>	
                            <th>Comments</th>	
                            <th>Image</th>	
                            <th>Status</th>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM donation_req";
                            $stmt = connect()->query($sql);
                            $reqCount = 0;
                            while($row = $stmt->fetch())
                        {
                            $reqCount++;
                        ?>
                        <tr class="text-center shadow-sm rounded">
                            <td class="table-primary"><?php echo $row['donorName'] ?></td>
                            <td class="table-secondary"><?php echo $row['donorEmail'] ?></td>
                            <td class="table-primary"><?php echo $row['donorAddress'] ?></td>
                            <td class="table-danger"><?php echo $row['donorPhone'] ?></td>
                            <td class="table-success"><?php echo $row['donationType'] ?></td>
                            <td class="table-info"><?php echo $row['comments'] ?></td>
                            <td class="table-light"><?php echo "<img src='../{$row['image']}' width='120' height='120'>" ?></td>
                            <td class="text-center table-light">
                                <a class="btn btn-success mb-2" role="button" type="submit" href="approve-reject-validation.php?id=<?php echo $row['donateID'] ?>&status=approved">Approve</a>
                                
                                <a class="btn btn-danger" role="button" type="submit" href="approve-reject-validation.php?id=<?php echo $row['donateID'] ?>&status=rejected">Reject</a>
                            </td>
                        </tr>
                        <?php
                    
                        }
                        ?>
                    </table>
                    <?php
                        if(!$reqCount){
                            echo "<h3 class='text-center'>No New Request!</h3>";
                        }
                    ?>
                </div>

                <!-- Summary Part -->
                <div class="col-3 mx-auto shadow-lg rounded p-3">
                    <h3>F/C Donation Gist</h3>
                    <table class="table table-striped text-center">
                        <tr>
                            <th>New Request(s)</th>
                            <th>Approved</th>
                            <th>Rejected</th>      
                        </tr>
                        <tr>
                        <?php
                            $approvedSql = "SELECT * FROM approved_donation";
                            $rejectedSql = "SELECT * FROM rejected_donation";
                            $approvedStmt = connect()->query($approvedSql);
                            $rejectedStmt = connect()->query($rejectedSql);
                            $approvedCount = 0;
                            $rejectedCount = 0;
                            while($row = $approvedStmt->fetch()){
                                $approvedCount++;
                            }
                            while($row = $rejectedStmt->fetch()){
                                $rejectedCount++;
                            }
                        ?>
                            <td class="table-info fw-bold"><?php echo $reqCount ?></td>
                            <td class="table-primary fw-bold"><?php echo $approvedCount ?></td>
                            <td class="table-light fw-bold"><?php echo $rejectedCount ?></td>
                        </tr>
                    </table>
                    
                    <h3>Package Donation Gist</h3>
                    <table class="table table-striped text-center">
                        <tr>
                            <th>bkash/Nagad Transaction(s)</th>
                            <th>Amount (total)</th>     
                        </tr>
                        <tr>
                        <?php
                            $package = "SELECT * FROM package";
                            $stmt = connect()->query($package);
                            $reqCount = 0;
                            $amount = 0;
                            while($row = $stmt->fetch()){
                                $amount += $row['Amount'];
                                $reqCount++;
                            }
                        ?>
                            <td class="table-primary fw-bold"><?php echo $reqCount ?></td>
                            <td class="table-warning fw-bold"><?php echo $amount ?> BDT</td>
                        </tr>
                    </table>
                </div>

                <!-- Approved Request Part -->
                <div class="col-6 mx-auto shadow-lg rounded mt-5 p-3">
                    <h3>Approved Donation Log</h3>
                    <table class="table table-striped text-center">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>   
                            <th>Status</th>   
                        </tr>
                        <tr>
                        <?php
                            $sql = "SELECT * FROM approved_donation";
                            $stmt2 = connect()->query($sql);
                            while($row = $stmt2->fetch())
                            {
                        ?>
                            <td><?php echo $row['Name'] ?></td>
                            <td><?php echo $row['Phone'] ?></td>
                            <td><?php echo $row['Address'] ?></td>
                            <td><?php echo $row['Status'] ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>

                <!-- Rejected Request Part -->
                <div class="col-5 mx-auto shadow-lg rounded mt-5 p-3">
                    <h3>Rejected Donation Log</h3>
                    <table class="table table-striped text-center">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>     
                        </tr>
                        <tr>
                        <?php
                            $sql = "SELECT * FROM rejected_donation";
                            $stmt2 = connect()->query($sql);
                            while($row = $stmt2->fetch())
                            {
                        ?>
                            <td><?php echo $row['Name'] ?></td>
                            <td><?php echo $row['Phone'] ?></td>
                            <td><?php echo $row['Address'] ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>

                <!-- Sponsor Request Part -->
                <div class="col-5 mx-auto shadow-lg rounded mt-5 p-3">
                    <h3>Sponsorship Request Log</h3>
                    <table class="table table-striped text-center">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>   
                            <th>Comment</th>   
                        </tr>
                        <tr>
                        <?php
                            $sql = "SELECT * FROM sponsor_req";
                            $stmt2 = connect()->query($sql);
                            while($row = $stmt2->fetch())
                            {
                        ?>
                            <td><?php echo $row['fname'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['comment'] ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>

                <!-- Help Request Part -->
                <div class="col-6 mx-auto shadow-lg rounded mt-5 p-3">
                    <h3>Help Request Log</h3>
                    <table class="table table-striped text-center">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>   
                            <th>Req Type</th>   
                            <th>Reason</th>   
                        </tr>
                        <tr>
                        <?php
                            $sql = "SELECT * FROM help_req";
                            $stmt2 = connect()->query($sql);
                            while($row = $stmt2->fetch())
                            {
                        ?>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['req_type'] ?></td>
                            <td><?php echo $row['reason'] ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </section>
</main>

<?php
include_once '../footer.php';