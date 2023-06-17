<section class="content-header">
  <h1>
    Papar
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Bahan Pengajaran</a></li>
    <li class="active">Papar</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Papar Bahan Pengajaran</h3>
            </div>
              <div class="box-body">
                <?php
				if($lesson->tea_type == "1"){
					echo "<p>
					<label>Topik : </label> $lesson->tea_name<br>
					<label>Nama Bahan Pengajaran : </label> $lesson->tea_name<br>
					</p>";
					echo "<iframe src=\"".base_url().$lesson->tea_link."\" type=\"application/pdf\" width=\"100%\" height=\"600px\" /></iframe>";
				}
				if($lesson->tea_type == "2"){
					echo "<p>
					<label>Topik : </label> $lesson->tea_name<br>
					<label>Nama Bahan Pengajaran : </label> $lesson->tea_name<br>
					</p>";
					if (strpos($lesson->tea_link, 'assets/files') !== false) {
						echo "<video width=\"60%\"  controls>
							<source src=\"".base_url().$lesson->tea_link."\" type=\"video/mp4\">
							<source src=\"".base_url().$lesson->tea_link."\" type=\"video/ogg\"> 
						</video>";
					}else{
						echo "<div class='row'><div class='col-md-6'>
						<iframe width=\"100%\" height=\"315\" src=\"".$lesson->tea_link."\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen=\"\"></iframe>
						
						</div></div>";
					}
					
					
				}
				
				?>
                
              </div>

              <div class="box-footer">
                <button type="button" class="btn btn-default" onclick="history.go(-1)">Kembali</button>
              </div>
          </div>
          
        </div>
      </div>
      <!-- /.row -->
    </section>