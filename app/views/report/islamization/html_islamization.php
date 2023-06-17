	<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
            <div class="box-body">
				<i align="center"><img src="<?php echo base_url()?>assets/images/Logo-Majlis-Agama-Islam-Adat-Istiadat-Melayu-Kelantan.png" width="60"></i>
				<h3 align="center">LAPORAN PENGISLAMAN</h3>
                <table width="100%" border="1" cellpadding="5" cellspacing="0">
				<thead>
					<tr role="row">
					
						<th width="5%" ><b>NO</b></th>
						<th width="10%"><b>DAERAH</b></th>
						<th width="10%"><b>POS</b></th>
						<th width="10%"><b>KAMPUNG</b></th>
						<th width="25%"><b>NAMA PENUH</b></th>
						<th width="20%"><b>NO KAD PENGENALAN</b></th>
						<th width="20%"><b>TARIKH PENGISLAMAN</b></th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				if($penduduk){
					$no =  1;
					foreach($penduduk as $row){
						
						echo "<tr>";
							echo "<td width=\"5%\" >$no</td>";
							echo "<td width=\"10%\">$row->daerah_name</td>";
							echo "<td width=\"10%\">$row->pos_name</td>";
							echo "<td width=\"10%\">$row->kg_nama</td>";
							echo "<td width=\"25%\">$row->u_full_name</td>";
							echo "<td width=\"20%\">$row->u_ic_number</td>";
							echo "<td width=\"20%\">$row->u_islamdate</td>";
						echo "</tr>";
						$no++;
					}
				}else{
					echo "<tr><td colspan='6' align='center'>Tiada Maklumat</td></tr>";
				}
				?>
				
                
				</tbody>
				</table>
				<p>&nbsp;</p>
            </div>
        </div>
                
   </div>
   </div>

