<?php //include 'layouts/header.php';       ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">


<div class="well" style="margin-bottom: 4px; background-color:#BBDEFB; ">
<h3 style="text-align: center; margin: 5px 0; padding: 0; font-size: 27px; "><strong>লগইন ফরম</strong></h3>
</div>

        
<div class="well panel login-form-container" >
             <?php 
                  $msg = $this->session->userdata('message');
             ?> 
            <h4 style="text-align:center;">
               <?php 
                  
                  if($msg){
                    echo $msg;
                  }
                  $this->session->unset_userdata('message');
                ?>
            </h4>
             <?php 
                  $error_msg = $this->session->userdata('error_message');
             ?> 
            <h4 style="text-align:center;">
               <?php 
                  
                  if($error_msg){
                    echo $error_msg;
                  }
                  $this->session->unset_userdata('error_message');
                ?>
            </h4>



            <form action="<?php echo site_url('login/login_check'); ?>" method="post" class="form-horizontal" id="user-login-form">
                <fieldset>
                   
                    <?php
                    if ($this->session->userdata('error') != "" || $this->session->userdata('error') != NULL) {
                        ?>
                        <div style="background-color:rgba(255, 0, 0, 0.71);" >
                            <p style="text-align: center; color: white;">
                                <?php echo $this->session->userdata('error');?>
                            </p>
                        </div>
                        <?php
                        $this->session->unset_userdata('error');
                    }
                    ?>

                    <div class="form-group" >
                        <label for="" class="col-md-4 control-label">মোবাইল নাম্বার</label>
                        <div class="col-md-2">
                            <select name="country-code" id="" class="form-control">
                                <option value="+৮৮">+৮৮</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <input type='hidden' name='user_phone_eng' id='user_phone_eng' value=''>
                            <input type="text" name="user_phone" class="form-control" id="user_phone" placeholder="১১ ডিজিট এর মোবাইল নাম্বার" minlength="11" maxlength="11" pattern="[0]+[1]+[0-9]+" required>
                            <span class="help-block">অনুগ্ৰহপূর্বক বাংলায় লিখুন</span>
                        </div>
                    </div><!-- /form-group -->

                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">পাসওয়ার্ড</label>
                        <div class="col-md-7">
                            <input type="password" name="password" class="form-control" id="password" placeholder="মোবাইল এ প্রেরিত আপনার ৭ ডিজিটের পাসওয়ার্ড" required>
                            <span class="help-block">আপনার ৭ ডিজিটের পাসওয়ার্ড</span>
                        </div>
                    </div><!-- /form-group -->
                    
                    
                    
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-4">
                            <button type="submit" class="btn btn-success btn-raised">লগইন</button>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-danger forgot_pass" style="background-color: #ddd">পাসওয়ার্ড পুনরুদ্ধার করুন</a>
                        </div>
                    </div><!-- /form-group -->
                </fieldset>
            </form><!-- /login form -->

            <!-- Regain password form
            ==================================================== -->
            <form class="form-horizontal" action="<?php echo site_url('login/regain_password');?>" method="post" id="password-regain">
                
                <fieldset>
                    <center><legend>পাসওয়ার্ড পুনরুদ্ধার  করুন</legend><p style="color:red;"></p></center>
                    <div class="form-group" >
                        <label for="" class="col-md-4 control-label">মোবাইল নাম্বার</label>
                        <div class="col-md-2">
                            <select name="country-code" id="" class="form-control">
                                <option value="+৮৮">+৮৮</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type='hidden' name='user_phone_eng' id='user_phone_eng' value=''>
                            <input type="text" name="user_phone" class="form-control" id="user_phone" placeholder="১১ ডিজিট এর মোবাইল নাম্বার" minlength="11" maxlength="11" pattern="[0]+[1]+[0-9]+" required>
                            <span class="help-block">অনুগ্ৰহপূর্বক বাংলায় লিখুন</span>
                        </div>
                    </div><!-- /form-group -->
<br>

                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-2">
                            <a href="#" class="btn btn-danger back-to-login" style="background-color: #ddd">লগইন পেজ এ ফেরত যান</a>
                        </div>
                       <div class="col-md-4">
                           <button type="submit" name="btn" class="btn btn-success btn-raised btn-block">সাবমিট করুন</button>
                       </div>
                    </div><!-- /form-group -->
                </fieldset>
            </form>
        </div>
    </div>
</div><!-- /row -->
<?php $this->load->view('public_layouts/footer'); ?>
<script>

$('#user_phone').on('keyup blur', function(event) {
    var tmp_phone1= $('#user_phone').val();
    //console.log(tmp_phone1);
     var banToeng={'০': 0,'১': 1,'২': 2,'৩': 3,'৪': 4,'৫': 5,'৬': 6,'৭': 7,'৮': 8,'৯': 9};
        String.prototype.getbngToeng = function() {
            var retStr = this;
            for (var x in banToeng) {
                retStr = retStr.replace(new RegExp(x, 'g'), banToeng[x]);
            }
            return retStr;
        };

        var bng_number=''+tmp_phone1+'';
        var tmp_phone= bng_number.getbngToeng();
        console.log('tp'+tmp_phone);
         document.getElementById('user_phone_eng').value =tmp_phone;
        console.log($('#user_phone_eng').val());
});
$('#password-regain').hide();
$('.forgot_pass').click(function(e) {
    e.preventDefault();
    $('#user-login-form').hide();
    $('#password-regain').show();
});

$('.back-to-login').click(function(e) {
    e.preventDefault();
    $('#password-regain').hide();
    $('#user-login-form').show();
});

</script>