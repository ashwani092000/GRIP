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
 <img src = "3.jpg" alt="image" class = 'center' width = 65% height = 65%>
 <br>
 <h2 align = 'Center' style="color:white;"><u>List of Customers</u></h2>
</div>
    <?php
    include 'connect.php';
    $sql = "SELECT * FROM `customer`";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    
    echo "<table align='center' border=1 cellpadding=10 class='table table-light table-striped'>"
            
            ."<tr>"
                ."<th align='left'>Account Number</th>"
                ."<th align='right'>Name</th>"
                ."<th>E-mail</th>"
                ."<th>Account Balance</th>"
                ."<th>Action</th>"
                
            ."</tr>"
            ."<tr></tr>";

        while($row = mysqli_fetch_assoc($result))
        { 
            ?>
            <tr>
                <td><?php echo $row["Account No."]; ?></td>
                <td><?php echo $row["Name"]; ?></td>
                <td><?php echo $row["E-mail"]; ?></td>
                <td><?php echo $row["Balance"]; ?></td>
                <td> <a href= "users.php?Account No.=<?php echo $row['Account No.'];?>">
                <button type = "Button" class="btn btn-success"> View and Transact</button></a>


            
                 
            </tr> 
        <?php
        }
             ?>       
           
      </table>


   


    

    </body>
</html>