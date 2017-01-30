<?php
mysql_connect("localhost","kedascom_combo","29121983");
mysql_select_db("kedascom_combo");
$propinsi = $_GET['propinsi'];
$kota = mysql_query("SELECT id_kabkot,nama_kabkot FROM kabkot WHERE id_prov='$propinsi' order by nama_kabkot");
echo "<option>-- Pilih Kabupaten/Kota --</option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['id_kabkot']."\">".$k['nama_kabkot']."</option>\n";
}
?>
