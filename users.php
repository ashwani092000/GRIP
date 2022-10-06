 <?php
include 'connect.php';

if(isset($_POST['submit']))
{
    $from = $_GET['Account_No_'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * FROM `customer` WHERE `Account No.` =$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * FROM `customer` WHERE `Account No.` =$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

   


    //Conditions
    //For negative value
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Negative value cannot be transferred !")';
        echo '</script>';
    }
    //Insufficient balance
    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Sorry! you have insufficient balance !")';
        echo '</script>';
    }
    //For 0 (zero) value
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Zero value cannot be transferred !')";
         echo "</script>";
     }


    else {
       

                $newbalance = $sql1['Balance'] - $amount;
                $sql = "UPDATE `customer` set `Balance`=$newbalance where `Account No.`=$from";
                mysqli_query($conn,$sql);
             
                $newbalance = $sql2['Balance'] + $amount;
                $sql = "UPDATE `customer` set `Balance`=$newbalance where `Account No.`=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO `transactions` (`Sender`, `Receiver`, `Balance`) VALUES ('$sender', '$receiver', '$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successfully !');
                                     window.location='history.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
   
}

?>

<!doctype html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;400&display=swap" rel="stylesheet">

<link rel="stylesheet" href="tsf.css"> 

</head>
<body>
<div class="main_div">
 
 <div class="navbar navbar-expand-md">

  <a href="#" class="navbar-brand font-weight-bold text-white text-center"><h2>TSF BANK</h2></a>
  <button class="navbar-toggler text-white " type="button" data-toggle="collapse" data-target="#collapsenavbar">
  <span class="navbar-toggler-icon" style="background:white;"></span>
  </button>
 
   <div class="collapse navbar-collapse text-center" id="collapsenavbar">
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a href="index.php" class="nav-link text-white "><span style="margin-left:90px;">ABOUT</span></a></li>
          <li class="nav-item">
              <a href="viewcustomer.php" class="nav-link text-white ">VIEW CUSTOMERS</a></li>
          <li class="nav-item">
              <a href="history.php" class="nav-link text-white">TRANSACTION HISTORY</a></li>
          <li class="nav-item">
              <a href="#contact" class="nav-link text-white">CONTACT</a></li>    
           </ul>
    </div>
 </div>
 <img src = "2.jpg " class="center" width = 70% height = 70%>;

 </div>
 

 <class class="welcome">
        <h2> <strong>Money Transfer</strong>   </h2>
</class>

<div class="d-grip gap-2 col-6 mx-auto text-center p-3 mb-2">
        <a href="history.php"><button type="button" class="btn btn-dark btn-lg mb-3">See all Transaction History</button></a>
</div>

<div class="container">
        <h2 class="text-center pt-4" style="color : black;">Customer Details</h2>
            <?php
                include 'connect.php';
               $sid=$_GET['Account_No_'];
                $sql = "SELECT * FROM `customer` WHERE `Account No.` = $sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-hover">
                <tr style="color : black;" class="table-primary">
                    <th class="text-center">Account Number</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr style="color : black;">
                    <td class=" text-center py-2"><?php echo $rows['Account No.'] ?></td>
                    <td class=" text-center py-2"><?php echo $rows['Name'] ?></td>
                    <td class=" text-center py-2"><?php echo $rows['E-mail'] ?></td>
                    <td class=" text-center py-2"><?php echo $rows['Balance'] ?></td>
                </tr>
            </table>
        </div>
        <h2 class="text-center pt-4" style="color : black;">Transer Money Here !</h2>
        <label style="color : black;"><strong>Transfer To:</strong></label>
        <select name="to" class="form-control" required>
            
            <option value="" disabled selected>Choose</option>
            <?php
                include 'connect.php';
                $sid=$_GET['Account_No_'];
                $sql = "SELECT * FROM `customer` WHERE `Account No.` != $sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['Account No.'];?>" >
                
                    <?php echo $rows['Name'] ;?> (Balance: 
                    <?php echo $rows['Balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : black;"><strong>Amount:</strong></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
                <button class="btn btn-outline-dark mb-3" name="submit" type="submit" id="myBtn" >Fill the Amount and Transfer</button>
            </div>
        </form>
    </div> 
