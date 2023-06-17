<section class="content-header">
  <h1>
    Kemaskini
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Pengurusan</a></li>
    <li class="active">Kemaskini</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kemaskini Sub Institusi</h3>
            </div>
            <?php echo form_open_multipart("management/update/maintopic"); ?>
              <div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						  <label for="exampleInputFile">Nama Topik <font color="red">*</font></label>
						 <?php echo form_input("topic",$topic->topic_name,"class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
						  <label for="exampleInputFile">Keterangan <font color="red">*</font></label>
						 <?php echo form_textarea("description",$topic->topic_desc,"class='form-control' id='description' required")?>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label for="exampleInputFile">Audio </label>	
						  
						  <?php 
								if($topic->topic_link != ""){
									echo "<audio controls>
										  <source src=\"".base_url().$topic->topic_link."\" type=\"audio/ogg\">
										  <source src=\"".base_url().$topic->topic_link."\" type=\"audio/mpeg\">
										Your browser does not support the audio element.
										</audio>
									<span class='btn btn-block btn-xs btn-danger' onclick=\"deleteThisAudio('".base64_encode($topic->topic_id)."')\">Hapuskan</span>
									";
								}else{
									echo "<input type=\"file\" name=\"audio\" accept=\"audio/mp3\">
						  <p><small><font color=\"red\">Hanya support mp3 sahaja</font></small></p>";
								}
							  
							  ?>
						</div>
					</div>
				</div>		
				
				
              </div>

              <div class="box-footer">
				<?php echo form_hidden("id",base64_encode($topic->topic_id))?>
                <button type="button" class="btn btn-default" onclick="history.go(-1)">Batal</button>
                <button type="submit" class="btn btn-primary">Kemaskini</button>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>