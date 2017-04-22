<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">  
        <?php $this->load->view('common/head_lap'); ?>
        <?php
        $ubah = (isset($ubah)) ? $ubah : '';
        $alert = $this->session->userdata("error");
        $this->session->unset_userdata("error");
        ?>
        <style>
            @media print {
                body * {
                    visibility: hidden;
					
                }
                .print * {
                    visibility: visible;
                } 
                .head-print {
                    visibility: visible;
					margin-top:-50px;
					padding-top:0px;
                } 
            }
        </style>
        <?php $this->load->view('common/menu'); ?>
        <script type="text/javascript">
            error = '<?php echo $error; ?>';
                    ubah = '<?php echo $ubah; ?>';
                    _alert = '<?php echo $alert; ?>';
                    _insert = '<?php echo $this->session->userdata('akses_insert'); ?>';
                    _edit = '<?php echo $this->session->userdata('akses_edit'); ?>';
                    _delete = '<?php echo $this->session->userdata('akses_delete'); ?>'; 
                    base_url = '<?php echo base_url(); ?>/';
                    window.onload = function() {
                    $(".print").hide();
                            init_chosen();
                    }

            function clear_sorting()
            {
            $("#filter_search").val("");
                    location.reload();
            }

            var app = angular.module('main', ['ngTable', 'ngTableExport', 'picardy.fontawesome']).
                    controller('DemoCtrl', function($scope, $filter, $http, NgTableParams, $sce) {
                    var data = [];
					$("#img_load").show();
                            $http.get('<?php echo site_url('data/laporan/shows'); ?>')
                            .success(function($laporan) {
                            // alert($laporan);
                            data = $laporan;
                                    $scope.tableParams = new NgTableParams(
                                    {
                                    page: 1, // show first page
                                            count: data.length, // count per page
                                            filter: {
                                            kas_besar_id: '', // initial filter
                                            },
                                            sorting: {
                                            cash_besar_tanggal_ymd: 'asc'
                                            }

                                    },
                                    {
                                    data: data,
                                    });
                                    $('.loading_gear_gif').hide();
											
									$("#img_load").hide();
									var someDate = new Date();
									var numberOfDaysToAdd = 30;
									someDate.setDate(someDate.getDate() - numberOfDaysToAdd);   
									var dd = someDate.getDate();
									var mm = someDate.getMonth() + 1;
									var y = someDate.getFullYear();
									$("#img_load").hide();

									var someFormattedDate =y+ '/'+mm + '/'+ dd; 
                                    setTimeout(function ()
                                    {
                                    $(".ng-table-counts").remove();
									$('#search_laporan_awal').datepicker('setDate', new Date(someFormattedDate));
									$('#search_laporan_sampai').datepicker('setDate', new Date());
                                    }, 100);
                            });
							
							
							$scope.custom_filter = function () {
								$("#img_load").show();
								// alert("custom_filter");
								$http.post('<?php echo site_url('data/laporan/shows'); ?>', {"awal": $('#search_laporan_awal').val(),"akhir": $('#search_laporan_sampai').val()})
									.success(function($order_pembelian) {
										// alert($order_pembelian);
											data = $order_pembelian;
											$scope.tableParams = new NgTableParams({
											page: 1, // show first page
													 count: data.length, // count per page
													filter: {
													kas_besar_id: '', // initial filter
													},
													sorting: { 
														cash_besar_tanggal_ymd: 'asc'    // initial sorting
													}

											}, {
											data: data,
											});
											$('.loading_gear_gif').hide();
									$("#img_load").hide();
								   });
							}
							
							
                            $scope.show = function (index) { //kalau ada parameter dimasukkan ke dalam function ()
                            $('.action_bar_' + index).toolbar({
                            content: '#toolbar-options-' + index,
                                    position: 'top',
                                    style:'danger',
                                    adjustment: 7
                            });
                            };
                            $scope.exportExcel = function () {

                            var blob = new Blob(["<?php echo $this->session->userdata("subtitle"); ?>" + document.getElementById('table_angular2').innerHTML], {
                            type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8"
                            });
                                    saveAs(blob, "Laporan.xls");
                            };
                            $scope.exportPdf = function () {
                            var blob = new Blob(["<?php echo $this->session->userdata("subtitle"); ?>" + document.getElementById('table_angular2').innerHTML], {
                            type: "application/pdf"
                            });
                                    saveAs(blob, "Laporan.pdf");
                            };
                    });
                    function printing()
                    {
							// printDivCSS = new String ('<link href="<?php echo base_url(); ?>assets/css/style_print.css" rel="stylesheet" type="text/css">')

							// Popup($(".print").html(),printDivCSS);
							$(".print").show();
                            $("#table_angular").hide();
                            window.print();
                            $(".print").hide();
                            $("#table_angular").show();
                    }

            function Popup(data, css)
            {
					var mywindow = window.open('', 'my div', 'height=400,width=600');
                    mywindow.document.write('<html><head><title>my div</title>');
                    /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
                    mywindow.document.write(css + '</head><body >');
                    mywindow.document.write(data);
                    mywindow.document.write('</body></html>');
                    mywindow.document.close(); // necessary for IE >= 10
                    mywindow.focus(); // necessary for IE >= 10

                    mywindow.print();
                    mywindow.close();
                    return true;
            }

            app.filter('rangeTgl', function () {
            return function (input, laporan) {
            var filteredAmount = [];
                    var filteredAll = [];
                    if (laporan)
            {
            if (laporan.range_awal != "" && laporan.range_akhir != "")
            {
            angular.forEach(input, function (item) {

            var item_tanggal = new Date(item.cash_besar_tanggal);
                    var item_tanggal = new Date(item_tanggal.getFullYear().toString(), (item_tanggal.getMonth()).toString(), item_tanggal.getDate().toString());
                    var var_pembayaran_awal = new Date(laporan.range_awal);
                    var var_pembayaran_awal = new Date(var_pembayaran_awal.getFullYear().toString(), (var_pembayaran_awal.getMonth()).toString(), var_pembayaran_awal.getDate().toString());
                    var var_pembayaran_akhir = new Date(laporan.range_akhir);
                    var var_pembayaran_akhir = new Date(var_pembayaran_akhir.getFullYear().toString(), (var_pembayaran_akhir.getMonth()).toString(), var_pembayaran_akhir.getDate().toString());
                    if (item_tanggal >= var_pembayaran_awal && item_tanggal <= var_pembayaran_akhir)
            {
            filteredAmount.push(item);
            }
            });
                    console.log(filteredAmount);
                    return filteredAmount;
            }
            else
            {
            angular.forEach(input, function (item) {
            filteredAll.push(item);
            });
                    return filteredAll;
            }

            }
            else
            {
            angular.forEach(input, function (item) {
            filteredAll.push(item);
            });
                    return filteredAll;
            }

            };
            });</script>
    </head>
    <body ng-app="main">
        <div class="container-fluid">
            <div ng-controller="DemoCtrl">
                <div class="col-md-12 print" id="table_angular2"> <!-- Manipulasi table print -->
                  	
                        <table ng-table="tableParams"  class="table ng-table-responsive latar" export-csv="csv">
                            <tr ng-repeat="(datamodel, laporan) in $data| filter:cash| rangeTgl:laporan_tanggal | filter:filtering| filter:laporan.penjualan_no as results" ng-class-odd="'Bg_genap'" ng-class-even="'Bg_ganjil'" ng-class="{ 'emphasis': laporan.penjualan_no == '<?php echo $this->session->userdata("satuan_nama") ?>'}">
                                 <td align="center" style="width:1%" class=" borderkanan" data-title="'No'">
                                        <span>{{$index + 1}}</span>
                                    </td> 
                                    <td align="center" class="col-md-1 borderkanan {{laporan.class}}" data-title="'Tgl'" sortable="'order_tgl_ymd'">
                                        <span>{{laporan.order_tgl}}</span>
                                    </td> 
                                    <td class="col-md-2 borderkanan {{laporan.class}}" data-title="'No Order'" sortable="'order_no'">
                                        <span>{{laporan.order_no}}</span>
                                    </td> 
										 <td class="col-md-1 borderkanan" data-title="'Customer'" sortable="'customer_nama'">
                                            <span>{{laporan.customer_nama}}</span>
                                        </td> 
                                           <td align="center" class="col-md-1 borderkanan" data-title="'Kurir'" sortable="'order_kurir'">
                                            <span style="text-transform:uppercase"><b>{{laporan.order_kurir}}</b></span>
                                        </td> 
                                           <td align="right" class="col-md-1 borderkanan" data-title="'Berat'" sortable="'order_berat'">
                                            <span>{{laporan.order_berat}} gram</span>
                                        </td> 
                                           <td align="right" class="col-md-1 borderkanan" data-title="'Ongkir'" sortable="'order_ongkir'">
                                            <span>{{laporan.order_ongkir|currency:"Rp "}}</span>
                                        </td> 
                                           <td align="right" class="col-md-2 borderkanan" data-title="'Harga'" sortable="'order_total'">
                                            <span>{{laporan.order_total|currency:"Rp "}}</span>
                                        </td> 
                                           <td align="right" class="col-md-2 borderkanan" data-title="'Total Harga'" sortable="'total'">
                                            <span><b>{{laporan.total|currency:"Rp "}}</b></span>
                                        </td> 
                                        <td align="center" class="col-md-1 borderkanan" data-title="'Status'" sortable="'order_status'"> 
                                            <span >{{laporan.order_status}}</span>  
                                        </td>
										<td align="center" class="col-md-1 borderkanan" data-title="'Status Bayar'" sortable="'status_bayar'"> 
                                            <span >{{laporan.status_bayar}}</span>  
                                        </td>  
                            </tr> 
                            <tr ng-if="results.length == 0">
                                <td colspan="9" >
                            <center> <strong>Tidak ada data...</strong></center>
                            </td>
                            </tr> 
                        </table>
               
                </div>

                <div class="row" >
                    <div class="col-md-2">

                    </div> 
						 <div class="col-md-3">
								<?php
								$query = "SELECT * FROM customer where is_delete=0 ORDER BY customer_nama asc ";
								$result = mysql_query($query);
								?>
								<select class="form-control" id="filter_search"   attribute="is_selected" name="filter_search" ng-model="filtering.customer_nama">
									<?php
									echo "<option value=''>Semua Customer</option>";
									while ($row = mysql_fetch_array($result)) {
										echo "<option value=" . $row['customer_nama'] . "> " .$row['customer_nama'] . "</option>";
									}
									?>        
								</select>
                               
                        </div> 
                    <div class="col-md-3">
                        <div class="col-md-6">
                               <input class="form-control tanggal"  type="text" ng-change="custom_filter()" ng-model="cash_besar_pembayaran_awal" name="search_laporan_awal" id="search_laporan_awal" value="<?php echo set_value('search_laporan_awal', date("d M Y")) ?>" placeholder="Cari Tgl dari..."  />
                        </div> 
                        <div class="col-md-6">
                            <input class="form-control tanggal"  type="text" ng-change="custom_filter()" ng-model="cash_besar_pembayaran_akhir" name="search_laporan_sampai" id="search_laporan_sampai" value="<?php echo set_value('search_laporan_sampai', date("d M Y")) ?>" placeholder="Cari Tgl sampai..."  />
                        </div>
                    </div> 
                        <div class="col-md-2">
                            <select  class="form-control" name="jenis" id="jenis" ng-model="cash.order_status" name="transaksi_cash_search_jenis" id="transaksi_cash_search_jenis"> 
                                <option value=''>All</option>
                                <option value='Open Order'>Open Order</option>
                                <option value='Ready to Print'>Ready to Print</option>
                                <option value='On Printing'>On Printing</option>
                                <option value='On Packing'>On Packing</option>
                                <option value='On Shipping'>On Shipping</option>
                                <option value='Close Order'>Close Order</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input class="form-control" type="search" id="filter_search" ng-model="filterings" placeholder="Cari..." aria-label="Cari cash" />						 

                        </div> 
                </div>
                <div class="row" >
                    <div class="col-md-6"> 
                    </div>

                    <div class="col-md-2">
                        <button no_loading class="btn btn-link" ng-click="exportExcel()">
                            <fa name="file-excel-o"></fa> Export to Excels
                        </button>
                    </div> 
                    <div class="col-md-2">
                        <button no_loading class="btn btn-link" onclick="printing()">
                            <fa name="file-o"></fa> Print
                        </button>
                    </div> 
                    <div class="col-md-2">
                        <button ng-click="tableParams.sorting({})" onclick="clear_sorting()" class="btn btn-default btn-w100">Clear Sorting</button>

                    </div> 
                </div>

                <div class="row" >
                    <div class="col-md-12">  <!-- Table show biasa -->
						<a><img id="img_load" src=<?php echo base_url()."include/img/ajax_load.gif" ?> style="display:none;position:fixed;margin-left:50%;margin-top:4%"></img></a>
						<div id="table_angular">	
                        <table ng-table="tableParams"  class="table ng-table-responsive latar" export-csv="csv">
                            <tr ng-repeat="(datamodel, laporan) in $data| filter:cash| rangeTgl:laporan_tanggal | filter:filterings | filter:filtering| filter:laporan.penjualan_no as results" ng-class-odd="'Bg_genap'" ng-class-even="'Bg_ganjil'" ng-class="{ 'emphasis': laporan.penjualan_no == '<?php echo $this->session->userdata("satuan_nama") ?>'}">
                                 <td align="center" style="width:1%" class=" borderkanan" data-title="'No'">
                                        <span>{{$index + 1}}</span>
                                    </td> 
                                    <td align="center" class="col-md-1 borderkanan {{laporan.class}}" data-title="'Tgl'" sortable="'order_tgl_ymd'">
                                        <span>{{laporan.order_tgl}}</span>
                                    </td> 
                                    <td class="col-md-2 borderkanan {{laporan.class}}" data-title="'No Order'" sortable="'order_no'">
                                        <span>{{laporan.order_no}}</span>
                                    </td> 
										 <td class="col-md-1 borderkanan" data-title="'Customer'" sortable="'customer_nama'">
                                            <span>{{laporan.customer_nama}}</span>
                                        </td> 
                                           <td align="center" class="col-md-1 borderkanan" data-title="'Kurir'" sortable="'order_kurir'">
                                            <span style="text-transform:uppercase"><b>{{laporan.order_kurir}}</b></span>
                                        </td> 
                                           <td align="right" class="col-md-1 borderkanan" data-title="'Berat'" sortable="'order_berat'">
                                            <span>{{laporan.order_berat}} gram</span>
                                        </td> 
                                           <td align="right" class="col-md-1 borderkanan" data-title="'Ongkir'" sortable="'order_ongkir'">
                                            <span>{{laporan.order_ongkir|currency:"Rp "}}</span>
                                        </td> 
                                           <td align="right" class="col-md-2 borderkanan" data-title="'Harga'" sortable="'order_total'">
                                            <span>{{laporan.order_total|currency:"Rp "}}</span>
                                        </td> 
                                           <td align="right" class="col-md-2 borderkanan" data-title="'Total Harga'" sortable="'total'">
                                            <span><b>{{laporan.total|currency:"Rp "}}</b></span>
                                        </td> 
                                        <td align="center" class="col-md-1 borderkanan" data-title="'Status'" sortable="'order_status'"> 
                                            <span >{{laporan.order_status}}</span>  
                                        </td>
										<td align="center" class="col-md-1 borderkanan" data-title="'Status Bayar'" sortable="'status_bayar'"> 
                                            <span >{{laporan.status_bayar}}</span>  
                                        </td>  
                            </tr> 
                            <tr ng-if="results.length == 0">
                                <td colspan="9" >
                            <center> <strong>Tidak ada data...</strong></center>
                            </td>
                            </tr> 
                        </table>
               
						</div>
			    </div>
                </div>
                <div class="row" > 
                </div>

            </div> </div>

        <?php $this->load->view('common/footer'); ?> 

        <script src="<?php echo base_url(); ?>include/js/bootstrap.min.js"></script> 
    </body>
</html>