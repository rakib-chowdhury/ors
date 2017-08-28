<?php //include 'layouts/registered_user_header.php'; ?>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h1 class="text-center reg-title well">সমিতি নিবন্ধন ( সম্পূর্ণ )</h1>
		<form method="post" action="<?php echo site_url('somitee/somitee_member_registration_3');?>" class="form-horizontal reg-form-step-2-form-1 panel">
	  		<input type="hidden" name="chk_frm" value="1">
			<fieldset>
	    		<legend>ব্যবস্থাপনা</legend>
	    		<hr>
	    		<div class="form-group">
	    			<label for="commitee" class="col-md-4 control-label">সমিতির ব্যবস্থাপনা কমিটি</label>
	    			<div class="col-md-8">
	    				<select name="commitee" id="commitee" class="form-control" required>
	    					<option value="">বাছাই করুন</option>
	    					<option value="6">৬</option>
	    					<option value="9">৯</option>
	    					<option value="12">১২</option>
	    				</select>
	    				<span class="help-block">আবশ্যক</span>
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
<?php //include 'layouts/footer.php'; ?>