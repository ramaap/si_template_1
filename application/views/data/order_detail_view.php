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
		<script type="text/javascript" src="<?php echo base_url(); ?>include/js/dynamic_script.js"></script>
        <script type="text/javascript">
            error = '<?php echo $error; ?>';
                    ubah = '<?php echo $ubah; ?>';
                    _alert = '<?php echo $alert; ?>'; 
                    _insert = '<?php echo $this->session->userdata('akses_insert'); ?>';
                    _edit = '<?php echo $this->session->userdata('akses_edit'); ?>';
                    _delete = '<?php echo $this->session->userdata('akses_delete'); ?>';
                    site_url = '<?php echo site_url(); ?>/data/order_detail/';
                    base_url = '<?php echo base_url(); ?>/';
                    window.onload = function() {
						init_chosen();
						
						if (error != "")
						{
							if (ubah != '')
							{
							$('#button').attr("name", "ubah");
									$('#button').attr("value", "Ubah");
									$('#form_produk_detail').attr("action", site_url + 'edit');
							}

							show_remodal();
						}

						if (_alert != "")
								alertify.success(_alert);
					}

            
            function clear_sorting()
            {
            $("#filter_search").val("");
                    location.reload();
            }

            var app = angular.module('main', ['ngTable', 'ngTableExport','picardy.fontawesome']).
                    controller('DemoCtrl', function($scope, $filter, $http, NgTableParams, $sce) {
                    var data = [];
                            $http.get('<?php echo site_url('data/order_detail/produk_detail_show'); ?>')
                            .success(function($produk_detail) {
								// alert($produk_detail)
                            data = $produk_detail;
                                    $scope.tableParams = new NgTableParams({
                                    page: 1, // show first page
                                            count: 100, // count per page
                                            filter: {
                                            barang_nama: '', // initial filter
                                            },
                                            sorting: {
                                            barang_nama: 'asc'    // initial sorting
                                            }

                                    }, {
                                    data: data,
                                    });
                                    $('.loading_gear_gif').hide();
                            });
                             //
							$scope.show = function (index) { //kalau ada parameter dimasukkan ke dalam function ()
								$('.action_bar_' + index).toolbar({
									content: '#toolbar-options-' + index,
									position: 'top',
									style:'black',
									adjustment: 7
								});
							};
                    });
					app.filter('sumByKey', function () {
				 
						 return function(data, key) {
							if (typeof(data) === 'undefined' || typeof(key) === 'undefined') {
								return 0;
							}

							var sum = 0;
							i=0;
							angular.forEach(data, function () {
								
								//alert(sum+"+"+data[i][key]);
								sum =+ sum + + parseInt(data[i][key]);
								i++;
							});
							return currency_format(sum);
						};
						 
					 });
			</script>
    </head>
    <body ng-app="main">
        <div id="container">
            <div class="container-fluid">
                 
                    <br/>
                    <div ng-controller="DemoCtrl">
					
                        <div class="row" >
                            <div class="col-md-12">
                                <a type="submit" onclick="loading()" href="<?php echo site_url('data/order_detail/utama')?> "class="btn btn-success"><i class="fa fa-fw fa-backward"></i>&nbsp;Ke Utama</a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-12">
                                <table ng-table="tableParams"  class="table ng-table-responsive latar" export-csv="csv">
                                    <tr ng-repeat="(datamodel, produk_detail) in $data | filter:produk_detail.produk_detail_nama as results"  ng-class-odd="'Bg_genap'" ng-class-even="'Bg_ganjil'"  ng-class="{ 'emphasis': produk_detail.produk_detail_nama == '<?php echo $this->session->userdata("produk_detail_nama") ?>'}">
                                        <td align="center" style="width:1%" class=" borderkanan" data-title="'No'">
											<span>{{$index+1}}</span>
										</td> 
										 <td class="col-md-2 borderkanan" data-title="'Nama Produk'" sortable="'nama'">
                                            <span>{{produk_detail.nama}}</span>
                                        </td> 
										 <td align="center" class="col-md-1 borderkanan" data-title="'Ukuran'" sortable="'ukuran'">
                                            <span>{{produk_detail.ukuran}}</span>
                                        </td> 
										
										 <td align="center" class="col-md-2 borderkanan" data-title="'Jenis Kertas'" sortable="'kertas_nama'">
                                            <span>{{produk_detail.kertas_nama}}</span>
                                        </td> 
										 <td align="center" class="col-md-1 borderkanan" data-title="'Jml'" sortable="'jumlah'">
                                            <span>{{produk_detail.jumlah}}</span>
                                        </td> 
										 <td align="center" class="col-md-1 borderkanan" data-title="'Sisi Cetak'" sortable="'sisi_cetak'">
                                            <span>{{produk_detail.sisi_cetak}} Muka</span>
                                        </td> 
										 <td class="col-md-1 borderkanan" data-title="'Ket Tambahan'" sortable="'tambahan_ket'">
                                            <span>{{produk_detail.tambahan_ket}}</span>
                                        </td> 
                                        <td align="right" class="col-md-1 borderkanan" data-title="'Harga Tambahan'" sortable="'harga_tambahan'"> 
                                            <span >{{produk_detail.harga_tambahan | currency:"Rp "}}</span>  
                                        </td>
                                        <td align="right" class="col-md-1 borderkanan" data-title="'Harga Satuan'" sortable="'harga'"> 
                                            <span >{{produk_detail.harga | currency:"Rp "}}</span>  
                                        </td>
                                        <td align="right" class="col-md-2 borderkanan" data-title="'Harga Total'" sortable="'harga_total'"> 
                                            <span >{{produk_detail.harga_total | currency:"Rp "}}</span>  
                                        </td>
                                    </tr> 
                                    <tr ng-if="results.length == 0">
                                        <td colspan="10" >
                                    <center> <strong>Tidak ada data...</strong></center>
                                    </td>
                                    </tr>
									<tr ng-if="results.length != 0">
										 <td colspan="8" >
											&nbsp;
										</td>
										<td align="right" class="borderkanan" >
											<b>Total</b>
										</td>
										
										 <td align="right">
											<b style="font-size:25px">Rp {{results|sumByKey:'harga_total'}}</b>
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
        <script src="<?php echo base_url(); ?>include/js/bootstrap.min.js"></script> 
    </body>
</html>