<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="text-center reg-title well">সমিতি নিবন্ধন ( সম্পূর্ণ )</h1>
        <form method="post" action="<?php echo site_url('somitee/somitee_member_registration_2');?>" class="form-horizontal reg-form-1 panel"
              id="reg-form-member-qty">
            <fieldset>
                <legend>১. সমিতির সদস্য</legend>
                <hr>
                <p class="text-center red">এই অংশটি ইংরেজিতে পূরন করুন</p>
                <div class="form-group">
                    <label for="org_mem_qty" class="col-md-4 control-label">সদস্য সংখ্যা</label>
                    <div class="col-md-8">
                        <input type="hidden" name="mem_update" value="1">
                        <input type="text" name="org_mem_qty" id="org_mem_qty" class="form-control">
                        <span class="help-block">আবশ্যক। কমপক্ষে ২০ জন হতে হবে।</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-success btn-raised">কন্টিনিউ &rarr;</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div><!-- /row -->
