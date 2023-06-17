	<?php echo form_open_multipart("profile/updatepassword"); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card box-default">
            <div class="card-header with-border">
              <h3 class="card-title">Change Your Password</h3>
            </div>
            
              <div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label>New Password </label>
						  <?php echo form_password("newpassword","","class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label>New Password (Confirm?)</label>
						  <?php echo form_password("newpassword2","","class='form-control' required")?>
						</div>
					</div>
                </div>
				
                
              </div>
			  <div class="card-footer">
				<?php echo form_hidden("uid",base64_encode(get_cookie("_userID")))?>
                <button type="submit" class="btn btn-primary">Change</button>
              </div>
             
            
          </div>
          
        </div>
	
		
		
      </div>
     <?php echo form_close() ?>
