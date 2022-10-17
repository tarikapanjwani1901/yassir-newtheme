@extends('layouts.admin.app')
@section('content')
<style>
.multipleBox .multipleBoxCol {
	border: 1px solid #eee;
	padding: 0 10px 10px 10px;
	margin-bottom: 15px;
}

.multipleBox .multipleBoxCol .headingTabsCols {
	margin-left: -10px;
	margin-right: -10px;
	padding: 10px;
	background: #eee;
}

.multipleBox .multipleBoxCol .counter {
	background: black;
	width: 25px;
	display: inline-block;
	height: 25px;
	text-align: center;
	color: #fff;
	border-radius: 50%;
}
.multipleBox .multipleBoxCol .delelteItem,.multipleBox .multipleBoxCol .delelteItemCommercialArea {
	float: right;
}
.sw-btn-group-extra {
	display: none;
	position: absolute;
	right: 3px;
	bottom: 12px;
	padding: 11px 20px !important;
	border-radius: .25rem !important;
	background: #1EAAE7 !important;
	font-weight: 400 !important;
	border: 0 !important;
	color: #fff;
}

.project_gallery_images img {
	width: 100%;
	max-height: 150px;
	object-fit: contain;
}
.project_gallery_images .delete_img {
	cursor: pointer;
	background: red;
	color: #fff;
	/* padding: 11px; */
	border-radius: 91px;
	height: 20px;
	width: 20px;
	line-height: 20px;
	text-align: center;
	font-size: 12px;
	/* margin: 0 auto; */
	position: absolute;
	right: -8px;
	top: -11px;
}
.project_gallery_images {
	position: relative;
	display: inline-block;
	border: 1px solid #ccc;
	padding: 10px;
	margin-right: 10px;
	margin-bottom: 10px;
	margin-top: 10px;
	width: 100%;
	min-height: 170px;
}label {
	font-size: 12px;
	font-weight:bold;
	color:#000;
}
.select2-dropdown{ border-color:#ccc;}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
	border: 0;
	background: #ccc;
	border-radius: 6px;
	padding: 1px 6px;
}
.required_field{ color:red;}
.form-file {
	border-color:  #ccc;
}
.tab-content{ height:auto !important;}
.form-file .form-control{ height:28px;}
.form-control{border-color:#ccc; color:#000; height:40px;}
.form-control:hover, .form-control:focus, .form-control.active{ border-color:#ccc; color:#000;}
.select2-container--default .select2-selection--single{ border-color:#ccc;}
.select2-container--default .select2-selection--multiple .select2-selection__choice__display{ padding-left:15px;}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
	border-radius: 10px;
	padding: 1px 6px;
	margin-top: 4px;
	margin-left: 1px;
}
.select2-results__option,.select2-container--default .select2-selection--single .select2-selection__rendered,.form-control{ font-size:12px;}
.select2-container{ width:100% !important;}
 .delelteItem,.delelteItemCommercialArea,.RentdelelteItemCommercialArea,.delelteItemCommercialSpaceArea,.delelteItemIndustrialArea,.RentdelelteItemIndustrialArea,.delelteItemPloatArea,.delelteItemRentCommercialAreaHospital,.delelteItemRentCommercialSpaceArea{cursor:pointer;
	background: red;
	color: #fff;
	/* padding: 11px; */
	border-radius: 91px;
	height: 25px;
	width: 25px;
	line-height: 25px;
	text-align: center;
	font-size: 12px;
	margin:0 auto;
}

.PropertyFeatures ul {
  list-style: none;
  margin: 0px;
  padding: 0px;
}
.PropertyFeatures ul li {
  display: inline-block;
  margin-right: 12px;
  font-size:12px;
  color:#000;
}
.form-group{ overflow:hidden;}
.close-window {
	position: absolute;
	right: 10px;
	top: 15px;
	background: red;
	color: #fff;
	/* padding: 11px; */
	border-radius: 91px;
	height: 25px;
	width: 25px;
	line-height: 25px;
	text-align: center;
	font-size: 12px;
}
</style>

    <div class="container-fluid">
        <?php //echo "<pre>";print_r($properties); ?>
        <div class="row p-0">
   <div class="col-lg-12">
      <div class="card">
      	
        	<div class="card-header pb-3 pt-3 text-uppercase">
                Add Property</div>
         <div class="card-body">
            <form method="post" id="propertyForm" enctype="multipart/form-data">
               <input type="hidden" name="property_id" id="property_id"  />
               <div id="smartwizard" class="form-wizard order-create">
                  <ul class="nav nav-wizard">
                     <li><a class="nav-link" href="#step1"> 
                        <span>1</span> 
                        </a>
                     </li>
                     <li><a class="nav-link" href="#step2">
                        <span>2</span>
                        </a>
                     </li>
                     <li><a class="nav-link" href="#step3">
                        <span>3</span>
                        </a>
                     </li>
                     <li><a class="nav-link" href="#step4">
                        <span>4</span>
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div id="step1" class="tab-pane" role="tabpanel">
                        <div class="col-md-12 paddleft0">
                           <div class="row">
                              <div class="col-md-2">
                                 <div class="form-group">
                                    <label class="control-label">Status <span class="required_field">*</span></label>
                                    {!! Form::select('status', $status,'',['class' => 'select2 required form-control', 'id' => 'status']) !!}
                                 </div>
                              </div>
                              
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Vendor <span class="required_field">*</span></label>
                                    <select name="property_vendor" id="property_vendor" class="form-control select2 required" >
                                       <option value="">Select Vendor</option>
                                       @foreach($vendors as $v)
                                        <option value="{{$v->id}}">{{$v->company_name}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-2">
                                 <div class="form-group">
                                    <label class="control-label">Property For <span class="required_field">*</span></label>
                                    {!! Form::select('property_for', $propertyFor,'',['class' => 'select2 required form-control', 'id' => 'property_for']) !!}
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Property Category <span class="required_field">*</span></label>
                                    {!! Form::select('category', $category,'',['class' => 'select2 required form-control', 'id' => 'category']) !!}
                                    
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label class="control-label">Property Sub Category <span class="required_field">*</span></label>
                                    
                                        {!! Form::select('sub_category', $SubCategory,'',['class' => 'select2 required form-control', 'id' => 'sub_category']) !!}
                                
                                 </div>
                              </div>
                              <div class="col-md-3 sell_residential_prop rent_residential_prop">
                                 <div class="form-group">
                                    <label class="control-label">What kind of propety is it?<span class="required_field">*</span></label>
                                   {!! Form::select('property_type', $property_type,'',['class' => 'select2 required form-control', 'id' => 'property_type']) !!}
                                
                                 </div>
                              </div>
                              
                              <div class="col-md-3  rent_residential_prop rentapartmentsales">
                                 <div class="form-group">
                                    <label class="control-label">What kind of propety is it?<span class="required_field">*</span></label>
                                   {!! Form::select('rentwhatkindofpropetyisit', $rentwhatkindofpropetyisit,'',['class' => 'select2 required form-control', 'id' => 'rentwhatkindofpropetyisit']) !!}
                                
                                 </div>
                              </div>
                              
                              
                              <div class="col-md-3  rent_commercial_prop">
                                 <div class="form-group">
                                    <label class="control-label">What kind of propety is it?<span class="required_field">*</span></label>
                                   {!! Form::select('rentwhatkindofpropetyisitCommercial', $rentwhatkindofpropetyisitCommercial,'',['class' => 'select2 required form-control', 'id' => 'rentwhatkindofpropetyisitCommercial']) !!}
                                
                                 </div>
                              </div>
                              
                              
                              <div class="col-md-3  rent_commercial_hospital_prop">
                                 <div class="form-group">
                                    <label class="control-label">What kind of hospitality is it?<span class="required_field">*</span></label>
                                   {!! Form::select('rentwhatkindofpropetyisitCommercialhospital', $rentwhatkindofpropetyisitCommercialhospital,'',['class' => 'select2 required form-control', 'id' => 'rentwhatkindofpropetyisitCommercialhospital']) !!}
                                
                                 </div>
                              </div>
                              
                              <div class="col-md-3 sell_industrial_prop">
                                 <div class="form-group">
                                    <label class="control-label">Sub Type Industrial<span class="required_field">*</span></label>
                                   {!! Form::select('SubTypeIndustrial', $SubTypeIndustrial,'',['class' => 'select2 required form-control', 'id' => 'SubTypeIndustrial']) !!}
                                
                                 </div>
                              </div>
                              
                              <div class="col-md-3 rent_industrial_prop">
                                 <div class="form-group">
                                    <label class="control-label">Sub Type Industrial<span class="required_field">*</span></label>
                                   {!! Form::select('RentSubTypeIndustrial', $RentSubTypeIndustrial,'',['class' => 'select2 required form-control', 'id' => 'RentSubTypeIndustrial']) !!}
                                
                                 </div>
                              </div>
                              
                              
                              <div class="col-md-3 sell_plotting_prop">
                                 <div class="form-group">
                                    <label class="control-label">What Kind Of Plotting Is It? <span class="required_field">*</span></label>
                                   {!! Form::select('property_type_vacant_land_plotting', $property_type_vacant_land_plotting,'',['class' => 'select2 required form-control', 'id' => 'property_type_vacant_land_plotting']) !!}
                                
                                 </div>
                              </div>
                              
                              <div class="col-md-3 sell_vacant_land_prop">
                                 <div class="form-group">
                                    <label class="control-label">What Kind Of vacant land Is It? <span class="required_field">*</span></label>
                                   {!! Form::select('property_type_vacant_land', $property_type_vacant_land,'',['class' => 'select2 required form-control', 'id' => 'property_type_vacant_land']) !!}
                                
                                 </div>
                              </div>
                              
                              <div class="col-md-3 sell_residential_prop IndependentHomeSubType">
                                 <div class="form-group">
                                    <label class="control-label">Independent House Sub Type?<span class="required_field">*</span></label>
                                   {!! Form::select('IndependentHomeSubType', $IndependentHouseSubType,'',['class' => 'select2 required form-control', 'id' => 'IndependentHomeSubType']) !!}
                                
                                 </div>
                              </div>
                              <div class="col-md-3 sell_commercial_prop">
                                 <div class="form-group">
                                    <label class="control-label">What kind of propety is it?<span class="required_field">*</span></label>
                                      {!! Form::select('sell_commercial_property_type', $commercial_property_type,'',['class' => 'select2 required form-control', 'id' => 'sell_commercial_property_type']) !!}
                                
                                 </div>
                              </div>
                              
                              
                              <div class="col-md-3 sell_vacantlandplotting_prop">
                                 <div class="form-group">
                                    <label class="control-label">What kind of vacant land/ plotting is it?</label>
                                       {!! Form::select('what_kind_of_vacantland', $what_kind_of_vacantland,'',['class' => 'select2 required form-control', 'id' => 'what_kind_of_vacantland']) !!}
                                
                                 </div>
                              </div>
                              <div class="col-md-6" id="ProjectNameApartmentName">
                                 <div class="form-group">
                                    <label class="control-label ProjectNameApartmentNameLabel">Project Name / Apartment Name/ Society Name  <span class="required_field">*</span></label>
                                    <input type="text" placeholder="Project Name / Apartment Name/ Society Name" class="form-control required"  name="project_name"/>
                                 </div>
                              </div>
                           </div>
                           <?php /*?><div class="row WhatkindofHospitality">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="control-label">What kind of Hospitality is it?</label>
                                   {!! Form::select('what_kind_of_hospitality', $what_kind_of_hospitality,'',['class' => 'select2 required form-control', 'id' => 'what_kind_of_hospitality']) !!}

                                 </div>
                              </div>
                           </div><?php */?>
                           <div class="row rent_retail_type">
                           	<div class="col-md-12">
                                 <div class="form-group">
                                    <label class="control-label">Retail Type:</label>
                                    {!! Form::select('retail_type', $retail_type,'',['class' => 'select2 required form-control','id'=>"rent_retail_type_dp"]) !!}

                                 </div>
                              </div>
                           </div>
                           <div class="row retail_type">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Retail Type:</label>
                                    {!! Form::select('retail_type', $retail_type,'',['class' => 'select2 required form-control']) !!}

                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Shop is located inside</label>
                                      {!! Form::select('shop_located_inside', $shop_located_inside,'',['class' => 'select2 required form-control', 'id' => 'shop_located_inside']) !!}

                                 </div>
                              </div>
                           </div>
                           <div class="row sell_commercial_prop sell_industrial_prop rent_industrial_prop rent_commercial_prop">
                              <div class="col-md-6 locality_prop">
                                 <div class="form-group">
                                    <label class="control-label">Locality</label>
                                    <input type="text" placeholder="Locality" class="form-control" name="locality"/>
                                 </div>
                              </div>
                              <div class="col-md-6 locatedinside_prop">
                                 <div class="form-group">
                                    <label class="control-label">Located inside</label>
                                   {!! Form::select('located_inside', $located_inside,'',['class' => 'select2 required form-control', 'id' => 'located_inside']) !!}

                                 </div>
                              </div>
                           </div>
                           <div class="row sell_residential_prop sell_commerical_retail_prop sell_industrial_prop sell_plotting_prop">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Rera Number</label>
                                    <input type="text" class="form-control" placeholder="Rera Number" name="rera_number"/>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Rera Profile Link </label>
                                    <input type="text" class="form-control" placeholder="Rera Profile Link" name="rera_link"/>
                                 </div>
                              </div>
                           </div>
                           <h4 style="border-bottom:1px dotted #000; margin-left:20px; padding-bottom:10px;">Property Location</h4>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Country <span class="required_field">*</span></label>
                                    <select class="form-control required select2" name="country" id="country">
                                       @foreach($country as $k=>$v)
                                        <option value="{{$k}}">{{$v}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">State <span class="required_field">*</span></label>
                                     {!! Form::select('state', $state,'',['class' => 'select2 required form-control', 'id' => 'state']) !!}

                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">City <span class="required_field">*</span></label>
                                     {!! Form::select('city', $city,'',['class' => 'select2 required form-control', 'id' => 'city']) !!}
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Sub City <span class="required_field">*</span></label>
                                     {!! Form::select('sub_city', $sub_city,'',['class' => 'select2 required form-control', 'id' => 'sub_city']) !!}
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Landmark</label>
                                  <input type="text" class="form-control"  name="area" id="area" placeholder="Landmark"  >
                                 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Zipcode <span class="required_field">*</span></label>
                                    <input type="text" class="form-control required"  name="zip_code" id="zip_code" placeholder="Zip Code"  >
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="control-label" for="address">Address <span class="required_field">*</span></label>
                                    <input type="text" class="form-control required"  name="address" id="address" placeholder="Address" >
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="step2" class="tab-pane" role="tabpanel">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="panel panel-primary ">
                                 <div class="panel-body">
                                    <div class="row">
                                    	
                           <div class="form-group col-md-4 sell_residential_prop rent_residential_prop">
                                       <label class="col-sm-2 control-label">
                                       Select <span class="required_field">*</span>
                                       </label>
                                       <div class="row p-0">
                                          <div class="col-sm-8">
                                             <div class="property_unit_type_prop">
                                             
                                             <select name="property_unit_type" id="property_unit_type" class="select2 form-control" >
                                                <option value="">Select</option>
                                                @foreach($bhkData as $single)
                                                <option value="{{$single}}">{{$single}}</optArea ion>
                                                @endforeach
                                                
                                             </select>
                                             </div>
                                             
                                          </div>
                                          <div class="col-sm-2">   <button id="add_property" type="button" name="" class="add_property btn btn-primary " >Add</button></div>
                                       </div>
                                    </div>
                           		
                           
                           <div class="form-group col-md-4 sell_residential_prop ">
                                       <label class="control-label">Possession Date
                                        <span class="required_field">*</span>
                                       </label>
                                       <div class="row p-0">
                                              <div class="col-sm-6">
                	 {!! Form::select('possession_month', $MonthNameList,'',['class' => 'select2 required form-control']) !!}

                  </div>  
                  <div class="col-sm-6">
                	{!! Form::select('possession_year', $yearList,'',['class' => 'select2 required form-control']) !!}
					
                </div>
                                       </div>
                                    </div>
                           <div class="form-group col-md-4 sell_residential_prop rent_residential_prop">
                                       <label class="control-label">Select Area
                                        <span class="required_field">*</span>
                                       </label>
                                       <div class="row p-0">
                                          <div class="col-sm-12">
                                             <select name="property_areas" id="property_areas" class="select2 form-control" >
                                                 <option value="Square Yard">Square Yard</option>
                                                <option value="Square Feet">Square Feet</option>
                                                <option value="Square Meter">Square Meter</option>
                                             
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    </div>
                                    
                                    
                                    <div class="accordion accordion-header-bg accordion-bordered property_type_accordion" id="accordionUnitType" >
                                    	
                                    
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="rent_commercial_prop rent_commercial_office_prop">
                        	<div class="row">
                              
                              
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Select Area<span class="required_field">*</span></label>
                                   <select name="rent_commercial_property_areas" id="rent_commercial_property_areas" class="select2 form-control" >
                                                 <option value="Square Yard" >Square Yard</option>
                                                <option value="Square Feet" >Square Feet</option>
                                                <option value="Square Meter" >Square Meter</option>
                                             
                                             </select>
                                 </div>
                              </div>
                              
                              <div class="col-md-12">
                              	<table class="table rent_commercial_area table-bordered table-hover  table-striped">
                                	<thead class="thead-primary">
                                    <tr><th width="30">Sr.</th>
                                    <th width="400">Carpet Area</th>
                                    <th width="200">Super Built-up Area</th>
                                    <th width="100">Action</th>
                                    </tr></thead><tbody><tr><td><span class="counter">1</span></td><td><input type="text" name="commerical[carpet_area][0]" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></td>
                                    <td><input type="text" name="commerical[super_builtup_area][0]" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area">
                                    </td>
                                    <td><div data-id="0" class="RentdelelteItemCommercialArea" ><i class="fa fa-times"></i></div></td></tr></tbody></table>
                                <div class="add-new-btn text-right d-block" style="float:right"><input type="button" value="Add New Area" data-id="0" class="RentAddNewRowCommercialArea btn btn-primary"></div>
                                
                                 
                              </div>
                              
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label><span class="office_number">Office Number</span><span class="required_field">*</span></label>
                                    <input type="text" placeholder="Office Number"  name="number_of_private_washroom" class="form-control required number" />
                                 </div>
                              </div>
                              
                              
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Property Available Date</label>
                                    <input type="text" placeholder="Property Available Date"  name="PropertyAvailableDate" class="form-control" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Private Washroom</label>
                                    <input type="text" placeholder="No of Private Washroom"  name="number_of_private_washroom" class="form-control" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Shared Washroom</label>
                                    <input type="text" placeholder="No of Shared Washroom"  name="number_of_shared_washroom" class="form-control" />
                                 </div>
                              </div>
                              <div class="col-md-3 retail_type_hide">
                                 <div class="form-group">
                                    <label> Conference Room </label>
                                    <select class="select2 form-control" name="conference_room">
                                       <option value="Available">Available</option>
                                       <option value="Not Available">Not Available</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3 retail_type_hide">
                                 <div class="form-group">
                                    <label>Reception Area</label>
                                    <select class="form-control select2" name="reception_area">
                                       <option value="Available">Available</option>
                                       <option value="Not Available">Not Available</option>
                                     
                                    </select>
                                 </div>
                              </div>
                              
                              
                              <div class="col-sm-3"><label class="control-label">Expected Rent<span class="required_field">*</span></label><input type="text" class="form-control" placeholder="Expected Rent" value=""></div>
                              <div class="col-sm-3"><label class="control-label">Advance Rent</label><input type="text" class="form-control number" placeholder="Advance Rent" value=""></div>
                              
                              <div class="col-sm-3">
            
                <label class="control-label">
                Deposit Amount
                </label>
                <input type="text" class="form-control number" placeholder="Deposit Amount" value="">
                </div>
        	
		
			
            <div class="form-group row label-floating is-empty">
            <div class="col-sm-10">
            <input type="checkbox"  value="Electricity Excluded">
            &nbsp;<label>Electricity Excluded</label>&nbsp;&nbsp;&nbsp;
            <input type="checkbox"  value="Servant Room">
            &nbsp;<label>Property Tax excluded</label>&nbsp;&nbsp;&nbsp;
            <input type="checkbox"   value="Store Room">
            &nbsp;<label>Maintenance Excluded</label>&nbsp;&nbsp;&nbsp;
			<input type="checkbox" value="Theater Room">
            &nbsp;<label>Price Negotiable</label>&nbsp;&nbsp;&nbsp;
				
            </div>
            </div>
            
            <div class="row">
  <div class="col-md-3">
    <div class="form-group">
      <label>Hydraulic Parking &nbsp;&nbsp;&nbsp;
        <input class="form-check-input hydraulic_parking" type="radio" data-type="" data-value="CommercialOfficeHydraulicParking" data-val="Yes" name="CommercialOfficeHydraulicParking" value="Yes">
        &nbsp;&nbsp;Yes&nbsp;&nbsp;
        <input class="form-check-input hydraulic_parking" checked="" data-type="" data-value="CommercialOfficeHydraulicParking" data-val="No" type="radio" name="CommercialOfficeHydraulicParking" value="No">
        &nbsp;&nbsp;No&nbsp;</label>
    </div>
  </div>
  <div class="col-sm-4" style="display:none" id="hydraulic_parking__CommercialOfficeHydraulicParking">
    <input type="text" name="CommercialOfficeHydraulicParkingNumber" class="form-control" placeholder="Hydraulic Parking" value="">
  </div>
</div>

			 
                              <div class="col-sm-12 PropertyFeatures">
                                    <label class="control-label"> Fire Safety Measures </label>
                                    <ul>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Exitnguisher"/> Exitnguisher</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Sprikeelr"/> Sprikeelr</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Sensors"/> Sensors</li>
                                    </ul>
                                 </div>
                                 
                    
                    
                    <div class="row">
            <div class="col-md-4">
            <div class="form-group">
            <label>Long Turm Lease &nbsp;&nbsp;&nbsp;
            <input name="RentCommericalOfficeLongTurmLease" class="form-check-input is_penthouse" type="radio"   data-val="Yes" value="Yes">&nbsp;&nbsp;
            Yes&nbsp;&nbsp;
            <input name="RentCommericalOfficeLongTurmLease"  type="radio"   class="form-check-input" checked  value="No">&nbsp;&nbsp;No&nbsp;</label>
            </div>
            </div></div>             	
			
			 <div class="row"><div class="col-sm-4">
            
                <label class="control-label">
                Duration of Aggrement
                </label>
                <input type="text" class="form-control" placeholder="DurationofAggrement" value="">
                </div>
        	
		
			
			
			 <div class="col-sm-4">
            
             <label class="control-label">
             Month Of Notice
             </label>
             <input type="text" class="form-control" placeholder="Month Of Notice" value="">
             </div>
        	<div class="col-sm-4">
            <label class="control-label">
            What makes your property unique
            </label>
            <input type="text" class="form-control" placeholder="What makes your property unique" value="">
            </div>
        	</div>
            
            
			 <div class="row"><div class="col-sm-12">
            
             <label class="control-label">
             Yearly Rent is excepted to Increase By
                </label>
                <input type="text" class="form-control" placeholder="Yearly Rent is excepted to Increase By" value="">
                </div>
        	</div>
            
            <div class="row">
        	
				 <div class="col-sm-4">
            
                <label class="control-label">
                Index Copy<span class="required_field">*</span>
                </label>
                <input type="file" name="propertyDetails['+property_type+']['+value+'][IndexCopy]" class="form-control number required" placeholder="Duration of Agreement" value="">
                </div>
        	
		
			
			
			 <div class="col-sm-4">
            
                <label class="control-label">
                Adhar Card<span class="required_field">*</span>
                </label>
                <input type="file" name="propertyDetails['+property_type+']['+value+'][AdharCard]" class="form-control number required" value="">
                </div>
        	
		
			 <div class="col-sm-4">
            
                <label class="control-label">
                Municipality Tax Bill<span class="required_field">*</span>
                </label>
                <input type="file" name="propertyDetails['+property_type+']['+value+'][MunicipalityTaxBill]" class="form-control number required" value="">
                </div>
        	
		
            </div>
			
			
			<div class="row rent_commerical_office_prop">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Your office was previous used for?&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="rent_commerical_used_office"   value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked  type="radio" name="rent_commerical_used_office"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="row rent_commerical_retail_prop">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Your shop/showroom was previous used for?&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="rent_commerical_used_retail"   value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked  type="radio" name="rent_commerical_used_retail"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
		
                           </div>
                        </div>
                        
                        <div class="rent_commercial_hospital_prop">
                        	<div class="row">
                              
                              
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Select Area<span class="required_field">*</span></label>
                                   <select name="rent_commercial_property_areas" id="rent_commercial_property_areas" class="select2 form-control" >
                                                 <option value="Square Yard" >Square Yard</option>
                                                <option value="Square Feet" >Square Feet</option>
                                                <option value="Square Meter" >Square Meter</option>
                                             
                                             </select>
                                 </div>
                              </div>
                              
                              <div class="col-md-12">
                              	<table class="table rent_commercial_hospital_area table-bordered table-hover  table-striped">
                                	<thead class="thead-primary">
                                    <tr><th width="30">Sr.</th>
                                    <th width="400">Ploat Area</th>
                                    <th width="400">Carpet Area</th>
                                    <th width="200">Super Built-up Area</th>
                                    <th width="100">Action</th>
                                    </tr></thead><tbody>
                                    <tr>
                                    <td><span class="counter">1</span></td>
                                    <td><input type="text" name="rent_commercial_hospital_area[ploat_area][0]" class="ploat_area_txt form-control required number" placeholder="Ploat Area"></td>
                                    
                                    <td><input type="text" name="rent_commercial_hospital_area[carpet_area][0]" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></td>
                                    <td><input type="text" name="rent_commercial_hospital_area[super_builtup_area][0]" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area">
                                    </td>
                                    <td><div data-id="0" class="delelteItemRentCommercialAreaHospital" ><i class="fa fa-times"></i></div></td></tr></tbody></table>
                                <div class="add-new-btn text-right d-block" style="float:right"><input type="button" value="Add New Area" data-id="0" class="AddNewRowRentCommercialAreaHospital btn btn-primary"></div>
                                
                                 
                              </div>
                              
             <div class="form-group row label-floating is-empty">
                <label class="col-sm-2 control-label">
                Furnishing
                </label>
                <div class="col-sm-10">
                <input type="radio" class="rent_furnicher" data-type="rent_commerical_hospital" data-value="hospital" name="rent_commerical_hospital" value="Furnished">
                &nbsp;<label>Furnished</label>&nbsp;&nbsp;&nbsp;
                <input type="radio" class="rent_furnicher" data-type="rent_commerical_hospital" data-value="hospital" name="rent_commerical_hospital" value="Semi-furnished">
                &nbsp;<label>Semi-furnished</label>&nbsp;&nbsp;&nbsp;
                <input type="radio" class="rent_furnicher" data-type="rent_commerical_hospital'" data-value="hospital" checked name="rent_commerical_hospital" value="Un furnished">
                &nbsp;<label>Un furnished</label>&nbsp;&nbsp;&nbsp;
                </div>
            </div>
			
            		<div class="form-group ferunicher_rent_data row label-floating is-empty" id="property_furn_rent_commerical_hospital_hospital" style="display:none;">
  <div class="col-sm-2"></div>
  <div class="col-sm-10 PropertyFeatures">
    <ul>
      <li><input type="checkbox"   value="Light" name="furnished_data[]" /> Light </li>
      <li><input type="checkbox"   value="fans" name="furnished_data[]" /> fans </li>
      <li><input type="checkbox"   value="AC" name="furnished_data[]" /> AC </li>
      <li><input type="checkbox"   value="TV" name="furnished_data[]" /> TV </li>
      <li><input type="checkbox"   value="Beds" name="furnished_data[]" /> Beds </li>
      <li><input type="checkbox"   value="Wardrobe" name="furnished_data[]" /> Wardrobe </li>
      <li><input type="checkbox"   value="Geyser" name="furnished_data[]" /> Geyser </li>
      <li><input type="checkbox"   value="Sofa" name="furnished_data[]" /> Sofa </li>
      <li><input type="checkbox"   value="Washing machine" name="furnished_data[]" /> Washing machine </li>
      <li><input type="checkbox"   value="Stove" name="furnished_data[]" /> Stove </li>
      <li><input type="checkbox"   value="fridge" name="furnished_data[]" /> fridge </li>
      <li><input type="checkbox"   value="water purifier" name="furnished_data[]" /> water purifier </li>
      <li><input type="checkbox"   value="microwave" name="furnished_data[]" /> microwave </li>
      <li><input type="checkbox" value="modular kitchen" name="furnished_data[]" /> modular kitchen </li>
      <li><input type="checkbox" value="Chimney" name="furnished_data[]" /> Chimney </li>
      <li><input type="checkbox"  value="Dinning Table" name="furnished_data[]" /> Dinning Table </li>
      <li><input type="checkbox" value="Curtains" name="furnished_data[]" /> Curtains </li>
      <li><input type="checkbox"   value="Exhaust Fan" name="furnished_data[]" /> Exhaust Fan </li>
     </ul>
   </div>
 </div>
 <div class="form-group row ferunicher_rent_data label-floating is-empty" id="property_semi_furn_rent_commerical_hospital_hospital" style="display:none;">
   <div class="col-sm-2"></div>
   <div class="col-sm-10 PropertyFeatures">
    <ul>
      <li><input type="checkbox"   value="Light" name="furnished_data[]" /> Light </li>
      <li><input type="checkbox"   value="fans" name="furnished_data[]" /> fans </li>
      <li><input type="checkbox"   value="AC" name="furnished_data[]" /> AC </li>
      <li><input type="checkbox"   value="TV" name="furnished_data[]" /> TV </li>
      <li><input type="checkbox"   value="Beds" name="furnished_data[]" /> Beds </li>
      <li><input type="checkbox"   value="Wardrobe" name="furnished_data[]" /> Wardrobe </li>
      <li><input type="checkbox"   value="Geyser" name="furnished_data[]" /> Geyser </li>
      <li><input type="checkbox"   value="Sofa" name="furnished_data[]" /> Sofa </li>
      <li><input type="checkbox"   value="Washing machine" name="furnished_data[]" /> Washing machine </li>
      <li><input type="checkbox"   value="Stove" name="furnished_data[]" /> Stove </li>
      <li><input type="checkbox"   value="fridge" name="furnished_data[]" /> fridge </li>
      <li><input type="checkbox"   value="water purifier" name="furnished_data[]" /> water purifier </li>
      <li><input type="checkbox"   value="microwave" name="furnished_data[]" /> microwave </li>
      <li><input type="checkbox" value="modular kitchen" name="furnished_data[]" /> modular kitchen </li>
      <li><input type="checkbox" value="Chimney" name="furnished_data[]" /> Chimney </li>
      <li><input type="checkbox"  value="Dinning Table" name="furnished_data[]" /> Dinning Table </li>
      <li><input type="checkbox" value="Curtains" name="furnished_data[]" /> Curtains </li>
      <li><input type="checkbox"   value="Exhaust Fan" name="furnished_data[]" /> Exhaust Fan </li>
     </ul>
  </div>
</div>

                              
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Rooms</label>
                                    <input type="text" placeholder="No of Rooms"  name="NoofRooms" class="form-control number" />
                                 </div>
                              </div>
                              
                              
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No Washroom <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No Washroom"  name="NoWashroom " class="form-control required number" />
                                 </div>
                              </div>
                              
                              
                              
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No Of Balconies<span class="required_field">*</span></label>
                                    <input type="text" placeholder="No Of Balconies"  name="NoOfBalconies" class="form-control required number" />
                                 </div>
                              </div>
                              
                              <div class="col-sm-3"><label class="control-label">Expected Rent<span class="required_field">*</span></label><input type="text" class="form-control" placeholder="Expected Rent" value=""></div>
                              <div class="col-sm-3"><label class="control-label">Advance Rent</label><input type="text" class="form-control number" placeholder="Advance Rent" value=""></div>
                              
                              <div class="col-sm-3">
            
                <label class="control-label">
                Deposit Amount
                </label>
                <input type="text" class="form-control number" placeholder="Deposit Amount" value="">
                </div>
        	
		
			
            <div class="form-group row label-floating is-empty">
            <div class="col-sm-10">
            <input type="checkbox"  value="Electricity Excluded">
            &nbsp;<label>Electricity Excluded</label>&nbsp;&nbsp;&nbsp;
            <input type="checkbox"  value="Servant Room">
            &nbsp;<label>Property Tax excluded</label>&nbsp;&nbsp;&nbsp;
            <input type="checkbox"   value="Store Room">
            &nbsp;<label>Maintenance Excluded</label>&nbsp;&nbsp;&nbsp;
			<input type="checkbox" value="Theater Room">
            &nbsp;<label>Price Negotiable</label>&nbsp;&nbsp;&nbsp;
				
            </div>
            </div>
			 
                              <div class="row">
                           		<div class="col-md-12">
                                	<label class="d-block">Property Ownership: </label>
                                	<input type="radio"  name="Plottingproperty_ownership" checked="checked"  value="Freehold">
                                    &nbsp;
                                    <label class="fw-normal">Freehold</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"  name="Plottingproperty_ownership"    value="Leases hold">
                                    &nbsp;
                                    <label class="fw-normal">Leases hold</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="Plottingproperty_ownership"   value="Cooperative">
                                    &nbsp;
                                    <label class="fw-normal">Cooperative</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="Plottingproperty_ownership"   value="Power of attorney">
                                    &nbsp;
                                    <label class="fw-normal">Power of attorney</label>
                                    &nbsp;&nbsp;&nbsp;
                                </div>
                           </div>
                           
                           
                           
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>It is pre-Leased / pre rented? &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="Industrialpre_leased"   value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked  type="radio" name="Industrialpre_leased"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                           <div class="row ">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label> Is your office Fire NOC Certified?  &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio"  name="Industrialfire_noc_certified"  value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked="checked"   type="radio" name="Industrialfire_noc_certified"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                           
                                 
                                 	
			
			 
            
            
			 
            
            <div class="row">
        	
				 <div class="col-sm-3">
            
                <label class="control-label">
                Index Copy<span class="required_field">*</span>
                </label>
                <input type="file" name="propertyDetails['+property_type+']['+value+'][IndexCopy]" class="form-control number required" placeholder="Duration of Agreement" value="">
                </div>
        	
		
			
			
			 <div class="col-sm-3">
            
                <label class="control-label">
                Adhar Card<span class="required_field">*</span>
                </label>
                <input type="file" name="propertyDetails['+property_type+']['+value+'][AdharCard]" class="form-control number required" value="">
                </div>
        	
		
			 <div class="col-sm-3">
            
                <label class="control-label">
                Municipality Tax Bill<span class="required_field">*</span>
                </label>
                <input type="file" name="propertyDetails['+property_type+']['+value+'][MunicipalityTaxBill]" class="form-control number required" value="">
                </div>
        	
		 <div class="col-sm-3">
            
                <label class="control-label">
                Light Bill<span class="required_field">*</span>
                </label>
                <input type="file" name="propertyDetails['+property_type+']['+value+'][MunicipalityTaxBill]" class="form-control number required" value="">
                </div>
        	
		
            </div>
            
            
			
			
			<div class="row rent_commerical_office_prop">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Your office was previous used for?&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="rent_commerical_used_office"   value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked  type="radio" name="rent_commerical_used_office"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="row rent_commerical_retail_prop">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Your shop/showroom was previous used for?&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="rent_commerical_used_retail"   value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked  type="radio" name="rent_commerical_used_retail"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
		
                           </div>
                        </div>
                        
                        
                        <div class="rent_commercial_space_prop">
                        	<div class="row">
                              
                              
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Select Area<span class="required_field">*</span></label>
                                   <select name="rent_commercial_property_areas1" class="select2 form-control" >
                                                 <option value="Square Yard" >Square Yard</option>
                                                <option value="Square Feet" >Square Feet</option>
                                                <option value="Square Meter" >Square Meter</option>
                                             
                                             </select>
                                 </div>
                              </div>
                              
                              <div class="col-md-12">
                              	<table class="table rent_commercial_space_area table-bordered table-hover  table-striped">
                                	<thead class="thead-primary">
                                    <tr><th width="30">Sr.</th>
                                    <th width="400">Carpet Area</th>
                                    <th width="200">Super Built-up Area</th>
                                    <th width="100">Action</th>
                                    </tr></thead><tbody><tr><td><span class="counter">1</span></td><td><input type="text" name="rent_commercial_space[carpet_area][0]" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></td>
                                    <td><input type="text" name="rent_commercial_space[super_builtup_area][0]" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area">
                                    </td>
                                    <td><div data-id="0" class="delelteItemRentCommercialSpaceArea" ><i class="fa fa-times"></i></div></td></tr></tbody></table>
                                <div class="add-new-btn text-right d-block" style="float:right"><input type="button" value="Add New Area" data-id="0" class="AddNewRowCommercialSpaceArea btn btn-primary"></div>
                                
                                 
                              </div>
                              
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Entrance width</label>
                                    <input type="text" name="entrance_width"  class="form-control" />
                                 </div>
                              </div>
                              <div class="col-md-3 ">
                                 <div class="form-group">
                                    <label>Ceiling Heights</label>
                                    <input type="text" name="ceiling_heights"  class="form-control" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Private Washroom</label>
                                    <input type="text" placeholder="No of Private Washroom"  name="number_of_private_washroom" class="form-control" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Shared Washroom </label>
                                    <input type="text" placeholder="No of Shared Washroom"  name="number_of_shared_washroom" class="form-control" />
                                 </div>
                              </div>
                              <div class="col-sm-12 PropertyFeatures">
                                    <div class="form-group">
                                    <label class="control-label">Facilities</label>
                                   
                                  
                                    <ul>
                                       <li><input type="checkbox"   name="facilities[]"  value="Furnishing"/> Furnishing</li>
                                       <li><input type="checkbox" name="facilities[]" value="Central air conditioning"/> Central air conditioning</li>
                                       <li><input type="checkbox" name="facilities[]" value="Oxygen Duct"/> Oxygen Duct</li>
                                       <li><input type="checkbox" name="facilities[]" value="UPS"/> UPS</li>
                                    </ul>
                                 </div>
                                 </div>
                          
                             <div class="col-sm-12 PropertyFeatures">
                                    <div class="form-group">
                                   
                                    <label class="control-label"> Fire Safety Measures </label>
                                    <ul>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Exitnguisher"/> Exitnguisher</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Sprikeelr"/> Sprikeelr</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Sensors"/> Sensors</li>
                                    </ul>
                                 </div>
                                 </div>
                                 
                                 
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>No of Passenger lifts</label>
                                    <input type="text" placeholder="No of Passenger lifts"  name="number_of_passenger_lifts" class="form-control" />
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>No of Service Lift</label>
                                    <input type="text" placeholder="No of Service Lift"  name="number_of_service_lift" class="form-control" />
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>No of Staircases</label>
                                    <input type="text" placeholder="No of Staircases"  name="number_of_staircases" class="form-control" />
                                 </div>
                              </div>
                              
                              <div class="row ">
                              <div class="form-group">
                                 <div class="col-sm-12 PropertyFeatures">
                                    <label class="control-label"> Suitable business Type</label>
                                    <ul>
                                    
                                       <li><input type="checkbox"  name="suitable_business_type[]" value="Hospital"/> Hospital</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Restaurant"/> Restaurant</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Banquette"/> Banquette</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Gym"/> Gym</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Hotel"/> Hotel</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Guest house"/> Guest house</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Conference "/> Conference </li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Hall"/> Hall</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="IT Hub"/> IT Hub </li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Spa"/> Spa</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Corporate Banquette"/> Corporate Banquette</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Shopping mall"/> Shopping mall</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Multiplex"/> Multiplex</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="miniplex"/> miniplex</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of parking allotted <span class="required_field">*</span></label>
                                        <input type="text" placeholder="No of parking allotted "  name="number_of_hydraulic_Parking" class="form-control required number" />
                                 </div>
                              </div>
                              </div>
                              
                              <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Private parking in basement &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input hydraulic_parking" type="radio" data-type="" data-value="RentCommercialPrivateparkinginbasement" data-val="Yes" name="RentCommercialPrivateparkinginbasement" value="Yes">
                                    &nbsp;&nbsp;Yes&nbsp;&nbsp;
                                    <input class="form-check-input hydraulic_parking" checked="" data-type="" data-value="RentCommercialPrivateparkinginbasement" data-val="No" type="radio" name="RentCommercialPrivateparkinginbasement" value="No">
                                    &nbsp;&nbsp;No&nbsp;</label>
                                </div>
                              </div>
                              <div class="col-sm-4" style="display:none" id="hydraulic_parking__RentCommercialPrivateparkinginbasement">
                                <input type="text" name="RentCommercialPrivateparkinginbasementNumber" class="form-control" placeholder="Private parking in basement" value="">
                              </div>
                            </div>
                              
                              
                              <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label>Private parking outside &nbsp;&nbsp;&nbsp;
                                            <input class="form-check-input hydraulic_parking" type="radio" data-type="" data-value="RentCommercialPrivateparkingOutside" data-val="Yes" name="RentCommercialPrivateparkingOutside" value="Yes">
                                            &nbsp;&nbsp;Yes&nbsp;&nbsp;
                                            <input class="form-check-input hydraulic_parking" checked="" data-type="" data-value="RentCommercialPrivateparkingOutside" data-val="No" type="radio" name="RentCommercialPrivateparkingOutside" value="No">
                                            &nbsp;&nbsp;No&nbsp;</label>
                                        </div>
                                      </div>
                                      <div class="col-sm-4" style="display:none" id="hydraulic_parking__RentCommercialPrivateparkingOutside">
                                        <input type="text" name="RentCommercialPrivateparkingOutsideNumber" class="form-control" placeholder="Private parking outside" value="">
                                      </div>
                                    </div>
                                                                  
                              
                              <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Public Parking &nbsp;&nbsp;&nbsp;
                                        <input class="form-check-input hydraulic_parking" type="radio" data-type="" data-value="RentCommercialPublicParking" data-val="Yes" name="RentCommercialPublicParking" value="Yes">
                                        &nbsp;&nbsp;Yes&nbsp;&nbsp;
                                        <input class="form-check-input hydraulic_parking" checked="" data-type="" data-value="RentCommercialPublicParking" data-val="No" type="radio" name="RentCommercialPublicParking" value="No">
                                        &nbsp;&nbsp;No&nbsp;</label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4" style="display:none" id="hydraulic_parking__RentCommercialPublicParking">
                                    <input type="text" name="RentCommercialPublicParkingNumber" class="form-control" placeholder="Public Parking" value="">
                                  </div>
                                </div>
                              
                              <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Hydraulic Parking &nbsp;&nbsp;&nbsp;
                                        <input class="form-check-input hydraulic_parking" type="radio" data-type="" data-value="RentCommercialHydraulicParking" data-val="Yes" name="RentCommercialHydraulicParking" value="Yes">
                                        &nbsp;&nbsp;Yes&nbsp;&nbsp;
                                        <input class="form-check-input hydraulic_parking" checked="" data-type="" data-value="RentCommercialHydraulicParking" data-val="No" type="radio" name="RentCommercialHydraulicParking" value="No">
                                        &nbsp;&nbsp;No&nbsp;</label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4" style="display:none" id="hydraulic_parking__RentCommercialHydraulicParking">
                                    <input type="text" name="RentCommercialHydraulicParkingNumber" class="form-control" placeholder="Hydraulic Parking" value="">
                                  </div>
                                </div>
                              
                              <div class="row">
                           		<div class="col-md-12">
                                	<label class="d-block">Property Ownership: </label>
                                	<input type="radio"  name="RentCommericalSpacePlottingproperty_ownership" checked="checked"  value="Freehold">
                                    &nbsp;
                                    <label class="fw-normal">Freehold</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"  name="RentCommericalSpacePlottingproperty_ownership"    value="Leases hold">
                                    &nbsp;
                                    <label class="fw-normal">Leases hold</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="RentCommericalSpacePlottingproperty_ownership"   value="Cooperative">
                                    &nbsp;
                                    <label class="fw-normal">Cooperative</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="RentCommericalSpacePlottingproperty_ownership"   value="Power of attorney">
                                    &nbsp;
                                    <label class="fw-normal">Power of attorney</label>
                                    &nbsp;&nbsp;&nbsp;
                                </div>
                              <div class="col-sm-3"><label class="control-label">Expected Rent<span class="required_field">*</span></label><input type="text" class="form-control" placeholder="Expected Rent" value=""></div>
                              <div class="col-sm-3"><label class="control-label">Advance Rent</label><input type="text" class="form-control number" placeholder="Advance Rent" value=""></div>
                              
                              <div class="col-sm-3">
            
                <label class="control-label">
                Deposit Amount
                </label>
                <input type="text" class="form-control number" placeholder="Deposit Amount" value="">
                </div>
        	
		</div>
                           
			
            <div class="form-group row label-floating is-empty">
            <div class="col-sm-10">
            <input type="checkbox"  value="Electricity Excluded">
            &nbsp;<label>Electricity Excluded</label>&nbsp;&nbsp;&nbsp;
            <input type="checkbox"  value="Servant Room">
            &nbsp;<label>Property Tax excluded</label>&nbsp;&nbsp;&nbsp;
            <input type="checkbox"   value="Store Room">
            &nbsp;<label>Maintenance Excluded</label>&nbsp;&nbsp;&nbsp;
			<input type="checkbox" value="Theater Room">
            &nbsp;<label>Price Negotiable</label>&nbsp;&nbsp;&nbsp;
				
            </div>
            </div>
			 
             <div class="row"><div class="col-sm-12">
            
             <label class="control-label">
             Yearly Rent is excepted to Increase By
                </label>
                <input type="text" class="form-control" placeholder="Yearly Rent is excepted to Increase By" value="">
                </div>
        	</div>
                              
                                 
                                 	
			
			 
            
            
			 <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>It is pre-Leased / pre rented? &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="Industrialpre_leased"   value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked  type="radio" name="Industrialpre_leased"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                           <div class="row  ">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label> Is your office Fire NOC Certified?  &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio"  name="Industrialfire_noc_certified"  value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked="checked"   type="radio" name="Industrialfire_noc_certified"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
            
            
			
			
			<div class="row rent_commerical_office_prop">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Your office was previous used for?&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="rent_commerical_used_office"   value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked  type="radio" name="rent_commerical_used_office"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="row rent_commerical_retail_prop">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Your shop/showroom was previous used for?&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="rent_commerical_used_retail"   value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked  type="radio" name="rent_commerical_used_retail"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
		
                           </div>
                        <div class="row rent_industrial_prop">
                        	<div >
                           <div class="row">
                           <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Select Area<span class="required_field">*</span></label>
                                   <select name="rent_Industrial_property_areas" id="rent_Industrial_property_areas" class="select2 form-control" >
                                               <option value="Square Yard" >Square Yard</option>
                                                <option value="Square Feet" >Square Feet</option>
                                                <option value="Square Meter" >Square Meter</option>
                                             </select>
                                 </div>
                              </div>
                              
                              <div class="col-md-12">
  <table class="table rent_industrial_area table-bordered table-hover  table-striped">
    <thead class="thead-primary">
      <tr>
        <th width="30">Sr.</th>
        <th width="400">Plot Area</th>
        <th width="400">Plot Super Built-up Area</th>
        <th width="400">Construction Area</th>
        <th width="200">Construction Super Built-up Area</th>
        <th width="100">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><span class="counter">1</span></td>
        <td><input type="text" name="Rentindustrial_area[plot_area][0]" class="plot_area_txt form-control required number" placeholder="Plot Area"></td>
        <td><input type="text" name="Rentindustrial_area[plot_built_area][0]" class="plot_built_area_txt form-control required number" placeholder="Plot Super Built-up Area"></td>
        <td><input type="text" name="Rentindustrial_area[construction_area][0]" class="construction_area_txt form-control required number" placeholder="Construction Area"></td>
        <td><input type="text" name="Rentindustrial_area[construction_built_area][0]" class="construction_built_area_txt form-control required number" placeholder="Construction Super Built-up Area"></td>
       
        <td><div data-id="0" class="RentdelelteItemIndustrialArea" ><i class="fa fa-times"></i></div></td>
      </tr>
    </tbody>
  </table>
  <div class="add-new-btn text-right d-block" style="float:right">
    <input type="button" value="Add New Area" data-id="0" class="RentAddNewRowIndustrialArea btn btn-primary">
  </div>
</div>

                           </div>
                           <div class="row">
                              <div class="form-group">
                                 <div class="col-sm-12 PropertyFeatures">
                                    <label class="control-label"> Fire Safety Measures </label>
                                    <ul>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Exitnguisher"/> Exitnguisher</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Sprikeelr"/> Sprikeelr</li>
                                       <li class="sell_commericil_retail sell_commericil_space"><input type="checkbox" name="fire_safety_measures[]" value="Sensors"/> Sensors</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="row ">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of washrooms</label>
                                    <input type="text" placeholder="No of washrooms"  name="number_of_parking" class="form-control" />
                                 </div>
                              </div>
                              
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Property Available Date</label>
                                    <input type="text" placeholder="Property Available Date" name="PropertyAvailableDate" class="form-control">
                                 </div>
                              </div>
                                  <div class="col-sm-3"><label class="control-label">Expected Rent<span class="required_field">*</span></label><input type="text" class="form-control" placeholder="Expected Rent" value=""></div>
                              <div class="col-sm-3"><label class="control-label">Advance Rent</label><input type="text" class="form-control number" placeholder="Advance Rent" value=""></div>
                              
                              <div class="col-sm-3">
            
                <label class="control-label">
                Deposit Amount
                </label>
                <input type="text" class="form-control number" placeholder="Deposit Amount" value="">
                </div>
        	
		
			
            <div class="form-group row label-floating is-empty">
            <div class="col-sm-10">
            <input type="checkbox"  value="Electricity Excluded">
            &nbsp;<label>Electricity Excluded</label>&nbsp;&nbsp;&nbsp;
            <input type="checkbox"  value="Servant Room">
            &nbsp;<label>Property Tax excluded</label>&nbsp;&nbsp;&nbsp;
            <input type="checkbox"   value="Store Room">
            &nbsp;<label>Maintenance Excluded</label>&nbsp;&nbsp;&nbsp;
			<input type="checkbox" value="Theater Room">
            &nbsp;<label>Price Negotiable</label>&nbsp;&nbsp;&nbsp;
				
            </div>
            </div>
            
            
                           </div>
            <div class="row"><div class="col-sm-12">
            
             <label class="control-label">
             Yearly Rent is excepted to Increase By
                </label>
                <input type="text" class="form-control" placeholder="Yearly Rent is excepted to Increase By" value="">
                </div>
        	</div>
            
            <div class="row">
            <div class="col-md-4">
            <div class="form-group">
            <label>Long Turm Lease &nbsp;&nbsp;&nbsp;
            <input name="RentCommericalHosLongTurmLease" class="form-check-input is_penthouse" type="radio"   data-val="Yes" value="Yes">&nbsp;&nbsp;
            Yes&nbsp;&nbsp;
            <input name="RentCommericalHosLongTurmLease"  type="radio"   class="form-check-input" checked  value="No">&nbsp;&nbsp;No&nbsp;</label>
            </div>
            </div></div>
            <div class="row">
        	
				 <div class="col-sm-4">
            
                <label class="control-label">
                Index Copy<span class="required_field">*</span>
                </label>
                <input type="file" name="propertyDetails['+property_type+']['+value+'][IndexCopy]" class="form-control number required" placeholder="Duration of Agreement" value="">
                </div>
        	
		
			
			
			 <div class="col-sm-4">
            
                <label class="control-label">
                Adhar Card<span class="required_field">*</span>
                </label>
                <input type="file" name="propertyDetails['+property_type+']['+value+'][AdharCard]" class="form-control number required"  value="">
                </div>
        	
		
			 <div class="col-sm-4">
            
                <label class="control-label">
                Municipality Tax Bill<span class="required_field">*</span>
                </label>
                <input type="file" name="propertyDetails['+property_type+']['+value+'][MunicipalityTaxBill]" class="form-control number required"  value="">
                </div>
        	
		
            </div>    
            
            <div class="row"><div class="col-sm-4">
            
                <label class="control-label">
                Duration of Aggrement
                </label>
                <input type="text" class="form-control" placeholder="DurationofAggrement" value="">
                </div>
        	
		
			
			
			 <div class="col-sm-4">
            
             <label class="control-label">
             Month Of Notice
             </label>
             <input type="text" class="form-control" placeholder="Month Of Notice" value="">
             </div>
        	<div class="col-sm-4">
            <label class="control-label">
            What makes your property unique
            </label>
            <input type="text" class="form-control" placeholder="What makes your property unique" value="">
            </div>
        	</div>           
                  
                  
                  <div class="row" style="">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Your park/shade was previous used for?&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="rent_ind_used" value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked="" type="radio" name="rent_ind_used" value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>         
                           
                           
                           
                           
                           
                        </div>
                        </div>
                        <div class="sell_plotting_prop">
                        
                        	
                           <div class="row">
                                          <?php /*?><div class="col-md-4">
                                              <div class="form-group">
                               
                                            <label>Select Area</label>
                                      		 <select name="Plottingproperty_areas" id="Plottingproperty_areas" class="select2 form-control" >
                                                <option value="Square Yard">Square Yard</option>
                                                <option value="Square Feet">Square Feet</option>
                                                <option value="Square Meter">Square Meter</option>
                                                <option value="Acer's">Acer's</option>
                                             
                                             </select>
                                             </div>
                                          </div><?php */?>
                              
                              <div class="col-md-12">
                                 <div class="col-md-12">
  <table class="table ploat_area_table table-bordered table-hover  table-striped">
    <thead class="thead-primary">
      <tr>
        <th width="30">Sr.</th>
        <th width="400">Ploat Area</th>
        <th width="100">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><span class="counter">1</span></td>
        <td><input type="text" name="ploating_area[ploat_area][0]" class="ploat_area_txt form-control required number" placeholder="Ploat Area"></td>
       
        <td><div data-id="0" class="delelteItemPloatArea" ><i class="fa fa-times"></i></div></td>
      </tr>
    </tbody>
  </table>
  <div class="add-new-btn text-right d-block" style="float:right">
    <input type="button" value="Add New Area" data-id="0" class="AddNewRowPloatArea btn btn-primary">
  </div>
</div>

                              </div>
                           </div>
                           <?php /*?><div class="form-group row label-floating is-empty">
                              <label  class="col-sm-2 control-label"> Property Status <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 <input type="radio"  name="Plottingpropertystatus" data-id="0" data-type="PlottingpropertyStatus" class="propertystatus" checked="checked" value="Ready to move">
                                 &nbsp;
                                 <label for="">Ready to move</label>
                                 &nbsp;&nbsp;&nbsp;
                                 <input type="radio" class="propertystatus" data-id="0" data-type="PlottingpropertyStatus" name="Plottingpropertystatus" value="Under Construction">
                                 &nbsp;
                                 <label for="">Under Construction</label>
                                 &nbsp;&nbsp;&nbsp; 
                              </div>
                           </div><?php */?>
                           <?php /*?><div class="form-group row label-floating is-empty" id="age_property_div_PlottingpropertyStatus_0" style="display:flex;">
                              <label  class="col-sm-2 control-label"> Age of Property <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                      {!! Form::select('Plottingage_of_property', $age_of_property,'',['class' => 'select2 required form-control', 'id' => 'Plottingage_of_property']) !!}
                                </div>
                           </div><?php */?>
                           <?php /*?><div class="form-group row label-floating is-empty" id="possesion_by_div_PlottingpropertyStatus_0" style="display:none;">
                              <label  class="col-sm-2 control-label"> Possession Date <span class="required_field">*</span></label>
                              
                              <div class="col-sm-2">
                	 {!! Form::select('Plottingpossession_month', $MonthNameList,'',['class' => 'select2 required form-control']) !!}

                  </div>  
                  <div class="col-sm-2">
                	{!! Form::select('Plottingpossession_year', $yearList,'',['class' => 'select2 required form-control']) !!}
					
                </div>
                           
                           </div><?php */?>
                           <div class="PlottingPricingBlock">
                           <div class="row">
                           		<div class="col-md-12">
                                	<label class="d-block">Property Ownership: </label>
                                	<input type="radio"  name="Plottingproperty_ownership" checked="checked"  value="Freehold">
                                    &nbsp;
                                    <label class="fw-normal">Freehold</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"  name="Plottingproperty_ownership"    value="Leases hold">
                                    &nbsp;
                                    <label class="fw-normal">Leases hold</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="Plottingproperty_ownership"   value="Cooperative">
                                    &nbsp;
                                    <label class="fw-normal">Cooperative</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="Plottingproperty_ownership"   value="Power of attorney">
                                    &nbsp;
                                    <label class="fw-normal">Power of attorney</label>
                                    &nbsp;&nbsp;&nbsp;
                                </div>
                           </div>
                           <div class="row">
                           		<div class="col-md-3">
                                	<div class="form-group">
                                    	<label>Expected Price <span class="basic_price_converstion"></span> <span class="required_field">*</span></label>
                                        <input type="text"  onkeyup="calculateBasicPrice()"  onchange="calculateBasicPrice()" class="form-control required number" name="PlottingExpectedPrice" placeholder="Expected Price" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                	<div class="form-group">
                                    	<label>Basic Price <span class="required_field">*</span></label>
                                        <input type="text" style="background:#eee;"  readonly="readonly" disabled="disabled" class="form-control" name="PlottingBasicPrice" placeholder="Basic Price" />
                                    </div>
                                </div>
                                
                                
                           </div>
                           
                           <div class="row">
                                	<div class="col-md-3">
                    				<div class="form-group">
                    				<label>Tax and gov charges? &nbsp;&nbsp;&nbsp;
                    				<input onchange="ShowPriceExtra('sell_ploting','sell_ploting_tax_gov_charges','Yes')" name="sell_ploting_gov_charges" class="form-check-input" type="radio"   data-val="Yes" value="Yes">&nbsp;&nbsp;
                    				Yes&nbsp;&nbsp;
                    				<input onchange="ShowPriceExtra('sell_ploting','sell_ploting_tax_gov_charges','No')" name="sell_ploting_gov_charges" type="radio"   class="form-check-input" checked  value="No">&nbsp;&nbsp;No&nbsp;</label>
                    				</div>
                    				</div>
									<div class="col-sm-4 sell_ploting_tax_gov_charges" style="display:none;" >
            							<input type="text" class="form-control number required" placeholder="Tax and gov charges" value="">
                			</div>
                                </div>
                           <div class="row">
                           		<div class="col-md-12">
                                	<label>Total Price: <span class="PlottingTotalPrice">0.00</span></label>
                                </div>
                           </div>
                           </div>
                        </div>
                        
                        <div class="sell_vacant_land_prop">
                        
                        	
                           <div class="row">
                                          <div class="col-md-4">
                                              <div class="form-group">
                               
                                            <label>Select Area</label>
                                      		 <select name="VacantLandproperty_areas" id="VacantLandproperty_areas" class="select2 form-control" >
                                                <option value="Square Yard">Square Yard</option>
                                                <option value="Square Feet">Square Feet</option>
                                                <option value="Square Meter">Square Meter</option>
                                                <option value="Acer's">Acer's</option>
                                                <option value="Biga">Biga</option>
                                                
                                             
                                             </select>
                                             </div>
                                          </div>
                              
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Land Area<span class="required_field">*</span> </label>
                                    <input type="text" placeholder="Land Area" onkeyup="calculateBasicPrice()" onchange="calculateBasicPrice()"  name="VacantLandCarpetarea" class="form-control required number" />
                                 </div>
                              </div>
                           </div>
                           
                           
                           
                           <div class="VacantLandPricingBlock">
                           <div class="row">
                           		<div class="col-md-12">
                                	<label class="d-block">Property Ownership: </label>
                                	<input type="radio"  name="VacantLandproperty_ownership" checked="checked"  value="Freehold">
                                    &nbsp;
                                    <label class="fw-normal">Freehold</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"  name="VacantLandproperty_ownership"    value="Leases hold">
                                    &nbsp;
                                    <label class="fw-normal">Leases hold</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="VacantLandproperty_ownership"   value="Cooperative">
                                    &nbsp;
                                    <label class="fw-normal">Cooperative</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="VacantLandproperty_ownership"   value="Power of attorney">
                                    &nbsp;
                                    <label class="fw-normal">Power of attorney</label>
                                    &nbsp;&nbsp;&nbsp;
                                </div>
                           </div>
                           <div class="row">
                           		<div class="col-md-4">
                                	<div class="form-group">
                                    	<label>Expected Price <span class="basic_price_converstion"></span> <span class="required_field">*</span></label>
                                        <input type="text"  onkeyup="calculateBasicPrice()"  onchange="calculateBasicPrice()" class="form-control required number" name="VacantLandExpectedPrice" placeholder="Expected Price" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                	<div class="form-group">
                                    	<label>Basic Price <span class="required_field">*</span></label>
                                        <input type="text" style="background:#eee;"  readonly="readonly" disabled="disabled" class="form-control" name="VacantLandBasicPrice" placeholder="Basic Price" />
                                    </div>
                                </div>
                                
                                
                           </div>
                           
                           <div class="row">
                                	<div class="col-md-3">
                    				<div class="form-group">
                    				<label>Tax and gov charges? &nbsp;&nbsp;&nbsp;
                    				<input onchange="ShowPriceExtra('sell_vacantland','sell_vacantland_tax_gov_charges','Yes')" name="sell_vacantland_tax_gov_charges" class="form-check-input" type="radio"   data-val="Yes" value="Yes">&nbsp;&nbsp;
                    				Yes&nbsp;&nbsp;
                    				<input onchange="ShowPriceExtra('sell_vacantland','sell_vacantland_tax_gov_charges','No')" name="sell_vacantland_tax_gov_charges" type="radio"   class="form-check-input" checked  value="No">&nbsp;&nbsp;No&nbsp;</label>
                    				</div>
                    				</div>
									<div class="col-sm-4 sell_vacantland_tax_gov_charges" style="display:none;" >
            							<input type="text" class="form-control number required" placeholder="Tax and gov charges" value="">
                			</div>
                                </div>
                           <div class="row">
                           		<div class="col-md-12">
                                	<label>Total Price: <span class="VacantLandTotalPrice">0.00</span></label>
                                </div>
                           </div>
                           </div>
                        </div>
                        <div class="sell_industrial_prop sell_industrial_prop_hide">
                           <div class="row">
                           <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Select Area<span class="required_field">*</span></label>
                                   <select name="Industrial_property_areas" id="Industrial_property_areas" class="select2 form-control" >
                                               <option value="Square Yard" >Square Yard</option>
                                                <option value="Square Feet" >Square Feet</option>
                                                <option value="Square Meter" >Square Meter</option>
                                             </select>
                                 </div>
                              </div>
                              
                              <div class="col-md-12">
  <table class="table industrial_area table-bordered table-hover  table-striped">
    <thead class="thead-primary">
      <tr>
        <th width="30">Sr.</th>
        <th width="400">Plot Area</th>
        <th width="400">Plot Super Built-up Area</th>
        <th width="400">Construction Area</th>
        <th width="200">Construction Super Built-up Area</th>
        <th width="100">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><span class="counter">1</span></td>
        <td><input type="text" name="industrial_area[plot_area][0]" class="plot_area_txt form-control required number" placeholder="Plot Area"></td>
        <td><input type="text" name="industrial_area[plot_built_area][0]" class="plot_built_area_txt form-control required number" placeholder="Plot Super Built-up Area"></td>
        <td><input type="text" name="industrial_area[construction_area][0]" class="construction_area_txt form-control required number" placeholder="Construction Area"></td>
        <td><input type="text" name="industrial_area[construction_built_area][0]" class="construction_built_area_txt form-control required number" placeholder="Construction Super Built-up Area"></td>
       
        <td><div data-id="0" class="delelteItemIndustrialArea" ><i class="fa fa-times"></i></div></td>
      </tr>
    </tbody>
  </table>
  <div class="add-new-btn text-right d-block" style="float:right">
    <input type="button" value="Add New Area" data-id="0" class="AddNewRowIndustrialArea btn btn-primary">
  </div>
</div>

                           </div>
                           <div class="row">
                              <div class="form-group">
                                 <div class="col-sm-12 PropertyFeatures">
                                    <label class="control-label"> Fire Safety Measures </label>
                                    <ul>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Exitnguisher"/> Exitnguisher</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Sprikeelr"/> Sprikeelr</li>
                                       <li class="sell_commericil_retail sell_commericil_space"><input type="checkbox" name="fire_safety_measures[]" value="Sensors"/> Sensors</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="row ">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Parking <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of parking"  name="number_of_parking" class="form-control required number" />
                                 </div>
                              </div>
                              </div>
                           
                           
                           <div class="form-group row label-floating is-empty">
                              <label  class="col-sm-2 control-label"> Property Status <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 <input type="radio"  name="Industrialpropertystatus" data-id="0" data-type="IndustrialpropertyStatus" class="propertystatus" checked value="Ready to move">
                                 &nbsp;
                                 <label for="">Ready to move</label>
                                 &nbsp;&nbsp;&nbsp;
                                 <input type="radio" class="propertystatus" data-id="0" data-type="IndustrialpropertyStatus" name="Industrialpropertystatus"  value="Under Construction">
                                 &nbsp;
                                 <label for="">Under Construction</label>
                                 &nbsp;&nbsp;&nbsp; 
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="age_property_div_IndustrialpropertyStatus_0" style="display:flex;">
                              <label  class="col-sm-2 control-label"> Age of Property <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 
                                      {!! Form::select('Industrialage_of_property', $age_of_property,'',['class' => 'select2 required form-control', 'id' => 'Industrialage_of_property']) !!}
 </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="possesion_by_div_IndustrialpropertyStatus_0" style="display:none;">
                              <label  class="col-sm-2 control-label"> Possession Date <span class="required_field">*</span></label>
                              
                               <div class="col-sm-2">
                	 {!! Form::select('Industrialpossession_month', $MonthNameList,'',['class' => 'select2 required form-control']) !!}

                  </div>  
                  <div class="col-sm-2">
                	{!! Form::select('Industrialpossession_year', $yearList,'',['class' => 'select2 required form-control']) !!}
					
                </div>
                             
                           </div>
                           <div class="IndustrialPricingBlock">
                           <div class="row">
                           		<div class="col-md-12">
                                	<label class="d-block">Property Ownership: </label>
                                	<input type="radio"  name="Industrialproperty_ownership" checked   value="Freehold">
                                    &nbsp;
                                    <label class="fw-normal">Freehold</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"  name="Industrialproperty_ownership"    value="Leases hold">
                                    &nbsp;
                                    <label class="fw-normal">Leases hold</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="Industrialproperty_ownership"   value="Cooperative">
                                    &nbsp;
                                    <label class="fw-normal">Cooperative</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="Industrialproperty_ownership"   value="Power of attorney">
                                    &nbsp;
                                    <label class="fw-normal">Power of attorney</label>
                                    &nbsp;&nbsp;&nbsp;
                                </div>
                           </div>
                           <div class="row">
                           		<div class="col-md-4">
                                	<div class="form-group">
                                    	<label>Expected Price <span class="basic_price_converstion"></span><span class="required_field">*</span></label>
                                        <input type="text"  onkeyup="calculateBasicPrice()" onchange="calculateBasicPrice()" class="form-control required number" name="IndustrialExpectedPrice" placeholder="Expected Price" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                	<div class="form-group">
                                    	<label>Basic Price  <span class="required_field">*</span></label>
                                        <input type="text"  style="background:#eee;" readonly="readonly" disabled="disabled" class="form-control required number" name="IndustrialBasicPrice" placeholder="Basic Price" />
                                    </div>
                                </div>
                                
                                
                           </div>
                           
                           <div class="row">
                                	<div class="col-md-3">
                    				<div class="form-group">
                    				<label>Tax and gov charges? &nbsp;&nbsp;&nbsp;
                    				<input onchange="ShowPriceExtra('sell_industrial','sell_industrial_tax_gov_charges','Yes')" name="sell_industrial_tax_gov_charges" class="form-check-input" type="radio"   data-val="Yes" value="Yes">&nbsp;&nbsp;
                    				Yes&nbsp;&nbsp;
                    				<input onchange="ShowPriceExtra('sell_industrial','sell_industrial_tax_gov_charges','No')" name="sell_industrial_tax_gov_charges" type="radio"   class="form-check-input" checked  value="No">&nbsp;&nbsp;No&nbsp;</label>
                    				</div>
                    				</div>
									<div class="col-sm-4 sell_industrial_tax_gov_charges" style="display:none;" >
            							<input type="text" class="form-control number required" placeholder="Tax and gov charges" value="">
                			</div>
                                </div>
                           <div class="row">
                           		<div class="col-md-12">
                                	<label>Total Price: <span class="IndustrialTotalPrice">0.00</span></label>
                                </div>
                           </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>It is pre-Leased / pre rented? &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="Industrialpre_leased"   value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked  type="radio" name="Industrialpre_leased"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                           <div class="row sell_commercial_prop ">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label> Is your office Fire NOC Certified?  &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio"  name="Industrialfire_noc_certified"  value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked="checked"   type="radio" name="Industrialfire_noc_certified"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="row sell_industrial_prop">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label> If Your Industrial Park / Shed Fire Noc? &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio"  name="Industrialfire_noc_certified"  value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked="checked"   type="radio" name="Industrialfire_noc_certified"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="sell_commercial_prop">
                           
                           <div class="row">
                              
                              
                              <div class="col-md-4 row">
                                 <div class="form-group">
                                    <label>Select Area<span class="required_field">*</span></label>
                                   <select name="commerical_property_areas" id="commerical_property_areas" class="select2 form-control" >
                                                 <option value="Square Yard" >Square Yard</option>
                                                <option value="Square Feet" >Square Feet</option>
                                                <option value="Square Meter" >Square Meter</option>
                                             
                                             </select>
                                 </div>
                              </div>
                              
                              <div class="col-md-12 row">
                              	<div class="row multipleBox commercial_area">
  <div class="col-md-4  col_commercial_area">
    <div class="multipleBoxCol">
      <div class="headingTabsCols"><span class="counter">1</span>
        <div data-index="0" data-id="0" class="delelteItemCommercialArea"><i class="fa fa-times"></i></div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Carpet Area</label>
          <input type="text" class="form-control" placeholder="Carpet Area">
        </div>
      </div>
      
      <div class="col-md-12 hospitality_prop commericil_space_type">
        <div class="form-group">
          <label>Plot Area</label>
          <input type="text" class="form-control" placeholder="Plot Area">
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Super Built-up Area</label>
          <input type="text" class="form-control"  placeholder="Super Built-up Area">
        </div>
      </div>
      

       <div class="hospitality_prop_hide commericil_space_type">
          <div class="col-md-12 retail_type commericil_space_type">
             <div class="form-group">
                <label>Entrance width <span class="required_field">*</span></label>
                <input type="text" name="entrance_width"  class="form-control required number" />
             </div>
          </div>
          <div class="col-md-12 retail_type commericil_space_type">
             <div class="form-group">
                <label>Ceiling Heights <span class="required_field">*</span></label>
                <input type="text" name="ceiling_heights"  class="form-control required number" />
             </div>
          </div>
          <div class="col-md-12">
             <div class="form-group">
                <label>No of Private Washroom <span class="required_field">*</span></label>
                <input type="text" placeholder="No of Private Washroom"  name="number_of_private_washroom" class="form-control required number" />
             </div>
          </div>
          <div class="col-md-12">
             <div class="form-group">
                <label>No of Shared Washroom <span class="required_field">*</span></label>
                <input type="text" placeholder="No of Shared Washroom"  name="number_of_shared_washroom" class="form-control required number" />
             </div>
          </div>
          
          
       </div>
       
      
      
      <div class="hospitality_prop_hide commericil_space_type ">
        <div class="col-md-12">
          <div class="form-group">
            <label>No of floor <span class="required_field">*</span></label>
            <input type="text" placeholder="No of floor"  name="number_of_floor" class="form-control required number" />
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>No of Passenger lifts <span class="required_field">*</span></label>
            <input type="text" placeholder="No of Passenger lifts"  name="number_of_passenger_lifts" class="form-control required number" />
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>No of Service Lift <span class="required_field">*</span></label>
            <input type="text" placeholder="No of Service Lift"  name="number_of_service_lift" class="form-control required number" />
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>No of Staircases <span class="required_field">*</span></label>
            <input type="text" placeholder="No of Staircases"  name="number_of_staircases" class="form-control required number" />
          </div>
        </div>
      </div>
      
    </div>
  </div>
    <div class="add-new-btn text-right d-block" style="float:right"><input type="button" value="Add New Area" data-id="0" class="AddNewRowCommercialArea btn btn-primary"></div>
                              
</div>
																
		<div class="row">
      <div class="col-md-4 retail_type_hide">
        <div class="form-group">
          <label> Conference Room </label>
          <select class="select2 form-control" name="conference_room">
            <option value="Available">Available</option>
            <option value="Not Available">Not Available</option>
          </select>
        </div>
      </div>
      <div class="col-md-4 retail_type_hide">
        <div class="form-group">
          <label>Reception Area</label>
          <select class="form-control select2" name="reception_area">
            <option value="Available">Available</option>
            <option value="Not Available">Not Available</option>
          </select>
        </div>
      </div>
      </div>

<div class="row hospitality_prop_hide commericil_space_type">
          <div class="form-group">
             <div class="col-sm-12 PropertyFeatures">
                <label class="control-label">Facilities</label>
               
              
                <ul>
                   <li><input type="checkbox"   name="facilities[]"  value="Furnishing"/> Furnishing</li>
                   <li><input type="checkbox" name="facilities[]" value="Central air conditioning"/> Central air conditioning</li>
                   <li><input type="checkbox" name="facilities[]" value="Oxygen Duct"/> Oxygen Duct</li>
                   <li><input type="checkbox" name="facilities[]" value="UPS"/> UPS</li>
                </ul>
             </div>
          </div>
       </div>
                              
                              	
                                
                                 
                              </div>
                              
                           </div>
                           <div class="row hospitality_prop_hide commericil_space_type">
                              <div class="form-group">
                                 <div class="col-sm-12 PropertyFeatures">
                                    <label class="control-label"> Fire Safety Measures </label>
                                    <ul>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Exitnguisher"/> Exitnguisher</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Sprikeelr"/> Sprikeelr</li>
                                       <li class="sell_commericil_retail sell_commericil_space"><input type="checkbox" name="fire_safety_measures[]" value="Sensors"/> Sensors</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="row hospitality_prop_hide commericil_space_type">
                             
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of parking allotted <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of parking allotted"  name="number_of_parking_allotted" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <input type="checkbox" name="parkings[]" value="Private parking in basement" >
                                    <label>Private parking in basement
                                    </label>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <input type="checkbox" name="parkings[]" value="Private parking outside">
                                    <label>Private parking outside
                                    </label>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <input type="checkbox" name="parkings[]" value="Public Parking">
                                    <label>Public Parking
                                    </label>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="row hospitality_prop_hide commericil_space_type">
                             
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Hydraulic Parking<span class="required_field">*</span></label>
                                    <input type="text" placeholder="Hydraulic Parking"  name="number_of_hydraulic_Parking" class="form-control required number" />
                                 </div>
                              </div>
                           </div>
                           
                           
                            <div class="hospitality_prop">
                           
                              <div class="form-group row label-floating is-empty">
                                 <label for="title" class="col-sm-2 control-label"> Furnishing detail </label>
                                 <div class="col-sm-10">
                                    <input type="radio"  name="furnishing_detail"   value="Furnished">
                                    &nbsp;
                                    <label for="">Furnished</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"  name="furnishing_detail" value="Semi furnished">
                                    &nbsp;
                                    <label for="">Semi furnished</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"  checked name="furnishing_detail"   value="Un furnished">
                                    &nbsp;
                                    <label for="">Un furnished</label>
                                    &nbsp;&nbsp;&nbsp; 
                                 </div>
                              </div>
                              
                              
                              <div class="form-group row label-floating is-empty" id="Furnished_Block" style="display:none;">
                                 <div class="col-sm-2"></div>
                                 <div class="col-sm-10 PropertyFeatures">
                                   
                                    <ul>
                                       <li>
                                          <input type="checkbox"   value="Light" name="furnished_data[]" /> 
                                          Light
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="fans" name="furnished_data[]" /> 
                                          fans
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="AC" name="furnished_data[]" /> 
                                          AC
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="TV" name="furnished_data[]" /> 
                                          TV
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Beds" name="furnished_data[]" /> 
                                          Beds
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Wardrobe" name="furnished_data[]" /> 
                                          Wardrobe
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Geyser" name="furnished_data[]" /> 
                                          Geyser
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Sofa" name="furnished_data[]" /> 
                                          Sofa
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Washing machine" name="furnished_data[]" /> 
                                          Washing machine
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Stove" name="furnished_data[]" /> 
                                          Stove
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="fridge" name="furnished_data[]" /> 
                                          fridge
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="water purifier" name="furnished_data[]" /> 
                                          water purifier
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="microwave" name="furnished_data[]" /> 
                                          microwave
                                       </li>
                                       <li>
                                          <input type="checkbox" value="modular kitchen" name="furnished_data[]" /> 
                                          modular kitchen
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Chimney" name="furnished_data[]" /> 
                                          Chimney
                                       </li>
                                       <li>
                                          <input type="checkbox"  value="Dinning Table" name="furnished_data[]" /> 
                                          Dinning Table
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Curtains" name="furnished_data[]" /> 
                                          Curtains
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Exhaust Fan" name="furnished_data[]" /> 
                                          Exhaust Fan
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="form-group row label-floating is-empty" id="Semifurnished_Block" style="display:none;">
                                 <div class="col-sm-2"></div>
                                 <div class="col-sm-10 PropertyFeatures">
                                     <ul>
                                       <li>
                                          <input type="checkbox"   value="Light" name="semifurnished_data[]" />
                                          Light

                                       </li>
                                       <li>
                                          <input type="checkbox"   value="fans" name="semifurnished_data[]"/>
                                          fans
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="AC" name="semifurnished_data[]"/>
                                          AC
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="TV" name="semifurnished_data[]"/>
                                          TV
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Beds" name="semifurnished_data[]"/>
                                          Beds
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Wardrobe" name="semifurnished_data[]"/>
                                          Wardrobe
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Geyser" name="semifurnished_data[]"/>
                                          Geyser
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Sofa" name="semifurnished_data[]"/>
                                          Sofa
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Washing machine" name="semifurnished_data[]"/>
                                          Washing machine
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Stove" name="semifurnished_data[]"/>
                                          Stove
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="fridge" name="semifurnished_data[]"/>
                                          fridge
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="water purifier" name="semifurnished_data[]"/>
                                          water purifier
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="microwave" name="semifurnished_data[]"/>
                                          microwave
                                       </li>
                                       <li>
                                          <input type="checkbox" value="modular kitchen" name="semifurnished_data[]"/>
                                          modular kitchen
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Chimney" name="semifurnished_data[]"/>
                                          Chimney
                                       </li>
                                       <li>
                                          <input type="checkbox"  value="Dinning Table" name="semifurnished_data[]"/>
                                          Dinning Table
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Curtains" name="semifurnished_data[]"/>
                                          Curtains
                                       </li>
                                       <li>
                                          <input type="checkbox"   value="Exhaust Fan" name="semifurnished_data[]"/>
                                          Exhaust Fan
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="row retail_type hospitality_prop_hide commericil_space_type">
                              <div class="form-group">
                                 <div class="col-sm-12 PropertyFeatures">
                                    <label class="control-label"> Suitable business Type</label>
                                    <ul>
                                       <li><input type="checkbox"  name="suitable_business_type[]" value="Hospital"/> Hospital</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Restaurant"/> Restaurant</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Banquette"/> Banquette</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Gym"/> Gym</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Hotel"/> Hotel</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Guest house"/> Guest house</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Conference "/> Conference </li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Hall"/> Hall</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="IT Hub"/> IT Hub </li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Spa"/> Spa</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Corporate Banquette"/> Corporate Banquette</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Shopping mall"/> Shopping mall</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Multiplex"/> Multiplex</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="miniplex"/> miniplex</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           
                           
                           <div class="row sell_commercial_prop">
                           
                           <div class="form-group row label-floating is-empty">
                              <label  class="col-sm-2 control-label"> Property Status <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 <input type="radio"  name="Commercialpropertystatus" data-id="0" data-type="CommercialpropertyStatus" class="propertystatus" checked="checked" value="Ready to move">
                                 &nbsp;
                                 <label for="">Ready to move</label>
                                 &nbsp;&nbsp;&nbsp;
                                 <input type="radio" class="propertystatus" data-id="0" data-type="CommercialpropertyStatus" name="Commercialpropertystatus" value="Under Construction">
                                 &nbsp;
                                 <label for="">Under Construction</label>
                                 &nbsp;&nbsp;&nbsp; 
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="age_property_div_CommercialpropertyStatus_0" style="display:flex;">
                              <label  class="col-sm-2 control-label"> Age of Property <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                      {!! Form::select('Commercialage_of_property', $age_of_property,'',['class' => 'select2 required form-control', 'id' => 'Commercialage_of_property']) !!}
                                </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="possesion_by_div_CommercialpropertyStatus_0" style="display:none;">
                              <label  class="col-sm-2 control-label"> Possession Date <span class="required_field">*</span></label>
                              
                              <div class="col-sm-2">
                	 {!! Form::select('Commercialpossession_month', $MonthNameList,'',['class' => 'select2 required form-control']) !!}

                  </div>  
                  <div class="col-sm-2">
                	{!! Form::select('Commercialpossession_year', $yearList,'',['class' => 'select2 required form-control']) !!}
					
                </div>
                           
                           </div>
                           </div>
                           
                           
                           
                           
                           <div class="CommercialPricingBlock">
                           <div class="row">
                           		<div class="col-md-12">
                                	<label class="d-block">Property Ownership: </label>
                                	<input type="radio"  name="Commercialproperty_ownership" checked   value="Freehold">
                                    &nbsp;
                                    <label class="fw-normal">Freehold</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"  name="Commercialproperty_ownership"    value="Leases hold">
                                    &nbsp;
                                    <label class="fw-normal">Leases hold</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="Commercialproperty_ownership"   value="Cooperative">
                                    &nbsp;
                                    <label class="fw-normal">Cooperative</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="Commercialproperty_ownership"   value="Power of attorney">
                                    &nbsp;
                                    <label class="fw-normal">Power of attorney</label>
                                    &nbsp;&nbsp;&nbsp;
                                </div>
                           </div>
                           <div class="row">
                           		<div class="col-md-4 retail_type hospitality_prop_hide commericil_space_type">
                                	<div class="form-group">
                                    	<label>Maintenance <span class="required_field">*</span></label>
                                        {!! Form::select('maintenance', $maintenance,'',['class' => 'select2 required form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4 commericial_price">
                                	<div class="form-group">
                                    	<label>Expected Price <span class="basic_price_converstion"></span> <span class="required_field">*</span></label>
                                        <input type="text"  onkeyup="calculateBasicPrice()" onchange="calculateBasicPrice()" class="form-control required number" name="CommercialExpectedPrice" placeholder="Expected Price" />
                                    </div>
                                </div>
                                <div class="col-md-4 commericial_price">
                                	<div class="form-group">
                                    	<label>Basic Price <span class="required_field">*</span></label>
                                        <input type="text"   style="background:#eee;" readonly="readonly" disabled="disabled"  class="form-control required number" name="CommercialBasicPrice" placeholder="Basic Price" />
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                	<div class="col-md-3">
                    				<div class="form-group">
                    				<label>Tax and gov charges? &nbsp;&nbsp;&nbsp;
                    				<input onchange="ShowPriceExtra('sell_commerical','sell_commercial_tax_gov_charges','Yes')" name="commericial_taxt_gov_charge" class="form-check-input is_penthouse" type="radio"   data-val="Yes" value="Yes">&nbsp;&nbsp;
                    				Yes&nbsp;&nbsp;
                    				<input onchange="ShowPriceExtra('sell_commerical','sell_commercial_tax_gov_charges','No')" name="commericial_taxt_gov_charge" type="radio"   class="form-check-input is_penthouse" checked  value="No">&nbsp;&nbsp;No&nbsp;</label>
                    				</div>
                    				</div>
									<div class="col-sm-4 sell_commercial_tax_gov_charges" style="display:none;" >
            							<input type="text" class="form-control number required" placeholder="Tax and gov charges" value="">
                			</div>
                                </div>
                                <div class="row">
                                	<div class="col-md-3">
                                        <div class="form-group">
                                            <label>Booking amount? &nbsp;&nbsp;&nbsp;
                                            <input onchange="ShowPriceExtra('sell_commerical','sell_commercial_booking_amount','Yes')" name="commericial_booking_amount" class="form-check-input is_penthouse" type="radio"   data-val="Yes" value="Yes">&nbsp;&nbsp;
                                            Yes&nbsp;&nbsp;
                                            <input onchange="ShowPriceExtra('sell_commerical','sell_commercial_booking_amount','No')" name="commericial_booking_amount" type="radio"   class="form-check-input is_penthouse" checked  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                        </div>
                    				</div>
									<div class="col-sm-4 sell_commercial_booking_amount" style="display:none;">
            							<input type="text" class="form-control number required" placeholder="Booking amount" value="">
                					</div>
                                </div>
                                <div class="row">
                                	<div class="col-md-3">
                                        <div class="form-group">
                                            <label>Membership Charge? &nbsp;&nbsp;&nbsp;
                                            <input name="commericial_membership_charge" onchange="ShowPriceExtra('sell_commerical','sell_commericial_membership_charge','Yes')" class="form-check-input is_penthouse" type="radio"   data-val="Yes" value="Yes">&nbsp;&nbsp;
                                            Yes&nbsp;&nbsp;
                                            <input name="commericial_membership_charge" onchange="ShowPriceExtra('sell_commerical','sell_commericial_membership_charge','No')" type="radio"   class="form-check-input is_penthouse" checked  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                        </div>
                    				</div>
									<div class="col-sm-4 sell_commericial_membership_charge" style="display:none;">
            							<input type="text" class="form-control number required" placeholder="Membership Charge" value="">
                					</div>
                                </div>
                                
                                
                                
                           <?php /*?><div class="row commericial_price_hospital">
                           	<div class="col-md-5">
                                	<label class="d-block">Maintenance Type: </label>
                                	<input type="radio"  name="Commercialmaintenance_type" checked="checked" value="Monthly">
                                    &nbsp;
                                    <label class="fw-normal">Monthly</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"  name="Commercialmaintenance_type"   value="Annually">
                                    &nbsp;
                                    <label class="fw-normal">Annually</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="Commercialmaintenance_type" value="One time">
                                    &nbsp;
                                    <label class="fw-normal">One time</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"   name="Commercialmaintenance_type"  value="Per unit/ Monthly">
                                    &nbsp;
                                    <label class="fw-normal">Per unit/ Monthly</label>
                                    &nbsp;&nbsp;&nbsp;
                                </div>
                                
                               <div class="col-md-7">
                                	<div class="form-group">
                                    	<label>Maintenance </label>
                                        <input type="text"  class="form-control" name="CommercialMaintenance" placeholder="Maintenance" />
                                    </div>
                                </div> 
                           </div><?php */?>
                           <div class="row">
                           		<div class="col-md-12">
                                	<label>Total Price: <span class="CommercialTotalPrice">0.00</span></label>
                                </div>
                           </div>
                           </div>
                           
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>It is pre-Leased / pre rented? &nbsp;&nbsp;&nbsp;
                                    
                                     <input class="form-check-input" type="radio" name="pre_leased"   value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked  type="radio" name="pre_leased"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                             
                                    
                                    
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label> Is your office Fire NOC Certified?  &nbsp;&nbsp;&nbsp;
                                    
                                   <input class="form-check-input" type="radio"  name="fire_noc_certified"  value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked="checked"   type="radio" name="fire_noc_certified"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                            
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="step3" class="tab-pane" role="tabpanel">
                         <h4 style="border-bottom:1px dotted #000; margin-left:20px; padding-bottom:10px;" class="sell_residential_prop sell_commercial_prop sell_industrial_prop sell_plotting_prop sell_vacant_land_prop"> Office Working Hours</h4>
                         
                        <div class="row sell_residential_prop sell_commercial_prop sell_industrial_prop sell_plotting_prop sell_vacant_land_prop">
                        	
                        	<div class="col-md-12">
                          
                            	<table class="table table-bordered table-striped">
                                	<thead>
                                    <tr>
                                    	     <th width="100">Days</th>
                                   
                                        <th>Is Open?</th>
                                    	<th >Hours</th>
                                    </tr>
                                    </thead>
                                    
                                    <tr>
                                    	  <td><label>Sunday</label></td>
                                    	
                                        <td><select class="select2"><option value="No">No</option><option value="Yes">Yes</option></select></td>
                                      <td><input type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                    	<td><label>Monday</label></td>
                                    	
                                        <td><select class="select2"><option value="No">No</option><option value="Yes">Yes</option></select></td>
                                        <td><input type="text" class="form-control" /></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><label>Tuesday</label></td>
                                    
                                    	<td><select class="select2"><option value="No">No</option><option value="Yes">Yes</option></select></td>
                                    	<td><input type="text" class="form-control" /></td>
                                    </tr>
                                    
                                    <tr>
                                    	    <td><label>Wednesday</label></td>
                                    
                                        <td><select class="select2"><option value="No">No</option><option value="Yes">Yes</option></select></td>
                                    	<td><input type="text" class="form-control" /></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><label>Thursday</label></td>
                                    
                                    	<td><select class="select2"><option value="No">No</option><option value="Yes">Yes</option></select></td>
                                    	<td><input type="text" class="form-control" /></td>
                                    </tr>
                                    
                                    <tr>
                                    	    <td><label>Friday</label></td>
                                    
                                        <td><select class="select2"><option value="No">No</option><option value="Yes">Yes</option></select></td>
                                    	<td><input type="text" class="form-control" /></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><label>Saturday</label></td>
                                    
                                    	<td><select class="select2"><option value="No">No</option><option value="Yes">Yes</option></select></td>
                                    	<td><input type="text" class="form-control" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row sell_residential_prop">
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <label class="control-label" for="amenities" >Amenities:</label>
                                   
                                 <select class="form-control select2multiple" name="amenities[]" style="width:100%" multiple="multiple">
                                    <?php foreach($amenties as $v){ ?>
                                    <option value="<?php echo $v ?>"><?php echo $v; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row sell_residential_prop">
                           <div class="form-group">
                              <div class="col-sm-12 PropertyFeatures">
                                 <label class="control-label">Property Features:</label>
                                 <ul>
                                    <li><input type="checkbox" name="property_features[]" value="Gas Pipeline"/> Gas Pipeline</li>
                                    <li><input type="checkbox" name="property_features[]" value="Central air conditioning"/> Central air conditioning</li>
                                    <li><input type="checkbox" name="property_features[]" value="Natural light"/> Natural light</li>
                                    <li><input type="checkbox"  name="property_features[]" value="Airy rooms"/> Airy rooms</li>
                                    <li><input type="checkbox" name="property_features[]" value="Spacious"/> Spacious</li>
                                    <li><input type="checkbox" name="property_features[]" value="Ac Points"/> Ac Points</li>
                                    <li><input type="checkbox" name="property_features[]" value="Electric Charging Points"/> Electric Charging Points</li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <label>Project features</label>
                                 <textarea class="form-control" name="project_features"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <label>Additional features</label>
                                 <textarea  class="form-control" name="additional_features"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row sell_residential_prop farmhouse_prop">
                           <div class="form-group">
                              <div class="col-sm-12 PropertyFeatures">
                                 <label class="control-label">Other features</label>
                                 
                                 <ul>
                                    <li><input type="checkbox"  name="other_features[]" value="Gated Society"/> Gated Society</li>
                                    <li><input type="checkbox"  name="other_features[]" value="Corner side property"/> Corner side property</li>
                                    <li><input type="checkbox"  name="other_features[]" value="Roade facing property"/> Roade facing property</li>
                                    <li><input type="checkbox"  name="other_features[]" value="Small society"/> Small society</li>
                                    <li><input type="checkbox"  name="other_features[]" value="Pet friendly society"/> Pet friendly society</li>
                                    <li><input type="checkbox"  name="other_features[]" value="Wheelchair friendly society"/> Wheelchair friendly society</li>
                                    <li><input type="checkbox" name="other_features[]"  value="Automation"/> Automation</li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="row sell_residential_prop">
                              <div class="form-group">
                                 <div class="col-sm-12 PropertyFeatures">
                                    <label class="control-label"> Fire Safety Measures </label>
                                    <ul>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Exitnguisher"/> Exitnguisher</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Sprikeelr"/> Sprikeelr</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Sensors"/> Sensors</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        <div class="row">
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <label>Location Advantages (nearby facilities)</label>
                                 <textarea  class="form-control" name="location_advantages"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <label>Suggestions and other</label>
                                 <textarea  class="form-control" name="suggestions"></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="step4" class="tab-pane" role="tabpanel">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group" id="gallery_images">
                                 <div class="row">
                                    <label class="control-label p-0" for="form-file-multiple-input"> Project Gallery (Render images)</label>
                                    <div class="form-file p-0">
                           
                                       <input id="project_gallery" type="file" name="project_gallery[]" accept="image/*" multiple="multiple" class="form-file-input form-control">
                                    </div>
                                                
									<div class="project_gallery row" style="padding-left:0px;"></div>
                                    
                                 </div>
                                
                              </div>
                           </div>
                           <div class="col-md-12 rent_residential_flat_hide rent_residential_independent_hide rent_residential_farmhouse_hide rent_industrial_prop_hide rent_commerical_retail_prop_hide">
                              <div class="form-group">
                                 <div class="row">
                                    <label class="control-label  p-0" for="form-file-multiple-input">Floor Plan Gallery</label>
                                    <div class="form-file p-0">
                                       <input type="file" id="floor_plan_gallery" name="floor_plan_gallery[]" accept="image/*" multiple="multiple" class="form-file-input form-control">
                                    </div>
                                    <div class="floor_plan_gallery row" style="padding-left:0px;"></div>
                                 </div>
                                
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           
                           
                           <div class="col-md-12 rent_residential_independent_hide rent_residential_flat_hide rent_residential_farmhouse_hide rent_industrial_prop_hide rent_commerical_office_prop_hide rent_commerical_retail_prop_hide rent_commercial_space_prop">
                              <div class="form-group">
                                 <div class="row">
                                    <label class="control-label  p-0" >Project Status Gallery</label>
                                    <div class="form-file p-0">
                                       <input type="file" id="project_status_gallery" name="project_status_gallery[]" accept="image/*" multiple="multiple" class="form-file-input form-control">
                                    </div>
                                     <div class="project_status_gallery row" style="padding-left:0px;"></div>
                                 </div>
                                
                              </div>
                           </div>
                           <div class="col-md-6 rent_industrial_prop rent_commercial_space_prop rent_commerical_retail_prop_hide">
                              <div class="form-group">
                                 <div class="row">
                                    <label class="control-label  p-0" >Video Toor</label>
                                    <div class="form-file p-0">
                                       <input type="file" name="video_toor" accept="video/mp4,video/x-m4v,video/*" class="form-file-input form-control">
                                    </div>
                                 </div>
                                
                              </div>
                           </div>
                           <div class="col-md-6 rent_industrial_prop_hide rent_commerical_retail_prop_hide rent_commercial_space_prop">
                              <div class="form-group">
                                 <div class="row">
                                    <label class="control-label  p-0" > PDF Brochure</label>
                                    <div class="form-file p-0">
                                       <input type="file" name="pdf_brochure" accept=".pdf" class="form-file-input form-control">
                                    </div>
                                 </div>
                                 </div>
                           </div>
                        </div>
                        <div class="row rent_industrial_prop_hide rent_commerical_office_prop_hide rent_commerical_retail_prop_hide rent_commercial_hospital_prop rent_commercial_space_prop">
                           
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="row">
                                    <label class="control-label  p-0" >Sample house video(Youtube URL)</label>
                                    <input type="text" class="form-control" name="sample_house_video" >
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
             	   <input type="button" name="submit_steps" class="sw-btn-group-extra" value="Finish" />
               </div>
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            </form>
         </div>
      </div>
   </div>
</div>

    </div>
    <div class="overlayLoader" style="display: none;"> <div class="loaderBlock"></div> </div>
@endsection

@section('customjs')
<script>
function toFixed(x) {
  return Number.parseFloat(x).toFixed(2);
}

jQuery(document).on("change","#property_areas",function(){
		jQuery(".basic_price_converstion").html("("+jQuery("#property_areas").val()+")");		
		
});

jQuery(document).on("change","#VacantLandPlottingproperty_areas",function(){
		jQuery(".basic_price_converstion").html("("+jQuery("#VacantLandPlottingproperty_areas").val()+")");		
		
});


jQuery(document).on("change","#Industrial_property_areas",function(){
		jQuery(".basic_price_converstion").html("("+jQuery("#Industrial_property_areas").val()+")");		
		
});

jQuery(document).on("change","#commerical_property_areas",function(){
		jQuery(".basic_price_converstion").html("("+jQuery("#commerical_property_areas").val()+")");		
		
});

function calculateBasicPrice(data_id="",data_type="",data_value=""){
	var sub_category = jQuery("#sub_category").val();
	var totalPrice = 0;
	
	
	if(sub_category=="VacantLandPlotting"){
		
		jQuery(".basic_price_converstion").html("("+jQuery("#VacantLandPlottingproperty_areas").val()+")");
		jQuery(".VacantLandPlottingTotalPrice").html("0.00");
		var super_area = jQuery("input[name='VacantLandPlottingCarpetarea']").val();
		var expected_price = jQuery("input[name='VacantLandPlottingExpectedPrice']").val();
		var basic_price = 0;
		var govcharges_price = jQuery("input[name='VacantLandPlottingTaxandgovchargesPrice']").val();
		var inclusive_price = 0;
		
			if(expected_price>0 && super_area>0){
				basic_price = parseFloat(expected_price)*parseFloat(super_area);
			}
			 inclusive_price = parseFloat(govcharges_price)+parseFloat(basic_price);
			
			jQuery("input[name='VacantLandPlottingBasicPrice']").val(toFixed(basic_price));
			jQuery("input[name='VacantLandPlottingAllinclusivePrice']").val(toFixed(inclusive_price));
			jQuery(".VacantLandPlottingTotalPrice").html(toFixed(inclusive_price));
				
	}	
	
	if(sub_category=="IndustrialParkShades"){
		jQuery(".basic_price_converstion").html("("+jQuery("#Industrial_property_areas").val()+")");
		jQuery(".IndustrialTotalPrice").html("0.00");
		var super_area = jQuery("input[name='Industrialsuper_builtup_area']").val();
		var expected_price = jQuery("input[name='IndustrialExpectedPrice']").val();
		var basic_price = 0;
		var govcharges_price = jQuery("input[name='IndustrialTaxandgovchargesPrice']").val();
		var inclusive_price = 0;
		
			if(expected_price>0 && super_area>0){
				basic_price = parseFloat(expected_price)*parseFloat(super_area);
			}
			 inclusive_price = parseFloat(govcharges_price)+parseFloat(basic_price);
			jQuery("input[name='IndustrialBasicPrice']").val(toFixed(basic_price));
			jQuery("input[name='IndustrialAllinclusivePrice']").val(toFixed(inclusive_price));
			jQuery(".IndustrialTotalPrice").html(toFixed(inclusive_price));
			
				
	}	
	
	if(sub_category=="Commercial"){
		
		jQuery(".basic_price_converstion").html("("+jQuery("#commerical_property_areas").val()+")");
	
		var sell_commercial_property_type = jQuery("#sell_commercial_property_type").val();
		
		jQuery(".commericial_price_hospital").show();
		
		jQuery(".commericial_price").addClass("col-md-4").removeClass("col-md-3");
			var super_area = jQuery("input[name='super_builtup_area']").val();
		
		if(sell_commercial_property_type=="Hospitality"){
			jQuery(".commericial_price_hospital").hide();
			jQuery(".commericial_price").addClass("col-md-3").removeClass("col-md-4");
			super_area = jQuery("input[name='Hospitalitysuper_builtup_area']").val();
		}
		jQuery(".CommercialTotalPrice").html("0.00");
		var expected_price = jQuery("input[name='CommercialExpectedPrice']").val();
		var basic_price = 0;
		var govcharges_price = jQuery("input[name='CommercialTaxandgovchargesPrice']").val();
		var inclusive_price = 0;
		
		var booking_amount = jQuery("input[name='CommercialBookingamount']").val();
		var membership_charge = jQuery("input[name='CommercialMembershipCharge']").val();
		var maintenance = jQuery("input[name='CommercialMaintenance']").val();
		
			
			if(expected_price>0 && super_area>0){
				basic_price = parseFloat(expected_price)*parseFloat(super_area);
			}
			 inclusive_price = parseFloat(govcharges_price)+parseFloat(basic_price);
			jQuery("input[name='CommercialBasicPrice']").val(toFixed(basic_price));
			jQuery("input[name='CommercialAllinclusivePrice']").val(toFixed(inclusive_price));
			jQuery(".CommercialTotalPrice").html(toFixed(inclusive_price));
			
				
	}	
	if(sub_category=="Residential"){
		jQuery(".basic_price_converstion").html("("+jQuery("#property_areas").val()+")");		
		
		jQuery("#ResidentialTotalPrice_"+data_type+"_"+data_value).html("0.00");
		jQuery("#HiddenResidentialTotalPrice_"+data_type+"_"+data_value).html("0.00");
		var expected_price = jQuery(".ResidentialExpectedPrice_"+data_type+"_"+data_value).val();
		var govcharges_price = jQuery(".ResidentialTaxandgovchargesPrice_"+data_type+"_"+data_value).val();
		
		var booking_amount = jQuery(".ResidentialBookingamount_"+data_type+"_"+data_value).val();
		var membership_charge = jQuery(".ResidentialMembershipCharge_"+data_type+"_"+data_value).val();
		var maintenance = jQuery(".ResidentialMaintenance_"+data_type+"_"+data_value).val();
			var super_area=[];
			jQuery( "."+data_type+"_items_table_"+data_id+ " .super_builtup_area_txt" ).each(function( index ) {
				super_area.push(jQuery(this).val());
			});
			var super_area_max = Math.max.apply(Math,super_area); // 3
			var super_area_min = Math.min.apply(Math,super_area); // 1
			var max_basic_price_rang = max_inclusive_price =min_inclusive_price  = 0;
			var min_basic_price_rang = 0;
			 
	
			if(expected_price>0){
				max_basic_price_rang = parseFloat(expected_price)*parseFloat(super_area_max);
				min_basic_price_rang = parseFloat(expected_price)*parseFloat(super_area_min);
			}
			if(govcharges_price>0 || expected_price>0){
				if(govcharges_price==""){
					govcharges_price = 0;	
				}
				max_inclusive_price = parseFloat(govcharges_price)+parseFloat(max_basic_price_rang);
				min_inclusive_price = parseFloat(govcharges_price)+parseFloat(min_basic_price_rang);
			}
			jQuery(".ResidentialBasicPrice_"+data_type+"_"+data_value).val(toFixed(min_basic_price_rang)+"-"+toFixed(max_basic_price_rang));
			jQuery(".ResidentialAllinclusivePrice_"+data_type+"_"+data_value).val(toFixed(min_inclusive_price)+"-"+toFixed(max_inclusive_price));
			//alert("#ResidentialTotalPrice_"+data_type+"_"+data_value);
		//	alert(min_inclusive_price);
			jQuery("#ResidentialTotalPrice_"+data_type+"_"+data_value).html(toFixed(min_inclusive_price)+"-"+toFixed(max_inclusive_price));
			
			
				
	
	}
}

  $(document).ready(function(){
	  
var hash = window.location.hash;
if(hash=="#step4" || hash=="#step3" || hash=="#step2"){
	//window.location="{{url('/admin/properties/add')}}";	
}
  jQuery(".select2").select2();
  jQuery(".select2multiple").select2({multiple: true,    minimumResultsForSearch: 5});
  

 
    $(document).on("change",".propertystatus",function(){
        var data_id = jQuery(this).attr("data-id");
		var data_type = jQuery(this).attr("data-type");
		
        if (this.value == 'Ready to move') {
            $("#age_property_div_"+data_type+"_"+data_id).show();
            $("#possesion_by_div_"+data_type+"_"+data_id).hide();
        }
        else{
            $("#age_property_div_"+data_type+"_"+data_id).hide();
            $("#possesion_by_div_"+data_type+"_"+data_id).show();
        }
    });

    $(document).on("click",".delete_acc",function(){
        var data_id = jQuery(this).attr("data-id");
        var data_value = jQuery(this).attr("data-value");
        
        var data_type = jQuery(this).attr("data-type");

        if(confirm("Are you sure you want to delete this?")){
            $("#"+data_type+"_accordion_"+data_id).remove();
			getPropertyTypeDisable();
			$("#property_unit_type,#property_unit_type_ind").prop("selectedIndex", 0); 
        }
        else{
            return false;
        }
    });

    $(document).on("click","#add_property",function(){
      var property_type = jQuery("#property_type").val().replace(/\s+/g, '');;
	  var property_for = jQuery("#property_for").val().replace(/\s+/g, '');; 
	  var length = $(".property_type_"+property_type).length;
      var property_areas  = jQuery("#property_areas").val(); 
	 	var value = $("#property_unit_type").val();
	   jQuery(".accordion-item").hide();
		jQuery(".property_type_"+property_type).show();
		if(value!=''){
			if(property_for=="Sell"){
			
			
			

            var html = '';
            html += '<div class="accordion-item property_type_'+property_type+'" id="'+property_type+'_accordion_'+length+'" >';
            html += '<div class="accordion-header rounded-lg collapsed" id="headingOne" data-bs-toggle="collapse" data-bs-target="#'+property_type+'_accordion_header_'+length+'" aria-expanded="true" aria-controls="collapseOne">';
            html += value;
            html += '<div class="close-window">';
            html += '<i class="fa fa-times delete_acc" data-value="'+value+'" data-id="'+length+'" data-type="'+property_type+'" aria-hidden="true"></i>';
            html += '</div>';
            html += '</div>';
            html += '<div id="'+property_type+'_accordion_header_'+length+'" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionUnitType">';
            html += '<div class="accordion__body">';
           
		   html += '<div class="form-group row label-floating is-empty">';
         html +='<div class="col-sm-12">'
        
         
         
		  
       
	   html += '<div class="row multipleBox '+property_type+'_items_table_'+length+'">';
	   html += '<div class="col-md-4  col_'+property_type+'_items_table_'+length+'"><div class="multipleBoxCol">';
	   html += '<div class="headingTabsCols"><span class="counter">1</span><div data-index="0" data-id="'+length+'" data-value="'+value+'" class="delelteItem" data-type="'+property_type+'"><i class="fa fa-times"></i></div></div>';
	  
	   if(property_type=="IndependentHome" || property_type=="Farmhouse"){
	    html += '<div class="col-md-12"><div class="form-group"><label>Plot Area</label><input type="text"  name="propertyDetails['+property_type+']['+value+'][plot_area][0]" class="plot_area_txt form-control number required" placeholder="Plot Area"></div></div>';
	  	 html += '<div class="col-md-12"><div class="form-group"><label>Plot Super Built-up Area</label><input type="text"  name="propertyDetails['+property_type+']['+value+'][plot_super_area][0]" class="plot_super_built_up_area_txt form-control number required" placeholder="Plot Super Built-up Area"></div></div>';
	    html += '<div class="col-md-12"><div class="form-group"><label>Construction Built-up Area</label><input type="text" name="propertyDetails['+property_type+']['+value+'][construction_built_up_area][0]" class="construction_built_up_area_txt form-control number required" placeholder="Construction Built-up Area"></div></div>';
	    html += '<div class="col-md-12"><div class="form-group"><label>Construction Super Built-up Area</label><input type="text" onkeyup="calculateBasicPrice("0",'+property_type+','+value+')" onchange="calculateBasicPrice("0",'+property_type+','+value+')" name="propertyDetails['+property_type+']['+value+'][construction_super_built_up_area][0]" class="construction_super_built_up_area_txt form-control number required" placeholder="Construction Super Built-up Area" value=""></div></div>';
	   
	   }else{
	  	 html += '<div class="col-md-12"><div class="form-group"><label>Carpet Area</label><input type="text" name="propertyDetails['+property_type+']['+value+'][carpet_area][0]" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></div></div>';
	  	 html += '<div class="col-md-12"><div class="form-group"><label>Super Built-up Area</label><input type="text" onkeyup="calculateBasicPrice("0",'+property_type+','+value+')" onchange="calculateBasicPrice("0",'+property_type+','+value+')" name="propertyDetails['+property_type+']['+value+'][super_builtup_area][0]" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area"></div></div>';
	   }
	  
	  html += '<div class="col-md-12"><div class="form-group"><label>No of Bedrooms <span class="required_field">*</span></label><input type="text"  name="propertyDetails['+property_type+']['+value+'][NoofBedrooms][0]" class="form-control required" placeholder="No of Bedrooms"></div></div>';
	  
	  
	  html += '<div class="col-sm-12">';
            
                html += '<label class="control-label">';
                html += 'No of Bathrooms <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_bathrooms][0]" class="form-control number required" placeholder="No of Bathrooms" value="">';
                html += '</div>';
            
                html += '<div class="col-sm-12">';
            
                html += '<label class="control-label">';
                html += 'No of Balconies <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_balconies][0]" class="form-control number required" placeholder="No of Balconies" value="">';
                html += '</div>';
        	
			
                html += '<div class="col-sm-12">';
            
                html += '<label class="control-label">';
                html += 'No of Lift <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_lift][0]" class="form-control number required" placeholder="No of Lift" value="">';
                html += '</div>';
          
			    html += '<div class="col-sm-12"><label class="control-label">No. of Floor <span class="required_field">*</span></label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_floor][0]"  class="form-control number required" placeholder="No. of Floor" value="">';
                html += '</div>';
				
				
				   if(property_type=="IndependentHome" ||  property_type=="Farmhouse"){
					html += '<div class="col-sm-12"><label class="control-label">Total Units <span class="required_field">*</span></label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][total_units][0]"  class="form-control number required" placeholder="Total Units" value="">';
                html += '</div>';
				 	 
				 }else{
                html += '<div class="col-sm-12"><label class="control-label">No. of Blocks <span class="required_field">*</span></label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_blocks][0]"  class="form-control number required" placeholder="No. of Blocks" value="">';
                html += '</div>';
				 }
	   html += '</div></div></div>';
	   
	   
	   html +='<div class="add-new-btn text-right d-block mt-1"><input type="button" value="Add New Area" data-type="'+property_type+'" data-id="'+length+'" data-value="'+value+'"   class="AddNewRow btn btn-primary"></div></div></div>';

          


            html += '<div class="form-group row label-floating is-empty">';
                html += '<label class="col-sm-2 control-label">';
                html += 'Other Rooms (optional)';
                html += '</label>';
                html += '<div class="col-sm-10">';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][other_room][]" value="Pooja Room">';
                html += '&nbsp;<label>Pooja Room</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][other_room][]" value="Servant Room">';
                html += '&nbsp;<label>Servant Room</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][other_room][]"  value="Store Room">';
                html += '&nbsp;<label>Store Room</label>&nbsp;&nbsp;&nbsp;';
				html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][other_room][]"  value="Theater Room">';
                html += '&nbsp;<label>Theater Room</label>&nbsp;&nbsp;&nbsp;';
				
                html += '</div>';
            html += '</div>';
                
            html += '<div class="form-group row label-floating is-empty">';
                html += '<label class="col-sm-2 control-label">';
                html += 'Furnishing';
                html += '</label>';
                html += '<div class="col-sm-10">';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][furnished_details][]" value="Furnished">';
                html += '&nbsp;<label>Furnished</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][furnished_details][]" value="Semi-furnished">';
                html += '&nbsp;<label>Semi-furnished</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][furnished_details][]" value="Un furnished">';
                html += '&nbsp;<label>Un furnished</label>&nbsp;&nbsp;&nbsp;';
                html += '</div>';
            html += '</div>';

            html += '<div class="form-group row label-floating is-empty">';
                html += '<label class="col-sm-2 control-label">';
                html += 'Reserved Parking';
                html += '</label>';
                html += '<div class="col-sm-10">';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][reserved_parking][]" value="Covered Parking">';
                html += '&nbsp;<label>Covered Parking</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][reserved_parking][]" value="Open Parking">';
                html += '&nbsp;<label>Open Parking</label>&nbsp;&nbsp;&nbsp;';
                html += '</div>';
            	html += '</div>';

					html += '<div class="row gx-3 gy-2 align-items-center pt-0">';
                    html += '<div class="col-sm-4">';
            
                html += '<label class="control-label">';
                html += 'Hydraulic Parking <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][HydraulicParking]" class="form-control number required" placeholder="Hydraulic Parking" value="">';
                html += '</div>';
				if(jQuery("#IndependentHomeSubType").val()!="Bunglows"  && property_type != "DuplexVerticalVilla" && property_type!="Farmhouse"){
					
					html += '<div class="col-md-4" style="margin-top:34px;">';
                    html += '<div class="form-group">';
                    html += '<label>Penthouse Available Or Not? &nbsp;&nbsp;&nbsp;';
                    html += '<input class="form-check-input is_penthouse" type="radio" data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" data-val="Yes" name="propertyDetails['+property_type+']['+value+'][is_penthouse]"   value="Yes">&nbsp;&nbsp;';
                    html += 'Yes&nbsp;&nbsp;';
                    html += '<input class="form-check-input is_penthouse" checked data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" data-val="No"  type="radio" name="propertyDetails['+property_type+']['+value+'][is_penthouse]"  value="No">&nbsp;&nbsp;No&nbsp;</label>';
                    html += '</div>';
                    html += '</div>';
					
					html += '<div class="col-sm-4" style="display:none;" id="is_penthouse_'+property_type+'_'+value.replace(/\s+/g, '')+'">';
            
                html += '<label class="control-label">';
                html += 'No of Penthouse <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][no_of_penthouse]" class="form-control number required" placeholder="No of Penthouse" value="">';
                html += '</div>';
				}
				
				
            html += '</div>';
          	
			
            html += '<div class="form-group row label-floating is-empty">';
                html += '<label class="col-sm-2 control-label">';
                html += 'Status <span class="required_field">*</span>';
                html += '</label>';
                html += '<div class="col-sm-10">';
                html += '<input type="radio" name="propertyDetails['+property_type+']['+value+'][propertystatus]" checked  class="propertystatus" data-id="'+length+'" data-type="'+property_type+'" value="Ready to move">';
                html += '&nbsp;<label for="">Ready to move</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="radio" name="propertyDetails['+property_type+']['+value+'][propertystatus]" class="propertystatus" data-id="'+length+'" data-type="'+property_type+'"  value="Under Construction">';
                html += '&nbsp;<label for="">Under Construction</label>&nbsp;&nbsp;&nbsp;';
                html += '</div>';
            html += '</div>';  
                

            html += '<div class="form-group row label-floating is-empty" id="age_property_div_'+property_type+"_"+length+'">';
                html += '<label class="col-sm-2 control-label">';
                    html += 'Age of Property<span class="required_field">*</span>';
                html += '</label>';
                html += '<div class="col-sm-10">';
                    html += '<select name="propertyDetails['+property_type+']['+value+'][age_of_property]" class="propertystatus select2 required form-control" >';
                        html += '<option value="">Select</option>';
                        html += '<option value="0-1 Year">0-1 Year</option>';
                        html += '<option value="1-5 Year">1-5 Year</option>';
                        html += '<option value="5-10 Year">5-10 Year</option>';
                        html += '<option value="10+ Year">10+ Year</option>';
                    html += '</select>';
                html += '</div>';
            html += '</div>';
            
            html += '<div class="form-group row label-floating is-empty" id="possesion_by_div_'+property_type+"_"+length+'" style="display:none;">';
                html += '<label class="col-sm-2 control-label">';
                    html += 'Possession Date <span class="required_field">*</span>';
                html += '</label>';
                html +='<div class="col-sm-2"><select name="propertyDetails['+property_type+']['+value+'][possession_month]" class="form-control select2 required">';
				<?php foreach($MonthNameList as $singleKey=>$singleValue){
				?>
				html +='<option value="<?php echo $singleKey; ?>"><?php echo $singleValue; ?></option>';
				<?php 	
				} ?>
				html += "</select></div>";
				html +='<div class="col-sm-2"><select name="propertyDetails['+property_type+']['+value+'][possession_year]" class="form-control select2 required">';
				<?php foreach($yearList as $singleKey=>$singleValue){
				?>
				html +='<option value="<?php echo $singleKey; ?>"><?php echo $singleValue; ?></option>';
				<?php 	
				} ?>
				html += "</select></div>";
				
            html += '</div>';
			
			
			html += '<div class="ResidentialPricingBlock">';
  html += '<div class="row">';
    html += '<div class="col-md-12">';
      html += '<label class="d-block">Property Ownership: </label>';
      html += '<input type="radio"  name="propertyDetails['+property_type+']['+value+'][Residentialproperty_ownership]" checked  value="Freehold">';
      html += '&nbsp;';
      html += '<label class="fw-normal">Freehold</label>';
      html += '&nbsp;&nbsp;&nbsp;';
      html += '<input type="radio" name="propertyDetails['+property_type+']['+value+'][Residentialproperty_ownership]"  value="Leases hold">';
      html += '&nbsp;';
      html += '<label class="fw-normal">Leases hold</label>';
      html += '&nbsp;&nbsp;&nbsp;';
      html += '<input type="radio" name="propertyDetails['+property_type+']['+value+'][Residentialproperty_ownership]"  value="Cooperative">';
      html += '&nbsp;';
      html += '<label class="fw-normal">Cooperative</label>';
      html += '&nbsp;&nbsp;&nbsp;';
      html += '<input type="radio" name="propertyDetails['+property_type+']['+value+'][Residentialproperty_ownership]"  value="Power of attorney">';
      html += '&nbsp;';
      html += '<label class="fw-normal">Power of attorney</label>';
      html += '&nbsp;&nbsp;&nbsp; </div>';
  html += '</div>';
  html += '<div class="row">';
    
	    if(property_type=="IndependentHome" || property_type=="Farmhouse"){
		
		html += '<div class="col-md-3">';
      html += '<div class="form-group">';
       html += ' <label>Plot Expected Price <span class="basic_price_converstion">('+property_areas+')</span><span class="required_field">*</span></label>';
       html += ' <input type="text" onkeyup=calculateBasicPrice("'+length+'","'+property_type+'","'+value+'") onchange=calculateBasicPrice("'+length+'","'+property_type+'","'+value+'") class="form-control required number ResidentialExpectedPrice_'+property_type+'_'+value+'" name="propertyDetails['+property_type+']['+value+'][ResidentialExpectedPrice]" placeholder="Expected Price" />';
     html += ' </div>';
    html += '</div>';
    html += '<div class="col-md-3">';
      html += '<div class="form-group">';
      html += '<label>Plot  Basic Price<span class="required_field">*</span></label>';
     html += '<input type="text"  style="background:#eee;" readonly="readonly" class="form-control required  ResidentialBasicPrice_'+property_type+'_'+value+'"  name="propertyDetails['+property_type+']['+value+'][ResidentialBasicPrice]" placeholder="Basic Price" />';
      html += '</div>';
    html += '</div>';
	
	
		html += '<div class="col-md-3">';
      html += '<div class="form-group">';
       html += ' <label>Construction Expected Price <span class="basic_price_converstion">('+property_areas+')</span><span class="required_field">*</span></label>';
       html += ' <input type="text" onkeyup=calculateBasicPrice("'+length+'","'+property_type+'","'+value+'") onchange=calculateBasicPrice("'+length+'","'+property_type+'","'+value+'") class="form-control required number ResidentialExpectedPrice_'+property_type+'_'+value+'" name="propertyDetails['+property_type+']['+value+'][ResidentialExpectedPrice]" placeholder="Expected Price" />';
     html += ' </div>';
    html += '</div>';
    html += '<div class="col-md-3">';
      html += '<div class="form-group">';
      html += '<label>Construction  Basic Price<span class="required_field">*</span></label>';
     html += '<input type="text"  style="background:#eee;" readonly="readonly" class="form-control required  ResidentialBasicPrice_'+property_type+'_'+value+'"  name="propertyDetails['+property_type+']['+value+'][ResidentialBasicPrice]" placeholder="Basic Price" />';
      html += '</div>';
    html += '</div>';
		
		
		}else{
	html += '<div class="col-md-3">';
      html += '<div class="form-group">';
       html += ' <label>Expected Price <span class="basic_price_converstion">('+property_areas+')</span><span class="required_field">*</span></label>';
       html += ' <input type="text" onkeyup=calculateBasicPrice("'+length+'","'+property_type+'","'+value+'") onchange=calculateBasicPrice("'+length+'","'+property_type+'","'+value+'") class="form-control required number ResidentialExpectedPrice_'+property_type+'_'+value+'" name="propertyDetails['+property_type+']['+value+'][ResidentialExpectedPrice]" placeholder="Expected Price" />';
     html += ' </div>';
    html += '</div>';
    html += '<div class="col-md-3">';
      html += '<div class="form-group">';
      html += '<label>Basic Price<span class="required_field">*</span></label>';
     html += '<input type="text"  style="background:#eee;" readonly="readonly" class="form-control required  ResidentialBasicPrice_'+property_type+'_'+value+'"  name="propertyDetails['+property_type+']['+value+'][ResidentialBasicPrice]" placeholder="Basic Price" />';
      html += '</div>';
    html += '</div>';
		}
		
		
	html +='</div>';
	
html += '<div class="row">';
html += '  <div class="col-md-4">';
html += '    <div class="form-group">';
html += '      <label>Tax and gov charges? &nbsp;&nbsp;&nbsp;';
html += '        <input onChange=ShowPriceExtra("sell_residential_'+property_type+'","tax_sell_residential_'+property_type+value+'","Yes") name="propertyDetails['+property_type+']['+value+'][ResidentialTaxandgovchargesPrice]"  class="form-check-input" type="radio"   data-val="Yes" value="Yes">';
html += '        &nbsp;&nbsp;';
html += '        Yes&nbsp;&nbsp;';
html += '        <input onChange=ShowPriceExtra("sell_residential_'+property_type+'","tax_sell_residential_'+property_type+value+'","No") name="propertyDetails['+property_type+']['+value+'][ResidentialTaxandgovchargesPrice]" type="radio"   class="form-check-input is_penthouse" checked  value="No">';
html += '        &nbsp;&nbsp;No&nbsp;</label>';
html += '    </div>';
html += '  </div>';
html += '  <div class="col-sm-4 tax_sell_residential_'+property_type+value+'" style="display:none;" >';
html += '    <input type="text" class="form-control number required" placeholder="Tax and gov charges" value="">';
html += '  </div>';
html += '</div>';
html += '<div class="row">';
html += '  <div class="col-md-4">';
html += '    <div class="form-group">';
html += '      <label>Booking amount? &nbsp;&nbsp;&nbsp;';
html += '        <input onChange=ShowPriceExtra("sell_residential_'+property_type+'","booking_sell_residential_'+property_type+value+'","Yes") name="propertyDetails['+property_type+']['+value+'][ResidentialBookingAmountPrice]" class="form-check-input" type="radio"   data-val="Yes" value="Yes">';
html += '        &nbsp;&nbsp;';
html += '        Yes&nbsp;&nbsp;';
html += '        <input onChange=ShowPriceExtra("sell_residential_'+property_type+'","booking_sell_residential_'+property_type+value+'","No") name="propertyDetails['+property_type+']['+value+'][ResidentialBookingAmountPrice]" type="radio"   class="form-check-input is_penthouse" checked  value="No">';
html += '        &nbsp;&nbsp;No&nbsp;</label>';
html += '    </div>';
html += '  </div>';
html += '  <div class="col-sm-4 booking_sell_residential_'+property_type+value+'" style="display:none;">';
html += '    <input type="text" class="form-control number required" placeholder="Booking amount" value="">';
html += '  </div>';
html += '</div>';
html += '<div class="row">';
html += '  <div class="col-md-4">';
html += '    <div class="form-group">';
html += '      <label>Membership Charge? &nbsp;&nbsp;&nbsp;';
html += '        <input onChange=ShowPriceExtra("sell_residential_'+property_type+'","membership_charge_sell_residential_'+property_type+value+'","Yes") name="propertyDetails['+property_type+']['+value+'][ResidentialMembershipChargePrice]"  class="form-check-input" type="radio"   data-val="Yes" value="Yes">';
html += '        &nbsp;&nbsp;';
html += '        Yes&nbsp;&nbsp;';
html += '        <input onChange=ShowPriceExtra("sell_residential_'+property_type+'","membership_charge_sell_residential_'+property_type+value+'","No") type="radio" name="propertyDetails['+property_type+']['+value+'][ResidentialMembershipChargePrice]"   class="form-check-input" checked  value="No">';
html += '        &nbsp;&nbsp;No&nbsp;</label>';
html += '    </div>';
html += '  </div>';
html += '  <div class="col-sm-4 membership_charge_sell_residential_'+property_type+value+'" style="display:none;">';
html += '    <input type="text" class="form-control number required" placeholder="Membership Charge" value="">';
html += '  </div>';
html += '</div>';


  html += '<div class="row">';
    html += '<div class="col-md-12">';
     html += '<label>Total Price:<input type="hidden"  class="HiddenResidentialTotalPrice" id="HiddenResidentialTotalPrice_'+property_type+'_'+value+'"  name="propertyDetails['+property_type+']['+value+'][HiddenResidentialTotal]">  <span class="ResidentialTotalPrice" id="ResidentialTotalPrice_'+property_type+'_'+value+'">0.00</span></label>';
    html += '</div>';
  html += '</div>';
html += '</div>';


            html += '</div>';
            html += '</div>';
            html += '</div>';

            $(".property_type_accordion").append(html);
            getPropertyTypeDisable();
			
            $("#property_unit_type,#property_unit_type_ind").prop("selectedIndex", 0); 
           jQuery(".select2").select2();
		  
			}else{
				
			//for rent
			
            var html = '';
            html += '<div class="accordion-item property_type_'+property_type+'" id="'+property_type+'_accordion_'+length+'" >';
            html += '<div class="accordion-header rounded-lg collapsed" id="headingOne" data-bs-toggle="collapse" data-bs-target="#'+property_type+'_accordion_header_'+length+'" aria-expanded="true" aria-controls="collapseOne">';
            html += value;
            html += '<div class="close-window">';
            html += '<i class="fa fa-times delete_acc" data-value="'+value+'" data-id="'+length+'" data-type="'+property_type+'" aria-hidden="true"></i>';
            html += '</div>';
            html += '</div>';
            html += '<div id="'+property_type+'_accordion_header_'+length+'" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionUnitType">';
            html += '<div class="accordion__body">';
           
		   html += '<div class="form-group row label-floating is-empty">';
         html +='<div class="col-sm-12">'
        
         
         if(property_type=="IndependentHome" || property_type=="Farmhouse"){ 
		  
        html +='<table class="table table-bordered table-hover  table-striped '+property_type+'_items_table_'+length+'">';
        html +='<thead class="thead-primary">';
html +='<tr>';
html +='<th width="30">Sr.</th>';

html +='<th width="400">Plot Area</th>';
html +='<th width="400">Plot Super Built-up Area</th>';
html +='<th width="400">Construction Built-up Area</th>';
html +='<th width="200">Construction Super Built-up Area</th>';
html +='<th width="100">Action</th>';
html +='</tr>';
html +='</thead>';
html +='<tbody>';
html +='<tr><td><span class="counter">1</span></td><td><input type="text"  name="propertyDetails['+property_type+']['+value+'][plot_area][0]" class="plot_area_txt form-control number required" placeholder="Plot Area"></td><td><input type="text"  name="propertyDetails['+property_type+']['+value+'][plot_super_area][0]" class="plot_super_built_up_area_txt form-control number required" placeholder="Plot Super Built-up Area"></td><td><input type="text" name="propertyDetails['+property_type+']['+value+'][construction_built_up_area][0]" class="construction_built_up_area_txt form-control number required" placeholder="Construction Built-up Area"></td><td><input type="text" onkeyup="calculateBasicPrice("0",'+property_type+','+value+')" onchange="calculateBasicPrice("0",'+property_type+','+value+')" name="propertyDetails['+property_type+']['+value+'][construction_super_built_up_area][0]" class="construction_super_built_up_area_txt form-control number required" placeholder="Construction Super Built-up Area" value=""></td><td><div  data-type="'+property_type+'" data-id="'+length+'" data-value="'+value+'" class="delelteItem"><i class="fa fa-times"></i></div></td></tr>';

html +='</tbody>';
html +='</table>';
         }
         else{ 
		  
        html +='<table class="table table-bordered table-hover  table-striped '+property_type+'_items_table_'+length+'">';
html +='<thead class="thead-primary">';
html +='<tr>';
html +='<th width="30">Sr.</th>';
html +='<th width="400">Carpet Area</th>';
html +='<th width="200">Super Built-up Area</th>';
html +='<th width="100">Action</th>';
html +='</tr>';
html +='</thead>';
html +='<tbody>';
html +='<tr><td><span class="counter">1</span></td><td><input type="text" name="propertyDetails['+property_type+']['+value+'][carpet_area][0]" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></td><td><input type="text" onkeyup="calculateBasicPrice("0",'+property_type+','+value+')" onchange="calculateBasicPrice("0",'+property_type+','+value+')" name="propertyDetails['+property_type+']['+value+'][super_builtup_area][0]" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area"></td><td><div data-id="'+length+'" data-value="'+value+'" class="delelteItem" data-type="'+property_type+'"><i class="fa fa-times"></i></div></td></tr>';

html +='</tbody>';
html +='</table>';
         }
html +='<div class="add-new-btn text-right d-block" style="float:right"><input type="button" value="Add New Area" data-type="'+property_type+'" data-id="'+length+'" data-value="'+value+'"   class="AddNewRow btn btn-primary"></div></div></div>';
          
            html += '<div class="form-group row label-floating is-empty">';
            html += '<div class="col-sm-4">';
           
            html += '<label class="control-label">';
                html += 'No of Bedrooms <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_bedrooms]" class="form-control number required" placeholder="No of Bedrooms" value="">';
                html += '</div>';
                html += '<div class="col-sm-4">';
            
                html += '<label class="control-label">';
                html += 'No of Bathrooms <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_bathrooms]" class="form-control number required" placeholder="No of Bathrooms" value="">';
                html += '</div>';
            
                html += '<div class="col-sm-4">';
            
                html += '<label class="control-label">';
                html += 'No of Balconies <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_balconies]" class="form-control number required" placeholder="No of Balconies" value="">';
                html += '</div>';
        	
			
                
			    
            html += '</div>';


            html += '<div class="form-group row label-floating is-empty">';
                html += '<label class="col-sm-2 control-label">';
                html += 'Other Rooms';
                html += '</label>';
                html += '<div class="col-sm-10">';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][other_room][]" value="Pooja Room">';
                html += '&nbsp;<label>Pooja Room</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][other_room][]" value="Servant Room">';
                html += '&nbsp;<label>Servant Room</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][other_room][]"  value="Store Room">';
                html += '&nbsp;<label>Store Room</label>&nbsp;&nbsp;&nbsp;';
				
                html += '</div>';
            html += '</div>';
                
            html += '<div class="form-group row label-floating is-empty">';
                html += '<label class="col-sm-2 control-label">';
                html += 'Furnishing';
                html += '</label>';
                html += '<div class="col-sm-10">';
                html += '<input type="radio" class="rent_furnicher" data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" name="propertyDetails['+property_type+']['+value+'][furnished_details][]" value="Furnished">';
                html += '&nbsp;<label>Furnished</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="radio" class="rent_furnicher" data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" name="propertyDetails['+property_type+']['+value+'][furnished_details][]" value="Semi-furnished">';
                html += '&nbsp;<label>Semi-furnished</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="radio" class="rent_furnicher" data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" checked name="propertyDetails['+property_type+']['+value+'][furnished_details][]" value="Un furnished">';
                html += '&nbsp;<label>Un furnished</label>&nbsp;&nbsp;&nbsp;';
                html += '</div>';
            html += '</div>';
			
			
			html += '<div class="form-group ferunicher_rent_data row label-floating is-empty" id="property_furn_'+property_type+'_'+value.replace(/\s+/g, '')+'" style="display:none;">';
  html += '<div class="col-sm-2"></div>';
  html += '<div class="col-sm-10 PropertyFeatures">';
    html += '<ul>';
      html += '<li><input type="checkbox"   value="Light" name="furnished_data[]" /> Light </li>';
      html += '<li><input type="checkbox"   value="fans" name="furnished_data[]" /> fans </li>';
      html += '<li><input type="checkbox"   value="AC" name="furnished_data[]" /> AC </li>';
      html += '<li><input type="checkbox"   value="TV" name="furnished_data[]" /> TV </li>';
      html += '<li><input type="checkbox"   value="Beds" name="furnished_data[]" /> Beds </li>';
      html += '<li><input type="checkbox"   value="Wardrobe" name="furnished_data[]" /> Wardrobe </li>';
      html += '<li><input type="checkbox"   value="Geyser" name="furnished_data[]" /> Geyser </li>';
      html += '<li><input type="checkbox"   value="Sofa" name="furnished_data[]" /> Sofa </li>';
      html += '<li><input type="checkbox"   value="Washing machine" name="furnished_data[]" /> Washing machine </li>';
      html += '<li><input type="checkbox"   value="Stove" name="furnished_data[]" /> Stove </li>';
      html += '<li><input type="checkbox"   value="fridge" name="furnished_data[]" /> fridge </li>';
      html += '<li><input type="checkbox"   value="water purifier" name="furnished_data[]" /> water purifier </li>';
      html += '<li><input type="checkbox"   value="microwave" name="furnished_data[]" /> microwave </li>';
      html += '<li><input type="checkbox" value="modular kitchen" name="furnished_data[]" /> modular kitchen </li>';
      html += '<li><input type="checkbox" value="Chimney" name="furnished_data[]" /> Chimney </li>';
      html += '<li><input type="checkbox"  value="Dinning Table" name="furnished_data[]" /> Dinning Table </li>';
      html += '<li><input type="checkbox" value="Curtains" name="furnished_data[]" /> Curtains </li>';
      html += '<li><input type="checkbox"   value="Exhaust Fan" name="furnished_data[]" /> Exhaust Fan </li>';
     html += '</ul>';
   html += '</div>';
 html += '</div>';
 html += '<div class="form-group row ferunicher_rent_data label-floating is-empty" id="property_semi_furn_'+property_type+'_'+value.replace(/\s+/g, '')+'" style="display:none;">';
   html += '<div class="col-sm-2"></div>';
   html += '<div class="col-sm-10 PropertyFeatures">';
    html += '<ul>';
      html += '<li><input type="checkbox"   value="Light" name="furnished_data[]" /> Light </li>';
      html += '<li><input type="checkbox"   value="fans" name="furnished_data[]" /> fans </li>';
      html += '<li><input type="checkbox"   value="AC" name="furnished_data[]" /> AC </li>';
      html += '<li><input type="checkbox"   value="TV" name="furnished_data[]" /> TV </li>';
      html += '<li><input type="checkbox"   value="Beds" name="furnished_data[]" /> Beds </li>';
      html += '<li><input type="checkbox"   value="Wardrobe" name="furnished_data[]" /> Wardrobe </li>';
      html += '<li><input type="checkbox"   value="Geyser" name="furnished_data[]" /> Geyser </li>';
      html += '<li><input type="checkbox"   value="Sofa" name="furnished_data[]" /> Sofa </li>';
      html += '<li><input type="checkbox"   value="Washing machine" name="furnished_data[]" /> Washing machine </li>';
      html += '<li><input type="checkbox"   value="Stove" name="furnished_data[]" /> Stove </li>';
      html += '<li><input type="checkbox"   value="fridge" name="furnished_data[]" /> fridge </li>';
      html += '<li><input type="checkbox"   value="water purifier" name="furnished_data[]" /> water purifier </li>';
      html += '<li><input type="checkbox"   value="microwave" name="furnished_data[]" /> microwave </li>';
      html += '<li><input type="checkbox" value="modular kitchen" name="furnished_data[]" /> modular kitchen </li>';
      html += '<li><input type="checkbox" value="Chimney" name="furnished_data[]" /> Chimney </li>';
      html += '<li><input type="checkbox"  value="Dinning Table" name="furnished_data[]" /> Dinning Table </li>';
      html += '<li><input type="checkbox" value="Curtains" name="furnished_data[]" /> Curtains </li>';
      html += '<li><input type="checkbox"   value="Exhaust Fan" name="furnished_data[]" /> Exhaust Fan </li>';
     html += '</ul>';
  html += '</div>';
html += '</div>';


html += '<div class="row"><div class="col-md-3">';
                    html += '<div class="form-group">';
                    html += '<label>Covered Parking &nbsp;&nbsp;&nbsp;';
                    html += '<input class="form-check-input is_cover_parking" type="radio" data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" data-val="Yes" name="propertyDetails['+property_type+']['+value+'][is_cover_parking]"   value="Yes">&nbsp;&nbsp;';
                    html += 'Yes&nbsp;&nbsp;';
                    html += '<input class="form-check-input is_cover_parking" checked data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" data-val="No"  type="radio" name="propertyDetails['+property_type+']['+value+'][is_cover_parking]"  value="No">&nbsp;&nbsp;No&nbsp;</label>';
                    html += '</div>';
                    html += '</div>';
					
					html += '<div class="col-sm-4" style="display:none;" id="is_cover_parking_'+property_type+'_'+value.replace(/\s+/g, '')+'">';
            
                html += '<label class="control-label" style="display: inline-block;">';
                html += 'No of Cover Parking <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text"  style="display: inline-block;width: auto;margin-left: 5px;" name="propertyDetails['+property_type+']['+value+'][no_of_cover_parking]" class="form-control number required" placeholder="No of Cover Parking" value="">';
                html += '</div></div>';
				
				
				

html += '<div class="row"><div class="col-md-3">';
                    html += '<div class="form-group">';
                    html += '<label>Open Parking &nbsp;&nbsp;&nbsp;';
                    html += '<input class="form-check-input is_open_parking" type="radio" data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" data-val="Yes" name="propertyDetails['+property_type+']['+value+'][is_open_parking]"   value="Yes">&nbsp;&nbsp;';
                    html += 'Yes&nbsp;&nbsp;';
                    html += '<input class="form-check-input is_open_parking" checked data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" data-val="No"  type="radio" name="propertyDetails['+property_type+']['+value+'][is_open_parking]"  value="No">&nbsp;&nbsp;No&nbsp;</label>';
                    html += '</div>';
                    html += '</div>';
					
					html += '<div class="col-sm-4" style="display:none;" id="is_open_parking_'+property_type+'_'+value.replace(/\s+/g, '')+'">';
            
                html += '<label class="control-label" style="display: inline-block;">';
                html += 'No of Open Parking<span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text"  style="display: inline-block;width: auto;margin-left: 5px;" name="propertyDetails['+property_type+']['+value+'][no_of_cover_parking]" class="form-control number required" placeholder="No of Open Parking" value="">';
                html += '</div></div>';
				
				
				

html += '<div class="row"><div class="col-md-3">';
                    html += '<div class="form-group">';
                    html += '<label>Hydraulic Parking &nbsp;&nbsp;&nbsp;';
                    html += '<input class="form-check-input hydraulic_parking" type="radio" data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" data-val="Yes" name="propertyDetails['+property_type+']['+value+'][hydraulic_parking]"   value="Yes">&nbsp;&nbsp;';
                    html += 'Yes&nbsp;&nbsp;';
                    html += '<input class="form-check-input hydraulic_parking" checked data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" data-val="No"  type="radio" name="propertyDetails['+property_type+']['+value+'][hydraulic_parking]"  value="No">&nbsp;&nbsp;No&nbsp;</label>';
                    html += '</div>';
                    html += '</div>';
					
					html += '<div class="col-sm-4" style="display:none;" id="hydraulic_parking_'+property_type+'_'+value.replace(/\s+/g, '')+'">';
            
                html += '<label class="control-label" style="display: inline-block;">';
                html += 'No of Hydraulic Parking<span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text"  style="display: inline-block;width: auto;margin-left: 5px;" name="propertyDetails['+property_type+']['+value+'][no_of_cover_parking]" class="form-control number required" placeholder="No of Hydraulic Parking" value="">';
                html += '</div></div>';
				


            	
					html += '<div class="row gx-3 gy-2 align-items-center pt-0">';
            		html += '<div class="col-md-4">';
                    html += '<div class="form-group">';
                    html += '<label>Penthouse  Available Or Not? &nbsp;&nbsp;&nbsp;';
                    html += '<input class="form-check-input is_penthouse" type="radio" data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" data-val="Yes" name="propertyDetails['+property_type+']['+value+'][is_penthouse]"   value="Yes">&nbsp;&nbsp;';
                    html += 'Yes&nbsp;&nbsp;';
                    html += '<input class="form-check-input is_penthouse" checked data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" data-val="No"  type="radio" name="propertyDetails['+property_type+']['+value+'][is_penthouse]"  value="No">&nbsp;&nbsp;No&nbsp;</label>';
                    html += '</div>';
                    html += '</div>';
					
					html += '<div class="col-sm-4" style="display:none;" id="is_penthouse_'+property_type+'_'+value.replace(/\s+/g, '')+'">';
            
                html += '<label class="control-label" style="display: inline-block;">';
                html += 'No of Penthouse <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" style="display: inline-block;width: auto;margin-left: 5px;" name="propertyDetails['+property_type+']['+value+'][no_of_penthouse]" class="form-control number required" placeholder="No of Penthouse" value="">';
                html += '</div>';
				
				
            html += '</div>';
			
			
			
			
			
			
			
			            html += '<div class="form-group row label-floating is-empty">';
            html += '<div class="col-sm-3">';
           
            html += '<label class="control-label">';
                alert(property_type);
				if(property_type=="ApartmentAndFlat"){
					html += 'Flat/Apartment Number<span class="required_field">*</span>';
				}else{
					html += 'Bunglow Number<span class="required_field">*</span>';
				}
                html += '</label>';
                if(property_type=="ApartmentAndFlat"){
					html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][FlatApartmentNumber]" class="form-control number required" placeholder="Flat/Apartment Number" value="">';
				}else{
					html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][FlatApartmentNumber]" class="form-control number required" placeholder="Bunglow Number" value="">';
				}
				
                
				html += '</div>';
                html += '<div class="col-sm-3">';
            
                html += '<label class="control-label">';
                html += 'Property Available Date';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][PropertyAvailableDate]" class="form-control number" placeholder="Property Available Date" value="">';
                html += '</div>';
             if(property_type=="ApartmentAndFlat"){
                
                html += '<div class="col-sm-3">';
            
                html += '<label class="control-label">';
                html += 'No of Floor <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][NoofFloor]" class="form-control number required" placeholder="No of Floor" value="">';
                html += '</div>';
        	
				html += '<div class="col-sm-3">';
            
                html += '<label class="control-label">';
                html += 'No of Block  <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][NoofBlock]" class="form-control number required" placeholder="No of Block" value="">';
                html += '</div>';
				 }
                html += '<div class="col-sm-3">';
            
                html += '<label class="control-label">';
                html += 'Floor Number<span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][FloorNumber]" class="form-control number required" placeholder="Floor Number" value="">';
                html += '</div>';
        		
			 html += '<div class="col-sm-3">';
            
                html += '<label class="control-label">';
                html += 'Block Number<span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][BlockNumber]" class="form-control number required" placeholder="Block Number" value="">';
                html += '</div>';
        	
		
			 html += '<div class="col-sm-3">';
            
                html += '<label class="control-label">';
                html += 'Expected Rent<span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][ExpectedRent]" class="form-control number required" placeholder="Expected Rent" value="">';
                html += '</div>';
				
			
			 html += '<div class="col-sm-3">';
            
                html += '<label class="control-label">';
                html += 'Advance Rent';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][AdvanceRent]" class="form-control number" placeholder="Advance Rent" value="">';
                html += '</div>';
        	
		
			
			
			 html += '<div class="col-sm-3">';
            
                html += '<label class="control-label">';
                html += 'Deposit Amount';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][DepositAmount]" class="form-control number" placeholder="Deposit Amount" value="">';
                html += '</div>';
        	
		
			
                
			    
            html += '</div>';
			
			
            html += '<div class="form-group row label-floating is-empty">';
                html += '<div class="col-sm-10">';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][otherCharges][]" value="Electricity Excluded">';
                html += '&nbsp;<label>Electricity Excluded</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][otherCharges][]" value="Servant Room">';
                html += '&nbsp;<label>Property Tax excluded</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][otherCharges][]"  value="Store Room">';
                html += '&nbsp;<label>Maintenance Excluded</label>&nbsp;&nbsp;&nbsp;';
				html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][otherCharges][]"  value="Theater Room">';
                html += '&nbsp;<label>Price Negotiable</label>&nbsp;&nbsp;&nbsp;';
				
                html += '</div>';
            html += '</div>';
			
			
			
            html += '<div class="form-group row label-floating is-empty">';
                html += '<div class="col-sm-2"><label>Willing Rent Out To:</label>';
				html += '</div>';
				html += '<div class="col-sm-10">';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][WillingRentOutTo][]" value="Electricity Excluded">';
                html += '&nbsp;<label>Family</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][WillingRentOutTo][]" value="Servant Room">';
                html += '&nbsp;<label>Single Man</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][WillingRentOutTo][]"  value="Store Room">';
                html += '&nbsp;<label>Single Women</label>&nbsp;&nbsp;&nbsp;';
				html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][WillingRentOutTo][]"  value="Theater Room">';
                html += '&nbsp;<label>Bachlor’s Boy</label>&nbsp;&nbsp;&nbsp;';
				html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][WillingRentOutTo][]"  value="Theater Room">';
                html += '&nbsp;<label>Bachlor’s Girl</label>&nbsp;&nbsp;&nbsp;';
				html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][WillingRentOutTo][]"  value="Theater Room">';
                html += '&nbsp;<label>PG For Boys</label>&nbsp;&nbsp;&nbsp;';
				html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][WillingRentOutTo][]"  value="Theater Room">';
                html += '&nbsp;<label>PG For Girls</label>&nbsp;&nbsp;&nbsp;';
				
                html += '</div>';
            html += '</div>';
			
				html += '<div class="row gx-3 gy-2 align-items-center pt-0">';
            		html += '<div class="col-md-4">';
                    html += '<div class="form-group">';
                    html += '<label>Availability of Property for stay? &nbsp;&nbsp;&nbsp;';
                    html += '<input class="form-check-input" type="radio" data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" data-val="Yes" name="propertyDetails['+property_type+']['+value+'][AvailabilityofPropertyforstay]"   value="Yes">&nbsp;&nbsp;';
                    html += 'Yes&nbsp;&nbsp;';
                    html += '<input class="form-check-input" checked data-type="'+property_type+'" data-value="'+value.replace(/\s+/g, '')+'" data-val="No"  type="radio" name="propertyDetails['+property_type+']['+value+'][AvailabilityofPropertyforstay]"  value="No">&nbsp;&nbsp;No&nbsp;</label>';
                    html += '</div>';
                    html += '</div></div>';
					
					
					
			html += '<div class="row">';
            html += '<div class="col-md-4">';
            html += '<div class="form-group">';
            html += '<label>Long Turm Lease &nbsp;&nbsp;&nbsp;';
            html += '<input name="propertyDetails['+property_type+']['+value+'][LongTurmLease]" class="form-check-input is_penthouse" type="radio"   data-val="Yes" value="Yes">&nbsp;&nbsp;';
            html += 'Yes&nbsp;&nbsp;';
            html += '<input name="propertyDetails['+property_type+']['+value+'][LongTurmLease]"  type="radio"   class="form-check-input" checked  value="No">&nbsp;&nbsp;No&nbsp;</label>';
            html += '</div>';
            html += '</div></div>';
				
					
					
					
					
			
			
			 html += '<div class="row"><div class="col-sm-4">';
            
                html += '<label class="control-label">';
                html += 'Duration of Aggrement';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][DurationofAggrement]" class="form-control number required" placeholder="Duration of Aggrement" value="">';
                html += '</div>';
        	
		
			
			
			 html += '<div class="col-sm-4">';
            
                html += '<label class="control-label">';
                html += 'Month Of Notice';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][MonthOfNotice]" class="form-control" placeholder="Month Of Notice" value="">';
                html += '</div>';
        	
		
			 html += '<div class="col-sm-4">';
            
                html += '<label class="control-label">';
                html += 'What makes your property unique';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][Whatmakesyourpropertyunique]" class="form-control" placeholder="What makes your property unique" value="">';
                html += '</div>';
        	
		
            html += '</div>';
			
		
			html += '<div class="row">';
        	
				 html += '<div class="col-sm-4">';
            
                html += '<label class="control-label">';
                html += 'Index Copy<span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="file" name="propertyDetails['+property_type+']['+value+'][IndexCopy]" class="form-control number required" placeholder="Duration of Agreement" value="">';
                html += '</div>';
        	
		
			
			
			 html += '<div class="col-sm-4">';
            
                html += '<label class="control-label">';
                html += 'Adhar Card<span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="file" name="propertyDetails['+property_type+']['+value+'][AdharCard]" class="form-control number required" value="">';
                html += '</div>';
        	
		
			 html += '<div class="col-sm-4">';
            
                html += '<label class="control-label">';
                html += 'Municipality Tax Bill<span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="file" name="propertyDetails['+property_type+']['+value+'][MunicipalityTaxBill]" class="form-control number required" value="">';
                html += '</div>';
        	
		
            html += '</div>';
			
			
			 html += '<div class="row"><div class="col-sm-12">';
            
                html += '<label class="control-label">';
                html += 'Yearly Rent is excepted to Increase By';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][YearlyRentisexceptedtoIncreaseBy]" class="form-control" placeholder="Yearly Rent is excepted to Increase By" value="">';
                html += '</div>';
        	
		
            html += '</div>';
			
			

          	
			
			
            $(".property_type_accordion").append(html);
            getPropertyTypeDisable();
			
            $("#property_unit_type,#property_unit_type_ind").prop("selectedIndex", 0); 
           jQuery(".select2").select2();
		  	
			}
		  
		  }
        else{
            alert("Please select value");
        }
    });
	
	
	jQuery(document).on("click",".AddNewRowRentCommercialAreaHospital",function(){
		
		var items_table_length = jQuery(".rent_commercial_hospital_area  tbody tr").length+1;
		var counterIndex= 0;
		if(items_table_length==0){
			items_table_length = 1;	
		}
		var counterIndex= items_table_length -1; 
		var html = '<tr><td><span class="counter">'+items_table_length+'</span></td><td><input type="text" name="rent_commercial_hospital_area[plot_area]['+counterIndex+']" class="plot_area_txt form-control required number" placeholder="Plot Area"></td><td><input type="text" name="rent_commercial_hospital_area[carpet_area]['+counterIndex+']" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></td>';
       	html += '<td><input type="text" name="rent_commercial_hospital_area[super_builtup_area]['+counterIndex+']" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area">';
        html += '</td>';
        html += '<td><div data-id="'+counterIndex+'" class="delelteItemRentCommercialAreaHospital" ><i class="fa fa-times"></i></div></td></tr>';
      
	  jQuery(".rent_commercial_hospital_area  tbody tr:last").after(html);
	});
	
	
	jQuery(document).on("click",".AddNewRowCommercialSpaceArea",function(){
		
		var items_table_length = jQuery(".rent_commercial_space_area tbody tr").length+1;
		var counterIndex= 0;
		if(items_table_length==0){
			items_table_length = 1;	
		}
		var counterIndex= items_table_length -1; 
		var html = '<tr><td><span class="counter">'+items_table_length+'</span></td><td><input type="text" name="rent_commercial_space[carpet_area]['+counterIndex+']" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></td>';
       	html += '<td><input type="text" name="rent_commercial_space[super_builtup_area]['+counterIndex+']" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area">';
        html += '</td>';
        html += '<td><div data-id="'+counterIndex+'" class="delelteItemRentCommercialSpaceArea" ><i class="fa fa-times"></i></div></td></tr>';
      
	  jQuery(".rent_commercial_space_area tbody tr:last").after(html);
	});
	
	
	jQuery(document).on("click",".AddNewRowCommercialArea",function(){
		
		var items_table_length = jQuery(".commercial_area .col_commercial_area").length+1;
		var counterIndex= 0;
		if(items_table_length==0){
			items_table_length = 1;	
		}
		var counterIndex= items_table_length -1; 
		
		
var html = '<div class="col-md-4  col_commercial_area">';
html += '<div class="multipleBoxCol">';
html += '<div class="headingTabsCols"><span class="counter">'+items_table_length+'</span>';
html += '<div data-index="0" data-id="'+counterIndex+'" class="delelteItemCommercialArea"><i class="fa fa-times"></i></div>';
html += '</div>';
html += '<div class="col-md-12">';
html += '<div class="form-group">';
html += '<label>Carpet Area</label>';
html += '<input type="text" class="form-control" placeholder="Carpet Area">';
html += '</div>';
html += '</div>';

if(jQuery("#sell_commercial_property_type").val()=="Commercial Space"){
html += '<div class="col-md-12 hospitality_prop commericil_space_type">';
html += '<div class="form-group">';
html += '<label>Ploat Area</label>';
html += '<input type="text" class="form-control" placeholder="Ploat Area">';
html += '</div>';
html += '</div>';
}
html += '<div class="col-md-12">';
html += '<div class="form-group">';
html += '<label>Super Built-up Area</label>';
html += '<input type="text" class="form-control"  placeholder="Super Built-up Area">';
html += '</div>';
html += '</div>';
if(jQuery("#sell_commercial_property_type").val()=="Retail" || jQuery("#sell_commercial_property_type").val()=="Commercial Space"){
html += '<div class="hospitality_prop_hide commericil_space_type">';
html += '<div class="col-md-12 retail_type commericil_space_type">';
html += '<div class="form-group">';
html += '<label>Entrance width <span class="required_field">*</span></label>';
html += '<input type="text" name="entrance_width"  class="form-control required number" />';
html += '</div>';
html += '</div>';
html += '<div class="col-md-12 retail_type commericil_space_type">';
html += '<div class="form-group">';
html += '  <label>Ceiling Heights <span class="required_field">*</span></label>';
html += '  <input type="text" name="ceiling_heights"  class="form-control required number" />';
html += '</div>';
html += '</div>';

}
html += '<div class="col-md-12">';
html += ' <div class="form-group">';
html += ' <label>No of Private Washroom <span class="required_field">*</span></label>';
html += '      <input type="text" placeholder="No of Private Washroom"  name="number_of_private_washroom" class="form-control required number" />';
html += ' </div>';
html += '</div>';
html += '<div class="col-md-12">';
html += '  <div class="form-group">';
html += '    <label>No of Shared Washroom <span class="required_field">*</span></label>';
html += '    <input type="text" placeholder="No of Shared Washroom"  name="number_of_shared_washroom" class="form-control required number" />';
html += '  </div>';
html += ' </div>';
html += '<div class="hospitality_prop_hide commericil_space_type ">';
html += '  <div class="col-md-12">';
html += '    <div class="form-group">';
html += '      <label>No of floor <span class="required_field">*</span></label>';
html += '      <input type="text" placeholder="No of floor"  name="number_of_floor" class="form-control required number" />';
html += '    </div>';
html += '  </div>';
html += '  <div class="col-md-12">';
html += '    <div class="form-group">';
html += '      <label>No of Passenger lifts <span class="required_field">*</span></label>';
html += '      <input type="text" placeholder="No of Passenger lifts"  name="number_of_passenger_lifts" class="form-control required number" />';
html += '    </div>';
html += '  </div>';
html += '  <div class="col-md-12">';
html += '    <div class="form-group">';
html += '      <label>No of Service Lift <span class="required_field">*</span></label>';
html += '<input type="text" placeholder="No of Service Lift"  name="number_of_service_lift" class="form-control required number" />';
html += '</div>';
html += '</div>';
html += '<div class="col-md-12">';
html += '<div class="form-group">';
html += '<label>No of Staircases <span class="required_field">*</span></label>';
html += '<input type="text" placeholder="No of Staircases"  name="number_of_staircases" class="form-control required number" />';
html += '</div>';
html += '</div>';
html += '</div>';
html += '</div>';
html += '</div>';

	  jQuery(".commercial_area .col_commercial_area:last").after(html);
	});
	
	
	jQuery(document).on("click",".AddNewRowIndustrialArea",function(){
		
		var items_table_length = jQuery(".industrial_area tbody tr").length+1;
		var counterIndex= 0;
		if(items_table_length==0){
			items_table_length = 1;	
		}
		var counterIndex= items_table_length -1; 
		var html = '<tr><td><span class="counter">'+items_table_length+'</span></td>';
		html += '<td><input type="text" name="industrial_area[plot_area]['+counterIndex+']" class="plot_area_txt form-control required number" placeholder="Plot Area"></td>';
		html += '<td><input type="text" name="industrial_area[plot_built_area]['+counterIndex+']" class="plot_built_area_txt form-control required number" placeholder="Plot Super Built-up Area"></td>';
       	html += '<td><input type="text" name="industrial_area[construction_area]['+counterIndex+']" class="construction_area_txt form-control required number" placeholder="construction Area">';
		html += '<td><input type="text" name="industrial_area[construction_built_area]['+counterIndex+']" class="construction_built_area_txt form-control required number" placeholder="Construction Super Built-up Area">';
		
        html += '</td>';
        html += '<td><div data-id="'+counterIndex+'" class="delelteItemIndustrialArea" ><i class="fa fa-times"></i></div></td></tr>';
      
	  jQuery(".industrial_area tbody tr:last").after(html);
	});
	
	
	jQuery(document).on("click",".RentAddNewRowIndustrialArea",function(){
		
		var items_table_length = jQuery(".rent_industrial_area tbody tr").length+1;
		var counterIndex= 0;
		if(items_table_length==0){
			items_table_length = 1;	
		}
		var counterIndex= items_table_length -1; 
		var html = '<tr><td><span class="counter">'+items_table_length+'</span></td>';
		html += '<td><input type="text" name="Rentindustrial_area[plot_area]['+counterIndex+']" class="plot_area_txt form-control required number" placeholder="Plot Area"></td>';
		html += '<td><input type="text" name="Rentindustrial_area[plot_built_area]['+counterIndex+']" class="plot_built_area_txt form-control required number" placeholder="Plot Super Built-up Area"></td>';
       	html += '<td><input type="text" name="Rentindustrial_area[construction_area]['+counterIndex+']" class="construction_area_txt form-control required number" placeholder="construction Area">';
		html += '<td><input type="text" name="Rentindustrial_area[construction_built_area]['+counterIndex+']" class="construction_built_area_txt form-control required number" placeholder="Construction Super Built-up Area">';
		
        html += '</td>';
        html += '<td><div data-id="'+counterIndex+'" class="RentdelelteItemIndustrialArea" ><i class="fa fa-times"></i></div></td></tr>';
      
	  jQuery(".rent_industrial_area tbody tr:last").after(html);
	});
	
	
	jQuery(document).on("click",".AddNewRowPloatArea",function(){
		
		var items_table_length = jQuery(".ploat_area_table tbody tr").length+1;
		var counterIndex= 0;
		if(items_table_length==0){
			items_table_length = 1;	
		}
		var counterIndex= items_table_length -1; 
		var html = '<tr><td><span class="counter">'+items_table_length+'</span></td>';
		html += '<td><input type="text" name="ploating_area[plot_area]['+counterIndex+']" class="plot_area_txt form-control required number" placeholder="Plot Area"></td>';
		html += '<td><div data-id="'+counterIndex+'" class="delelteItemPloatArea" ><i class="fa fa-times"></i></div></td></tr>';
      
	  jQuery(".ploat_area_table tbody tr:last").after(html);
	});
	
	
	jQuery(document).on("click",".AddNewRowCommercialSpaceArea",function(){
		
		var items_table_length = jQuery(".commercial_space_area tbody tr").length+1;
		var counterIndex= 0;
		if(items_table_length==0){
			items_table_length = 1;	
		}
		var counterIndex= items_table_length -1; 
		var html = '<tr><td><span class="counter">'+items_table_length+'</span></td><td><input type="text" name="commerical_space[plot_area]['+counterIndex+']" class="plot_area_txt form-control required number" placeholder="Plot Area"></td><td><input type="text" name="commerical_space[carpet_area]['+counterIndex+']" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></td>';
       	html += '<td><input type="text" name="commerical_space[super_builtup_area]['+counterIndex+']" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area">';
        html += '</td>';
        html += '<td><div data-id="'+counterIndex+'" class="delelteItemCommercialSpaceArea" ><i class="fa fa-times"></i></div></td></tr>';
      
	  jQuery(".commercial_space_area tbody tr:last").after(html);
	});
	
	
	jQuery(document).on("click",".RentAddNewRowCommercialArea",function(){
		
		var items_table_length = jQuery(".rent_commercial_area tbody tr").length+1;
		var counterIndex= 0;
		if(items_table_length==0){
			items_table_length = 1;	
		}
		var counterIndex= items_table_length -1; 
		var html = '<tr><td><span class="counter">'+items_table_length+'</span></td><td><input type="text" name="commerical[carpet_area]['+counterIndex+']" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></td>';
       	html += '<td><input type="text" name="commerical[super_builtup_area]['+counterIndex+']" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area">';
        html += '</td>';
        html += '<td><div data-id="'+counterIndex+'" class="RentdelelteItemCommercialArea" ><i class="fa fa-times"></i></div></td></tr>';
      
	  jQuery(".rent_commercial_area tbody tr:last").after(html);
	});
	
	
	jQuery(document).on("click",".AddNewRow",function(){
      var length = jQuery(this).attr("data-id");
      var property_type = jQuery(this).attr("data-type");
      var value = jQuery(this).attr("data-value");
      	var items_table_length = jQuery("."+property_type+"_items_table_"+length+" .col_"+property_type+"_items_table_"+length).length+1;
		var counterIndex= 0;
		if(items_table_length==0){
			items_table_length = 1;	
		}
		var counterIndex= items_table_length -1; 
		var html="";
      if(property_type=="IndependentHome" || property_type=="Farmhouse" ){
     // var html ='<tr><td><span class="counter">'+items_table_length+'</span></td><td><input type="text"  name="propertyDetails['+data_type+']['+data_value+'][plot_area]['+counterIndex+']" class="plot_area_txt form-control number required" placeholder="Plot Area"></td><td><input type="text"  name="propertyDetails['+data_type+']['+data_value+'][plot_super_area]['+counterIndex+']" class="plot_super_built_up_area_txt form-control number required" placeholder="Plot Super Built-up Area" keyup=calculateBasicPrice("'+data_id+'","'+data_type+'","'+data_value+'")   onchange=calculateBasicPrice("'+data_id+'","'+data_type+'","'+data_value+'")></td><td><input type="text" name="propertyDetails['+data_type+']['+data_value+'][construction_built_up_area]['+counterIndex+']" class="construction_built_up_area_txt form-control number required" placeholder="Construction Built-up Area"></td><td><input type="text" keyup=calculateBasicPrice("'+data_id+'","'+data_type+'","'+data_value+'")   onchange=calculateBasicPrice("'+data_id+'","'+data_type+'","'+data_value+'") name="propertyDetails['+data_type+']['+data_value+'][construction_super_built_up_area]['+counterIndex+']" class="construction_super_built_up_area_txt form-control number required" placeholder="Construction Super Built-up Area" value=""></td><td><div  data-type="'+data_type+'" data-id="'+data_id+'" data-value="'+data_value+'" class="delelteItem"><i class="fa fa-times"></i></div></td></tr>';

      }
      else{
	//	var html = '<tr class=""><td><span class="counter">'+items_table_length+'</span></td><td><input type="text" name="propertyDetails['+data_type+']['+data_value+'][carpet_area]['+counterIndex+']" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></td><td><input type="text" keyup=calculateBasicPrice("'+data_id+'","'+data_type+'","'+data_value+'")   onchange=calculateBasicPrice("'+data_id+'","'+data_type+'","'+data_value+'") name="propertyDetails['+data_type+']['+data_value+'][super_builtup_area]['+counterIndex+']" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area"></td><td><div data-id="'+data_id+'" data-type="'+data_type+'" data-value="'+data_value+'"  class="delelteItem"><i class="fa fa-times"></i></div></td></tr>';
      }
	  
	  html += '<div class="col-md-4  col_'+property_type+'_items_table_'+length+'"><div class="multipleBoxCol">';
	   html += '<div class="headingTabsCols"><span class="counter">'+items_table_length+'</span><div data-index='+length+' data-id="'+counterIndex+'" data-value="'+value+'" class="delelteItem" data-type="'+property_type+'"><i class="fa fa-times"></i></div></div>';
	 
	  if(property_type=="IndependentHome" || property_type=="Farmhouse" ){
	  
	   html += '<div class="col-md-12"><div class="form-group"><label>Ploat Area</label><input type="text" name="propertyDetails['+property_type+']['+value+'][carpet_area]['+counterIndex+']" class="carpet_area_txt form-control required number" placeholder="Plot Area"></div></div>';
	  html += '<div class="col-md-12"><div class="form-group"><label>Plot Super Built-up Area</label><input type="text" onkeyup="calculateBasicPrice("0",'+property_type+','+value+')" onchange="calculateBasicPrice("0",'+property_type+','+value+')" name="propertyDetails['+property_type+']['+value+'][super_builtup_area]['+counterIndex+']" class="super_builtup_area_txt form-control required number" placeholder="Plot Super Built-up Area"></div></div>';
	  html += '<div class="col-md-12"><div class="form-group"><label>Construction Built-up Area</label><input type="text" onkeyup="calculateBasicPrice("0",'+property_type+','+value+')" onchange="calculateBasicPrice("0",'+property_type+','+value+')" name="propertyDetails['+property_type+']['+value+'][super_builtup_area]['+counterIndex+']" class="super_builtup_area_txt form-control required number" placeholder="Construction Built-up Area"></div></div>';
	  html += '<div class="col-md-12"><div class="form-group"><label>Construction Super Built-up Area</label><input type="text" onkeyup="calculateBasicPrice("0",'+property_type+','+value+')" onchange="calculateBasicPrice("0",'+property_type+','+value+')" name="propertyDetails['+property_type+']['+value+'][super_builtup_area]['+counterIndex+']" class="super_builtup_area_txt form-control required number" placeholder="Construction Super Built-up Area"></div></div>';
	 
	  }else{
	   html += '<div class="col-md-12"><div class="form-group"><label>Carpet Area</label><input type="text" name="propertyDetails['+property_type+']['+value+'][carpet_area]['+counterIndex+']" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></div></div>';
	  html += '<div class="col-md-12"><div class="form-group"><label>Carpet Area</label><input type="text" onkeyup="calculateBasicPrice("0",'+property_type+','+value+')" onchange="calculateBasicPrice("0",'+property_type+','+value+')" name="propertyDetails['+property_type+']['+value+'][super_builtup_area]['+counterIndex+']" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area"></div></div>';
	  }
	  html += '<div class="col-md-12"><div class="form-group"><label>No of Bedrooms <span class="required_field">*</span></label><input type="text"  name="propertyDetails['+property_type+']['+value+'][NoofBedrooms]['+counterIndex+']" class="form-control required" placeholder="No of Bedrooms"></div></div>';
	  
	  
	  html += '<div class="col-sm-12">';
            
                html += '<label class="control-label">';
                html += 'No of Bathrooms <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_bathrooms]['+counterIndex+']" class="form-control number required" placeholder="No of Bathrooms" value="">';
                html += '</div>';
            
                html += '<div class="col-sm-12">';
            
                html += '<label class="control-label">';
                html += 'No of Balconies <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_balconies]['+counterIndex+']" class="form-control number required" placeholder="No of Balconies" value="">';
                html += '</div>';
        	
			
                html += '<div class="col-sm-12">';
            
                html += '<label class="control-label">';
                html += 'No of Lift <span class="required_field">*</span>';
                html += '</label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_lift]['+counterIndex+']" class="form-control number required" placeholder="No of Lift" value="">';
                html += '</div>';
          
			    html += '<div class="col-sm-12"><label class="control-label">No. of Floor <span class="required_field">*</span></label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_floor]['+counterIndex+']"  class="form-control number required" placeholder="No. of Floor" value="">';
                html += '</div>';
				
				
				   if(property_type=="IndependentHome" ||  property_type=="Farmhouse"){
					html += '<div class="col-sm-12"><label class="control-label">Total Units <span class="required_field">*</span></label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][total_units]['+counterIndex+']"  class="form-control number required" placeholder="Total Units" value="">';
                html += '</div>';
				 	 
				 }else{
                html += '<div class="col-sm-12"><label class="control-label">No. of Blocks <span class="required_field">*</span></label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_blocks]['+counterIndex+']"  class="form-control number required" placeholder="No. of Blocks" value="">';
                html += '</div>';
				 }
	   html += '</div></div>';
	   
	   
      jQuery("."+property_type+"_items_table_"+length+" .col_"+property_type+"_items_table_"+length+":last").after(html);	
		
	});

jQuery(document).on("click",".RentdelelteItemCommercialArea",function() {
	
	var items_table_length = jQuery(".rent_commercial_area tbody tr").length;
	if(items_table_length==1){alert("Sorry you can't delete this item.");return false;}
	$(this).closest('tr').remove();
	
	var j =1;
	var items_table_length = jQuery(".rent_commercial_area tbody tr").length;
	for(var i=0;i<items_table_length;i++){
		jQuery(".rent_commercial_area tbody tr:eq("+i+") .counter").html(j)
		j++;
		jQuery(".rent_commercial_area tbody tr:eq("+i+") .plot_area_txt").attr("name","commerical[plot_area]["+i+"]");
		jQuery(".rent_commercial_area tbody tr:eq("+i+") .carpet_area_txt").attr("name","commerical[carpet_area]["+i+"]");
		jQuery(".rent_commercial_area tbody tr:eq("+i+") .super_builtup_area_txt").attr("name","commerical[super_builtup_area]["+i+"]");
	}

});



jQuery(document).on("click",".delelteItemRentCommercialAreaHospital",function() {
	
	var items_table_length = jQuery(".rent_commercial_hospital_area  tbody tr").length;
	if(items_table_length==1){alert("Sorry you can't delete this item.");return false;}
	$(this).closest('tr').remove();
	
	var j =1;
	var items_table_length = jQuery(".rent_commercial_hospital_area  tbody tr").length;
	for(var i=0;i<items_table_length;i++){
		jQuery(".rent_commercial_hospital_area  tbody tr:eq("+i+") .counter").html(j)
		j++;
		jQuery(".rent_commercial_hospital_area  tbody tr:eq("+i+") .plot_area_txt").attr("name","rent_commercial_hospital_area[plot_area]["+i+"]");
		jQuery(".rent_commercial_hospital_area  tbody tr:eq("+i+") .carpet_area_txt").attr("name","rent_commercial_hospital_area[carpet_area]["+i+"]");
		jQuery(".rent_commercial_hospital_area  tbody tr:eq("+i+") .super_builtup_area_txt").attr("name","rent_commercial_hospital_area[super_builtup_area]["+i+"]");
	}

});

jQuery(document).on("click",".delelteItemRentCommercialSpaceArea",function() {
	
	var items_table_length = jQuery(".rent_commercial_space_area tbody tr").length;
	if(items_table_length==1){alert("Sorry you can't delete this item.");return false;}
	$(this).closest('tr').remove();
	
	var j =1;
	var items_table_length = jQuery(".rent_commercial_space_area tbody tr").length;
	for(var i=0;i<items_table_length;i++){
		jQuery(".rent_commercial_space_area tbody tr:eq("+i+") .counter").html(j)
		j++;
		jQuery(".rent_commercial_space_area tbody tr:eq("+i+") .carpet_area_txt").attr("name","rent_commercial_space[carpet_area]["+i+"]");
		jQuery(".rent_commercial_space_area tbody tr:eq("+i+") .super_builtup_area_txt").attr("name","rent_commercial_space[super_builtup_area]["+i+"]");
	}

});

jQuery(document).on("click",".delelteItemCommercialArea",function() {
	
	var items_table_length = jQuery(".commercial_area .col_commercial_area").length;
	if(items_table_length==1){alert("Sorry you can't delete this item.");return false;}
	$(this).parent().parent().parent().remove();
	
	var j =1;
	var items_table_length = jQuery(".commercial_area .col_commercial_area").length;
	for(var i=0;i<items_table_length;i++){
		jQuery(".commercial_area .col_commercial_area:eq("+i+") .counter").html(j)
		j++;
	}

});


jQuery(document).on("click",".delelteItemPloatArea",function() {
	
	var items_table_length = jQuery(".ploat_area_table tbody tr").length;
	if(items_table_length==1){alert("Sorry you can't delete this item.");return false;}
	$(this).closest('tr').remove();
	
	var j =1;
	var items_table_length = jQuery(".ploat_area_table tbody tr").length;
	for(var i=0;i<items_table_length;i++){
		jQuery(".ploat_area_table tbody tr:eq("+i+") .counter").html(j)
		j++;
		jQuery(".ploat_area_table tbody tr:eq("+i+") .plot_area_txt").attr("name","ploating_area[plot_area]["+i+"]");
	}

});

jQuery(document).on("click",".RentdelelteItemIndustrialArea",function() {
	
	var items_table_length = jQuery(".rent_industrial_area  tbody tr").length;
	if(items_table_length==1){alert("Sorry you can't delete this item.");return false;}
	$(this).closest('tr').remove();
	
	var j =1;
	var items_table_length = jQuery(".rent_industrial_area tbody tr").length;
	for(var i=0;i<items_table_length;i++){
		jQuery(".rent_industrial_area tbody tr:eq("+i+") .counter").html(j)
		j++;
		jQuery(".rent_industrial_area tbody tr:eq("+i+") .plot_area_txt").attr("name","industrial_area[plot_area]["+i+"]");
		jQuery(".rent_industrial_area tbody tr:eq("+i+") .plot_built_area_txt").attr("name","industrial_area[plot_built_area]["+i+"]");
		jQuery(".rent_industrial_area tbody tr:eq("+i+") .construction_area_txt").attr("name","industrial_area[construction_area]["+i+"]");
		jQuery(".rent_industrial_area tbody tr:eq("+i+") .construction_built_area_txt").attr("name","industrial_area[construction_built_area]["+i+"]");
	}

});


jQuery(document).on("click",".delelteItemIndustrialArea",function() {
	
	var items_table_length = jQuery(".industrial_area  tbody tr").length;
	if(items_table_length==1){alert("Sorry you can't delete this item.");return false;}
	$(this).closest('tr').remove();
	
	var j =1;
	var items_table_length = jQuery(".industrial_area tbody tr").length;
	for(var i=0;i<items_table_length;i++){
		jQuery(".industrial_area tbody tr:eq("+i+") .counter").html(j)
		j++;
		jQuery(".industrial_area tbody tr:eq("+i+") .plot_area_txt").attr("name","industrial_area[plot_area]["+i+"]");
		jQuery(".industrial_area tbody tr:eq("+i+") .plot_built_area_txt").attr("name","industrial_area[plot_built_area]["+i+"]");
		jQuery(".industrial_area tbody tr:eq("+i+") .construction_area_txt").attr("name","industrial_area[construction_area]["+i+"]");
		jQuery(".industrial_area tbody tr:eq("+i+") .construction_built_area_txt").attr("name","industrial_area[construction_built_area]["+i+"]");
	}

});



jQuery(document).on("click",".delelteItemCommercialSpaceArea",function() {
	
	var items_table_length = jQuery(".commercial_space_area  tbody tr").length;
	if(items_table_length==1){alert("Sorry you can't delete this item.");return false;}
	$(this).closest('tr').remove();
	
	var j =1;
	var items_table_length = jQuery(".commercial_space_area tbody tr").length;
	for(var i=0;i<items_table_length;i++){
		jQuery(".commercial_space_area tbody tr:eq("+i+") .counter").html(j)
		j++;
		jQuery(".commercial_space_area tbody tr:eq("+i+") .plot_area_txt").attr("name","commerical_space[plot_area]["+i+"]");
		jQuery(".commercial_space_area tbody tr:eq("+i+") .carpet_area_txt").attr("name","commerical_space[carpet_area]["+i+"]");
		jQuery(".commercial_space_area tbody tr:eq("+i+") .super_builtup_area_txt").attr("name","commerical_space[super_builtup_area]["+i+"]");
	}

});

jQuery(document).on("click",".delelteItem",function() {
	var data_id = jQuery(this).attr("data-id");
	var data_type = jQuery(this).attr("data-type");
	var data_value = jQuery(this).attr("data-value");
	var data_index = jQuery(this).attr("data-index");
   var items_table_length = jQuery("."+data_type+"_items_table_"+data_id+" .col_"+data_type+"_items_table_"+data_index).length ;
	if(items_table_length==1){alert("Sorry you can't delete this item.");return false;}
	//alert(".col_"+data_type+"_items_table_"+data_id);
	$(this).parents(".col_"+data_type+"_items_table_"+data_index).remove();
	
	var items_table_length = jQuery("."+data_type+"_items_table_"+data_index+" .col_"+data_type+"_items_table_"+data_index).length;
	var j =1;
	for(var i=0;i<items_table_length;i++){
		jQuery("."+data_type+"_items_table_"+data_index+" .col_"+data_type+"_items_table_"+data_index+":eq("+i+") .counter").html(j)
		j++;
		//jQuery("."+data_type+"_items_table_"+data_id+" .col_"+data_type+"_items_table_"+data_id+":eq("+i+") .plot_area_txt").attr("name","propertyDetails["+data_type+"]["+data_value+"][plot_area]["+i+"]");
		//jQuery("."+data_type+"_items_table_"+data_id+" tbody tr:eq("+i+") .carpet_area_txt").attr("name","propertyDetails["+data_type+"]["+data_value+"][carpet_area]["+i+"]");
	//	jQuery("."+data_type+"_items_table_"+data_id+" tbody tr:eq("+i+") .super_builtup_area_txt").attr("name","propertyDetails["+data_type+"]["+data_value+"][super_builtup_area]["+i+"]");
	}
	 //calculateBasicPrice(data_id,data_type,data_value);
});
	
	
});
function getState(){
var country = $('#country').val();

$("#state").empty();
$("#state").append('<option value="">Select State</option>');
 $("#city").empty();
$("#city").append('<option value="">Select City</option>');

  $("#sub_city").empty();
  $("#sub_city").append('<option value="">Select Sub City</option>');

  
  
                  
if (country !== '') {

    //Populate Sub Category Drop Down
    $.ajax({
        type:"GET",
        dataType: "json",
        url:"{{url('/admin/getState')}}?country="+country,
        success:function(data){
            if ( data ) {
                
                $.each( data, function( key, value ) {
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                });
            }
        }
    })
  
}
	
}
$("#country").on('change',function(){
getState();
});
$("#state").on('change',function(){

var state = $('#state').val();
  $("#city").empty();
  $("#city").append('<option value="">Select City</option>');
  
  $("#sub_city").empty();
  $("#sub_city").append('<option value="">Select Sub City</option>');
 
               
if (state !== '') {

    //Populate Sub Category Drop Down
    $.ajax({
        type:"GET",
        dataType: "json",
        url:"{{url('/admin/getCity')}}?state="+this.value,
        success:function(data){
            if ( data ) {
                
                $.each( data, function( key, value ) {
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
            }
        }
    })
  
}

});

$("#city").on('change',function(){

var city = $('#city').val();
  $("#sub_city").empty();
  $("#sub_city").append('<option value="">Select Sub City</option>');
               
if (city !== '') {

    //Populate Sub Category Drop Down
    $.ajax({
        type:"GET",
        dataType: "json",
        url:"{{url('/admin/getSubCity')}}?city="+this.value,
        success:function(data){
            if ( data ) {
                
                $.each( data, function( key, value ) {
                    $("#sub_city").append('<option value="'+key+'">'+value+'</option>');
                });
            }
        }
    })
  
}
});



function getPropertyTypeDisable(){
	var property_type = jQuery("#property_type").val().replace(/\s+/g, '');
	 
	  if(property_type=="ApartmentAndFlat"){
			jQuery("#property_unit_type option").attr('disabled', false);
    		jQuery(".property_type_"+property_type+ " .delete_acc").each(function(index, element) {
      		 jQuery("#property_unit_type option[value='"+jQuery(this).attr("data-value")+"']").attr('disabled', true);
			 
    });	    
		}else{
			jQuery("#property_unit_type_ind option").attr('disabled', false);
   			 jQuery(".property_type_"+property_type+ " .delete_acc").each(function(index, element) {
       	jQuery("#property_unit_type_ind option[value='"+jQuery(this).attr("data-value")+"']").attr('disabled', true);
		
    });	    
		}
	  
			
}
HideShowDependsubCategory();
function HideShowDependsubCategory(){
	//calculateBasicPrice();
var sub_category = jQuery("#sub_category").val();	
var property_for = jQuery("#property_for").val();	
var property_type = jQuery("#property_type").val();	

		jQuery("#ProjectNameApartmentName").addClass("col-md-9").removeClass("col-md-6");
		jQuery(".locality_prop").addClass("col-md-6").removeClass("col-md-12");
		jQuery(".locatedinside_prop").show();
		jQuery(".ProjectNameApartmentNameLabel").html("Project Name / Apartment Name/ Society Name");

jQuery(".retail_type,.sell_residential_prop,.sell_commercial_prop,.WhatkindofHospitality,.sell_vacantlandplotting_prop,.sell_industrial_prop,.sell_VacantLandPlotting_prop").hide();
jQuery(".hospitality_prop,.IndependentHomeSubType,.sell_plotting_prop,.sell_vacant_land_prop,.rentapartmentsales,.rent_industrial_prop,.rent_commercial_prop,.rent_retail_type,.rent_commerical_retail_prop,.rent_commerical_office_prop,.rent_commercial_hospital_prop,.rent_commercial_space_prop").hide();
jQuery(".rent_residential_flat_hide,.rent_residential_independent_hide,.rent_residential_farmhouse_hide,.rent_industrial_prop_hide,.rent_commerical_office_prop_hide,.rent_commerical_retail_prop_hide").show();

	jQuery(".commericil_space_type").hide();
	if(property_for=="Sell"){
	if(sub_category=="Residential"){
		
		jQuery("#ProjectNameApartmentName").addClass("col-md-6").removeClass("col-md-9").removeClass("col-md-12");
		jQuery(".sell_commercial_prop").hide();
		jQuery(".IndependentHomeSubType").hide();
		
		jQuery(".sell_residential_prop").show();
		
		if(property_type=="Farmhouse"){
			jQuery(".farmhouse_prop").hide();	
		}
		
		if(property_type=="Independent Home"){
			jQuery("#ProjectNameApartmentName").addClass("col-md-12").removeClass("col-md-9").removeClass("col-md-6");
				jQuery(".IndependentHomeSubType").show();
		}
	}
	if(sub_category=="Commercial"){
		jQuery(".commericial_price_hospital").show();
		jQuery("#ProjectNameApartmentName").addClass("col-md-6").removeClass("col-md-9");
		jQuery(".hospitality_prop_hide").show();
		jQuery(".sell_residential_prop").hide();
		jQuery(".sell_commercial_prop").show();
		jQuery(".retail_type_hide").show();
		jQuery(".sell_commerical_retail_prop").show();
		jQuery(".sell_commericil_retail").show();
		if(jQuery("#sell_commercial_property_type").val()=="Office"){
			jQuery(".retail_type").hide();
			
		}
		
		if(jQuery("#sell_commercial_property_type").val()=="Retail"){
			jQuery(".retail_type").show();
			jQuery(".retail_type_hide").hide();
			jQuery(".sell_commericil_retail").hide();
			
		}
		if(jQuery("#sell_commercial_property_type").val()=="Commercial Space"){
			jQuery(".WhatkindofHospitality").show();
			jQuery(".hospitality_prop").show();
			jQuery(".hospitality_prop_hide").hide();
			jQuery(".commericial_price_hospital").hide();
			jQuery(".commericil_space_type").show();
		}
		
		
		
	}
	if(sub_category=="Industrial"){
		jQuery("#ProjectNameApartmentName").addClass("col-md-6").removeClass("col-md-9");
		jQuery(".sell_industrial_prop").show();		
		
	}
	if(sub_category=="Plotting"){
		jQuery(".sell_plotting_prop").show();
		jQuery(".ProjectNameApartmentNameLabel").html("Plotting Name / Project Name");
		jQuery("#ProjectNameApartmentName").addClass("col-md-6").removeClass("col-md-9");
		
	}
	if(sub_category=="VacantLand"){
		
		jQuery(".sell_vacant_land_prop").show();
		jQuery(".ProjectNameApartmentNameLabel").html("Vacant Land Name");
		jQuery("#ProjectNameApartmentName").addClass("col-md-6").removeClass("col-md-9");
	}
	}else{
		
		jQuery(".office_number").html("Office Number");	
		if(sub_category=="Residential"){
		
		jQuery("#ProjectNameApartmentName").addClass("col-md-6").removeClass("col-md-9").removeClass("col-md-12");
		jQuery(".rent_residential_prop").show();
		
		if(property_type=="Independent Home"){
			jQuery("#ProjectNameApartmentName").addClass("col-md-12").removeClass("col-md-9").removeClass("col-md-6");
				jQuery(".IndependentHomeSubType").show();
				jQuery(".rent_residential_independent_hide").hide();
		}
		jQuery(".rentapartmentsales").hide();
		
		if(property_type=="Apartment And Flat"){
			
			jQuery("#ProjectNameApartmentName").addClass("col-md-12").removeClass("col-md-9").removeClass("col-md-6");
			jQuery(".rentapartmentsales").show();
			jQuery(".rent_residential_flat_hide").hide();
				
		}
		
		if(property_type=="Farmhouse"){
			
			jQuery(".rent_residential_farmhouse_hide").hide();
				
		}
		
		
	}
	
	
	if(sub_category=="Commercial"){
		jQuery(".rent_commercial_office_prop").show();
		jQuery(".rent_commercial_prop").show();
		jQuery("#ProjectNameApartmentName").addClass("col-md-6").removeClass("col-md-9");
		jQuery(".rent_commerical_office_prop_hide").hide();
		if(jQuery("#rentwhatkindofpropetyisitCommercial").val()=="Retail"){
			jQuery(".rent_retail_type").show();
			jQuery(".rent_commerical_retail_prop").show();
			jQuery(".rent_commerical_retail_prop_hide").hide();
		}
		if(jQuery("#rentwhatkindofpropetyisitCommercial").val()=="Office"){
			jQuery(".rent_commerical_office_prop").show();
			
		jQuery(".office_number").html("Office Number");
		}
		
		if(jQuery("#rentwhatkindofpropetyisitCommercial").val()=="Retail"){
			jQuery(".office_number").html("Showroom Number");
			
			if(jQuery("#rent_retail_type_dp").val()=="Commercial shops"){
				jQuery(".office_number").html("Shop Number");		
			}
			
		
		}
		
		if(jQuery("#rentwhatkindofpropetyisitCommercial").val()=="Commercial Space"){
			jQuery(".rent_commercial_space_prop").show();
			jQuery(".rent_commercial_office_prop").hide();
		}
		
		
		if(jQuery("#rentwhatkindofpropetyisitCommercial").val()=="Hospitality"){
			jQuery(".rent_commercial_hospital_prop").show();
			jQuery(".rent_commercial_office_prop").hide();
			jQuery("#ProjectNameApartmentName").addClass("col-md-12").removeClass("col-md-9").removeClass("col-md-6");
		}
		
		
		
	}
	if(sub_category=="Industrial"){
		jQuery(".rent_industrial_prop").show();
		jQuery(".rent_industrial_prop_hide").hide();
		jQuery("#ProjectNameApartmentName").addClass("col-md-6").removeClass("col-md-9");
		
	}
	
	}
	return false;
	
	
	
}



jQuery(document).on("change","#rent_retail_type_dp,#sub_category,#sell_commercial_property_type,#property_type,#property_for,#rentwhatkindofpropetyisitCommercial",function(e) {
    HideShowDependsubCategory();
});
   $(document).on("change","input[type=radio][name=furnishing_detail]",function(){
        furnishingDetails();
    });
furnishingDetails();	
function furnishingDetails(){
	var val  = jQuery("input[type=radio][name=furnishing_detail]:checked").val();
	if (val == 'Furnished') {
            $("#Furnished_Block").show();
            $("#Semifurnished_Block").hide();
        }
        else if (val == 'Semi furnished') {
            $("#Furnished_Block").hide();
            $("#Semifurnished_Block").show();
        }else{

         $("#Furnished_Block").hide();
            $("#Semifurnished_Block").hide();
         
        }
}
$(document).ready(function(){
			// SmartWizard initialize
			$('#smartwizard').smartWizard(); 
            
 		});
        
       	jQuery(document).on("click",".sw-btn-group-extra1",function(){
		jQuery(".overlayLoader").show();
		
		var formData = new FormData($('#propertyForm')[0]);
        formData.append('stepNumber', '3');
        formData.append('stepDirection', 'last_step');
        
				
        
		jQuery.ajax({
                   url:"{{url('/admin/properties/postProperty')}}",
                    enctype: 'multipart/form-data',
                    method: 'post',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,                    
                    success: function (data) {
						window.location = "{{url('/admin/properties')}}";
                    },
                    error: function (xhr, status) {
						jQuery(".overlayLoader").hide();
		
					}
                });
        
			
		});
	    $("#smartwizard1").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
   			checkPropertyTypeUnit();
			
			if ($('#propertyForm').valid()) {
       			
		var formData = new FormData($('#propertyForm')[0]);
        formData.append('stepNumber', stepNumber);
        formData.append('stepDirection', stepDirection);
        
				
        
		jQuery.ajax({
                   url:"{{url('/admin/properties/postProperty')}}",
                    enctype: 'multipart/form-data',
                    method: 'post',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,                    
                    success: function (data) {
                    	jQuery("#property_id").val(data);
                    },
                    error: function (xhr, status) {
					}
                });
                 return true;
            } else {
                return false; 
            }

});

$("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection,stepPosition) {
		checkPropertyTypeUnit();
			if(stepPosition=='last'){
				$('.sw-btn-group-extra').show(); // show the button extra only in the last page
			}else{
				$('.sw-btn-group-extra').hide();				
			}
			
			  window.scrollTo(0, 0);


	      });
function checkPropertyTypeUnit(){
		 var property_type = jQuery("#property_type").val().replace(/\s+/g, '');; 
     	 jQuery(".accordion-item").hide();
		 jQuery(".property_type_"+property_type).show();
		 jQuery("#step-2").attr("data-id",property_type);
		 getPropertyTypeDisable();
		
}

function getPropertyFor(){
	var property_for = jQuery("#property_for").val();
	var category = jQuery("#category").val();
	if(property_for=="Rent"){
		$("#category").empty();
		 $("#category").append('<option value="For owner">For owner</option>');
		 jQuery("#sub_category  option[value='Plotting'],#sub_category  option[value='VacantLand']").remove();
		
	}else{
		 jQuery("#sub_category  option[value='Plotting'],#sub_category  option[value='VacantLand']").remove();
		 $("#category").empty();
		 var selected_owner =selected_builder = "";
		 if(category=="For owner"){
		 	selected_owner = "selected";	 
		 }
		  if(category=="For Builder"){
		 	selected_builder = "selected";	 
		 }	
		 $("#category").append('<option value="For Builder" '+selected_builder+'>For Builder</option><option value="For owner" '+selected_owner+'>For owner</option>');
		 
		 $("#sub_category").append('<option value="Plotting">Plotting</option><option value="VacantLand">VacantLand</option>');
		 
	}
}

jQuery(document).on("change","#property_for",function(){
	getPropertyFor();	
});
getPropertyFor();
	
jQuery(document).on("click",".delelte_gallery",function(){
	jQuery(this).parent().remove();
});

jQuery(document).on("click",".delete_doc",function(){
	jQuery(this).parent().remove();
});

jQuery(document).on("click",".is_penthouse",function(){
	var property_type = jQuery(this).attr("data-type");
	var value = jQuery(this).attr("data-value");
	var radio_type = jQuery(this).attr("data-val");
	jQuery("#is_penthouse_"+property_type+"_"+value).hide();
	if(radio_type=="Yes"){
		
		jQuery("#is_penthouse_"+property_type+"_"+value).show();
	}
	
});
		
		
jQuery(document).on("click",".is_cover_parking",function(){
	var property_type = jQuery(this).attr("data-type");
	var value = jQuery(this).attr("data-value");
	var radio_type = jQuery(this).attr("data-val");
	jQuery("#is_cover_parking_"+property_type+"_"+value).hide();
	if(radio_type=="Yes"){
		jQuery("#is_cover_parking_"+property_type+"_"+value).show();
	}
	
});


		
jQuery(document).on("click",".is_open_parking",function(){
	var property_type = jQuery(this).attr("data-type");
	var value = jQuery(this).attr("data-value");
	var radio_type = jQuery(this).attr("data-val");
	jQuery("#is_open_parking_"+property_type+"_"+value).hide();
	if(radio_type=="Yes"){
		jQuery("#is_open_parking_"+property_type+"_"+value).show();
	}
	
});


jQuery(document).on("click",".hydraulic_parking",function(){
	var property_type = jQuery(this).attr("data-type");
	var value = jQuery(this).attr("data-value");
	var radio_type = jQuery(this).attr("data-val");
	jQuery("#hydraulic_parking_"+property_type+"_"+value).hide();
	if(radio_type=="Yes"){
		jQuery("#hydraulic_parking_"+property_type+"_"+value).show();
	}
	
});
		
	
	$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    var html = '<div class="col-md-3"><div class="project_gallery_images"><div class="delete_img"><i class="fa fa-times"></i></div><img src="'+event.target.result+'"></div></div>';
					$(html).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#project_gallery').on('change', function() {
        imagesPreview(this, 'div.project_gallery');
    });
	
    $('#floor_plan_gallery').on('change', function() {
        imagesPreview(this, 'div.floor_plan_gallery');
    });
	
    $('#project_status_gallery').on('change', function() {
        imagesPreview(this, 'div.project_status_gallery');
    });
	
	
});	  
jQuery(document).on("click",".delete_img",function(){
	jQuery(this).parent().parent().remove();
});
  
jQuery(document).on("change",".rent_furnicher",function(){
	var data_type= jQuery(this).attr("data-type");
	var data_value= jQuery(this).attr("data-value");
	var value= jQuery(this).val();
	//alert(value);
	//alert("#property_furn_"+data_type+"_"+data_value);
	jQuery(".ferunicher_rent_data").hide();
	if(value=="Furnished"){
		jQuery("#property_furn_"+data_type+"_"+data_value).show();
	}
	if(value=="Semi-furnished"){
		jQuery("#property_semi_furn_"+data_type+"_"+data_value).show();
	}
	
});

function ShowPriceExtra(property_type,cl,val){
	jQuery("."+cl).hide();
	if(val=="Yes"){
		jQuery("."+cl).show();	
	}
}
		 
		 
		  
</script>
@endsection