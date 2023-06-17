	
	<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
            <div class="box-body">
				<i align="center"><img src="<?php echo base_url()?>assets/images/Logo-Majlis-Agama-Islam-Adat-Istiadat-Melayu-Kelantan.png" width="60"></i>
				<h3 align="center">LAPORAN PROFIL ORANG ASLI</h3>
                <table width="100%" border="1" cellpadding="5" cellspacing="0">
				<thead>
					<tr role="row">
						<th width="5%" ><b>NO</b></th>
						<th width="10%"><b>POS</b></th>
						<th width="10%"><b>KAMPUNG</b></th>
						<th width="15%"><b>SUKU KAUM</b></th>
						<th width="20%"><b>KETUA ISI RUMAH (KIR)</b></th>
						<th width="20%"><b>AHLI ISI RUMAH (AIR)</b></th>
						<th width="20%"><b>AGAMA</b></th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				if($penduduk){
					$no =  1;
					foreach($penduduk as $row){
						$child = $this->blapps_lib->getDataResult("pro_penduduk",array(array("u_parent",$row->u_id)),"",array("u_full_name","ASC"));
						$childlist = "";
						if($child){
							foreach($child as $cld){
								$childlist .= "- ".$cld->u_full_name." <br>($row->u_ic_number)<br>";
							}
						}
						echo "<tr>";
							echo "<td width=\"5%\" >$no</td>";
							echo "<td width=\"10%\">$row->pos_name</td>";
							echo "<td width=\"10%\">$row->kg_nama</td>";
							echo "<td width=\"15%\">$row->sukukaum_name ($row->sukukaum_etnik)</td>";
							echo "<td width=\"20%\">$row->u_full_name <br>($row->u_ic_number)</td>";
							echo "<td width=\"20%\">$childlist</td>";
							echo "<td width=\"20%\">$row->agama_desc</td>";
						echo "</tr>";
						$no++;
					}
				}else{
					echo "<tr><td width=\"100%\" colspan='7' align='center'>Tiada Maklumat</td></tr>";
				}
				?>
				
                
				</tbody>
				</table>
				<p>&nbsp;</p>
            </div>
        </div>
                
   </div>
   </div>

