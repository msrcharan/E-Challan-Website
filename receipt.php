<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link rel="stylesheet" href="receipt.css">
    <link rel=icon href=logo.jpg sizes="16x16" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php $value = '<p id="course_id"></p>';?>
    

    <?php
        error_reporting(0);
        session_start();
        $payment = $_SESSION['sumup'];
        $la= $_GET['cardname'];
        $reg=$_SESSION['reg_n'];
        $dl=$_SESSION['dl'];
        $cn=$_SESSION['cn_all'];

        if($reg!=''){
                
            $server = "localhost";
            $username = "root";
            $password = "passwordchanged12@";
            $con = mysqli_connect($server,$username,$password);
            
            if(!$con){
                die("connection failed " .mysqli_connect_error());
                
            }
        
            $sql= "DELETE FROM echallan_system.challan where reg_n='".$reg."';";
            if($con->query($sql)==true){
                
                $data=mysqli_query($con,$sql);
                echo "Done!";
            }
        }
        if($dl!=''){
                
            $server = "localhost";
            $username = "root";
            $password = "passwordchanged12@";
            $con = mysqli_connect($server,$username,$password);
            
            if(!$con){
                die("connection failed " .mysqli_connect_error());
                
            }
        
            $sql= "DELETE FROM echallan_system.dl where dl_num='".$dl."';";
            if($con->query($sql)==true){
                
                $data=mysqli_query($con,$sql);
                echo "Done!";
            }
        }
        if($cn!=''){
                
            $server = "localhost";
            $username = "root";
            $password = "passwordchanged12@";
            $con = mysqli_connect($server,$username,$password);
            
            if(!$con){
                die("connection failed " .mysqli_connect_error());
                
            }
        
            $sql= "DELETE FROM echallan_system.challan where challan_no='".$cn."';";
            if($con->query($sql)==true){
                
                $data=mysqli_query($con,$sql);
                echo "Done!";
            }
        }
        
        
        
    ?>

    <h1 class="heads"> Receipt </h1>
    <div class="start">
        
        <p> Method of Payment : CARD </p>
        <p> Name on Card: <?php echo $la; ?>
        <p> Amount paid: <?php echo $payment; ?>
        <p> Transaction Number: <?php echo(rand(10000000000,100000000000)); ?>
        <h3> SUCCESSFUL PAYMENT </h3>
    </div>

    <div class="btn">
    <form action="start.PHP">
        <button value="HOME" id="btn" type="submit">HOME </button>
    </div>
    
</body>
</html>