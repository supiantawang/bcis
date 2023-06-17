<?php
if($this->uri->segment(4)){
	$title 		= "Kemaskini";
	$action 	= "program/update/required/".$this->uri->segment(4);
	$vvillage	= $program->program_kg;
	$vtitle		= $program->program_title;
	$vjenis		= $program->program_type;
	$vcategory	= $program->program_category;
	$vagency 	= $program->program_agency;
	$vsdate 	= $program->program_sdate;
	$vedate 	= $program->program_edate;
	$vcost		= $program->program_cost;
	$vtotal		= $program->program_totalparticipant;
	$description= $program->program_desc;
	$vachievement=$program->program_achievement;
	$vstatus 	= $program->program_status;

	$alert		= "";
	$disabled	= "";
	if(get_cookie("_urole") != 1 && get_cookie("_userID") != $program->program_createdby){
		$alert		= "<small class=\"text-red\"><b>Data boleh dikemaskini oleh pengguna yang mencipta data ini sahaja.</b></small>";
		$disabled	= "disabled";
	}
}else{
	$title 		= "Tambah Baru";
	$action 	= "program/create/required";
	$vvillage	= "";
	$vtitle		= "";
	$vjenis	= "";
	$vcategory	= "";
	$vagency 	= "";
	$vsdate 	= "";
	$vedate 	= "";
	$vcost		= "";
	$vtotal		= "";
	$description= "";
	$vachievement= "";
	$vstatus 	= "";

	$alert		= "";
	$disabled	= "";
	
}

?>
<section class="content-header">
  <h1>
    <div class="btn btn-sm btn-default" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i></div> <?php echo $title ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Program Agensi</a></li>
    <li class="active"><?php echo $title ?></li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Program Diperlukan</h3>
            </div>
            <?php echo form_open_multipart($action); ?>
              <div class="box-body">
				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Kampung <font color="red">*</font></label>
						  <?php echo form_dropdown("village",$village,$vvillage,"class='form-control' required")?>
						</div>
					</div>
					
				</div>
				<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Nama Program Diperlukan<font color="red">*</font></label>
						  <?php echo form_input("title",$vtitle,"class='form-control' style='text-transform: uppercase' required")?>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
						  <label for="inputKategori">Jenis Program Diperlukan<font color="red">*</font></label>
						  <?php echo form_dropdown("jenis",$jenis,$vjenis,"class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Kategori Program Diperlukan</label>
						  <?php echo form_dropdown("category",$categoryprogram,$vcategory,"class='form-control'")?>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Agensi (Penganjur) <font color="red">*</font></label>
						  <?php echo form_dropdown("agency",$agency,$vagency,"class='form-control' required")?>
						</div>
					</div>
				
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Tarikh Mula</label>
							<div class="input-group date">
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
								<?php echo form_input("sdate",$vsdate,"class='form-control pull-right datepicker' autocomplete='off' ")?>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Tarikh Akhir </label>
							<div class="input-group date">
								<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
								<?php echo form_input("edate",$vedate,"class='form-control pull-right datepicker' autocomplete='off' ")?>
							</div>
						</div>
					</div>
					
				</div>				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Kos (RM) </label>
						  <?php echo form_input("cost",$vcost,"class='form-control'")?>
						</div>
					</div>
				
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Jumlah Peserta</label>
							<?php echo form_input("total",$vtotal,"class='form-control'")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Status</label>
							  <div class="radio">
								<label> <input type="radio" name="status" id="penghulu1" value="1" <?php echo  ($vstatus == 1) ? "checked" : ""; ?>> Aktif </label>
							  </div>
							  <div class="radio">
								<label> <input type="radio" name="status" id="penghulu2" value="0" <?php echo  ($vstatus == 0) ? "checked" : ""; ?>> Tidak Aktif</label>
							  </div>
							  
						</div>
					</div>
					
				</div>				
				<div class="row">
					
					<div class="col-md-8">
						<div class="form-group">
							<label>Pengisian Program</label>
							  <?php echo form_textarea("description",$description,"class='form-control'")?>
							  
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Pencapaian Program </label>
						  <?php echo form_dropdown("achievement",$jenis,$vachievement,"class='form-control'")?>
						</div>
					</div>
				</div>				
							
				
              </div>

              <div class="box-footer">
                <div class="col-sm-2 col-md-offset-8">
					<button type="button" class="btn btn-block btn-default" onclick="history.go(-1)">Batal</button>
				</div>
				<div class="col-md-2">
					<button type="submit" class="btn btn-block btn-primary" <?php echo $disabled?>>Simpan</button>
					<?php echo $alert?>
				</div>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>