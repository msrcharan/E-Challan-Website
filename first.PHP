<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>challans</title>
        <link rel="stylesheet" href="first.css">
        <link rel=icon href=logo.jpg sizes="16x16" type="image/png">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Mate+SC" />
        <script src="alert.js"></script>
    </head>
    <body>
        <div class="whole">
        <script src="alert.js"></script>
        <?php
        session_start();
        $reg_old= $_POST['reg_n'];
        $dl_old=$_POST['dl_n'];
        $cn_old=$_POST['cn_n'];
        $reg=str_replace(' ', '', $reg_old);
        $dl=str_replace(' ', '', $dl_old);
        $cn=str_replace(' ', '', $cn_old);
        
        $secretKey="6LeRJ5QaAAAAAIxvVmUuJ_plDfimoEVhb_vXlrCe";
        $responseKey=$_POST['g-recaptcha-response'];
        $UserIP=$_SERVER['REMOTE_ADDR'];
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".urldecode($secretKey).
        '&response='.urldecode($responseKey).'';
        $new=file_get_contents($url);
        $newKey=json_decode($new,TRUE);
        if($newKey["success"]){
            ?>
            <div class="apply">
            <h1> CHALLANS ON YOUR VEHICLE NUMBER </h1></div>
            <br><br>
            <?php

            if($reg!=''){
                
                $server = "localhost";
                $username = "root";
                $password = "passwordchanged12@";
                $con = mysqli_connect($server,$username,$password);
                
                if(!$con){
                    die("connection failed " .mysqli_connect_error());
                    
                }
            
                $sql= "SELECT * FROM echallan_system.challan where reg_n='".$reg."';";
                if($con->query($sql)==true){
                    
                    $data=mysqli_query($con,$sql);
                    
                    if($data->num_rows>0){
                        ?>
                        <div class="apply">
                        <table>
                        <tr>
                        <th>Registration Number</th>
                        <th>Challan Number</th>
                        <th>Owner Name</th>
                        <th>Area </th>
                        <th>Date</th>
                        <th>Violation</th>
                        <th>Amount</th>
                        <th>Image</th>
                        </tr> 
                    <?php
                        
                        
                        while($row = $data-> fetch_assoc()){
                            echo "<tr><td>".$row["reg_n"]."</td><td>".$row["challan_no"]." "."</td><td>"
                            .$row["owner_name"]."</td><td>".$row["area_name"]
                            ."</td><td>".$row["DATE"]."</td><td>".$row["violation"]
                            ."</td><td>".$row["fine_amt"]."</td><td>"."<a href='".$row["img"]."' target='_blank'>Click</a>"."</td></tr>";
                        }
                        
                        
                        $result_total= "SELECT SUM(fine_amt) as totalsum FROM echallan_system.challan where reg_n='".$reg."';";
                        
                        $data1=mysqli_query($con,$result_total);
                        while($row1 = $data1-> fetch_assoc()){ 
                        

                            $sum = $row1['totalsum'];

                        
                        }
                        $_SESSION['sumall'] = (int)$sum;
                        $_SESSION['reg_n']=$reg;

                        ?>

                        
                        </table>
                        </div>
                        
                        <br><br>
                        <form method = "POST" name="form2" action = "payment.php">
                            <button class="btn"> Pay all </button>
                        </form>
        
                        <?php
                        
                    }
                    else{
                        echo "<h3> No pending challans </h3>";
                    }
                    
                }
                else{
                    echo "error: $sql <br> $con->error";
                }
                
                $con->close();
                
            }

            else if($dl!=''){
                $server = "localhost";
                $username = "root";
                $password = "passwordchanged12@";
                
                
                $con = mysqli_connect($server,$username,$password);
                
                if(!$con){
                    die("connection failed " .mysqli_connect_error());
                }
            
                $sql= "SELECT * FROM echallan_system.dl where dl_num='".$dl."';";
                if($con->query($sql)==true){
                    
                    $data=mysqli_query($con,$sql);
                    
                    if($data->num_rows>0){
                        ?>

                        <div class="apply">
                        <table>
                        <tr>
                        <th>DL Number</th>
                        <th>Name</th>
                        <th>Challan Number</th>
                        <th>Area </th>
                        <th>Date</th>
                        <th>Violation</th>
                        <th>Amount</th>
                        <th>Image</th>
                        </tr> 

                        <?php
                    
                        
            
                        while($row = $data-> fetch_assoc()){
                            echo "<tr><td>".$row["dl_num"]."</td><td>".$row["name"]." "."</td><td>"
                            .$row["challan_no"]."</td><td>".$row["area_name"]
                            ."</td><td>".$row["DATE"]."</td><td>".$row["violation"]
                            ."</td><td>".$row["fine_amt"]."</td><td>"."<a href='".$row["img"]."' target='_blank'>Click</a>"."</td></tr>";
                        }
                        $result_total= "SELECT SUM(fine_amt) as totalsum FROM echallan_system.dl where dl_num='".$dl."';";
                        
                        $data1=mysqli_query($con,$result_total);
                        while($row1 = $data1-> fetch_assoc()){ 
                        

                            $sum = $row1['totalsum'];

                        
                        }
                        $_SESSION['sumall'] = (int)$sum;
                        $_SESSION['dl']=$dl;

                        echo "</table>";
                        ?>
                        </div>
                        <br><br>
                        <form method = "POST" name="form2" action = "payment.php">
                            <button class="btn" > Pay all </button>
                        </form>
                    

                        <?php
                        
                    }
                    else{
                        echo "<h3> No pending challans </h3>";
                    }
                }
                else{
                    echo "error: $sql <br> $con->error";
                }
                    
                    $con->close();

            }  
            else if($cn!=''){
                $server = "localhost";
                $username = "root";
                $password = "passwordchanged12@";
                
                
                $con = mysqli_connect($server,$username,$password);
                
                if(!$con){
                    die("connection failed " .mysqli_connect_error());
                }
            
                $sql= "SELECT * FROM echallan_system.challan where challan_no='".$cn."';";
                if($con->query($sql)==true){
                    
                    $data=mysqli_query($con,$sql);
                    
                    if($data->num_rows>0){
                        ?>
                        <div class="apply">
                        <table>
                        <tr>
                        <th>Registration Number</th>
                        <th>Challan Number</th>
                        <th>Owner Name</th>
                        <th>Area </th>
                        <th>Date</th>
                        <th>Violation</th>
                        <th>Amount</th>
                        <th>Image</th>
                        </tr> 
                    
                        <?php
            
                        while($row = $data-> fetch_assoc()){
                             echo "<tr><td>".$row["reg_n"]."</td><td>".$row["challan_no"]." "."</td><td>"
                            .$row["owner_name"]."</td><td>".$row["area_name"]
                            ."</td><td>".$row["DATE"]."</td><td>".$row["violation"]
                            ."</td><td>".$row["fine_amt"]."</td><td>"."<a href='".$row["img"]."' target='_blank'>Click</a>"."</td></tr>";
                        }
                        echo "</table>";
                        $result_total= "SELECT SUM(fine_amt) as totalsum FROM echallan_system.challan where challan_no='".$cn."';";
                        
                        $data1=mysqli_query($con,$result_total);
                        while($row1 = $data1-> fetch_assoc()){ 
                        

                            $sum = $row1['totalsum'];

                        
                        }
                        $_SESSION['sumall'] = (int)$sum;
                        $_SESSION['cn_all']=$cn;

                        
                        ?>
                        </div>
                        <br><br>
                        <form method = "POST" name="form2" action = "payment.php">
                            <button class="btn" > Pay all </button>
                        </form>
                        <?php
                        
                    }
                    else{
                        echo "<h3> No pending challans </h3>";
                    }
                }
                else{
                    echo "error: $sql <br> $con->error";
                }
                    
                    $con->close();

            }  
        }
        else{
            header("Location: https://medium.com/swlh/are-you-a-robot-107b513fa017");
            exit();
        }
   

?>

    

                        
    </body>
    
    </html>





