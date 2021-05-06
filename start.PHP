<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-challan</title>
    <link rel="stylesheet" href="start.css">
    <link rel=icon href=logo.jpg sizes="16x16" type="image/png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Playfair+Display" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
</head>
<body>
    <div class="apply">
    <h1>Online E-challan System</h1>
    
        <div class="topnav">
        <a class="active" href="start.PHP">Home</a>
        <a href="rules.html">Rules</a>
        <a href="contact.html">Contact</a>
        <a href="about.html" target="_blank">About</a>
        <a href="guide.PHP">Help</a>
        </div>
</div>
    <div class="apply">
    <hr>
    <p class="subline">Check your challans here.</p>
    <script src="alert.js"></script>
    <img src="logo.jpg" width="200" height="200" class="pic">
    <form  action ="first.PHP" method="POST" name="form1">
        <input type="radio"  name="aorb" onClick="hideB()" checked>Reg_num | 
        <input type="radio"  name="aorb" onClick="hideA()">DL_num | 
        <input type="radio"  name="aorb" onClick="hideC()">Challan_num
        <br>
        <div  id="Reg"><br/>
            <input type="text" name="reg_n" id="reg_n"  placeholder="Registration number">
        </div>
        <div style="visibility:hidden" id="DL">
            <input type="text" name="dl_n" id="dl_n"  placeholder="DL number">
        </div>
        <div style="visibility:hidden" id="CN"><br/>
            <input type="text" name="cn_n" id="cn_n" placeholder="Challan number" >
        </div>
    
        
        <div class="g-recaptcha" data-sitekey="6LeRJ5QaAAAAAPOgKwZiaTLFPq2FPKMgibddqawx"></div>
    <button class="btn"> Submit </button>  <br><br><br><br><br><br><br><br>
    </form><hr>
</div>

<footer class="footer-distributed">
<div class="footer-right">

<a href="https://www.facebook.com/vijayshankarofficial/" target="_blank"><i class="fab fa-facebook"></i></a>
<a href="https://www.instagram.com/iamsidkaul" target="_blank"><i class="fab fa-instagram"></i></a>
<a href="https://twitter.com/abdulsamad___1" target="_blank"><i class="fab fa-twitter"></i></a>
<a href="https://www.linkedin.com/in/kaul-siddharth" target="_blank" ><i class="fab fa-linkedin"></i></a>


</div>

<div class="footer-left">

<p>E-challan creations &copy; 2015</p>
</div>
</footer>

    <?php
    error_reporting(0);
    $reg_n = $_POST['reg_n'];
    $DL_n=$_POST['dl_n'];
    $CN_n=$_POST['cn_n'];

    ?>
    
</body>
</html>