<?php //include 'layouts/registered_user_header.php'; ?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center reg-title well">সমিতি নিবন্ধন ( সম্পূর্ণ )</h1>
        <div class="panel panel-hover">
            <form method="post" action="<?php echo site_url('somitee/somitee_member_registration_7'); ?>"
                  class="form-horizontal ">
                <input type="hidden" name="somitee_id" value="<?php echo $s_info[0]['somitee_id'];?>">
                <input type="hidden" name="file_up_c" value="1">

                <fieldset id="file_upload_div">
                    <legend style="text-align: center;">ফাইল আপ্লোড</legend>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="imgInp" class="col-sm-5 control-label">প্রয়োজনীয় ডকুমেন্ট</label>
                            <div class="col-sm-7">
                                <input type="text" name="file_name" class="form-control" placeholder="ফাইল এর নাম লিখুন"
                                       required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" readonly="" class="form-control"
                                   placeholder="ছবি নির্বাচন করতে ক্লিক করুন">
                            <input type="file" id="imgInp" accept="image/*,.doc, .pdf, .docx, .xls, .xlsx"
                                   required>
                            <input type="hidden" name="pro_pic_path" id="pro_pic_path">
                        </div>
                        <div class="col-sm-1"><label id="upload_msg"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="imgInp" class="col-sm-5 control-label">প্রয়োজনীয় ডকুমেন্ট</label>
                            <div class="col-sm-7">
                                <input type="text" name="file_name1" class="form-control" placeholder="ফাইল এর নাম লিখুন"
                                       required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" readonly="" class="form-control"
                                   placeholder="ছবি নির্বাচন করতে ক্লিক করুন">
                            <input type="file" id="imgInp1" accept="image/*,.doc, .pdf, .docx, .xls, .xlsx"
                                   required>
                            <input type="hidden" name="pro_pic_path1" id="pro_pic_path1">
                        </div>
                        <div class="col-sm-1"><label id="upload_msg1"></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="imgInp" class="col-sm-5 control-label">প্রয়োজনীয় ডকুমেন্ট</label>
                            <div class="col-sm-7">
                                <input type="text" name="file_name2" class="form-control" placeholder="ফাইল এর নাম লিখুন"
                                       required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" readonly="" class="form-control"
                                   placeholder="ছবি নির্বাচন করতে ক্লিক করুন">
                            <input type="file" id="imgInp2" accept="image/*,.doc, .pdf, .docx, .xls, .xlsx"
                                   required>
                            <input type="hidden" name="pro_pic_path2" id="pro_pic_path2">
                        </div>
                        <div class="col-sm-1"><label id="upload_msg2"></label>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            <button type="submit" class="btn btn-success btn-raised btn-block">সাবমিট করুন</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div><!-- /row -->
<?php $this->load->view('public_layouts/footer'); ?>
<script>
    

    $('#imgInp').on('change', function () {
        var file_data = $('#imgInp').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        //alert(form_data);
        $.ajax({
            url: '<?php echo site_url('somitee/upload/f'); ?>',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {
                console.log(data);
                var data1 = $.parseJSON(data);
                if (data1['msg'] == 1) {

                    var p = data1['path'].split('/');
                    // var p_ath = p[p.length - 1];

                    document.getElementById('pro_pic_path').value = p[p.length - 1];
                    console.log($('#pro_pic_path').val());
                    document.getElementById('upload_msg').innerHTML = 'Upload';
                } else if (data1['msg'] == 0) {
                    document.getElementById('upload_msg').innerHTML = 'error';
                    alert('folder does not exist');
                } else {
                    document.getElementById('upload_msg').innerHTML = 'error';
                    alert(data1['msg']);
                }
            }
        });
    });
    $('#imgInp1').on('change', function () {
        var file_data = $('#imgInp1').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        //alert(form_data);
        $.ajax({
            url: '<?php echo site_url('somitee/upload/f'); ?>',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {
                console.log(data);
                var data1 = $.parseJSON(data);
                if (data1['msg'] == 1) {

                    var p = data1['path'].split('/');
                    // var p_ath = p[p.length - 1];

                    document.getElementById('pro_pic_path1').value = p[p.length - 1];
                    console.log($('#pro_pic_path1').val());
                    document.getElementById('upload_msg1').innerHTML = 'Upload';
                } else if (data1['msg'] == 0) {
                    document.getElementById('upload_msg1').innerHTML = 'error';
                    alert('folder does not exist');
                } else {
                    document.getElementById('upload_msg1').innerHTML = 'error';
                    alert(data1['msg']);
                }
            }
        });
    });
    $('#imgInp2').on('change', function () {
        var file_data = $('#imgInp2').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        //alert(form_data);
        $.ajax({
            url: '<?php echo site_url('somitee/upload/f'); ?>',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {
                console.log(data);
                var data1 = $.parseJSON(data);
                if (data1['msg'] == 1) {

                    var p = data1['path'].split('/');
                    // var p_ath = p[p.length - 1];

                    document.getElementById('pro_pic_path2').value = p[p.length - 1];
                    console.log($('#pro_pic_path2').val());
                    document.getElementById('upload_msg2').innerHTML = 'Upload';
                } else if (data1['msg'] == 0) {
                    document.getElementById('upload_msg2').innerHTML = 'error';
                    alert('folder does not exist');
                } else {
                    document.getElementById('upload_msg2').innerHTML = 'error';
                    alert(data1['msg']);
                }
            }
        });
    });

</script>
