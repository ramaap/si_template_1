<?php  
$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$berat&courier=$courier",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: e8460fe8a13bc70a2dfdb4dd2ee6c3bc"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $data = json_decode($response, true);
}
//cobaaaaaaa
for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
	for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
		// echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];
		// echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];
		// echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];
		// echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);
		
		echo "<option value='".$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']."'> [".
		$data['rajaongkir']['results'][$k]['costs'][$l]['service']." ~ ".$data['rajaongkir']['results'][$k]['costs'][$l]['description']."] ".
		$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd']." Hari ~  Rp ".
		$data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']."</option>";
	}
}
//cobaaaaaaa
?>
