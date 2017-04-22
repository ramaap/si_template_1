<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_checkout'); ?>
<body class="checkout-1">
<?php $this->load->view('front/slice/menu'); ?>

    <script type="text/javascript">
	
	function str_replace(str,replace,join)	//daftar lib
		{
			replace = typeof replace !== 'undefined' ? replace : "";
			join = typeof join !== 'undefined' ? join : "";
			return str.split(replace).join(join).trim(" ");
		}
	function currency_format(jumlah)
	{
		var x = +jumlah + +0;
		 n = x.toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
		 n=str_replace(n,".","~");
		 n=str_replace(n,",",".");
		 n=str_replace(n,"~",",");
		 return n;
	}
	function cek_laminasi(){
		jenis_kertas = $("#jenis_kertas").val();
		if(jenis_kertas == 7 || jenis_kertas == 8)
		{
			$('#laminasi').val("Tidak");
			document.getElementById("laminasi").disabled=true;
		}
		else
			document.getElementById("laminasi").disabled=false;
	}
	
	function cek_dl()//harga kertas tipe DL
	{
			if(jenis_kertas == 7) // art paper
			{
				if(jumlah == '100 pcs')
				{
					if(sisi_cetak == 1)
						harga = 59000;
					else
						harga = 118000;
				}
				else if(jumlah == '250 pcs')
				{
					if(sisi_cetak == 1)
						harga = 115000;
					else
						harga = 225000;
				}
				else if(jumlah == '500 pcs')
				{
					if(sisi_cetak == 1)
						harga = 222500;
					else
						harga = 435000;
				}
				else if(jumlah == '1000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 384600;
					else
						harga = 754000;
				}
				else if(jumlah == '2000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 539000;
					else
						harga = 958000;
				}
				else if(jumlah == '3000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 720000;
					else
						harga = 1270000;
				}
				else if(jumlah == '5000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 1026000;
					else
						harga = 1776000;
				}
			}
			else if(jenis_kertas == 8) // matte paper
			{
				if(jumlah == '100 pcs')
				{
					if(sisi_cetak == 1)
						harga = 59000;
					else
						harga = 118000;
				}
				else if(jumlah == '250 pcs')
				{
					if(sisi_cetak == 1)
						harga = 115000;
					else
						harga = 225000;
				}
				else if(jumlah == '500 pcs')
				{
					if(sisi_cetak == 1)
						harga = 222500;
					else
						harga = 435000;
				}
				else if(jumlah == '1000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 384600;
					else
						harga = 754000;
				}
				else if(jumlah == '2000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 539000;
					else
						harga = 958000;
				}
				else if(jumlah == '3000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 720000;
					else
						harga = 1270000;
				}
				else if(jumlah == '5000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 1026000;
					else
						harga = 1776000;
				}
			}
			else if(jenis_kertas == 9) // art cartoon 20gr
			{
				if(jumlah == '100 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 68000;
						else
							harga = 122000;
					}
					else
						{
							if(laminasi == "Tidak")
								harga = 131000;
							else
								harga = 239000;
						}
				}
				else if(jumlah == '250 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 137000;
						else
							harga = 266000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 266000;
						else
							harga = 524000;
					}
				}
				else if(jumlah == '500 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 243750;
						else
							harga = 413750;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 477500;
						else
							harga = 817500;
					}
				}
				else if(jumlah == '1000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 451800;
						else
							harga = 787800;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 888600;
						else
							harga = 1560600;
					}
				}
				else if(jumlah == '2000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 554500;
						else
							harga = 1055500;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 888500;
						else
							harga = 1890500;
					}
				}
				else if(jumlah == '3000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 770000;
						else
							harga = 1520000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 1220000;
						else
							harga = 2720000;
					}
				}
				else if(jumlah == '5000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 1109000;
						else
							harga = 2360000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 1693000;
						else
							harga = 4195000;
					}
				}
			}
			
			else if(jenis_kertas == 11) // art cartoon 260gr
			{
				if(jumlah == '100 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 71600;
						else
							harga = 125600;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 138600;
						else
							harga = 246500;
					}
				}
				else if(jumlah == '250 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 145600;
						else
							harga = 274600;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 283500;
						else
							harga = 541500;
					}
				}
				else if(jumlah == '500 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 252250;
						else
							harga = 422250;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 494500;
						else
							harga = 843500;
					}
				}
				else if(jumlah == '1000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 468600;
						else
							harga = 804600;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 922500;
						else
							harga = 1594500;
					}
				}
				else if(jumlah == '2000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 688000;
						else
							harga = 1189000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 1122500;
						else
							harga = 2124500;
					}
				}
				else if(jumlah == '3000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 945000;
						else
							harga = 1695000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 1520000;
						else
							harga = 3020000;
					}
				}
				else if(jumlah == '5000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 1401000;
						else
							harga = 2652000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 2193000;
						else
							harga = 4695000;
					}
				}
			}
			
	}
	
	function cek_a5()//harga kertas tipe A5
	{
			if(jenis_kertas == 7) // art paper
			{
				if(jumlah == '100 pcs')
				{
					if(sisi_cetak == 1)
						harga = 83000;
					else
						harga = 158000;
				}
				else if(jumlah == '250 pcs')
				{
					if(sisi_cetak == 1)
						harga = 167500;
					else
						harga = 325000;
				}
				else if(jumlah == '500 pcs')
				{
					if(sisi_cetak == 1)
						harga = 290000;
					else
						harga = 565000;
				}
				else if(jumlah == '1000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 445000;
					else
						harga = 795000;
				}
				else if(jumlah == '2000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 720000;
					else
						harga = 1270000;
				}
				else if(jumlah == '3000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 925000;
					else
						harga = 1600000;
				}
				else if(jumlah == '5000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 1425000;
					else
						harga = 2425000;
				}
			}
			else if(jenis_kertas == 8) // matte paper
			{
				if(jumlah == '100 pcs')
				{
					if(sisi_cetak == 1)
						harga = 83000;
					else
						harga = 158000;
				}
				else if(jumlah == '250 pcs')
				{
					if(sisi_cetak == 1)
						harga = 167500;
					else
						harga = 325000;
				}
				else if(jumlah == '500 pcs')
				{
					if(sisi_cetak == 1)
						harga = 290000;
					else
						harga = 565000;
				}
				else if(jumlah == '1000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 445000;
					else
						harga = 795000;
				}
				else if(jumlah == '2000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 720000;
					else
						harga = 1270000;
				}
				else if(jumlah == '3000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 925000;
					else
						harga = 1600000;
				}
				else if(jumlah == '5000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 1425000;
					else
						harga = 2425000;
				}
			}
			else if(jenis_kertas == 9) // art cartoon 20gr
			{
				if(jumlah == '100 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 95500;
						else
							harga = 170500;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 183000;
						else
							harga = 333000;
					}
				}
				else if(jumlah == '250 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 183250;
						else
							harga = 309250;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 356500;
						else
							harga = 608500;
					}
				}
				else if(jumlah == '500 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 340000;
						else
							harga = 590000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 665000;
						else
							harga = 1165000;
					}
				}
				else if(jumlah == '1000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 470000;
						else
							harga = 845000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 770000;
						else
							harga = 1520000;
					}
				}
				else if(jumlah == '2000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 770000;
						else
							harga = 1520000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 1220000;
						else
							harga = 2720000;
					}
				}
				else if(jumlah == '3000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 1000000;
						else
							harga = 2125000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 1525000;
						else
							harga = 3775000;
					}
				}
				else if(jumlah == '5000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 1425000;
						else
							harga = 3300000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 2050000;
						else
							harga = 5800000;
					}
				}
			}
			
			else if(jenis_kertas == 11) // art cartoon 260gr
			{
				if(jumlah == '100 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 100500;
						else
							harga = 175500;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 193000;
						else
							harga = 343000;
					}
				}
				else if(jumlah == '250 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 189550;
						else
							harga = 315550;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 369100;
						else
							harga = 621100;
					}
				}
				else if(jumlah == '500 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 352500;
						else
							harga = 602500;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 690000;
						else
							harga = 1190000;
					}
				}
				else if(jumlah == '1000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 570000;
						else
							harga = 945000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 945000;
						else
							harga = 1695000;
					}
				}
				else if(jumlah == '2000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 945000;
						else
							harga = 1695000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 1520000;
						else
							harga = 3020000;
					}
				}
				else if(jumlah == '3000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 1262500;
						else
							harga = 2387500;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 1975000;
						else
							harga = 4225000;
					}
				}
				else if(jumlah == '5000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 1987500;
						else
							harga = 3862500;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 3050000;
						else
							harga = 6800000;
					}
				}
			}
			
	}
	
	function cek_a4()//harga kertas tipe A4
	{
			if(jenis_kertas == 7) // art paper
			{
				if(jumlah == '100 pcs')
				{
					if(sisi_cetak == 1)
						harga = 133000;
					else
						harga = 258000;
				}
				else if(jumlah == '250 pcs')
				{
					if(sisi_cetak == 1)
						harga = 285000;
					else
						harga = 560000;
				}
				else if(jumlah == '500 pcs')
				{
					if(sisi_cetak == 1)
						harga = 445000;
					else
						harga = 795000;
				}
				else if(jumlah == '1000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 720000;
					else
						harga = 1270000;
				}
				else if(jumlah == '2000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 1225000;
					else
						harga = 2125000;
				}
				else if(jumlah == '3000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 1700000;
					else
						harga = 2900000;
				}
				else if(jumlah == '5000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 2800000;
					else
						harga = 4800000;
				}
			}
			else if(jenis_kertas == 8) // matte paper
			{
				if(jumlah == '100 pcs')
				{
					if(sisi_cetak == 1)
						harga = 133000;
					else
						harga = 258000;
				}
				else if(jumlah == '250 pcs')
				{
					if(sisi_cetak == 1)
						harga = 285000;
					else
						harga = 560000;
				}
				else if(jumlah == '500 pcs')
				{
					if(sisi_cetak == 1)
						harga = 445000;
					else
						harga = 795000;
				}
				else if(jumlah == '1000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 720000;
					else
						harga = 1270000;
				}
				else if(jumlah == '2000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 1225000;
					else
						harga = 2125000;
				}
				else if(jumlah == '3000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 1700000;
					else
						harga = 2900000;
				}
				else if(jumlah == '5000 pcs')
				{
					if(sisi_cetak == 1)
						harga = 2800000;
					else
						harga = 4800000;
				}
			}
			else if(jenis_kertas == 9) // art cartoon 20gr
			{
				if(jumlah == '100 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 158000;
						else
							harga = 308000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 308000;
						else
							harga = 608000;
					}
				}
				else if(jumlah == '250 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 340000;
						else
							harga = 590000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 665000;
						else
							harga = 1165000;
					}
				}
				else if(jumlah == '500 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 470000;
						else
							harga = 845000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 770000;
						else
							harga = 1520000;
					}
				}
				else if(jumlah == '1000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 770000;
						else
							harga = 1520000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 1220000;
						else
							harga = 2720000;
					}
				}
				else if(jumlah == '2000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 1325000;
						else
							harga = 2825000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 2025000;
						else
							harga = 5025000;
					}
				}
				else if(jumlah == '3000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 1700000;
						else
							harga = 3950000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 2450000;
						else
							harga = 6950000;
					}
				}
				else if(jumlah == '5000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 2800000;
						else
							harga = 6550000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 4050000;
						else
							harga = 11550000;
					}
				}
			}
			
			else if(jenis_kertas == 11) // art cartoon 260gr
			{
				if(jumlah == '100 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 168000;
						else
							harga = 318000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 328000;
						else
							harga = 628000;
					}
				}
				else if(jumlah == '250 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 352500;
						else
							harga = 602500;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 690000;
						else
							harga = 1190000;
					}
				}
				else if(jumlah == '500 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 570000;
						else
							harga = 945000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 945000;
						else
							harga = 1695000;
					}
				}
				else if(jumlah == '1000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 945000;
						else
							harga = 1695000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 1520000;
						else
							harga = 3020000;
					}
				}
				else if(jumlah == '2000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 1675000;
						else
							harga = 3175000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 2625000;
						else
							harga = 5625000;
					}
				}
				else if(jumlah == '3000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 2375000;
						else
							harga = 4625000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 3650000;
						else
							harga = 8150000;
					}
				}
				else if(jumlah == '5000 pcs')
				{
					if(sisi_cetak == 1)
					{
						if(laminasi == "Tidak")
							harga = 3925000;
						else
							harga = 7675000;
					}
					else
					{
						if(laminasi == "Tidak")
							harga = 6050000;
						else
							harga = 13550000;
					}
				}
			}
			
	}
	
	function cek_harga()
	{
		cek_laminasi();
		ukuran = $("#ukuran").val();
		laminasi = $("#laminasi").val();
		jenis_kertas = $("#jenis_kertas").val();
		sisi_cetak = $("#sisi_cetak").val();
		tambahan_ket = $("#tambahan_ket").val();
		jumlah = $("#jumlah").val();
		harga = 0;
		tambahan = 0;
		if(ukuran = "DL 100x210mm")
		{
			cek_dl();
		}
		else if(ukuran = "A5 148x210mm")
		{
			cek_a5();
		}
		else if(ukuran = "A4 210x297mm")
		{
			cek_a4();
		}
		
		harga_satuan = harga;
		
		$('#total').html(currency_format(harga));
		$('#harga').val(harga_satuan);
		$('#total_db').val(harga);
	}
	
	</script>


	<div class="main container">
		<div class="stages">
			<div class="stage one">
				<div class="round-container">
					<a href="#">
						<span class="round">1</span>
					</a>
				</div>
				<span>Pilih Produk</span>
			</div>
			<div class="stage two">
				<div class="round-container">
					<a href="#">
						<span class="round">2</span>
					</a>
				</div>
				<span>Pembayaran</span>
			</div>
			<div class="stage three">
				<div class="round-container">
					<a href="#">
						<span class="round">3</span>
					</a>
				</div>
				<span>Konfirmasi Pembayaran</span>
			</div>
			<div class="stage four">
				<div class="round-container">
					<a href="#">
						<span class="round">4</span>
					</a>
				</div>
				<span>Selesai!</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="detail-product">
			<div class="image">
				<img src="<?php echo base_url(); ?>include/front/images/product/flyer/flyer-checkout.png">
			</div>
			<div class="detail">
			<?php echo form_open('front/checkout/checkout_flyer/add', 'id="form_checkout"'); ?>	
				<h3>Original Flyer</h3>
				<p>Sebarkan kepada setiap orang informasi bisnis yang anda miliki. Murah, praktis, sangat ideal untuk dibagikan kepada semua orang.</p>
				<div class="selects">
					<div class="items">
						<label>Ukuran</label>
						<select name="ukuran" onchange="cek_harga(this)" id="ukuran">
							<option <?php echo set_select('ukuran', 'DL 100x210mm'); ?> value="DL 100x210mm">DL 100x210mm</option> 
							<option <?php echo set_select('ukuran', 'A5 148x210mm'); ?> value="A5 148x210mm">A5 148x210mm</option> 
							<option <?php echo set_select('ukuran', 'A4 210x297mm'); ?> value="A4 210x297mm">A4 210x297mm</option> 
						</select> 
						<span class="warning"><?php echo form_error('ukuran'); ?> </span>
					</div>
					<div class="items">
						<label>Jenis Kertas</label>
							<?php
							$query = "SELECT * FROM jenis_kertas where tipe=2 and is_delete=0 ORDER BY id_kertas asc ";
							$result = mysql_query($query);
							?>
							<select id="jenis_kertas" onchange="cek_harga(this)" name="jenis_kertas"> 
								<?php
								echo "<option value='0'>Silahkan Pilih</option>";
								while ($row = mysql_fetch_array($result)) {
									echo "<option value=" . $row['id_kertas'] . " ".set_select('id_kertas',  $row['id_kertas']).">" . $row['kertas_nama'] . "</option>";
								}
								?>        
							</select>
							<span class="warning"><?php echo form_error('jenis_kertas'); ?> </span>
					</div>
					<div class="items">
						<label>Laminasi</label>
						<select name="laminasi" onchange="cek_harga(this)" id="laminasi">
							<option <?php echo set_select('laminasi', 'Ya'); ?> value="Ya">Ya</option>  
							<option <?php echo set_select('laminasi', 'Tidak'); ?> value="Tidak">Tidak</option>  
						</select> 
						<span class="warning"><?php echo form_error('jumlah'); ?> </span>
					</div>
					<div class="items">
						<label>Sisi Cetak</label>
						<select name="sisi_cetak" onchange="cek_harga(this)" id="sisi_cetak">
							<option <?php echo set_select('sisi_cetak', '1'); ?> value="1">1 Muka</option> 
							<option <?php echo set_select('sisi_cetak', '2'); ?> value="2">2 Muka</option> 
						</select> 
						<span class="warning"><?php echo form_error('sisi_cetak'); ?> </span>
					</div>
					<div class="items">
						<label>Jumlah</label>
						<select name="jumlah" onchange="cek_harga(this)" id="jumlah">
							<option <?php echo set_select('jumlah', '100 pcs'); ?> value="100 pcs">100 pcs</option>   
							<option <?php echo set_select('jumlah', '250 pcs'); ?> value="250 pcs">250 pcs</option>   
							<option <?php echo set_select('jumlah', '500 pcs'); ?> value="500 pcs">500 pcs</option>   
							<option <?php echo set_select('jumlah', '1000 pcs'); ?> value="1000 pcs">1000 pcs</option>   
							<option <?php echo set_select('jumlah', '2000 pcs'); ?> value="2000 pcs">2000 pcs</option>   
							<option <?php echo set_select('jumlah', '3000 pcs'); ?> value="3000 pcs">3000 pcs</option>   
							<option <?php echo set_select('jumlah', '5000 pcs'); ?> value="5000 pcs">5000 pcs</option>   
						</select> 
						<span class="warning"><?php echo form_error('jumlah'); ?> </span>
					</div>
					<div class="items">
						<label>Harga</label>
						<strong>IDR <b id="total" >0</b></strong>
						<input hidden readonly id="harga" name="harga" type="number" />                     
						<input hidden readonly id="total_db" name="total_db" type="number" />           
					</div>
				</div>
				<div class="button">
					<button type="submit" id="button" name="simpan" value="Simpan">
						<span>
							<span>
								Lanjutkan >
							</span>
						</span>
					</button>
				</div>
			 <?php echo form_close(); ?>  
			</div>
			<div class="clear"></div>
		</div>
	</div>

        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>