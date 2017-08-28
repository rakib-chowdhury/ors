<?php //include 'layouts/header.php';    ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2" >

        <div class="well" style="margin-bottom: 4px; background-color:#BBDEFB; color: #448AFF;">
            <center>
                <legend style="margin: 0; padding: 0;"><strong>সংগঠক নিবন্ধন ফরম</strong></legend>
                <!--<hr style="padding:0; margin: 0; padding-bottom: 5px;">-->

                <span style="color: red;">(অনুগ্রহপূর্বক সকল তথ্য সঠিকভাবে বাংলায় পূরণ করুন)</span>
        </div>

        <form class="form-horizontal well registration-form" onsubmit="return reg_form();" 
              action="<?php echo site_url('registration/signup_post'); ?>" method="post">
            <fieldset>
                <?php
                $msg = $this->session->userdata('duplicate_phone');
                $u_name_ses = $this->session->userdata('reg_u_name_session');
                $nid_ses = $this->session->userdata('reg_nid_session');
                $email_ses = $this->session->userdata('reg_email_session');
                ?>
                <?php

                if ($msg) {
                    echo $msg;
                }
                $this->session->unset_userdata('duplicate_phone');
                ?>

                <div class="form-group">
                    <label for="user_name" class="col-md-3 control-label">সমবায় সংগঠকের নাম</label>
                    <div class="col-md-8">
                        <input class="form-control" value="<?php if ($u_name_ses) {
                            echo $u_name_ses;
                        } ?>" name="user_name" id="user_name" placeholder="সমবায় সংগঠকের পূর্ণ নাম" type="text"
                               required>
                        <span class="help-block">আপনার জাতীয় পরিচয় পত্রে ব্যবহৃত পূর্ণ নাম ব্যবহার করুন</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="user_nid" class="col-md-3 control-label">জাতীয় পরিচয়পত্র নং</label>
                    <div class="col-md-8">
                        <input class="form-control" value="<?php if ($nid_ses) {
                            echo $nid_ses;
                        } ?>" name="user_nid" id="user_nid" minlength="17" maxlength="17"
                               placeholder="সমবায় সংগঠকের ১৭ ডিজিটের জাতীয় পরিচয়পত্র নং" type="text" required>
                        <span class="help-block">আপনার জাতীয় পরিচয়পত্রের নাম্বার ১৩ ডিজিট হলে তার পূর্বে আপনার জন্মসাল লিখুন। </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_phone" class="col-md-3 control-label">মোবাইল নাম্বার</label>
                    <div class="col-md-2">
                        <select name="country-code" id="" class="form-control">
                            <option value="+৮৮">+৮৮</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type='hidden' name='user_phone_eng' id='user_phone_eng' value=''>
                        <input onfocus="hide_err_msg_phone();" type="text" name="user_phone" class="form-control"
                               id="user_phone" placeholder="সমবায় সংগঠকের মোবাইল নাম্বার" minlength="11" maxlength="11"
                               required>
                        <span style="color:red;" id="reg_pn_err"></span><span class="help-block">১১ ডিজিট এর মোবাইল নাম্বার</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="user_email" class="col-md-3 control-label">ই-মেইল (ঐচ্ছিক)</label>
                    <div class="col-md-8">
                        <input class="form-control" value="<?php if ($email_ses) {
                            echo $email_ses;
                        } ?>" name="user_email" id="user_email" placeholder="ইংরেজিতে পূরণ করুন" type="email">
                        <span class="help-block">সমবায় সংগঠকের ই-মেইল</span>
                        <p id="check_email_msg"></p>
                    </div>
                </div>

                <?php
                $this->session->unset_userdata('reg_u_name_session');
                $this->session->unset_userdata('reg_nid_session');
                $this->session->unset_userdata('reg_email_session');
                ?>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <button id="submit" class="btn btn-success btn-raised btn-block" type="submit">সাবমিট করুন
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div><!-- /col12 -->
</div><!-- /row -->
<?php $this->load->view('public_layouts/footer'); ?>

<script>


    $(document).ready(function () {
        $('#reg_pn_err').hide();
        // $('#submit').attr('disabled','disabled');
    });

//    function check_email() {
//        var tmp_email = $('#user_email').val();
//        //alert(tmp_email);
//
//        $.ajax({
//            type: 'POST',
//            url: '<?php //echo site_url('registration/check_email'); ?>//',
//            data: {
//                email: tmp_email
//            },
//            success: function (data) {
//                console.log(data);
//                if (data == 0) {
//                    document.getElementById('user_email').value = '';
//                    //document.getElementById('check_email_msg').innerHTML = 'this email exists';
//                    console.log('This email already exists..');
//                }
//
//            }
//        });
//    }

//    function check_nid() {
//        var tmp_nid = $('#user_nid').val();
//        //alert(tmp_email);
//
//        $.ajax({
//            type: 'POST',
//            url: '<?php //echo site_url('registration/check_nid'); ?>//',
//            data: {
//                nid: tmp_nid
//            },
//            success: function (data) {
//                console.log(data);
//                if (data == 0) {
//                    document.getElementById('user_nid').value = '';
//                    console.log('This NID already exists..');
//                }
//
//            }
//        });
//    }

</script>

<script>

    function check_phone_no() {
        var tmp_phone_bn = $('#user_phone').val();
        console.log('bn ' + tmp_phone_bn);
        var banToeng = {'০': 0, '১': 1, '২': 2, '৩': 3, '৪': 4, '৫': 5, '৬': 6, '৭': 7, '৮': 8, '৯': 9};
        String.prototype.getbngToeng = function () {
            var retStr = this;
            for (var x in banToeng) {
                retStr = retStr.replace(new RegExp(x, 'g'), banToeng[x]);
            }
            return retStr;
        };
        $('#submit').removeAttr('disabled');

        var bng_number = '' + tmp_phone_bn + '';
        var tmp_phone = bng_number.getbngToeng();

        tmp_phone = tmp_phone.replace(/[^0-9.]/, '');

        tmp_phone = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/.test(tmp_phone);
        console.log('en ' + tmp_phone);

        if (tmp_phone == false) {
            $('#submit').attr('disabled', 'disabled');
            document.getElementById('user_phone').value = '';
            $('#reg_pn_err').html('অনুগ্রহপূর্বক সঠিক ফোন নম্বর দিন।');
            $('#chk_bx').prop('checked', false);
            console.log('This Phone Number already exists..');
        }

        else {

            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('registration/check_phone'); ?>',
                data: {phone: tmp_phone},
                success: function (data) {
                    console.log('data ' + data);
                    if (data == 0) {
                        $('#reg_pn_err').hide();
                        document.getElementById('user_phone_eng').value = tmp_phone;
                        var asd = '' + tmp_phone + '';
                        if (asd.length == 11) {
                            $('#submit').removeAttr('disabled');
                        }

                    } else {
                        $('#submit').attr('disabled', 'disabled');
                        document.getElementById('user_phone').value = '';
                        $('#reg_pn_err').html('অনুগ্রহপূর্বক সঠিক ফোন নম্বর দিন।');
                        $('#chk_bx').prop('checked', false);
                        console.log('This Phone Number already exists..');


                    }

                }
            });
        }

    }


    function reg_form() {
        var ok = true;
       // var captcha = document.getElementById("captcha").value;


        var tmp_phone_bn = $('#user_phone').val();
        //console.log('bn '+tmp_phone_bn);

        var banToeng = {'০': 0, '১': 1, '২': 2, '৩': 3, '৪': 4, '৫': 5, '৬': 6, '৭': 7, '৮': 8, '৯': 9};
        String.prototype.getbngToeng = function () {
            var retStr = this;
            for (var x in banToeng) {
                retStr = retStr.replace(new RegExp(x, 'g'), banToeng[x]);
            }
            return retStr;
        };

        var bng_number = '' + tmp_phone_bn + '';
        var tmp_phone = bng_number.getbngToeng();

        tmp_phone = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/.test(tmp_phone);


//        if (captcha !=<?//=$this->session->userdata('captchaWord');?>//) {
//            document.getElementById("captcha").style.borderColor = "#E34234";
//            document.getElementById("cpt_err_msg").innerHTML = 'Captcha নাম্বার  সঠিক নয়।';
//            ok = false;
//
//        }

        // console.log('en ' +tmp_phone);

        if (tmp_phone == false) {
            $('#submit').attr('disabled', 'disabled');
            document.getElementById('user_phone').value = '';
            $('#reg_pn_err').html('অনুগ্রহপূর্বক সঠিক ফোন নম্বর দিন।');
            $('#chk_bx').prop('checked', false);
            console.log('This Phone Number already exists..');
        }

        else {

            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('registration/check_phone'); ?>',
                data: {
                    phone: tmp_phone
                },
                success: function (data) {
                    console.log('data ' + data);
                    if (data.length == 0 || data == null) {
                        $('#reg_pn_err').hide();
                        document.getElementById('user_phone_eng').value = tmp_phone;
                        console.log('eng' + $('#user_phone_eng').val());
                        var asd = '' + tmp_phone + '';
                        if (asd.length == 11) {
                            $('#submit').removeAttr('disabled');
                        }
                    }
                    else {
                        ok = false;
                        //$('#submit').attr('disabled','disabled');
                        document.getElementById('user_phone').value = '';
                        $('#reg_pn_err').show();
                        $('#chk_bx').prop('checked', false);
                        console.log('This Phone Number already exists..');
                    }


                }
            });
        }

        return ok;

    }

    function hide_err_msg() {
        document.getElementById("cpt_err_msg").innerHTML = '';
    }
    function hide_err_msg_phone() {
        $('#reg_pn_err').hide();
    }

</script>