	<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
            <div class="box-body">
			<i align="center"><img src="<?php echo base_url()?>assets/images/Logo-Majlis-Agama-Islam-Adat-Istiadat-Melayu-Kelantan.png" width="60"></i>
				<h3 align="center">LAPORAN SUMBANGAN</h3>
                <table width="100%" border="1" cellpadding="5" cellspacing="0">
				<thead>
					<tr role="row">
					
						<th width="4%" ><b>NO</b></th>
						<th width="10%"><b>DAERAH</b></th>
						<th width="10%"><b>POS</b></th>
						<th width="10%"><b>KAMPUNG</b></th>
						<th width="10%"><b>AGENSI PENYUMBANG</b></th>
						<th width="16%"><b>NAMA PENUH</b></th>
						<th width="11%"><b>NO KAD PENGENALAN</b></th>
						<th width="11%"><b>KEKERAPAN SUMBANGAN</b></th>
						<th width="8%"><b>JUMLAH</b></th>
						<th width="10%"><b>TARIKH</b></th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				if($penduduk){
					$no =  1;
					foreach($penduduk as $row){
						if($row->ps_jenis == 1){
							$jenis =  "Bulanan" ;
							$date = $row->ps_sdate ." sehingga ". $date = $row->ps_edate;;
						}else{
							$jenis =  "Sekali Sahaja" ;
							$date = $row->ps_sdate;
						}
						echo "<tr>";
							echo "<td width=\"4%\" >$no</td>";
							echo "<td width=\"10%\">$row->daerah_name</td>";
							echo "<td width=\"10%\">$row->pos_name</td>";
							echo "<td width=\"10%\">$row->kg_nama</td>";
							echo "<td width=\"10%\">$row->lookup_desc</td>";
							echo "<td width=\"16%\">$row->u_full_name</td>";
							echo "<td width=\"11%\">$row->u_ic_number</td>";
							echo "<td width=\"11%\">$jenis</td>";
							echo "<td width=\"8%\">RM".number_format($row->ps_jumlah,2)."</td>";
							echo "<td width=\"10%\">$date</td>";
						echo "</tr>";
						$no++;
					}
				}else{
					echo "<tr><td colspan='10' align='center'>Tiada Maklumat</td></tr>";
				}
				?>
				
                
				</tbody>
				</table>
				<p>&nbsp;</p>
            </div>
        </div>
                
   </div>
   </div>

