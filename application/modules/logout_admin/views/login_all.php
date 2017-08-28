<base href="<?php echo base_url()?>">


<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html>
<head>
<title>Unique Login Form Flat Responsive widget Template :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->
<!-- font files  -->
<link href='//fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
<!-- /font files  -->
<!-- css files -->
<link href="raw/css/style.css" rel='stylesheet' type='text/css' media="all" />
<!-- /css files -->
<style>
label.radio-inline {
    color: white;
    font-size: 19px;
}
</style>
</head>
<body>
<h1>Login and Registration foremForm</h1>
<div class="log">
    <div class="content1">
        <h2>Login to your account</h2>
       <form action="<?php echo site_url('login/login_check'); ?>" method="post">
            <input type="text" name="user_name"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}">
            <input type="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PASSWORD';}">
            <div class="button-row">
                <input type="submit" name="login" class="sign-in" value="Sign In">
                <input type="reset" class="reset" value="Reset">
                <div class="clear"></div>
            </div>
        </form>
    </div>
    <div class="content2">
        <h2>Sign Up Here</h2>
        <form>  
            <label class="radio-inline">
                <input type="radio" name="optradio"> Male
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio"> Female
            </label>
            <div>   
            <label class="radio-inline">
                <input type="radio" name="optradio">buyer
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio">Company
            </label>
            <label class="radio-inline">
                <input type="radio" name="optradio">Fixed add
            </label>
            </div>
            <input type="text" name="userid" placeholder="USERNAME" value="">
            <input type="hidden" name="company_name" placeholder="COMPANY NAME" value="">
            <input type="email" name="email" placeholder="EMAIL" value="">
            <input type="tel" name="usrtel" placeholder="PHONE" value="">
            <input type="tel" name="address" placeholder="ADDRESS" value="">
            <input type="tel" name="city" placeholder="CITY" value="">
            <input type="tel" name="zip" placeholder="ZIP" value="">
            <input type="password" name="psw" placeholder="PASSWORD" value="">
            <input type="submit" class="register" value="Register">
        </form>
    </div>
    <div class="clear"></div>
</div>
<div class="footer">
    <p>© 2016 Unique Login Form. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
</div>

</body>
</html>