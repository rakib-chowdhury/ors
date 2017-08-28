<?php //include 'layouts/header.php'; ?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal well" action="<?php echo site_url('registration/registration3'); ?>" method="post">
		  <fieldset>
		    <legend>রেজিস্ট্রেশন ধাপ ২</legend>
		    <div class="form-group">
		      	<label for="org-mem-nid" class="col-md-2 control-label">জাতীয় প্রিচয় পত্র</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="org-mem-nid" placeholder="সদস্যের জাতীয় প্রিচয় পত্র" type="text" required>
		        	 <span class="help-block">সদস্যের জাতীয় প্রিচয় পত্র</span>
		      	</div>
		    </div>

		    <div class="form-group">
		      	<label for="org-mem-bdate" class="col-md-2 control-label">সদস্যের জন্ম তারিখ</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="org-mem-bdate" placeholder="সদস্যের জন্ম তারিখ" type="text" required>
		        	 <span class="help-block">সদস্যের জন্ম তারিখ</span>
		      	</div>
		    </div>
		    <div class="form-group">
		      	<label for="org-mem-share" class="col-md-2 control-label">সদস্যের শেয়ার</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="org-mem-share" placeholder="সদস্যের শেয়ার" type="text" required>
		        	 <span class="help-block">সদস্যের শেয়ার</span>
		      	</div>
		    </div>
		    <div class="form-group">
		      	<label for="org-mem-savings" class="col-md-2 control-label">সদস্যের সেভিংস</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="org-mem-savings" placeholder="সদস্যের সেভিংস এলাকা" type="text" required>
		        	 <span class="help-block">সদস্যের সেভিংস</span>
		      	</div>
		    </div>
		    <div class="form-group">
		      	<label for="org-mem-chair" class="col-md-2 control-label">সদস্যের পদবি</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="org-mem-chair" placeholder="সদস্যের পদবি" type="text" required>
		        	 <span class="help-block">সদস্যের পদবি</span>
		      	</div>
		    </div>

		    <div class="form-group">
	          	<label for="org-mem-pic" class="col-md-2 control-label">সদস্যের ছবি</label>

	          	<div class="col-md-10">
	            	<input type="text" readonly="" class="form-control" placeholder="Browse...">
	            	<input type="file" id="org-mem-pic" multiple="">
	          	</div>
	        </div>

	        <div class="form-group">
		      	<label for="org-mem-occupation" class="col-md-2 control-label">সদস্যের পেশা</label>
		      	<div class="col-md-10">
		        	<input class="form-control" name="" id="org-mem-occupation" placeholder="সদস্যের পেশা" type="text" required>
		        	 <span class="help-block">সদস্যের পেশা</span>
		      	</div>
		    </div>
		   
		   <div class="form-group">
	          	<label for="org-mem-citizen" class="col-md-2 control-label">সদস্যের নাগরিক্ততের সনদ</label>

	          	<div class="col-md-10">
	            	<input type="text" readonly="" class="form-control" placeholder="Browse...">
	            	<input type="file" id="org-mem-citizen" multiple="">
	          	</div>
	        </div>
		   
		   <div class="form-group">
	          	<label for="org-mem-certificate" class="col-md-2 control-label">প্রশিক্ষনের সনদ</label>

	          	<div class="col-md-10">
	            	<input type="text" readonly="" class="form-control" placeholder="Browse...">
	            	<input type="file" id="org-mem-certificate" multiple="">
	          	</div>
	        </div>

			<button class="btn btn-success btn-raised pull-right" type="submit">Continue Registration</button>
		  </fieldset>  
		</form>
	</div><!-- /col12 -->
</div><!-- /row -->
<?php //include 'layouts/footer.php'; ?>