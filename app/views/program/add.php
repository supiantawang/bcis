<section class="content-header">
  <h1>
    Tambah Baru
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Program Agensi</a></li>
    <li class="active">Tambah Baru</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Maklumat Program Anjuran Agensi</h3>
            </div>
            <?php echo form_open_multipart("community/create/kir"); ?>
              <div class="box-body">
                
               
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Pos <font color="red">*</font></label>
						  <?php echo form_dropdown("pos",$pos,"","class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						  <label for="inputKategori">Kampung <font color="red">*</font></label>
						  <?php echo form_dropdown("kampung",$kampung,"","class='form-control' required")?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
						  <label for="inputKategori">Nama <font color="red">*</font></label>
						  <?php echo form_input("nama","","class='form-control' style='text-transform: uppercase' required")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">No Kad Pengenalan <small>(massukkan nombor tanpa "-")</small></label>
						  <?php echo form_input("noic","","class='form-control' maxlength='12'")?>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Jantina <font color="red">*</font></label>
						  <?php echo form_dropdown("jantina",array('M'=>'LELAKI','F'=>'PEREMPUAN'),"","class='form-control' required")?>
						</div>
					</div>
				
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Agama <font color="red">*</font></label>
							<?php echo form_dropdown("agama",$agama,"","class='form-control' required")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Suku Kaum <font color="red">*</font></label>
							<?php echo form_dropdown("sukukaum",$sukukaum,"","class='form-control' required")?>
						</div>
					</div>
					
				</div>				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label for="inputKategori">Sumber Pendapatan </label>
						  <?php echo form_dropdown("sumberpendapatan",$income,"","class='form-control'")?>
						</div>
					</div>
				
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputFile">Anggaran Pendapatan (RM)</label>
							<?php echo form_input("pendapatan","","class='form-control' placeholder='0.00'")?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Penghulu</label>
							  <div class="radio">
								<label> <input type="radio" name="penghulu" id="penghulu1" value="1"> Ya </label>
							  </div>
							  <div class="radio">
								<label> <input type="radio" name="penghulu" id="penghulu2" value="0" checked> Tidak </label>
							  </div>
							  
						</div>
					</div>
					
				</div>				
							
				
              </div>

              <div class="box-footer">
                <button type="button" class="btn btn-default" onclick="history.go(-1)">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            <?php echo form_close() ?>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>