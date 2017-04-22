<?php
mysql_connect("localhost","kedascom_combo","29121983");
mysql_select_db("kedascom_combo");
$kota = $_GET['kota'];
$kec = mysql_query("SELECT id_kec,nama_kec FROM kec WHERE id_kabkot='$kota' order by nama_kec");
echo "<option>-- Pilih Kecamatan --</option>";
while($k = mysql_fetch_array($kec)){
    echo "<option value=\"".$k['id_kec']."\">".$k['nama_kec']."</option>\n";
}
?>