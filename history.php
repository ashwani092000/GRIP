<!DOCTYPE html>
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
  <!--<span class="navbar-toggler-icon" style="background:white;"></span> -->
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
<img src = "4.jpg" alt="image" class = 'center'>
<br>
<h2 align = 'center'style="color:white;"><u>List of Transactions</u></h2>
    </div>
 

 
    <?php
    include 'connect.php';
    $sql = "SELECT * FROM `transactions`";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
   
    
    echo "<table align='center' border=1 cellpadding=10 class='table table-light table-striped'>"
            
            ."<tr>"
                ."<th align='left'>S.No.</th>"
                ."<th align='right'>Sender</th>"
                ."<th>Receiver</th>"
                ."<th>Amount</th>"
                ."<th>Date & Time</th>"
                
            ."</tr>"
            ."<tr></tr>";

        while($row = mysqli_fetch_assoc($result))
        {
            echo '<tr>'
                .'<td>',$row["S.No."],'</td>'
                .'<td>'.$row["Sender"].'</td>'
                .'<td>'.$row["Receiver"].'</td>'
                .'<td>',$row["Balance"],'</td>'
                .'<td>'.$row["Date & Time"].'</td>';
        }

    ?>
