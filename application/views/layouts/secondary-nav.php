<!-- Mobile Device show menu button -->
<?php
$bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
?>
<nav class="navbar-default home-nav">
    <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="offcanvas" data-target="#side-menu"
            aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        Main Menu
    </button>
    <ul class="list-unstyled list-inline pull-right home-nav-btn home-nav-btn-design" style='width:100%'>
        <li style='width:14%'>
            <a>
                <button class="gnt-actn-btn btn-standard" id="all-applications" style="width:100%">
                    <i class="glyphicon glyphicon-th-list"></i>
                    সকল আবেদন
                </button>
                <?php if ($all_somitee_counters[0]['t_num'] == 0) {
                } else {
                    echo '<span class="badge1">' . str_replace(range(0, 9), $bn_digits, $all_somitee_counters[0]['t_num']) . '</span>';
                }?>
            </a>
        </li>
        <li style='width:14%'>
            <a>
                <button class="gnt-actn-btn btn-standard" id="new-applications" style="width:100%">
                    <i class="glyphicon glyphicon-refresh"></i>
                    নতুন আবেদন
                </button>
                <?php if ($new_somitee_counters[0]['t_num'] == 0) {
                } else {
                    echo '<span class="badge1">' . str_replace(range(0, 9), $bn_digits, $new_somitee_counters[0]['t_num']) . '</span>';
                }?>
            </a>
        </li>
        <li style='width:14%'>
            <a>
                <button class="gnt-actn-btn btn-standard" id="succeed-applications" style="width:100%">
                    <i class="glyphicon glyphicon-ok-sign"></i>সফল আবেদন
                </button>
                <?php if ($selected_somitee_counters[0]['t_num'] == 0) {
                } else {
                    echo '<span class="badge1">' . str_replace(range(0, 9), $bn_digits, $selected_somitee_counters[0]['t_num']) . '</span>';
                }?>
            </a>
        </li>
        <li style='width:14%'>
            <a>
                <button class="gnt-actn-btn btn-standard" id="rejected-applications" style="width:100%">
                    <i class="glyphicon glyphicon-remove-sign"></i>বাতিল আবেদন
                </button>
                <?php if ($reject_somitee_counters[0]['t_num'] == 0) {
                } else {
                    echo '<span class="badge1">' . str_replace(range(0, 9), $bn_digits, $reject_somitee_counters[0]['t_num']) . '</span>';
                }?>
            </a>
        </li>
        <li style='width:14%'>
            <a>
                <button class="gnt-actn-btn btn-standard" id="complain-applications" style="width:100%">
                    <i class="glyphicon glyphicon-exclamation-sign"></i>অভিযোগ সমূহ
                </button>
                <?php if ($complain_somitee_counters[0]['t_num'] == 0) {
                } else {
                    echo '<span class="badge1">' . str_replace(range(0, 9), $bn_digits, $complain_somitee_counters[0]['t_num']) . '</span>';
                }?>
            </a>
        </li>
        <li style='width:14%'>
            <a>
                <button class="gnt-actn-btn btn-standard" id="apeal-applications" style="width:100%">
                    <i class="glyphicon glyphicon-link"></i>আপিল সমূহ
                </button>
                <?php if ($appeal_somitee_counters[0]['t_num'] == 0) {
                } else {
                    echo '<span class="badge1">' . str_replace(range(0, 9), $bn_digits, $appeal_somitee_counters[0]['t_num']) . '</span>';
                }?>
            </a>
        </li>
        <li style='width:12%'>
            <div class="btn-group" style="width:100%">
                <button style="width:100%" type="button" class="gnt-actn-btn btn-standard dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-wrench"></i>
                    সেটিংস <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="doc/leader_info">প্রোফাইল</a></li>
                    <li><a data-toggle="modal" data-target="#myModal_pass" href="#">পাসওয়ার্ড পরিবর্তন</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo site_url('logout_admin');?>">লগ আউট</a></li>
                </ul>
            </div>
        </li>
    </ul>


    <!-- Modal -->
    <div class="modal fade" id="myModal_pass" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form role="form" onsubmit="return myFunction()" action="<?php echo site_url('doc/change_password');?>"
                      method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">পাসওয়ার্ড পরিবর্তন</h4>
                    </div>
                    <div class="modal-body">

                        <?php $cur_location = $_SERVER['REQUEST_URI'];?>
                        <input type="hidden" name="redirect_url" value="<?=$cur_location;?>">
                        <div class="form-group">
                            <label for="pwd">নতুন পাসওয়ার্ড:</label>
                            <input type="password" required class="form-control" id="password1" name="pass_change" placeholder="নতুন পাসওয়ার্ড">
                        </div>
                        <div class="form-group">
                            <label for="pwd">নতুন পাসওয়ার্ড (পুনরায় ):</label>
                            <input type="password" required class="form-control" id="password2" name="con_pass_change" placeholder="নতুন পাসওয়ার্ড (পুনরায় )">
                        </div>
                        <label style="color:red" id="validate_status"></label>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" style="float:left" class="btn btn-success">সাবমিট করুন</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">বন্ধ করুন</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script>
        function myFunction() {
            var pass1 = document.getElementById("password1").value;
            var pass2 = document.getElementById("password2").value;
            var ok = true;
            var Exp = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))+[0-9a-z]+$/i;

            if (pass1 != pass2) {
                //alert("Passwords Do not match");
                document.getElementById("password1").style.borderColor = "#E34234";
                document.getElementById("password2").style.borderColor = "#E34234";
                document.getElementById("validate_status").innerHTML = 'পাসওয়ার্ড মিল নাই';
                ok = false;
            }

            else if (pass1.length < 6) {
                document.getElementById("validate_status").innerHTML = 'কমপক্ষে ৬ অক্ষর(letter) হতে হবে ';
                ok = false;
            }

            else {
                //alert("Passwords Match!!!");
            }
            return ok;
        }
    </script>


</nav>