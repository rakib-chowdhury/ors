<?php //include 'layouts/header.php';    ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <div class="well" style="margin-bottom: 4px; background-color:#BBDEFB; color: #448AFF;">
            <center>
                <legend style="margin: 0; padding: 0;"><strong>সংগঠক নিবন্ধন ফরম</strong></legend>
                <!--<hr style="padding:0; margin: 0; padding-bottom: 5px;">-->

                <span style="color: red;">(অনুগ্রহপূর্বক সকল তথ্য সঠিকভাবে বাংলায় পূরণ করুন)</span>
        </div>

        <form class="form-horizontal well registration-form" onsubmit="return reg_form();"
              action="<?php echo site_url('registration/signup_post'); ?>" method="post">
            <fieldset>
                <div class="form-group">
                    <p style="color: red; text-align: center">দুঃখিত সাময়িক সময়ের জন্য সেবাটি বন্ধ আছে</p>
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