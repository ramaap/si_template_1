<div id="overlay"></div>
<div id="form_popup" class="pop" style="left:27.3%;width:50%;padding-bottom: 20px;">
    <button class="btn pull-right btn-danger" style="font-size:16px; border-radius: 0px" onclick="close_remodal()" title="Tutup">X</button>
    <center><h2>Update Status Order</h2></center>
    <br/>
    <div class="pdiv">
        <?php echo form_open('data/order/update_status', 'id="form_produk"'); ?>	
		<div class="row">
            <div class="col-md-3">Status</div>
            <div class="col-md-9">  
                <select name="order_status" class="form-control" id="order_status" required>
					<option <?php echo set_select('order_status', 'Open Order'); ?> value="Open Order">Open Order</option>
					<option <?php echo set_select('order_status', 'Ready to Print'); ?> value="Ready to Print">Ready to Print</option>
					<option <?php echo set_select('order_status', 'On Printing'); ?> value="On Printing">On Printing</option>  
					<option <?php echo set_select('order_status', 'On Packing'); ?> value="On Packing">On Packing</option>  
					<option <?php echo set_select('order_status', 'On Shipping'); ?> value="On Shipping">On Shipping</option>  
					<option <?php echo set_select('order_status', 'Close Order'); ?> value="Close Order">Close Order</option>  
				</select> 
            </div> 
        </div>
		<div class="row">
            <div class="col-md-3">Status Bayar</div>
            <div class="col-md-9">  
                <select name="status_bayar" class="form-control" id="status_bayar" required>
					<option <?php echo set_select('status_bayar', 'Belum Lunas'); ?> value="Belum Lunas">Belum Lunas</option>
					<option <?php echo set_select('status_bayar', 'Lunas'); ?> value="Lunas">Lunas</option>
				</select> 
            </div> 
        </div>
        </div> 
        <div class="row" hidden> 
            <div class="col-md-12">  
                <input id="datamodel" name="datamodel" type="text" size="28" value="<?php echo set_value('datamodel', ''); ?>" />  
                <span class="warning"><?php echo form_error('datamodel'); ?> </span>
            </div> 
        </div> 
        <br/>
        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <input type="submit" id="button" name="simpan" value="Update"  class="btn btn-success" />
                <?php echo form_close(); ?>  
                <a type="submit" name="batal" value="Batal" onclick="close_remodal()" class="btn btn-danger" >Batal</a>
            </div>
        </div> 
    </div>	  
</div>	
