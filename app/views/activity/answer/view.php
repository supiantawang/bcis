<section class="content-header">
  <h1>
    Papar
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
    <li><a href="#">Pelajaran</a></li>
    <li class="active">Papar</li>
  </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Papar Pelajaran</h3>
            </div>
              <div class="box-body">
                <?php
				if($lesson->Category == "video"){
					echo "<p>
					<label>Bab : </label> $lesson->LessonChapter<br>
					<label>Tajuk : </label> $lesson->LessonTitle<br>
					</p>";
					echo "<video width=\"60%\"  controls>
							<source src=\"".base_url().$lesson->FileLocation."\" type=\"video/mp4\">
							<source src=\"".base_url().$lesson->FileLocation."\" type=\"video/ogg\"> 
						</video>";
					
				}
				if($lesson->Category == "dokumen"){
					echo "<p>
					<label>Bab : </label> $lesson->LessonChapter<br>
					<label>Tajuk : </label> $lesson->LessonTitle<br>
					</p>";
					echo "<iframe src=\"".base_url().$lesson->FileLocation."\" type=\"application/pdf\" width=\"100%\" height=\"600px\" /></iframe>";
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