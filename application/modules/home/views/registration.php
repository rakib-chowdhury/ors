<?php include 'layouts/header.php'; ?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<form class="form-horizontal well" action="registration2.php">
		  <fieldset>
		    <legend>রেজিস্ট্রেশন</legend>
		    <div class="form-group">
		      	<label for="org-name" class="col-md-2 control-label">সমিতির নাম</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="org-name" placeholder="সমিতির নাম" type="text" required>
		        	 <span class="help-block">সমিতির নাম</span>
		      	</div>
		    </div>

		   	<div class="form-group">
		        <label for="org-address" class="col-md-2 control-label">ঠিকানা</label>

		        <div class="col-md-10">
		           <textarea class="form-control" name="" rows="3" id="org-address" required></textarea>
		           <span class="help-block">সমিতির ঠিকানা</span>
		        </div>
		    </div>
		    <div class="form-group">
		      	<label for="org-member" class="col-md-2 control-label">সদস্য সংখ্যা</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="org-member" placeholder="সদস্য সংখ্যা" type="text" required>
		        	 <span class="help-block">সমিতির সদস্য সংখ্যা</span>
		      	</div>
		    </div>
		    <div class="form-group">
		      	<label for="org-election-area" class="col-md-2 control-label">নির্বাচনী এলাকা</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="org-election-area" placeholder="নির্বাচনী এলাকা" type="text" required>
		        	 <span class="help-block">নির্বাচনী এলাকা</span>
		      	</div>
		    </div>
		    <div class="form-group">
		      	<label for="org-work-area" class="col-md-2 control-label">সমিতির কর্ম এলাকা</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="org-work-area" placeholder="সমিতির কর্ম এলাকা এলাকা" type="text" required>
		        	 <span class="help-block">সমিতির কর্ম এলাকা</span>
		      	</div>
		    </div>
		    <div class="form-group">
		      	<label for="org-type" class="col-md-2 control-label">সমিতির ধরন</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="org-type" placeholder="সমিতির ধরন" type="text" required>
		        	 <span class="help-block">সমিতির ধরন</span>
		      	</div>
		    </div>
		    <div class="form-group">
		      	<label for="org-genre" class="col-md-2 control-label">সমিতির প্রকার</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="org-genre" placeholder="সমিতির প্রকার" type="text" required>
		        	 <span class="help-block">সমিতির প্রকার</span>
		      	</div>
		    </div>
		    <div class="form-group">
		      	<label for="share-price" class="col-md-2 control-label">শেয়ার মূল্য</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="share-price" placeholder="শেয়ার মূল্য" type="text" required>
		        	 <span class="help-block">শেয়ার মূল্য</span>
		      	</div>
		    </div>
		    <div class="form-group">
		      	<label for="share-qty" class="col-md-2 control-label">শেয়ার সংখ্যা</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="share-qty" placeholder="শেয়ার সংখ্যা" type="text" required>
		        	 <span class="help-block">শেয়ার সংখ্যা</span>
		      	</div>
		    </div>

		    <div class="checkbox">
				<label>
					<input type="checkbox" name="" id="" required> I have read the above information and the relevant guidance notes.
				</label>
			</div>
			<button class="btn btn-success btn-raised pull-right" type="submit">Continue Registration</button>
		  </fieldset>  
		</form>
	</div><!-- /col12 -->
</div><!-- /row -->
<?php include 'layouts/footer.php'; ?>