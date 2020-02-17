<?php
  // get userdata
$userdata = $this->session->userdata('userdata');
?>
<form action="<?= base_url()?>Shipment/Add_Shipment_import" method="post">
<input type="submit" name="" value="Save">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item active">
    <a class="nav-link active" id="import_ref-tab" data-toggle="tab" href="#import_ref" role="tab" aria-controls="import_ref"
      aria-selected="true">Import Ref</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
      aria-selected="false">Shipper</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
      aria-selected="false">Contact</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade active in" id="import_ref" role="tabpanel" aria-labelledby="import_ref-tab">

    <div>
     
      Ref No :<input type="text" name="ref_no" value="<?= $import_ref_data[0]['ref_no']?>" readonly> 
      Status :
      <select name="status">
        <option value="">Please Select</option>
        <option value="open" <?= ($import_ref_data[0]['status'] == 'open') ? 'selected' : ''?>>Open</option>
        <option value="closed" <?= ($import_ref_data[0]['status'] == 'closed') ? 'selected' : ''?>>Closed</option>
        <option value="cancelled" <?= ($import_ref_data[0]['status'] == 'cancelled') ? 'selected' : ''?>>Cancelled</option>
      </select>
      Job Type : 
      <select name="job_type">
        <option value="">Please Select</option>
        <option value="flc" <?= ($import_ref_data[0]['job_type'] == 'flc') ? 'selected' : ''?>>FLC</option>
        <option value="lcl" <?= ($import_ref_data[0]['job_type'] == 'lcl') ? 'selected' : ''?>>LCL</option>
        <option value="consol" <?= ($import_ref_data[0]['job_type'] == 'consol') ? 'selected' : ''?>>CONSOL</option>
        <option value="air" <?= ($import_ref_data[0]['job_type'] == 'air') ? 'selected' : ''?>>AIR</option>
        <option value="truck" <?= ($import_ref_data[0]['job_type'] == 'truck') ? 'selected' : ''?>>TRUCK</option>
        <option value="other" <?= ($import_ref_data[0]['job_type'] == 'other') ? 'selected' : ''?>>OTHER</option>
      </select>

      <br>Job Date : <input type="text" name="job_date" class="job_date_datepicker" value="<?= $import_ref_data[0]['job_date']?>">

      <br>Agent:<input type="hidden" id="agent_id_id" name="agent" value="<?= $import_ref_data[0]['agent']?>"><input type="text" placeholder="id" id="agent_id" value="<?= (isset($imp_reff_agent_data)) ? $imp_reff_agent_data[0]['short_name'] : '' ?>" readonly><input type="text" id="agent_name" placeholder="name" value="<?= (isset($imp_reff_agent_data)) ? $imp_reff_agent_data[0]['full_name'] : ''?> " readonly><button type="button" data-toggle="modal" data-target="#AgentPickerModal" data-point="agent" class="pick_class">Pick</button>


     <br> ETA:<input type="text" name="eta" class="eta_date_datepicker">
     <br> EDT:<input type="text" name="edt" class="edt_date_datepicker">
     <br> Vessel:<input type="text" name="vessel">
     <br> Voyage:<input type="text" name="voyage">

     <br> POL:<input type="hidden" id="POL_id_id" name="pol"><input type="text" name="" placeholder="id" id="POL_id" readonly><button type="button" data-toggle="modal" data-target="#PortPickerModal" data-point="POL" class="pick_class">Pick</button>

     <br> POD:<input type="hidden" id="POD_id_id" name="pod"><input type="text" name="" placeholder="id" id="POD_id" readonly><button type="button" data-toggle="modal" data-target="#PortPickerModal" data-point="POD" class="pick_class">Pick</button>

      <br>Ocean BL: <input type="text" name="ocean_bl">

     <br> Cr agent:<input type="hidden" id="cr_agent_id_id" name="cr_agent"><input type="text" name="" placeholder="id" id="cr_agent_id" readonly><input type="text" name="" id="cr_agent_name" placeholder="name" readonly><button type="button" data-toggle="modal" data-target="#VendorPickerModal" data-point="cr_agent" class="pick_class">Pick</button>
     <br> Cr Bkg no:<input type="text" name="cr_booking_no">
     <br> NVOCC Agent:<input type="hidden" id="nvocc_id_id" name="nvocc_agent"><input type="text" name="" placeholder="id" id="nvocc_id" readonly><input type="text" name="" id="nvocc_name" placeholder="name" readonly><button type="button" data-toggle="modal" data-target="#VendorPickerModal" data-point="nvocc" class="pick_class">Pick</button>
     <br> NVOCC BL : <input type="text" name="nvocc_bl">
     <br> Warehouse:<input type="hidden" id="warehouse_id_id" name="warehouse"><input type="text" name="" placeholder="id" id="warehouse_id" readonly><input type="text" name="" id="warehouse_name" placeholder="name" readonly><button type="button" data-toggle="modal" data-target="#VendorPickerModal" data-point="warehouse" class="pick_class">Pick</button>
     <br> Total M3 :<input type="text" name="total_m3" readonly>
     <br> Forward Agent :<input type="hidden" id="forward_agent_id_id" name="forword_agent"><input type="text" name="" placeholder="id" id="forward_agent_id"><input type="text" name="" id="forward_agent_name" placeholder="name"><button type="button" data-toggle="modal" data-target="#AgentPickerModal" data-point="forward_agent" class="pick_class">Pick</button>
    <br>  Total Wt : <input type="text" name="total_wt" readonly>
     <br> Transport : <input type="hidden" id="transport_agent_id_id" name="transport"><input type="text" name="" placeholder="id" id="transport_id"><input type="text" name="" id="transport_name" placeholder="name"><button type="button" data-toggle="modal" data-target="#VendorPickerModal" data-point="transport" class="pick_class">Pick</button>
     <br> Total Packages :<input type="text" name="total_packages" readonly>
     <br> Ref Currency: <input type="hidden" id="currency_id_id" name="currency"><button type="button" data-toggle="modal" data-target="#CurrencyPickerModal" data-point="currency" class="pick_class">Pick</button>
     <br> Ex Rate : <input type="text" id="ex_rate">
     <br> Pkgs type : <input type="text" name="pkg_types" readonly>
     <br> Remark : <textarea name="remark"></textarea>
     <input type="hidden" name="user" value="<?= $userdata[0]['id']?>">
     <br> User : <input type="text" name="" value="<?= $userdata[0]['username']?>" readonly>
     <br> date : <?= date('d-m-Y');?>
   
    </div>
	 


	</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div>
            <button type="button" data-toggle="modal" data-target="#CustomerPickerModal" data-point="shipper" class="pick_class">Shipper</button>
            <input type="text" name="" id="shipper_name" placeholder="name" readonly>
            <input type="hidden" name="shipper_shipper_id" id="shipper_id_id">

            <br>

            <button type="button" data-toggle="modal" data-target="#AgentPickerModal" data-point="consignee" class="pick_class">Consignee</button>
            <input type="text" name="" id="consignee_name" placeholder="name" readonly>
            <input type="hidden" name="shipper_consignee_id" id="consignee_id_id">


            <br>

            <button type="button" data-toggle="modal" data-target="#AgentPickerModal" data-point="notify_party" class="pick_class">Notify Party</button>
            <input type="text" name="" id="notify_party_name" placeholder="name" readonly>
            <input type="hidden" name="shipper_notify_party_id" id="notify_party_id_id">

            <br>

            <button type="button" data-toggle="modal" data-target="#AgentPickerModal" data-point="agent_shipper" class="pick_class">Agent</button>
            <input type="text" name="" id="agent_shipper_name" placeholder="name" readonly>
            <input type="hidden" name="shipper_agent_id" id="agent_shipper_id_id">
    </div>



  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div>
      Etsy mixtape
    wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack
    lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard
    locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify
    squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie
    etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog
    stumptown. Pitchfork sustainable tofu synth chambray yr.</div>
    </div>
    
</div>

  

</form>
<?php
$encoded_value = url_value_encode($import_ref_data[0]['ref_no']);

?>
<button onclick='redirect("<?= base_url()?>Shipment/Add_Shipment_import_Job/<?= $encoded_value; ?>")'>Add Import Job</button>
<table border="1">
  <thead>
    <tr>
        <th>Import No</th>
        <th>Hbl No</th>
        <th>Wt</th>
        <th>M3</th>
        <th>Package</th>
        <th>User ID</th>
    </tr>
   
  </thead>
  <tbody>
     
  </tbody>
</table>

		<!-- Modal Agent Picker Start-->
  <div class="modal fade" id="AgentPickerModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pick Agent</h4>
        </div>
        <div class="modal-body">
        	<input type="text" name="" id="agent_keyword"><button type="button" id="search_agent">Search</button>
          <table class="table">
            <thead>
          	<tr>
          		<th>Agent ID</th>
	          	<th>Agent Name</th>
	          	<th>Action</th>	
          	</tr>
              
            </thead>
            <tbody class="agent_picker_data pick_common_data">
              
            </tbody>
          	
          	
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
					<!-- Modal Agent Picker End -->

  <!-- Modal Agent Picker Start-->
  <div class="modal fade" id="PortPickerModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pick Port</h4>
        </div>
        <div class="modal-body">
          <input type="text" name="" id="port_keyword"><button type="button" id="search_port">Search</button>
          <table class="table">
            <thead>
            <tr>
              <th>Code</th>
              <th>Name</th>
              <th>Action</th> 
            </tr>
              
            </thead>
            <tbody class="port_picker_data pick_common_data">
              
            </tbody>
            
            
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal Agent Picker End -->


  <!-- Modal Vendor Picker Start-->
  <div class="modal fade" id="VendorPickerModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pick Vendor</h4>
        </div>
        <div class="modal-body">
          <input type="text" name="" id="vendor_keyword"><button type="button" id="search_vendor">Search</button>
          <table class="table">
            <thead>
            <tr>
              <th>Code</th>
              <th>Name</th>
              <th>Action</th> 
            </tr>
              
            </thead>
            <tbody class="vendor_picker_data pick_common_data">
              
            </tbody>
            
            
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
          <!-- Modal Vendor Picker End -->



  <!-- Modal Vendor Picker Start-->
  <div class="modal fade" id="CurrencyPickerModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pick Currency</h4>
        </div>
        <div class="modal-body">
          <input type="text" name="" id="currency_keyword"><button type="button" id="search_currency_modal">Search</button>
          <table class="table">
            <thead>
            <tr>
              <th>Code</th>
              <th>Name</th>
              <th>Action</th> 
            </tr>
              
            </thead>
            <tbody class="currency_picker_data pick_common_data">
              
            </tbody>
            
            
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
          <!-- Modal Vendor Picker End -->


  <!-- Modal Vendor Picker Start-->
  <div class="modal fade" id="CustomerPickerModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pick Customer</h4>
        </div>
        <div class="modal-body">
          <input type="text" name="" id="customer_keyword"><button type="button" id="search_customer_modal">Search</button>
          <table class="table">
            <thead>
            <tr>
              <th>Code</th>
              <th>Name</th>
              <th>Action</th> 
            </tr>
              
            </thead>
            <tbody class="customer_picker_data pick_common_data">
              
            </tbody>
            
            
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
          <!-- Modal Vendor Picker End -->
