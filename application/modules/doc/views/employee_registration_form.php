<?php //include ("layouts/header.php");   ?>
<div class="container-fluid display-table">
    <div class="row display-table-row">
        <!-- Sidebar Menu
        ============================================== -->
        <?php //include("layouts/sidebar-nav.php"); ?>
        <?php $this->load->view('layouts/sidebar-nav'); ?>

        <!-- Main Content
        ============================================== -->
        <div class="col-md-10 display-table-cell" id="main-content">
            <div class="row">
                <div class="col-xs-12">
                    <h2>কর্মচারী/ কর্মকর্তা নিবন্ধন</h2>
                </div>
                <div class="col-xs-12">
                    <form class="form-horizontal" id="admin-reg-form" action="<?php echo site_url('doc/employee_registration_form_post'); ?>" method="post">

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">কর্মকর্তা/কর্মচারীর নাম</label>
                            <div class="col-sm-5">
                                <input type="text" minlength="3" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>" placeholder="কর্মকর্তা/কর্মচারীর নাম" required>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="name-help">*আবশ্যক</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">ই-মেইল</label>
                            <div class="col-sm-5">
                                <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" id="email" placeholder="Email" required>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="email-help">*আবশ্যক। উদাহরনঃ someone@domain.com</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">পাসওার্ড</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Password" minlength="4" required>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="password-help">*আবশ্যক। কমপক্ষে ৪ সংখ্যার হতে হবে</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="birth-date" class="col-sm-2 control-label">জন্ম তারিখ</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="birth-date" id="birth-date" value="<?php echo set_value('birth-date'); ?>" placeholder="জন্ম তারিখ" required>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="birth-date-help">*আবশ্যক</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">ফোন নম্বর</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" placeholder="ফোন নম্বর" minlength="11" required>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="phone-help">*আবশ্যক</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nid" class="col-sm-2 control-label">জাতীয় পরিচয় পত্র নং</label>
                            <div class="col-sm-5">
                                <input onclick="check_nid()" onkeyup="check_nid()" onblur="check_nid()" type="text" class="form-control" name="nid" id="nid" placeholder="NID" minlength="17" maxlength="17" value="<?php echo set_value('nid'); ?>" required>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="nid-help">*আবশ্যক</span>
                                <span class="help-block" id="nid-help2">*আবশ্যক</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="designation" class="col-sm-2 control-label">পদের নাম</label>
                            <div class="col-sm-5">
                                <input type="hidden" class="form-control" name="designation" id="designation" value="<?php echo $designation_id; ?>">
                                <input type="text" class="form-control" name="designation_name" id="designation_name" value="<?php echo $designation_name; ?>" readonly>
                            </div>
                            <div class="col-sm-5">
                                <span class="help-block" id="designation-help">*আবশ্যক</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5 col-sm-offset-2">
                                <button onclick="form_submit()" id="submit" class="btn btn-primary gnt-btn btn-block">
                                    <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;
                                    <span>Continue</span>
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="selector_id" value="<?php echo $selector_id; ?>"/>
                        <input type="hidden" name="division_id" value="<?php echo $division_id; ?>"/>
                        <input type="hidden" name="district_id" value="<?php echo $district_id; ?>"/>
                        <input type="hidden" name="upz_id" value="<?php echo $upz_id; ?>"/>
                    </form>
                </div>
            </div><!-- /row -->
            <div class="row">
                <footer id="admin-footer">
                    <p class="text-center">Copyright &copy; 2016. All right resereved</p>
                </footer>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>

<script>
    $(document).ready(function(){
        $('#nid-help2').hide();
        $('#submit').attr('disabled','disabled');
    });
    function check_nid() { console.log('fd');
        var x=document.getElementById('nid');
        x.value= x.value.replace(/[^0-9]/, '');

        var tmp_nid = $('#nid').val();
  
        

        //alert(tmp_email);

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('doc/check_nid'); ?>',
            data: {
                nid: tmp_nid
            },
            success: function (data) {
                console.log(data);
                if (data ==0) {
                    console.log('add');

                    $('#nid-help2').hide();

                    if(tmp_nid.length==17){
                        $('#submit').removeAttr('disabled');
                    }

                    /*var x = document.getElementById('nid-help');
                     x.style.color = "black";
                     x.innerHTML = "আবশ্যক";  */

                }else{
                    console.log('not add');
                    $('#nid-help2').show();
                    $('#nid-help').hide();
                    var x = document.getElementById('nid-help2');
                    x.style.color = "red";
                    x.innerHTML ="'"+tmp_nid+"' উক্ত ভোটার আই ডি দ্বারা পূর্বে এডমিন নিবন্ধন করা হয়েছে। অনুগ্রহ করে নতুন ভোটার আই ডি দিন ।";

                    document.getElementById('nid').value ="";


                }

            }
        });
    }
</script>


