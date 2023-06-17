<section class="content-header">
      <h1>
        Galeri Video
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Galeri Video</li>
      </ol>
    </section>

<div class="content">
	<div class="row">
		
				<?php
				$videos = $this->blapps_lib->getDataResult("lesson",array(array("Category","video")),"",array("LessonID","ASC"));
				foreach($videos as $vid){
					echo "<div class=\"col-md-6\">
					<div class=\"box\">
					<div class=\"box-header with-border\">
					  <h3 class=\"box-title\">$vid->LessonChapter - $vid->LessonTitle</h3>
					</div>
					<div class=\"box-body\">
						
						<video width=\"100%\"  controls>
							<source src=\"".base_url().$vid->FileLocation."\" type=\"video/mp4\">
							<source src=\"".base_url().$vid->FileLocation."\" type=\"video/ogg\"> 
						</video>
						</div>";
					echo "</div>
					<p>&nbsp;</p>
					</div>";
				}
				?>
       
                
</div>
</div>
