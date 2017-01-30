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
                    site_url = '<?php echo site_url(); ?>/data/custom_order_admin/';
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
                            $http.get('<?php echo site_url('data/custom_order_admin/order_pembelian_show'); ?>')
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
								$http.post('<?php echo site_url('data/custom_order_admin/order_pembelian_show'); ?>', {"filter_tanggal":temp})
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
					
			function update_status(index)
            {
                    $.ajax({
                    type: "POST",
                            url: "<?php echo site_url('data/custom_order_admin/order_pembelian_show_by_id') ?>",
                            timeout: 20000,
                            data:
                            'datamodel=' + $(index).attr("datamodel")

                            , success: function(result) {
                            // alert(result);
                            if (result != "[]")
                            {
                            var arr = JSON.parse(result);
                                    $('#custom_status').val(arr[0].custom_status);
                                    $('#datamodel').val(arr[0].datamodel);
                                    show_remodal();
                            }
                            else
                                    alertify.error("Kode Eror [100] : Terjadi kesalahan saat eksekusi permintaan<br/><br/>Status: gagal menerima data dari server");
                                
                            }

                    });
            }
			function deleted(index)
            {
            confirm("Apakah anda yakin akan menghapus data ini ?", function(e) {
            if (e) {
            $('.loading_gear_gif').show();
                    $.ajax({
                    type: "POST",
                            url: "<?php echo site_url('data/custom_order_admin/delete') ?>",
                            timeout: 20000,
                            data:
                            'datamodel=' + $(index).attr("datamodel")

                            , success: function(result) {
                            if (result == "1")
                            {
                            alertify.success('Hapus sukses');
                                    location.reload();
                                    window.location.replace("<?php echo site_url('data/custom_order_admin/'); ?>");
                            }
                            else if (result == "2")
                            {
                            alertify.success('Data Tidak Dapat Dihapus');
                            }
                            else
                                    alertify.error("Kode Eror [100] : Terjadi kesalahan saat eksekusi permintaan<br/><br/>Status: gagal menerima data dari server");
                                    $('.loading_gear_gif').hide();
                            },
                            error: function(html) {
                            alertify.error("Kode Eror [" + html.status + "]<br/><br/>Status:" + html.statusText);
                                    $('.loading_gear_gif').hide();
                            }

                    });
            } else {
            alertify.error("Anda batal menghapus data produk");
                    $('.loading_gear_gif').hide();
            }
            });
            }
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
										<td class="col-md-1 borderkanan" data-title="'Tgl Order'" sortable="'custom_tgl_ymd'">
                                            <span>{{order_pembelian.custom_tgl}}</span>
                                        </td> 
										 <td class="col-md-2 borderkanan" data-title="'Customer'" sortable="'custom_nama'">
                                            <span>{{order_pembelian.custom_nama}}</span>
                                        </td> 
                                           <td align="center" class="col-md-2 borderkanan" data-title="'Email'" sortable="'custom_email'">
                                            <span>{{order_pembelian.custom_email}}</span>
                                        </td> 
                                        <td align="center" class="col-md-1 borderkanan" data-title="'Telp'" sortable="'custom_telp'"> 
                                            <span >{{order_pembelian.custom_telp}}</span>  
                                        </td>
										<td align="left" class="col-md-4 borderkanan" data-title="'Keterangan Order'" sortable="'custom_keterangan'"> 
                                            <span >{{order_pembelian.custom_keterangan}}</span>  
                                        </td>
										<td align="center" class="col-md-1 borderkanan" data-title="'Status'" sortable="'custom_status'"> 
                                            <span >{{order_pembelian.custom_status}}</span>  
                                        </td>
                                        <td class="col-md-1" data-title="'Actions'" ng-mouseover="show($index)">
											<center>
												
												 <fa class="fa-main btn-toolbar btn-toolbar-primary action_bar_{{$index}}" name="gear" size="2"></fa>
													<div id="toolbar-options-{{$index}}" class="hidden" >
														<a title="Update Status" href="" id="go_to_detail-{{$index}}" datamodel={{order_pembelian.datamodel}} onclick="update_status(this)">
															<fa name="check" size="2"></fa></a>
														<a title="Hapus Data" href="" id="produk-{{$index}}" datamodel={{order_pembelian.datamodel}} onclick="deleted(this)">
															<fa name="remove" size="2"></fa></a>
													</div>
											
											</center>
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
        <?php $this->load->view('data/custom_order_admin_crud_view'); ?>
        <?php $this->load->view('common/footer'); ?>
		<script src="<?php echo base_url(); ?>include/js/remodal/remodal.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>include/js/bootstrap.min.js"></script>
		
    </body>
</html>