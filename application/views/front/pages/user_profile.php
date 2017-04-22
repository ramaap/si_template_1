<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_home'); ?>
<body class="dashboard" ng-app="main">
<?php $this->load->view('front/slice/menu');

 if ($this->session->userdata('alert') != '')
        echo "<script>alert('" . $this->session->userdata('alert') . "')</script>";

    $this->session->set_userdata('alert', '');
 ?>
<script type="text/javascript">
			window.onload = function() 
			{
				$('#provinsi').val("<?php echo $customer->customer_provinsi_id ?>");
				get_lokasi2("<?php echo $customer->customer_kota_id ?>");
            }
			function get_lokasi()
			{
				$.post("<?php echo site_url('rajaongkir/getCity') ?>/"+$('#provinsi').val(),function(obj){
					$('#kota').html(obj);
				});
			}
			function get_lokasi2(id)
			{
				$.post("<?php echo site_url('rajaongkir/getCity_id') ?>/"+id,function(obj){
					$('#kota').html(obj);
				});
			}
			
			 var app = angular.module('main', ['ngTable', 'ngTableExport', 'picardy.fontawesome']).
                    controller('DemoCtrl', function($scope, $filter, $http, NgTableParams, $sce) {
                    var data = [];
                            $http.get('<?php echo site_url('front/user_profile/history_show'); ?>')
                            .success(function($customer) {
                            data = $customer;
                                    $scope.tableParams = new NgTableParams({
                                    page: 1, // show first page
                                            count: 100, // count per page
                                            filter: {
                                            order_tgl: '', // initial filter
                                            },
                                            sorting: {
                                            order_tgl_ymd: 'desc',    // initial sorting
                                            order_no: 'desc'    // initial sorting
                                            }

                                    }, {
                                    allowUnsort: true,
                                            data: data,
                                    });
                                    $('.loading_gear_gif').hide();
                            });
                            //
                            $scope.show = function (index) { //kalau ada parameter dimasukkan ke dalam function ()
                            $('.action_bar_' + index).toolbar({
                            content: '#toolbar-options-' + index,
                                    position: 'top',
                                    style:'primary',
                                    adjustment: 7
                            });
                            };
                    });
			app.directive('qtip', function ($http) {
						var temp;
						return {
						restrict: 'A',
								link: function (scope, element, attrs) {
								//ajax
								$http.get('<?php echo site_url('front/user_profile/tooltip'); ?>' + '/' + attrs.datamodel)
										.success(function (result) {
										$(element).qtip({
										content: '<div style="font-size:14px;line-height:1.2em">' + result + '</div>',
												position: {
												target: 'mouse', // Track the mouse as the positioning target
														adjust: {x: 5, y: 5}, // Offset it slightly from under the mouse

												},
												style: {
												width: 1000,

												}
										})
										})
								}

						};
					});
 </script>
	<div class="main container">
		<div class="sidemenu">
			<h3>Dashboard</h3>
			<ul>
				<li class="current"><a href="#tab1">Profile</a></li>
				<li ><a href="#tab2">My History Order</a></li>
				<li><a href="#tab3">My Shipping Address</a></li>
				<li><a href="#tab4">Cek Resi Pengiriman</a></li>
			</ul>
		</div>
		<div class="main-content">
			<div class="tab-content profile current" id="tab1">
				<div class="shipping">
					<h2>Data Customer</h2>
					 <?php echo form_open('front/user_profile/edit', 'id="form_edit"'); ?> 
						<ul>
							<li>
								<label>Nama Lengkap</label>
								<input name="nama" id="nama" required placeholder="Nama Lengkap" value="<?php echo $customer->customer_nama; ?>">
							</li>
							<li>
								<label>Email</label>
								<input name="email" id="email" required placeholder="Email" value="<?php echo $customer->customer_email; ?>">
							</li>
							<li>
								<label>No Telp</label>
								<input name="telp" id="telp" required placeholder="No Telpon" value="<?php echo $customer->customer_telp; ?>">
							</li>
							<li>
								<label>Alamat</label>
								<textarea name="alamat" required id="alamat" placeholder="Alamat"><?php echo $customer->customer_alamat; ?></textarea>
							</li>
							<li>
								<label>Provinsi</label>
								<select name="provinsi" required id="provinsi" onchange="get_lokasi()" >
								<option>--Pilih Provinsi--</option>
									<?php $this->load->view('rajaongkir/getProvince'); ?>
								</select>
							</li>
							<li>
								<label>Kota</label>
								<select name="kota" required id="kota">
								<option value="" selected="" disabled="">Pilih Kota</option>
								</select>
							</li>
							<li>
								<label>Kecamatan</label>
								<input name="kecamatan" required id="kecamatan" placeholder="Kecamatan" value="<?php echo $customer->customer_kecamatan; ?>" >
							</li>
							<li>
								<label>Kodepos</label>
								<input name="kode_pos" required id="kode_pos" placeholder="Kode pos" value="<?php echo $customer->customer_kode_pos; ?>" >
							</li>
						</ul>
						<input type="submit" id="button" name="simpan" value="Update Data"  class="btn btn-success" />
					<?php echo form_close(); ?>  
				</div>
			</div>
			<div class="tab-content history" id="tab2">
				<h2>History Order</h2>
			<!--Angular untuk tampil history order-->
			     <div ng-controller="DemoCtrl">
					<div class="row" >
						<div class="col-md-12">
							<table ng-table="tableParams"  class="table ng-table-responsive latar" export-csv="csv">
								<tr datamodel={{customer.datamodel}} qtip="" ng-repeat="(datamodel, customer) in $data | filter:customer.customer_nama as results"  ng-class-odd="'Bg_genap'" ng-class-even="'Bg_ganjil'"   ng-class-odd="'Bg_genap'" ng-class-even="'Bg_ganjil'"  ng-class="{ 'emphasis': customer.customer_nama == '<?php echo $this->session->userdata("customer_nama") ?>'}">
										<td class="col-md-1 " data-title="'Tgl Order'" sortable="'order_tgl_ymd'">
                                            <span>{{customer.order_tgl}}</span>
                                        </td> 
										<td class="col-md-2 " data-title="'No Order'" sortable="'order_no'">
                                            <span>{{customer.order_no}}</span>
                                        </td> 
                                           <td align="center" class="col-md-1 " data-title="'Kurir'" sortable="'order_kurir'">
                                            <span style="text-transform:uppercase"><b>{{customer.order_kurir}}</b></span>
                                        </td> 
                                           <td align="right" class="col-md-1 " data-title="'Berat'" sortable="'order_berat'">
                                            <span>{{customer.order_berat}} gram</span>
                                        </td> 
                                           <td align="right" class="col-md-2 " data-title="'Ongkir'" sortable="'order_ongkir'">
                                            <span>{{customer.order_ongkir|currency:"Rp ":0}}</span>
                                        </td> 
                                           <td align="right" class="col-md-2 " data-title="'Harga'" sortable="'order_total'">
                                            <span>{{customer.order_total|currency:"Rp ":0}}</span>
                                        </td> 
                                           <td align="right" class="col-md-2 " data-title="'Total Harga'" sortable="'total'">
                                            <span><b>{{customer.total|currency:"Rp ":0}}</b></span>
                                        </td> 
                                        <td align="center" class="col-md-2 " data-title="'Status'" sortable="'order_status'"> 
                                            <span >{{customer.order_status}}</span>  
                                        </td>
								<a style="display:none" >
									<span >{{customer.datamodel}}</span>
								</a>
								</tr> 
								<tr ng-if="results.length == 0">
									<td colspan="3" >
								<center> <strong>Tidak ada data...</strong></center>
								</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			
			<!--Angular untuk tampil history order-->
			</div>
			<div class="tab-content shipping-address" id="tab3">
				<h2>Shipping Address</h2>
				<iframe   style="    margin-left: -28px;" frameborder="0" height="470px" width="1300px" src="<?php echo site_url('front/alamat') ?>"></iframe>
			</div>
			<div class="tab-content check-shipping" id="tab4">
				<h2>Check Shipping</h2>
				<p>Masukkan No Resi Pengiriman</p>
				<br />
				<form method="get" action="http://www.cekresi.com" target="_BLANK">
				<input type="text" placeholder="Masukkan no Resi..." name="noresi" />
				<input type="submit" value="cek resi" id="button"/>
				<br />
				</form>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
			    $(".sidemenu a").click(function(event) {
			        event.preventDefault();
			        $(this).parent().addClass("current");
			        $(this).parent().siblings().removeClass("current");
			        var tab = $(this).attr("href");
			        $(".tab-content").not(tab).css("display", "none");
			        $(tab).fadeIn();
			    });
			});
		</script>
	</div>


        <?php $this->load->view('front/slice/footer'); ?>
</body>
</html>