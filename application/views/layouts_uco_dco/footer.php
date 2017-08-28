
<!-- Modal -->
<div class="modal fade" id="myModal_pass" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">পাসওয়ার্ড পরিবর্তন</h4>
            </div>
            <div class="modal-body">
                <form role="form" onsubmit="return myFunction()" action="<?php echo site_url('uco/change_password');?>" method="post">
                    <?php $cur_location = $_SERVER['REQUEST_URI'];?>
                    <input type="hidden" name="redirect_url" value="<?=$cur_location;?>">
                    <div class="form-group">
                        <label for="pwd">নতুন পাসওয়ার্ড:</label>
                        <input type="password"  required class="form-control" id="password1" name="pass_change" placeholder="নতুন পাসওয়ার্ড">
                    </div>
                    <div class="form-group">
                        <label for="pwd">নতুন পাসওয়ার্ড (পুনরায়):</label>
                        <input type="password" required class="form-control" id="password2" name="con_pass_change" placeholder="নতুন পাসওয়ার্ড (পুনরায়)">
                    </div>
                    <label style="color:red" id="validate_status"></label>

            </div>
            <div class="modal-footer">
                <button type="submit" style="float:left" class="btn btn-success">সাবমিট করুন</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">বন্ধ করুন</button>
            </div>
        </div>

    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal_pass_dco" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">পাসওয়ার্ড পরিবর্তন</h4>
            </div>
            <div class="modal-body">
                <form role="form" onsubmit="return myFunction2()" action="<?php echo site_url('dco/change_password');?>" method="post">
                    <?php $cur_location = $_SERVER['REQUEST_URI'];?>
                    <input type="hidden" name="redirect_url" value="<?=$cur_location;?>">
                    <div class="form-group">
                        <label for="pwd">নতুন পাসওয়ার্ড:</label>
                        <input type="password"  required class="form-control" id="password11" name="pass_change" placeholder="নতুন পাসওয়ার্ড">
                    </div>
                    <div class="form-group">
                        <label for="pwd">নতুন পাসওয়ার্ড (পুনরায়):</label>
                        <input type="password" required class="form-control" id="password22" name="con_pass_change" placeholder="নতুন পাসওয়ার্ড (পুনরায়)">
                    </div>
                    <label style="color:red" id="validate_status2"></label>

            </div>
            <div class="modal-footer">
                <button type="submit" style="float:left" class="btn btn-success">সাবমিট করুন</button>
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">বন্ধ করুন</button>
            </div>
        </div>

    </div>
</div>






<script>
    function myFunction() {
        var pass1 = document.getElementById("password1").value;
        var pass2 = document.getElementById("password2").value;
        var ok = true;
        var Exp = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))+[0-9a-z]+$/i;

        if (pass1 != pass2)
        {
            //alert("Passwords Do not match");
            document.getElementById("password1").style.borderColor = "#E34234";
            document.getElementById("password2").style.borderColor = "#E34234";
            document.getElementById("validate_status").innerHTML='পাসওয়ার্ড মিল নাই';
            ok = false;
        }

        else if(pass1.length<6)
        {
            document.getElementById("validate_status").innerHTML='কমপক্ষে ৬ অক্ষর(letter) হতে হবে';
            ok = false;
        }

        else {
            //alert("Passwords Match!!!");
        }
        return ok;
    }



    function myFunction2() {
        var pass1 = document.getElementById("password11").value;
        var pass2 = document.getElementById("password22").value;
        var ok = true;
        var Exp = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))+[0-9a-z]+$/i;

        if (pass1 != pass2)
        {
            //alert("Passwords Do not match");
            document.getElementById("password1").style.borderColor = "#E34234";
            document.getElementById("password2").style.borderColor = "#E34234";
            document.getElementById("validate_status").innerHTML='পাসওয়ার্ড মিল নাই';
            ok = false;
        }

        else if(pass1.length<6)
        {
            document.getElementById("validate_status2").innerHTML='কমপক্ষে ৬ অক্ষর(letter) হতে হবে';
            ok = false;
        }

        else {
            //alert("Passwords Match!!!");
        }
        return ok;
    }





</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets_uco_dco/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="assets_uco_dco/bootstrap/js/bootstrap.min.js"></script>
<script src="assets_uco_dco/js/vendor/summernote.min.js"></script>
<script src="assets_uco_dco/js/vendor/datepicker.js"></script>
<script src="assets_uco_dco/js/vendor/jquery.validate.min.js"></script>
<script src="assets_uco_dco/js/vendor/localize.js"></script>
<script src="assets_uco_dco/js/vendor/canvasjs.min.js"></script>
<script src="assets_uco_dco/js/vendor/jquery.dataTables.min.js"></script>
<script src="assets_uco_dco/js/vendor/dataTables.bootstrap.min.js"></script>
<script src="assets_uco_dco/js/vendor/jquery.tabSlideOut.js"></script>
<script src="assets_uco_dco/js/main.js"></script>
</body>
</html>