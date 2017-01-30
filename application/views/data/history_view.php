<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"> 
		
        <?php $this->load->view('common/head'); ?>
        <?php
        $ubah = (isset($ubah)) ? $ubah : '';
        $alert = $this->session->userdata("error");
        $this->session->unset_userdata("error");
        ?>
        <?php $this->load->view('common/menu'); ?>
		
        <script type="text/javascript">
            error = '<?php echo $error; ?>';
                    ubah = '<?php echo $ubah; ?>';
                    _alert = '<?php echo $alert; ?>'; 
                    _insert = '<?php echo $this->session->userdata('akses_insert'); ?>';
                    _edit = '<?php echo $this->session->userdata('akses_edit'); ?>';
                    _delete = '<?php echo $this->session->userdata('akses_delete'); ?>';
                    site_url = '<?php echo site_url(); ?>/data/history/';
                    base_url = '<?php echo base_url(); ?>/';
                    window.onload = function() { 
						if (error != "")
						{
							if (ubah != '')
							{
								$('#button').attr("name", "ubah");
								$('#button').attr("value", "Ubah");
								$('#form_order_pembelian').attr("action", site_url + 'edit');
							}

							show_remodal();
							init_chosen();
						}

						if (_alert != "")
								alertify.success(_alert);
							init_chosen();
					}

            function close_remodal()
            {
                    window.location = site_url;
                    hide_remodal();
            }

            function clear_sorting()
            {
                    location.reload();
            }

            var app = angular.module('main', ['ngTable', 'ngTableExport','picardy.fontawesome']).
                    controller('DemoCtrl', function($scope, $filter, $http, NgTableParams, $sce) {
                    var data = [];
							
                            $('#img_load').show();
                            $http.get('<?php echo site_url('data/history/order_pembelian_show'); ?>')
                            .success(function($order) {
								// alert($order_pembelian);
                            data = $order;
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
                                    data: data,
                                    });
                                    // $('.loading_gear_gif').hide();
                                    $('#img_load').hide();
									$("#bulan_cari").val("<?php echo date('m'); ?>");
									$("#tahun_cari").val("<?php echo date('Y'); ?>");
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
							$scope.custom_filter = function () {
								$('#img_load').show();
								temp=$('#tahun_cari').val()+"-"+$('#bulan_cari').val(); 
								$http.post('<?php echo site_url('data/history/order_pembelian_show'); ?>', {"filter_tanggal":temp})
									.success(function($order) {
										// alert($order_penjualan);
											data = $order;
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
											data: data,
											});
											// $('.loading_gear_gif').hide();
											$('#img_load').hide();
								   });
							}
							
                    });
				
		</script>
    </head>
    <body ng-app="main">
		<div style="margin-top:20px">
		</div>
        <div id="container">
            <div class="container-fluid">
                 
                    <br/>
                    <div ng-controller="DemoCtrl">
                        <div class="row" >
                            <div class="col-md-5">
                                <a type="submit" onclick="loading()" href="<?php echo site_url('data/customer/show')?> "class="btn btn-success"><i class="fa fa-fw fa-backward"></i>&nbsp;Ke Utama</a>
							</div>
							<div class="col-md-3" >
								<div class="row" >
									<div class="col-md-6" >
										<select name="bulan_cari" id="bulan_cari" class="form-control" ng-model="caribulan" ng-change="custom_filter()">
										<?php  
											$bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
											
											echo '<option value="">  All </option>';
											for( $x=1; $x<=12; $x++ ) // value = 1 s.d 12 (tanpa 0)
											{
												$xx = $x;
												if( $x < 10 )
													$xx = '0' . $x;
												$select = '';
												if($x==date("m"))
												$select = 'selected';
												echo '<option value="' . $xx . '" '.$select.'>  '. $bulan[$x] . ' </option>';
											}
										?>
										</select>
									</div>
									<div class="col-md-6" >
										<select name="tahun_cari" id="tahun_cari" class="form-control" ng-model="caritahun" ng-change="custom_filter()">
										<?php  
											for( $x=date('Y'); $x>=2010; $x-- )
											{
												$select = '';
												// if( $x == $tahun_cari )
													// $select = 'selected';
												echo '<option value="' . $x . '" ' . $select . '> ' . $x . ' </option>';
											}
										?>
										</select>
										
									</div>
									
								</div>
							</div>
						
							<div class="col-md-2" >
                                <input class="form-control" type="search" id="filter_search" ng-model="filterings" placeholder="Cari Order..." aria-label="Cari order pembelian" />
                            </div>
                          
                            <div class="col-md-2">
                                <button ng-click="tableParams.sorting({})" onclick="clear_sorting()" class="btn btn-default btn-w100">Clear Sorting</button>
                            </div> 
                        </div>
                        <div class="row " >
                            <div class="col-md-12">
								<a><img id="img_load" src=<?php echo base_url()."include/img/ajax_load.gif" ?> style="display:none;position:fixed;margin-left:50%;margin-top:4%"></img></a>
							
                                <table ng-table="tableParams"  class="table ng-table-responsive latar" export-csv="csv">
                                    <tr ng-repeat="(datamodel, order_pembelian) in $data | filter: filtering| filter: filterings|  filter:order_pembelian.order_pembelian_no as results"  ng-class-odd="'Bg_genap'" ng-class-even="'Bg_ganjil'"  qtip=""  datamodel={{order_pembelian.datamodel}}  ng-class="{ 'emphasis': order_pembelian.order_pembelian_no == '<?php echo $this->session->userdata("order_pembelian_no") ?>'}">
                                        <td align="center" style="width:1%" class=" borderkanan" data-title="'No'">
											<span>{{$index+1}}</span>
										</td> 
										<td class="col-md-1 borderkanan" data-title="'Tgl Order'" sortable="'order_tgl_ymd'">
                                            <span>{{order_pembelian.order_tgl}}</span>
                                        </td> 
										<td class="col-md-1 borderkanan" data-title="'No Order'" sortable="'order_no'">
                                            <span>{{order_pembelian.order_no}}</span>
                                        </td> 
										 <td class="col-md-1 borderkanan" data-title="'Customer'" sortable="'customer_nama'">
                                            <span>{{order_pembelian.customer_nama}}</span>
                                        </td> 
                                           <td align="center" class="col-md-1 borderkanan" data-title="'Kurir'" sortable="'order_kurir'">
                                            <span style="text-transform:uppercase"><b>{{order_pembelian.order_kurir}}</b></span>
                                        </td> 
                                           <td align="right" class="col-md-1 borderkanan" data-title="'Berat'" sortable="'order_berat'">
                                            <span>{{order_pembelian.order_berat}} gram</span>
                                        </td> 
                                           <td align="right" class="col-md-1 borderkanan" data-title="'Ongkir'" sortable="'order_ongkir'">
                                            <span>{{order_pembelian.order_ongkir|currency:"Rp "}}</span>
                                        </td> 
                                           <td align="right" class="col-md-2 borderkanan" data-title="'Harga'" sortable="'order_total'">
                                            <span>{{order_pembelian.order_total|currency:"Rp "}}</span>
                                        </td> 
                                           <td align="right" class="col-md-2 borderkanan" data-title="'Total Harga'" sortable="'total'">
                                            <span><b>{{order_pembelian.total|currency:"Rp "}}</b></span>
                                        </td> 
                                        <td align="center" class="col-md-1 borderkanan" data-title="'Status'" sortable="'order_status'"> 
                                            <span >{{order_pembelian.order_status}}</span>  
                                        </td>
										<td align="center" class="col-md-1 borderkanan" data-title="'Status Bayar'" sortable="'status_bayar'"> 
                                            <span >{{order_pembelian.status_bayar}}</span>  
                                        </td> 
                                    </tr> 
                                    <tr ng-if="results.length == 0">
                                        <td colspan="6" >
                                    <center> <strong>Tidak ada data...</strong></center>
                                    </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row" >
                                <!--<span style="padding-right: 26px;margin-top: 126px;">Jumlah data tampil</span>-->
                        </div>
                    </div>
                </div>
                 
        </div>
        <?php $this->load->view('common/footer'); ?>
		<script src="<?php echo base_url(); ?>include/js/remodal/remodal.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>include/js/bootstrap.min.js"></script>
		
    </body>
</html>