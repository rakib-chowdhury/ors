<?php //include 'layouts/header.php';       ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel login-form-container" >
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

            <form action="" method="post" class="form-horizontal" id="user-login-form">
                <fieldset>
                    <center><legend>খুঁজে পাওয়া যায়নি</legend><p style="color:red;"></p></center>
                 

                    <div class="form-group" >
                        <label for="" class="col-md-12">
						<h3 style="text-align:center">
আপনার আবেদনকৃত পেইজটি খুঁজে পাওয়া যায়নি। 
অনুগ্রহপূর্বক সঠিক তথ্য দিয়ে খোঁজ করুন।
</h3> </label>
                        
                    </div><!-- /form-group -->

         
                </fieldset>
            </form><!-- /login form -->

            <!-- Regain password form
            ==================================================== -->
            <form action="<?php echo site_url('login/regain_password');?>" method="post" id="password-regain">
                
                <fieldset>
                    <center><legend>পাসওয়ার্ড পুনরুদ্ধার  করুন</legend><p style="color:red;"></p></center>
                    <div class="form-group" >
                        <label for="" class="col-md-4 control-label">ফোন নম্বর</label>
                        <div class="col-md-2">
                            <select name="country-code" id="" class="form-control">
                                <option value="+৮৮">+৮৮</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type='hidden' name='user_phone_eng' id='user_phone_eng' value=''>
                            <input type="text" name="user_phone" class="form-control" id="user_phone" placeholder="১১ ডিজিট এর ফোন নম্বর" minlength="11" maxlength="11" pattern="[0]+[1]+[0-9]+" required>
                            <span class="help-block">অনুগ্ৰহপূর্বক বাংলায় লিখুন</span>
                        </div>
                    </div><!-- /form-group -->
<br>

                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link back-to-login">&larr; লগইন পেজ এ ফেরত যান</a>
                        </div>
                       <div class="col-md-6">
                           <button type="submit" name="btn" class="btn btn-success btn-raised">সাবমিট করুন</button>
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