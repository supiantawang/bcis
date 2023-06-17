
	<?php echo form_open_multipart("profile/update"); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header with-border">
              <h3 class="card-title">Personal Information</h3>
            </div>
            
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Full Name <font color="red">*</font></label>
                  <?php echo form_input("namapenuh",$user->u_fullname,"class='form-control' required")?>
                </div>
                

				<div class="form-group">
                  <label for="inputKategori">Phone No</label>
                  <?php echo form_input("notel",$user->u_contact,"class='form-control'")?>
                </div>
				<div class="form-group">
                  <label for="inputKategori">Email</label>
                  <?php echo form_input("email",$user->u_email,"class='form-control'")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Position </label>
                  <?php echo form_input("jawatan",$user->u_position,"class='form-control'")?>
                </div>
                <div class="form-group">
                  <label for="inputKategori">Working Place</label>
                  <?php echo form_input("tempatkerja",$user->u_tempatkerja,"class='form-control' ")?>
                  <?php echo form_hidden("uid",base64_encode($user->u_id))?>
                </div>
                
              </div>
				<div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
             
            
          </div>
          
        </div>
	
		
		
      </div>
     <?php echo form_close() ?>
