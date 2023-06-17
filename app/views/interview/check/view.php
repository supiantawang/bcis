<section class="content-header">
  <h1>
    Maklumat Peserta
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Peserta</a></li>
    <li class="active">Maklumat Peserta</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
		<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><h5><b>1. Maklumat Peserta</b></h5></a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><h5><b>2. Maklumat Kursus</b></h5></a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"><h5><b>3. Perkembangan Kursus</b></h5></a></li>
              <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false"><h5><b>4. Tugasan Video</b></h5></a></li>
              <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false"><h5><b>5. Tindakan</b></h5></a></li>
              
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
				<div class="tab-pane active" id="tab_1"><br>
					<div class="responsive">
					<table class="table table-bordered table-striped">
					<tr>
						<th width="20%">Nama Penuh</th>
						<td width="30%"><?php echo $user->u_full_name ?></td>
						<th width="20%">Pekerjaan</th>
						<td><?php echo $user->u_occupation ?></td>
					</tr>
					<tr>
						<th width="20%">No Kad Pengenalan</th>
						<td width="30%"><?php echo $user->u_ic_number ?></td>
						<th width="20%">Tempat Kerja</th>
						<td><?php echo $user->u_work_place ?></td>
					</tr>
					<tr>
						<th width="20%">Jantina</th>
						<td width="30%"><?php echo ($user->u_gender == "M") ? "LELAKI" : "PEREMPUAN" ?></td>
						<th width="20%">No Telefon</th>
						<td><?php echo $user->u_phone_number ?></td>
					</tr>
					<tr>
						<th width="20%">Alamat Tempat Tinggal</th>
						<td width="30%"><?php echo $user->u_address ?></td>
						<th width="20%">Tarikh Daftar</th>
						<td><?php echo date("d-m-Y H:i:s ", strtotime($user->u_registered_on)) ?></td>
					</tr>
					<tr>
						<th width="20%">Umur</th>
						<td width="30%"><?php echo date_diff(date_create($user->u_birth_date), date_create('now'))->y; ?> TAHUN</td>
						<th width="20%">Email</th>
						<td><?php echo $user->u_email ?></td>
					</tr>
					</table>
					</div>
				</div>
				<div class="tab-pane" id="tab_2"><br>
					<table class="table table-bordered table-striped">
					<tr>
						<th width="20%">Tempat Kursus</th>
						<td width="30%"><?php echo $this->blapps_lib->getData("sub_name","ek_subinstitution","sub_id",$user->u_course_place) ?></td>
						<th width="20%">No Resit Pembayaran</th>
						<td><?php echo $user->u_payment_receipt_no ?></td>
					</tr>
					<tr>
						<th width="20%">Sesi</th>
						<td width="30%"><?php echo $user->u_session ?></td>
						<th width="20%">No Giliran</th>
						<td><?php echo $user->u_session_sequence ?>/<?php echo $this->blapps_lib->getData("settting_value","tb_setting_rules","settting_name","limit_use_for_each_session") ?></td>
					</tr>
					<tr>
						<th width="20%">Disahkan Oleh</th>
						<td width="30%"><?php echo $this->blapps_lib->getData("u_fullname","ek_admin","u_id",$user->u_activated_by) ?></td>
						<th width="20%">Disahkan Pada</th>
						<td><?php echo date("d-m-Y H:i:s ", strtotime($user->u_activated_on)) ?></td>
					</tr>
					</table>
				</div>
				<div class="tab-pane" id="tab_3"> <br>
					<div class="row">
					<div class="col-md-10">
						<div class="responsive">
						<div class="box-group" id="accordion">
                
						<?php
						$this->db->join("ek_institution","ek_institution.ins_id = tb_topic_institution.ins_id");
						$this->db->join("ek_subinstitution","ek_subinstitution.id_institution = ek_institution.ins_id");
						$tb_topic_institution = $this->blapps_lib->getDataResult("tb_topic_institution",array(array("sub_id",$user->u_course_place)),"",array("topic_sort","ASC"));
						$no=1;
						foreach($tb_topic_institution as $topic):
						$in = "";
						if($no ==1){
							$in = "in";
						}
						?>
						
						<div class="panel box box-primary">
						  <div class="box-header with-border">
							<h4 class="box-title">
							  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $no?>">
								<?php echo $this->blapps_lib->getData("topic_name","tb_topic","topic_id",$topic->topic_id) ?>
							  </a>
							</h4>
						  </div>
						  <div id="collapse<?php echo $no?>" class="panel-collapse collapse <?php echo $in ?>">
							<div class="box-body">
							  <table class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>Perkara</th>
									<th width="20%">Tarikh</th>
									<th width="20%">Status</th>
								</tr>
								</thead>
								<tbody>
								<?php 
								$teach = $this->blapps_lib->getDataResult("tb_teaching",array(array("topic_institution_id",$topic->topic_institution_id)),"",array("tea_order_sort","ASC"));
								$activ = $this->blapps_lib->getDataResult("tb_activity",array(array("topic_id",$topic->topic_institution_id)),"",array("act_order_sort","ASC"));
								if($teach || $activ){
									foreach($teach as $row){
										$this->db->where("tea_id",$row->tea_id);
										$this->db->where("u_id",$user->u_id);
										$this->db->from("tb_click_log_teaching");
										$grap = $this->db->get()->row();
										
										if($grap){
											$cek = $grap->clt_datetime; 
											$status = "<span class='label label-success'>Selesai</span>"; 
										}else{
											$cek="-";
											$status="<span class='label label-warning'>Belum Selesai</span>";
										}
										echo "<tr>
											<td>$row->tea_name</td>
											<td>$cek</td>
											<td>$status</td>
											</tr>";
									}
									foreach($activ as $rec){
										$this->db->where("act_id",$rec->act_id);
										$this->db->where("u_id",$user->u_id);
										$this->db->from("tb_click_log_activity");
										$grap = $this->db->get()->row();
										
										
										if($grap){
											$cek = $grap->cla_datetime; 
											$status = "<span class='label label-success'>Selesai</span>"; 
										}else{
											$cek="-";
											$status="<span class='label label-warning'>Belum Selesai</span>";
										}
										echo "<tr>
											<td>$rec->act_name</td>
											<td>$cek</td>
											<td>$status</td>
											</tr>";
									}
									
								}else{
									echo "<tr><td colspan='3' align='center'>Tiada Data.</td></tr>";
								}
								?>
									
								</tbody>
								</table>
							</div>
						  </div>
						</div>
						
						<br>
						<?php $no++; endforeach; ?>
						</div>
					</div>
					</div>
					</div>	
					
					
				</div>
				<div class="tab-pane" id="tab_4"><br>
				<div class="row">
					<div class="col-md-6">
						<div class="panel box box-default">
						<div class="box-header with-border"><h3 class="box-title">Tugasan Video</h3></div>
						<div class="box-body">
						<?php 
						
						$videos = $this->blapps_lib->getDataResult("tb_video_evaluation",array(array("u_id",$user->u_id)),"",array("vide_id","ASC"));
						if($videos){
						foreach($videos as $vid):
						?>
							
							<iframe width="100%" height="350" src="<?php echo $vid->vide_file_link ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							<label>Muat Naik Pada:</label> <?php echo $vid->vide_upload_date ?><br>
							<label>Pautan:</label> <a href="<?php echo $vid->vide_file_link ?>" target="_blank">Lihat</a>
						<?php  endforeach; ?>
						<?php  }else{ ?>
						<center> Video Belum Dimuatnaik. </center>
						<?php } ?>
						
						</div>
						</div>
					</div>
					<div class="col-md-6">
					<table class="table table-bordered table-striped">
						<tr>
							<th width="30%">Penilaian Tugasan Video</th>
							<td><?php echo ($video->vide_status == 1) ? "Lulus" : "Gagal" ?></td>
						</tr>
						<tr>
							<th>Ulasan Tugasan Video</th>
							<td><?php echo $video->vide_notes ?></td>
						</tr>
						<tr>
							<th>Penilai</th>
							<td><?php echo $this->blapps_lib->getData("u_fullname","ek_admin","u_noic",$video->u_noic) ?></td>
						</tr>
						<tr>
							<th>Dinilai Pada</th>
							<td><?php echo $video->vide_date ?></td>
						</tr>
						</table>	  
					</div>
					</div>
				</div>
				<div class="tab-pane" id="tab_5"><br>
				<div class="row">
					
					<div class="col-md-6">
					<?php echo form_open_multipart("interview/update/status"); ?>
					<div class="panel box box-default">
						<div class="box-header with-border"></div>
						<div class="box-body">
							
							<div class="form-group">
							  <label>Penilaian Temuduga <font color="red">*</font></label>
							  <?php echo form_dropdown("penilaian",array(''=>'- Sila Pilih -','1'=>'Lulus','0'=>'Gagal'),"","class='form-control' id='penilaian' required")?>
							</div>
							<div class="form-group">
							  <label>Ulasan Temuduga </label>
							  <?php echo form_textarea("remarks","","class='form-control' id='remarks'")?>
							</div>							
						</div>
						<div class="box-footer">
							<?php echo form_hidden("userid",base64_encode($user->u_id))?>
							<?php echo form_hidden("useric",$user->u_ic_number)?>
							
							<input type="button" value="Batal" class="btn btn-default" onclick="history.go(-1)">
							<input type="submit" value="Hantar" class="btn btn-primary">
						</div>
					<?php echo form_close() ?>	  
					</div>
					</div>
				</div>
				</div>
				
            </div>
        </div>
		
		
        
		
      </div>
      </div>
    </section>