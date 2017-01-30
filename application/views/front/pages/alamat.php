<!DOCTYPE html>
<html>
<?php $this->load->view('front/slice/head_home'); ?>
<body class="dashboard" ng-app="main">
<?php 

 if ($this->session->userdata('alert') != '')
        echo "<script>alert('" . $this->session->userdata('alert') . "')</script>";

    $this->session->set_userdata('alert', '');
 ?>
<script type="text/javascript">
			 var app = angular.module('main', ['ngTable', 'ngTableExport', 'picardy.fontawesome']).
                    controller('DemoCtrl', function($scope, $filter, $http, NgTableParams, $sce) {
                    var data = [];
                            $http.get('<?php echo site_url('front/alamat/alamat_show'); ?>')
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
				function deleted(index)
				{
					var x;
					if (confirm("Menghapus data alamat ini?") == true) {
						 $.ajax({
						type: "POST",
								url: "<?php echo site_url('front/alamat/delete_permanent') ?>",
								timeout: 20000,
								data:
								'datamodel=' + $(index).attr("datamodel")

								, success: function(result) {
										window.location.replace("<?php echo site_url('front/user_profile/'); ?>");
								},
								error: function(html) {
									alert("Kode Eror [" + html.status + "]<br/><br/>Status:" + html.statusText);
								}

						});
					} else {
						alert("Batal Menghapus data");
					}
				}
 </script>
	<div class="main container">
			<!--Angular untuk tampil history order-->
			     <div ng-controller="DemoCtrl">
					<div class="row" >
						<div class="col-md-9">
							<table ng-table="tableParams"  class="table ng-table-responsive latar" export-csv="csv">
								<tr ng-repeat="(datamodel, customer) in $data | filter:customer.customer_nama as results"  ng-class-odd="'Bg_genap'" ng-class-even="'Bg_ganjil'"   ng-class-odd="'Bg_genap'" ng-class-even="'Bg_ganjil'"  ng-class="{ 'emphasis': customer.customer_nama == '<?php echo $this->session->userdata("customer_nama") ?>'}">
										<td class="col-md-8" data-title="'Data Alamat'" sortable="'customer_alamat'">
                                            <span><b>{{customer.customer_nama}} [{{customer.customer_telp}}]</b><br/>{{customer.customer_alamat}}, {{customer.customer_kecamatan}}, {{customer.kota}}, {{customer.nama_prov}}, {{customer.customer_kode_pos}}</span>
                                        </td> 
                                        <td class="col-md-1"> 
											<a title="Hapus Data" href="" datamodel={{customer.datamodel}} onclick="deleted(this)">
											Hapus</a>
                                        </td> 
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
</body>
</html>