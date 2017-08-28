<?php //include 'layouts/header.php';    ?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
<div class="well" style="margin-bottom: 12px">
<h3 style="margin:0; padding: 0" class="text-center">আপনার মতামত প্রদান করুন</h3>
<hr style="padding: 0; margin: 0">
<p class="small text-center" style="color:red; padding: 0; margin:5px 0 0 0">(অনুগ্রহপূর্বক নিম্নের ইমেইল ব্যতীত সকল তথ্য বাংলায় প্রদান করুন)</p>
</div>
        <form class="form-horizontal well" action="<?php echo site_url('home/save_opinion_info'); ?>" method="post">
            <fieldset>
               
                <div class="form-group">
                    <label for="user_name" class="col-md-4 control-label">মতামত প্রদানকারীর নাম</label>
                    <div class="col-md-8">
                        <input class="form-control" name="name" id="user_name" placeholder="মতামত প্রদানকারীর নাম" type="text" required>
                        <span class="help-block" >মতামত প্রদানকারীর নাম</span>
                    </div>
                </div>

                <div class="form-group" >
                    <label for="user_phone" class="col-md-4 control-label">মোবাইল</label>
                    <div class="col-md-2">
                        <select name="country-code" id="" class="form-control">
                            <option value="+88">+৮৮</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type='hidden' name='user_phone_eng' id='user_phone_eng' value=''>
                        <input onblur="check_phone()" type="text" name="user_phone" class="form-control" id="user_phone" placeholder="মোবাইল" minlength="11" maxlength="11" required>
                        <span class="help-block">১১ ডিজিট এর ফোন নম্বর</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="user_email" class="col-md-4 control-label">ইমেইল (ঐচ্ছিক)</label>
                    <div class="col-md-8">
                        <input class="form-control" name="email_title" id="user_email" placeholder="E-mail address" type="text">
                        <span class="help-block" >E-mail Address</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="user_email" class="col-md-4 control-label">মতামতের বিষয় </label>
                    <div class="col-md-8">
                        <input class="form-control" name="opinion_title" id="user_name" placeholder="মতামতের বিষয়" type="text" required>
                        <span class="help-block" >মতামতের বিষয় </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="curr_details" class="col-md-4 control-label"> মতামতের বিবরণ </label>
                    <div class="col-md-8">
                        <textarea name="opinion_description" id="curr_details" rows="2" class="form-control"></textarea>
                        <span class="help-block"> মতামতের বিবরণ </span>
                    </div>
                </div>
                <!-- /form-group -->
<!--                <div class="form-group">
                    <label for="user_phone" class="col-md-2 control-label">ফোন নাম্বার</label>
                    <div class="col-md-10">
                        <input onblur="check_phone()" class="form-control" name="user_phone" id="user_phone" placeholder="সমিতি প্রধানের ফোন নাম্বার" type="text" required>
                        <span class="help-block">সমিতি প্রধানের ফোন নাম্বার</span>
                    </div>
                </div>-->
                <div class="col-md-6 col-md-offset-3">
                <button class="btn btn-success btn-raised btn-block" type="submit">সাবমিট করুন</button>
<div>
            </fieldset>  
        </form>
    </div><!-- /col12 -->
</div><!-- /row -->
<?php $this->load->view('public_layouts/footer'); ?>

<script>
    function check_email() {
        var tmp_email = $('#user_email').val();
        //alert(tmp_email);

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('registration/check_email'); ?>',
            data: {
                email: tmp_email
            },
            success: function (data) {
                console.log(data);
                if (data == 0) {
                    document.getElementById('user_email').value = '';
                    //document.getElementById('check_email_msg').innerHTML = 'this email exists';
                    console.log('This email already exists..');
                }

            }
        });
    }
    function check_nid() {
        var tmp_nid = $('#user_nid').val();
        //alert(tmp_email);

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('registration/check_nid'); ?>',
            data: {
                nid: tmp_nid
            },
            success: function (data) {
                console.log(data);
                if (data == 0) {
                    document.getElementById('user_nid').value = '';
                    console.log('This NID already exists..');
                }

            }
        });
    }
    function check_phone() {
        var tmp_phone_bn = $('#user_phone').val();

        var banToeng={'০': 0,'১': 1,'২': 2,'৩': 3,'৪': 4,'৫': 5,'৬': 6,'৭': 7,'৮': 8,'৯': 9};
        String.prototype.getbngToeng = function() {
            var retStr = this;
            for (var x in banToeng) {
                retStr = retStr.replace(new RegExp(x, 'g'), banToeng[x]);
            }
            return retStr;
        };

        var bng_number=''+tmp_phone_bn +'';
        var tmp_phone=bng_number.getbngToeng();


        console.log(tmp_phone);

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('registration/check_phone'); ?>',
            data: {
                phone: tmp_phone
            },
            success: function (data) {
                console.log(data);
                if (data == 0) {
                    document.getElementById('user_phone').value = '';
                    console.log('This Phone Number already exists..');
                }else{
                  document.getElementById('user_phone_eng').value =tmp_phone;
                  console.log($('#user_phone_eng').val());
                }

            }
        });
    }
</script>