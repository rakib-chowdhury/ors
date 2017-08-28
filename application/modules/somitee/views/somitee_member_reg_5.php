<?php //include 'layouts/registered_user_header.php'; ?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center reg-title well">সমিতি নিবন্ধন ( সম্পূর্ণ )</h1>
        <div class="panel panel-hover">
            <form method="post" action="<?php echo site_url('somitee/somitee_member_registration_6'); ?>"
                  class="form-horizontal ">
                <input type="hidden" name="somitee_id" value="<?php echo $s_info[0]['somitee_id']; ?>">
                <fieldset id="file_up_check">
                    <div class="form-group">
                        <label for="file_upload_check" class="col-md-4 control-label">প্রয়োজনীয় ডকুমেন্ট আপলোড </label>
                        <div class="col-md-8">
                            <select name="file_upload_check" id="file_upload_check" class="form-control" required>
                                <option value="">--</option>
                                <option value="1">হ্যা</option>
                                <option value="2">না</option>
                            </select>
                            <span class="help-block">আবশ্যক</span>
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
