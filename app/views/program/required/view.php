<section class="content-header">
  <h1>
    <div class="btn btn-sm btn-default" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i></div> Maklumat Program
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Program Agensi</a></li>
    <li class="active">Maklumat Program</li>
  </ol>
</section>
	<section class="content">
	<div class="row">
        <div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Papar Kampung</h3>
			</div>
			<div class="box-body">
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Nama Pos</label>
						<div class="col-md-8"><?php 
						$this->db->join("pro_pos b","b.pos_id = a.kg_pos_id");
						echo $this->blapps_lib->getData("pos_name","pro_kampung a","a.kg_id",$program->program_kg); ?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Nama Kampung</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("kg_nama","pro_kampung","kg_id",$program->program_kg); ?></div>
						</address>
					</div>	
				</div>
				
				
			</div>
		</div>
		</div>
    </div>
	<div class="row">
        <div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Papar Agensi</h3>
			</div>
			<div class="box-body">
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Nama Agensi</label>
						<div class="col-md-8"><?php echo $agensi->agensi_name ?></div>
						</address>
					</div>
					<div class="col-sm-6 invoice-col">
						<address>
						<label class="col-md-4">Kategori Agensi</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("type_desc","pro_agensi_type","type_id",$agensi->agensi_type); ?></div>
						</address>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Alamat</label>
						<div class="col-md-8"><?php echo $agensi->agensi_address ?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">No Telefon</label>
						<div class="col-md-8"><?php echo $agensi->agensi_phone ?></div>
					</div>	
				</div>
				
			</div>
		</div>
		</div>
    </div>
	
	<div class="row">
        <div class="col-md-12">
		
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Papar Program</h3>
			</div>
			<div class="box-body">
				
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Nama Program</label>
						<div class="col-md-8"><?php echo $program->program_title ?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Kategori Program</label>
						<div class="col-md-8"><?php echo $this->blapps_lib->getData("kategori_desc","pro_program_kategori","kategori_id", $program->program_category); ?></div>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
					
						<label class="col-md-4">Tarikh Mula</label>
						<div class="col-md-8"><?php echo $program->program_sdate ?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Tarikh Akhir</label>
						<div class="col-md-8"><?php echo $program->program_edate ?></div>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Kos</label>
						<div class="col-md-8">RM <?php echo number_format($program->program_cost,2) ?></div>
					</div>
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Jumlah Peserta </label>
						<div class="col-md-8"><?php echo $program->program_totalparticipant ?></div>
					</div>	
				</div>
				<div class="row invoice-col">
					<div class="col-sm-6 invoice-col">
						<label class="col-md-4">Pengisian Program</label>
						<div class="col-md-8"><?php echo $program->program_desc ?></div>
					</div>
					
				
				</div>
				
				
			</div>
		</div>
		</div>
	</div>
		
		
	<div class="row">
        <div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Rekod</h3>
			</div>
			<div class="box-body">
			<div class="row invoice-col">
				<div class="col-sm-6 invoice-col">
					<address>
					<label class="col-md-4">Tarikh Cipta</label>
					<div class="col-md-8"><?php echo date("d M Y H:i:sA",strtotime($program->program_created)) ?> oleh <?php echo $this->blapps_lib->getData("u_fullname","ek_admin","u_id",$program->program_createdby)?></div>
					</address>
				</div>
				<div class="col-sm-6 invoice-col">
					<address>
					<label class="col-md-4">Tarikh Kemaskini</label>
					<div class="col-md-8"><?php echo date("d M Y H:i:sA",strtotime($program->program_modified)) ?> oleh <?php echo $this->blapps_lib->getData("u_fullname","ek_admin","u_id",$program->program_modifiedby)?></div>
					</address>
				</div>	
				</div>
			</div>
		</div>
		</div>
    </div>
	 </section>