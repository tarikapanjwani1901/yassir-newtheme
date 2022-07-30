@extends('layouts.admin.app')
@section('content')
<style>
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
label {
	font-size: 12px;
	font-weight:bold;
	color:#000;
}
.select2-search.select2-search--inline {
	display: none;
}
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
.select2-results__option,.select2-container--default .select2-selection--single .select2-selection__rendered,.form-control{ font-size:12px;}
.select2-container{ width:100% !important;}
 .delelteItem{cursor:pointer;
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

        
        <div class="row p-0">
   <div class="col-lg-12">
      <div class="card">
      	
        	<div class="card-header pb-3 pt-3 text-uppercase">
                
        Add Property</div>

         <div class="card-body">
            <form method="post" id="propertyForm" enctype="multipart/form-data">
               <input type="hidden" name="property_id" id="property_id" value="" />
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
                                    <select name="status" id="status" class="form-control select2 required" >
                                       <option value="Active">Active</option>
                                       <option value="Inactive">Inactive</option>
                                    </select>
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
                                    <select name="property_for" id="property_for" class="form-control select2 required" >
                                       <option value="">Select Property For</option>
                                       <option value="Sell">Sell</option>
                                       <option value="Rent">Rent</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Property Category <span class="required_field">*</span></label>
                                    <select name="category" id="category" class="form-control select2 required" >
                                       <option value="">Select Category</option>
                                       <option value="For Builder">For Builder</option>
                                       <option value="For owner">For owner</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label class="control-label">Property Sub Category <span class="required_field">*</span></label>
                                    <select name="sub_category" id="sub_category" class="form-control select2 required" >
                                       <option value="">Select Sub Category</option>
                                       <option value="Residential">Residential </option>
                                       <option value="Commercial">Commercial</option>
                                       <option value="IndustrialParkShades">Industrial Park/Shades</option>
                                       <option value="VacantLandPlotting">Vacant Land/ Plotting </option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3 residential_prop">
                                 <div class="form-group">
                                    <label class="control-label">Property Type <span class="required_field">*</span></label>
                                    <select name="property_type" id="property_type" class="form-control  select2 required" >
                                       <option value="">Select Type</option>
                                       <option value="Apartment And Flat">Apartment/Flat</option>
                                       <option value="IndependentHouse">Independent House/ Bunglows/villas</option>
                                       <option value="Farmhouse">Farmhouse </option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3 commercial_prop">
                                 <div class="form-group">
                                    <label class="control-label">Property Type <span class="required_field">*</span></label>
                                    <select name="commercial_property_type" id="commercial_property_type" class="form-control  select2 required">
                                       <option value="">Select Type</option>
                                       <option value="Office">Office</option>
                                       <option value="Retail">Retail</option>
                                       <option value="Hospitality">Hospitality</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3 vacantlandplotting_prop">
                                 <div class="form-group">
                                    <label class="control-label">What kind of vacant land/ plotting is it?</label>
                                    <select name="what_kind_of_vacantland" id="what_kind_of_vacantland" class="select2 form-control" >
                                       <option value="Commercial Land">Commercial Land</option>
                                       <option value="Agriculture Land">Agriculture Land</option>
                                       <option value="Industrial Land">Industrial Land</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6" id="ProjectNameApartmentName">
                                 <div class="form-group">
                                    <label class="control-label">Project Name / Apartment Name/ Society Name  <span class="required_field">*</span></label>
                                    <input type="text" class="form-control required" name="project_name"/>
                                 </div>
                              </div>
                           </div>
                           <div class="row WhatkindofHospitality">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="control-label">What kind of Hospitality is it?</label>
                                    <select name="what_kind_of_hospitality" id="what_kind_of_hospitality" class="select2 form-control" >
                                       <option value="Hotel / Resort">Hotel / Resort</option>
                                       <option value="Guesthouse / Banquet Hall">Guesthouse / Banquet Hall </option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row retail_type">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Retail Type:</label>
                                    <select name="retail_type"  class="select2 form-control" >
                                       <option value="Commercial shops">Commercial shops</option>
                                       <option value="Commercial showrooms">Commercial showrooms</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Shop is located inside</label>
                                    <select name="shop_located_inside" class="select2 form-control" >
                                       <option value="Mall">Mall</option>
                                       <option value="Commercial Project">Commercial Project</option>
                                       <option value="Residencial Project">Residencial Project</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row commercial_prop industrial_prop">
                              <div class="col-md-6 locality_prop">
                                 <div class="form-group">
                                    <label class="control-label">Locality</label>
                                    <input type="text" class="form-control" name="locality"/>
                                 </div>
                              </div>
                              <div class="col-md-6 locatedinside_prop">
                                 <div class="form-group">
                                    <label class="control-label">Located inside</label>
                                    <select class="form-control select2" name="located_inside">
                                       <option value="IT Park">IT Park</option>
                                       <option value="Business Park">Business Park</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row residential_prop">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Rera Number</label>
                                    <input type="text" class="form-control" name="rera_number"/>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Rera Profile Link </label>
                                    <input type="text" class="form-control" name="rera_link"/>
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
                                    <select class="form-control required select2" name="state" id="state">
                                       <option value="">Select State</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">City <span class="required_field">*</span></label>
                                    <select class="form-control required select2" name="city" id="city">
                                       <option value="">Select City</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Sub City <span class="required_field">*</span></label>
                                    <select class="form-control required select2" name="sub_city" id="sub_city">
                                       <option value="">Select Sub City</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Area <span class="required_field">*</span></label>
                                 	<input type="text" class="form-control required"  name="area" id="area" placeholder="Area"  >
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Zipcode <span class="required_field">*</span></label>
                                    <input type="text" class="form-control required" name="zip_code" id="zip_code" placeholder="Zip Code"  >
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="control-label" for="address">Address <span class="required_field">*</span></label>
                                    <input type="text" class="form-control required" name="address" id="address" placeholder="Address" >
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="step2" class="tab-pane" role="tabpanel">
                        <div class="row residential_prop">
                           <div class="col-lg-12">
                              <div class="panel panel-primary ">
                                 <div class="panel-body">
                                    <div class="form-group col-md-12">
                                       <label class="col-sm-2 control-label">
                                       Select <span class="required_field">*</span>
                                       </label>
                                       <div class="row p-0">
                                          <div class="col-sm-5">

                                             <select name="property_unit_type" id="property_unit_type" class="select2 form-control" >

                                                <option value="">Select</option>
                                                <option value="1BHK">1BHK</option>
                                                <option value="2BHK">2BHK</option>
                                                <option value="2.5 BHK">2.5 BHK</option>
                                                <option value="3BHK">3BHK</option>
                                                <option value="3.5 BHK">3.5 BHK</option>
                                                <option value="4BHK">4BHK</option>
                                                <option value="5BHK">5BHK</option>
                                                <option value="6BHK">6BHK</option>
                                             </select>
                                          </div>
                                          <div class="col-sm-2">   <button id="add_property" type="button" name="" class="add_property btn btn-primary " >Add</button></div>
                                       </div>
                                    </div>
                                    <div class="accordion accordion-header-bg accordion-bordered property_type_accordion" id="accordionUnitType" >
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="VacantLandPlotting_prop">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Area details <span class="required_field">*</span></label>
                                    <input type="text" placeholder="Area details" name="VacantLandPlottingAreadetails" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Ploat area <span class="required_field">*</span> </label>
                                    <input type="text" placeholder="Ploat area" name="VacantLandPlottingCarpetarea" class="form-control required number" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty">
                              <label  class="col-sm-2 control-label"> Status </label>
                              <div class="col-sm-10">
                                 <input type="radio"  name="VacantLandPlottingpropertystatus" data-id="0" data-type="VacantLandPlottingpropertyStatus" class="propertystatus" checked value="Ready to move">
                                 &nbsp;
                                 <label for="">Ready to move</label>
                                 &nbsp;&nbsp;&nbsp;
                                 <input type="radio" class="propertystatus" data-id="0" data-type="VacantLandPlottingpropertyStatus" name="VacantLandPlottingpropertystatus" value="Under Construction">
                                 &nbsp;
                                 <label for="">Under Construction</label>
                                 &nbsp;&nbsp;&nbsp; 
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="age_property_div_VacantLandPlottingpropertyStatus_0">
                              <label  class="col-sm-2 control-label"> Age of Property <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 <select name="VacantLandPlottingage_of_property" id="VacantLandPlottingage_of_property" class="form-control required select2" >
                                    <option value="">Select</option>
                                    <option value="0-1 Year">0-1 Year</option>
                                    <option value="1-5 Year">1-5 Year</option>
                                    <option value="5-10 Year">5-10 Year</option>
                                    <option value="10+ Year">10+ Year</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="possesion_by_div_VacantLandPlottingpropertyStatus_0" style="display:none;">
                              <label  class="col-sm-2 control-label"> Possession Date <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control required possesion_date" name="VacantLandPlottingpossession_date" placeholder="Possession Date">
                              </div>
                           </div>
                        </div>
                        <div class="industrial_prop industrial_prop_hide">
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of washrooms <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of washrooms" name="Industrialnumber_of_washrooms" class="form-control number required" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Area details <span class="required_field">*</span></label>
                                    <input type="text" placeholder="Area details" name="IndustrialAreadetails" class="form-control number required" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Carpet area <span class="required_field">*</span></label>
                                    <input type="text" placeholder="Carpet area" name="IndustrialCarpetarea" class="form-control number required" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Super built-up area <span class="required_field">*</span></label>
                                    <input type="text" placeholder="Super built-up area" name="Industrialsuper_builtup_area" class="form-control number required" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty">
                              <label  class="col-sm-2 control-label"> Status </label>
                              <div class="col-sm-10">
                                 <input type="radio"  name="Industrialpropertystatus" data-id="0" data-type="IndustrialpropertyStatus" class="propertystatus" checked value="Ready to move">
                                 &nbsp;
                                 <label for="">Ready to move</label>
                                 &nbsp;&nbsp;&nbsp;
                                 <input type="radio" class="propertystatus" data-id="0" data-type="IndustrialpropertyStatus" name="Industrialpropertystatus" value="Under Construction">
                                 &nbsp;
                                 <label for="">Under Construction</label>
                                 &nbsp;&nbsp;&nbsp; 
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="age_property_div_IndustrialpropertyStatus_0">
                              <label  class="col-sm-2 control-label"> Age of Property <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 <select name="Industrialage_of_property" id="Industrialage_of_property" class="form-control required select2" >
                                    <option value="">Select</option>
                                    <option value="0-1 Year">0-1 Year</option>
                                    <option value="1-5 Year">1-5 Year</option>
                                    <option value="5-10 Year">5-10 Year</option>
                                    <option value="10+ Year">10+ Year</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="possesion_by_div_IndustrialpropertyStatus_0" style="display:none;">
                              <label  class="col-sm-2 control-label"> Possession Date <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control required possesion_date" name="Industrialpossession_date" placeholder="Possession Date">
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>It is pre-Leased / pre rented? &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="Industrialpre_leased"  value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked="checked" type="radio" name="Industrialpre_leased"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label> Is your office Fire NOC Certified?  &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="Industrialfire_noc_certified"  value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked="checked" type="radio" name="Industrialfire_noc_certified"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="commercial_prop">
                           <div class="hospitality_prop">
                              <div class="row">
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Add room Details <span class="required_field">*</span></label>
                                       <input type="text" placeholder="Add room Details" name="HospitalityAddroomDetails" class="form-control number required" />
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>No of Rooms <span class="required_field">*</span></label>
                                       <input type="text" placeholder="No of Rooms" name="Hospitalitynumber_of_rooms" class="form-control number required" />
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>No of washrooms <span class="required_field">*</span></label>
                                       <input type="text" placeholder="No of washrooms"  name="Hospitalitynumber_of_washrooms" class="form-control number required" />
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>No of Balconies <span class="required_field">*</span></label>
                                       <input type="text" name="Hospitalitynumber_of_balconies" placeholder="No of Balconies" class="form-control number required" />
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Plot Area<span class="required_field">*</span> </label>
                                       <input type="text" placeholder="Plot Area" name="Hospitalityplot_area" class="form-control number required" />
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Carpet Area <span class="required_field">*</span></label>
                                       <input type="text" placeholder="Carpet Area" name="Hospitalitycarpet_area" class="form-control number required" />
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Super Built-up Area <span class="required_field">*</span></label>
                                       <input type="text" placeholder="Super Built-up Area" name="Hospitalitysuper_builtup_area" class="form-control number required" />
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group row label-floating is-empty">
                                 <label for="title" class="col-sm-2 control-label"> Furnishing detail </label>
                                 <div class="col-sm-10">
                                    <input type="radio"  name="furnishing_detail"  value="Furnished">
                                    &nbsp;
                                    <label for="">Furnished</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"  name="furnishing_detail" value="Semi furnished">
                                    &nbsp;
                                    <label for="">Semi furnished</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"  checked name="furnishing_detail" value="Un furnished">
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
                                          <input type="checkbox" value="Light" name="furnished_data[]" />
                                          Light
                                       </li>
                                       <li>
                                          <input type="checkbox" value="fans" name="furnished_data[]"/>
                                          fans
                                       </li>
                                       <li>
                                          <input type="checkbox" value="AC" name="furnished_data[]"/>
                                          AC
                                       </li>
                                       <li>
                                          <input type="checkbox" value="TV" name="furnished_data[]"/>
                                          TV
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Beds" name="furnished_data[]"/>
                                          Beds
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Wardrobe" name="furnished_data[]"/>
                                          Wardrobe
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Geyser" name="furnished_data[]"/>
                                          Geyser
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Sofa" name="furnished_data[]"/>
                                          Sofa
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Washing machine" name="furnished_data[]"/>
                                          Washing machine
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Stove" name="furnished_data[]"/>
                                          Stove
                                       </li>
                                       <li>
                                          <input type="checkbox" value="fridge" name="furnished_data[]"/>
                                          fridge
                                       </li>
                                       <li>
                                          <input type="checkbox" value="water purifier" name="furnished_data[]"/>
                                          water purifier
                                       </li>
                                       <li>
                                          <input type="checkbox" value="microwave" name="furnished_data[]"/>
                                          microwave
                                       </li>
                                       <li>
                                          <input type="checkbox" value="modular kitchen" name="furnished_data[]"/>
                                          modular kitchen
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Chimney" name="furnished_data[]"/>
                                          Chimney
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Dinning Table" name="furnished_data[]"/>
                                          Dinning Table
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Curtains" name="furnished_data[]"/>
                                          Curtains
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Exhaust Fan" name="furnished_data[]"/>
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
                                          <input type="checkbox" value="Light" name="semifurnished_data[]" />
                                          Light
                                       </li>
                                       <li>
                                          <input type="checkbox" value="fans" name="semifurnished_data[]"/>
                                          fans
                                       </li>
                                       <li>
                                          <input type="checkbox" value="AC" name="semifurnished_data[]"/>
                                          AC
                                       </li>
                                       <li>
                                          <input type="checkbox" value="TV" name="semifurnished_data[]"/>
                                          TV
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Beds" name="semifurnished_data[]"/>
                                          Beds
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Wardrobe" name="semifurnished_data[]"/>
                                          Wardrobe
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Geyser" name="semifurnished_data[]"/>
                                          Geyser
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Sofa" name="semifurnished_data[]"/>
                                          Sofa
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Washing machine" name="semifurnished_data[]"/>
                                          Washing machine
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Stove" name="semifurnished_data[]"/>
                                          Stove
                                       </li>
                                       <li>
                                          <input type="checkbox" value="fridge" name="semifurnished_data[]"/>
                                          fridge
                                       </li>
                                       <li>
                                          <input type="checkbox" value="water purifier" name="semifurnished_data[]"/>
                                          water purifier
                                       </li>
                                       <li>
                                          <input type="checkbox" value="microwave" name="semifurnished_data[]"/>
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
                                          <input type="checkbox" value="Dinning Table" name="semifurnished_data[]"/>
                                          Dinning Table
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Curtains" name="semifurnished_data[]"/>
                                          Curtains
                                       </li>
                                       <li>
                                          <input type="checkbox" value="Exhaust Fan" name="semifurnished_data[]"/>
                                          Exhaust Fan
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="row hospitality_prop_hide">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Carpet Area <span class="required_field">*</span></label>
                                    <input type="text" placeholder="Carpet Area" name="carpet_area" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Super Built-up Area <span class="required_field">*</span></label>
                                    <input type="text" placeholder="Super Built-up Area" name="super_builtup_area" class="form-control required number" />
                                 </div>
                              </div>
                           </div>
                           <div class="row hospitality_prop_hide">
                              <div class="col-md-3 retail_type">
                                 <div class="form-group">
                                    <label>Entrance width <span class="required_field">*</span></label>
                                    <input type="text" name="entrance_width" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3 retail_type">
                                 <div class="form-group">
                                    <label>Ceiling Heights <span class="required_field">*</span></label>
                                    <input type="text" name="ceiling_heights" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Private Washroom <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of Private Washroom" name="number_of_private_washroom" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Shared Washroom <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of Shared Washroom" name="number_of_shared_washroom" class="form-control required number" />
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
                           </div>
                           <div class="row hospitality_prop_hide">
                              <div class="form-group">
                                 <div class="col-sm-12 PropertyFeatures">
                                    <label class="control-label">Facilities</label>
                                    <ul>
                                       <li><input type="checkbox" name="facilities[]"  value="Furnishing"/> Furnishing</li>
                                       <li><input type="checkbox" name="facilities[]" value="Central air conditioning"/> Central air conditioning</li>
                                       <li><input type="checkbox" name="facilities[]" value="Oxygen Duct"/> Oxygen Duct</li>
                                       <li><input type="checkbox" name="facilities[]" value="UPS"/> UPS</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="row hospitality_prop_hide">
                              <div class="form-group">
                                 <div class="col-sm-12 PropertyFeatures">
                                    <label class="control-label"> Fire Safety Measures </label>
                                    <ul>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Fire Safety Extinguisher" /> Fire Safety Extinguisher</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Fire Sensors"/> Fire Sensors</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Sprinklers"/> Sprinklers</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Fire House"/> Fire House</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="row hospitality_prop_hide">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of floor <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of floor" name="number_of_floor" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Passenger lifts <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of Passenger lifts" name="number_of_passenger_lifts" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Service Lift <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of Service Lift" name="number_of_service_lift" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Staircases <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of Staircases" name="number_of_staircases" class="form-control required number" />
                                 </div>
                              </div>
                           </div>
                           <div class="row hospitality_prop_hide">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of parking allotted <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of parking allotted" name="number_of_parking_allotted" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <input type="checkbox" name="parkings[]" value="Private parking in basement">
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
                           <div class="form-group row label-floating is-empty">
                              <label  class="col-sm-2 control-label"> Status </label>
                              <div class="col-sm-10">
                                 <input type="radio"  name="propertystatus" data-id="0" data-type="propertyStatus" class="propertystatus" checked value="Ready to move">
                                 &nbsp;
                                 <label for="">Ready to move</label>
                                 &nbsp;&nbsp;&nbsp;
                                 <input type="radio" class="propertystatus" data-id="0" data-type="propertyStatus" name="propertystatus" value="Under Construction">
                                 &nbsp;
                                 <label for="">Under Construction</label>
                                 &nbsp;&nbsp;&nbsp; 
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="age_property_div_propertyStatus_0">
                              <label  class="col-sm-2 control-label"> Age of Property <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 <select name="age_of_property" id="age_of_property" class="form-control required select2" >
                                    <option value="">Select</option>
                                    <option value="0-1 Year">0-1 Year</option>
                                    <option value="1-5 Year">1-5 Year</option>
                                    <option value="5-10 Year">5-10 Year</option>
                                    <option value="10+ Year">10+ Year</option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="possesion_by_div_propertyStatus_0" style="display:none;">
                              <label  class="col-sm-2 control-label"> Possession Date <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control required possesion_date" name="possession_date" placeholder="Possession Date">
                              </div>
                           </div>
                           <div class="row retail_type hospitality_prop_hide">
                              <div class="form-group">
                                 <div class="col-sm-12 PropertyFeatures">
                                    <label class="control-label"> Suitable business Type</label>
                                    <ul>
                                       <li><input type="checkbox"  name="suitable_business_type[]" value="Jewelry"/> Jewelry</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Gym"/> Gym</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Grocery"/> Grocery</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Clinic"/> Clinic</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Stationary"/> Stationary</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Mobile shop"/> Mobile shop</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Cloths"/> Cloths</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Footwear"/> Footwear</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Medical"/> Medical</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Salon/spa"/> Salon/spa</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Fast food"/> Fast food</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Coffee shop"/> Coffee shop</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="ATM"/> ATM</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Juice shop"/> Juice shop</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Sweet shop"/> Sweet shop</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>It is pre-Leased / pre rented? &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="pre_leased"  value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked="checked" type="radio" name="pre_leased"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label> Is your office Fire NOC Certified?  &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="fire_noc_certified"  value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked="checked" type="radio" name="fire_noc_certified"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="step3" class="tab-pane" role="tabpanel">
                        <div class="row residential_prop">
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <label class="control-label" for="amenities" >Amenities:</label>
                                 <select class="form-control select2" name="amenities[]" style="width:100%" multiple="multiple">
                                     <?php foreach($amenties as $v){ ?>
                                    <option value="<?php echo $v ?>"><?php echo $v; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                        </div>

                        <div class="row residential_prop">
                           <div class="form-group">
                              <div class="col-sm-12 PropertyFeatures">
                                 <label class="control-label">Property Features:</label>
                                 <ul>
                                    <li><input type="checkbox" name="property_features[]" value="Gas Pipeline" /> Gas Pipeline</li>
                                    <li><input type="checkbox" name="property_features[]" value="Central air conditioning" /> Central air conditioning</li>
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
                        <div class="row">
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
                           <div class="col-md-6">
                              <div class="form-group" id="gallery_images">
                                 <div class="row">

                                    <label class="control-label p-0" for="form-file-multiple-input"> Project Gallery (Render images)</label>
                                    <div class="form-file p-0">
                                       <input type="file" name="project_gallery[]" accept="image/*" multiple="multiple" class="form-file-input form-control">

                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="row">

                                    <label class="control-label  p-0" for="form-file-multiple-input">Floor Plan Gallery</label>
                                    <div class="form-file p-0">
                                       <input type="file" name="floor_plan_gallery[]" accept="image/*" multiple="multiple" class="form-file-input form-control">

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="row">

                                    <label class="control-label  p-0" >Project Status Gallery</label>
                                    <div class="form-file p-0">
                                       <input type="file" name="project_status_gallery[]" accept="image/*" multiple="multiple" class="form-file-input form-control">

                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="row">

                                    <label class="control-label  p-0" >Video Toor</label>
                                    <div class="form-file p-0">
                                       <input type="file" accept="video/mp4,video/x-m4v,video/*" name="video_toor" class="form-file-input form-control">

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="row">

                                    <label class="control-label  p-0" > PDF Brochure</label>
                                    <div class="form-file p-0">
                                       <input type="file" name="pdf_brochure" accept=".pdf,.doc" class="form-file-input form-control">
                                    </div>
                                 </div>

                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="row">

                                    <label class="control-label  p-0" >Sample house video(Youtube URL)</label>
                                    <input type="text" class="form-control" name="sample_house_video">
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
  $(document).ready(function(){
	  

 $( ".possesion_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
         
  jQuery(".select2").select2();
 
  
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
			$("#property_unit_type").prop("selectedIndex", 0); 
        }
        else{
            return false;
        }
    });

    $(document).on("click","#add_property",function(){
      var property_type = jQuery("#property_type").val().replace(/\s+/g, '');; 
      var length = $(".property_type_"+property_type).length;
        var value = $("#property_unit_type").val();
        jQuery(".accordion-item").hide();
		jQuery(".property_type_"+property_type).show();
		
		if(value!=''){

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
        
         if(property_type=="ApartmentAndFlat"){ 
		  
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
html +='<tr><td><span class="counter">1</span></td><td><input type="text" name="propertyDetails['+property_type+']['+value+'][carpet_area][0]" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></td><td><input type="text" name="propertyDetails['+property_type+']['+value+'][super_builtup_area][0]" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area"></td><td><div data-id="'+length+'" data-value="'+value+'" class="delelteItem" data-type="'+property_type+'"><i class="fa fa-times"></i></div></td></tr>';

html +='</tbody>';
html +='</table>';
         }
         
         if(property_type=="IndependentHouse" || property_type=="Farmhouse"){ 
		  
        html +='<table class="table table-bordered table-hover  table-striped '+property_type+'_items_table_'+length+'">';
        html +='<thead class="thead-primary">';
html +='<tr>';
html +='<th width="30">Sr.</th>';

html +='<th width="400">Plot Area</th>';
html +='<th width="400">Carpet Area</th>';
html +='<th width="200">Super Built-up Area</th>';
html +='<th width="100">Action</th>';
html +='</tr>';
html +='</thead>';
html +='<tbody>';
html +='<tr><td><span class="counter">1</span></td><td><input type="text" name="propertyDetails['+property_type+']['+value+'][plot_area][0]" class="plot_area_txt form-control number required" placeholder="Plot Area"></td><td><input type="text" name="propertyDetails['+property_type+']['+value+'][carpet_area][0]" class="carpet_area_txt form-control number required" placeholder="Carpet Area"></td><td><input type="text" name="propertyDetails['+property_type+']['+value+'][super_builtup_area][0]" class="super_builtup_area_txt form-control number required" placeholder="Super Built-up Area" value=""></td><td><div  data-type="'+property_type+'" data-id="'+length+'" data-value="'+value+'" class="delelteItem"><i class="fa fa-times"></i></div></td></tr>';

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
                html += 'Other Rooms (optional)';
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
                html += 'Reserved Parking (optional)';
                html += '</label>';
                html += '<div class="col-sm-10">';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][reserved_parking][]" value="Covered Parking">';
                html += '&nbsp;<label>Covered Parking</label>&nbsp;&nbsp;&nbsp;';
                html += '<input type="checkbox" name="propertyDetails['+property_type+']['+value+'][reserved_parking][]" value="Open Parking">';
                html += '&nbsp;<label>Open Parking</label>&nbsp;&nbsp;&nbsp;';
                html += '</div>';
            html += '</div>';

            html += '<div class="form-group row label-floating is-empty">';
                html += '<div class="col-sm-6"><label class="control-label">No. of Floor <span class="required_field">*</span></label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_floor]"  class="form-control number required" placeholder="No. of Floor" value="">';
                html += '</div>';
				 if(property_type=="IndependentHouse" ||  property_type=="Farmhouse"){
					html += '<div class="col-sm-6"><label class="control-label">Total Units <span class="required_field">*</span></label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][total_units]"  class="form-control number required" placeholder="Total Units" value="">';
                html += '</div>';
				 	 
				 }else{
                html += '<div class="col-sm-6"><label class="control-label">No. of Blocks <span class="required_field">*</span></label>';
                html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][number_of_blocks]"  class="form-control number required" placeholder="No. of Blocks" value="">';
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
                html += '<div class="col-sm-10">';
                    html += '<input type="text" name="propertyDetails['+property_type+']['+value+'][possession_date]" class="form-control required possesion_by">';
                    
                html += '</div>';
            html += '</div>';

            html += '</div>';
            html += '</div>';
            html += '</div>';

            $(".property_type_accordion").append(html);
            getPropertyTypeDisable();
            $("#property_unit_type").prop("selectedIndex", 0); 
           jQuery(".select2").select2();
		    $( ".possesion_by" ).datepicker({ dateFormat: 'yy-mm-dd' });
         }
        else{
            alert("Please select value");
        }
    });
	
	
	jQuery(document).on("click",".AddNewRow",function(){
      var data_id = jQuery(this).attr("data-id");
      var data_type = jQuery(this).attr("data-type");
      var data_value = jQuery(this).attr("data-value");
      
     	var items_table_length = jQuery("."+data_type+"_items_table_"+data_id+" tbody tr").length+1;
		var counterIndex= 0;
		if(items_table_length==0){
			items_table_length = 1;	
		}
		var counterIndex= items_table_length -1; 
		
      if(data_type=="ApartmentAndFlat"){
		var html = '<tr class=""><td><span class="counter">'+items_table_length+'</span></td><td><input type="text" name="propertyDetails['+data_type+']['+data_value+'][carpet_area]['+counterIndex+']" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></td><td><input type="text" name="propertyDetails['+data_type+']['+data_value+'][super_builtup_area]['+counterIndex+']" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area"></td><td><div data-id="'+data_id+'" data-type="'+data_type+'" data-value="'+data_value+'"  class="delelteItem"><i class="fa fa-times"></i></div></td></tr>';
      }
      if(data_type=="IndependentHouse" || data_type=="Farmhouse" ){
      var html = '<tr class=""><td><span class="counter">'+items_table_length+'</span></td><td><input type="text" name="propertyDetails['+data_type+']['+data_value+'][plot_area]['+counterIndex+']" class="plot_area_txt form-control required number" placeholder="Plot Area"></td><td><input type="text" name="propertyDetails['+data_type+']['+data_value+'][carpet_area]['+counterIndex+']" class="carpet_area_txt form-control number required" placeholder="Carpet Area"></td><td><input type="text" name="propertyDetails['+data_type+']['+data_value+'][super_builtup_area]['+counterIndex+']" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area"></td><td><div  data-id="'+data_id+'" data-type="'+data_type+'" data-value="'+data_value+'" class="delelteItem"><i class="fa fa-times"></i></div></td></tr>';
      }
      jQuery("."+data_type+"_items_table_"+data_id+" tbody tr:last").after(html);	
		
	});

   
jQuery(document).on("click",".delelteItem",function() {
	var data_id = jQuery(this).attr("data-id");
	var data_type = jQuery(this).attr("data-type");
	var data_value = jQuery(this).attr("data-value");
   var items_table_length = jQuery("."+data_type+"_items_table_"+data_id+" tbody tr").length ;
	if(items_table_length==1){alert("Sorry you can't delete this item.");return false;}
	$(this).closest('tr').remove();
	
	var items_table_length = jQuery("."+data_type+"_items_table_"+data_id+" tbody tr").length;
	var j =1;
	for(var i=0;i<items_table_length;i++){
		jQuery("."+data_type+"_items_table_"+data_id+" tbody tr:eq("+i+") .counter").html(j)
		j++;
		jQuery("."+data_type+"_items_table_"+data_id+" tbody tr:eq("+i+") .plot_area_txt").attr("name","propertyDetails["+data_type+"]["+data_value+"][plot_area]["+i+"]");
		jQuery("."+data_type+"_items_table_"+data_id+" tbody tr:eq("+i+") .carpet_area_txt").attr("name","propertyDetails["+data_type+"]["+data_value+"][carpet_area]["+i+"]");
		jQuery("."+data_type+"_items_table_"+data_id+" tbody tr:eq("+i+") .super_builtup_area_txt").attr("name","propertyDetails["+data_type+"]["+data_value+"][super_builtup_area]["+i+"]");
	}
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
	 jQuery("#property_unit_type option").attr('disabled', false);
    jQuery(".property_type_"+property_type+ " .delete_acc").each(function(index, element) {
       jQuery("#property_unit_type option[value='"+jQuery(this).attr("data-value")+"']").attr('disabled', true);     
			
    });	
}
HideShowDependsubCategory();
function HideShowDependsubCategory(){
var sub_category = jQuery("#sub_category").val();	

		jQuery("#ProjectNameApartmentName").addClass("col-md-9").removeClass("col-md-6");
		jQuery(".locality_prop").addClass("col-md-6").removeClass("col-md-12");
		jQuery(".locatedinside_prop").show();
		

jQuery(".retail_type,.residential_prop,.commercial_prop,.WhatkindofHospitality,.vacantlandplotting_prop,.industrial_prop,.VacantLandPlotting_prop").hide();
jQuery(".hospitality_prop").hide();
	if(sub_category=="Commercial"){
		jQuery("#ProjectNameApartmentName").addClass("col-md-6").removeClass("col-md-9");
		jQuery(".hospitality_prop_hide").show();
		jQuery(".residential_prop").hide();
		jQuery(".commercial_prop").show();
		jQuery(".retail_type_hide").show();
		
		if(jQuery("#commercial_property_type").val()=="Office"){
			jQuery(".retail_type").hide();
			
		}
		
		if(jQuery("#commercial_property_type").val()=="Retail"){
			jQuery(".retail_type").show();
			jQuery(".retail_type_hide").hide();
			
		}
		if(jQuery("#commercial_property_type").val()=="Hospitality"){
			jQuery(".WhatkindofHospitality").show();
			jQuery(".hospitality_prop").show();
			jQuery(".hospitality_prop_hide").hide();
		}
			
		
		
	}
	if(sub_category=="Residential"){
		
		jQuery("#ProjectNameApartmentName").addClass("col-md-6").removeClass("col-md-9");
		jQuery(".residential_prop").show();
		jQuery(".commercial_prop").hide();	
	}
	if(sub_category=="IndustrialParkShades"){
		jQuery(".industrial_prop").show();		
	}
	
	if(sub_category=="VacantLandPlotting"){
		jQuery("#ProjectNameApartmentName").addClass("col-md-6").removeClass("col-md-9");
		jQuery(".industrial_prop").show();
		jQuery(".locality_prop").addClass("col-md-12").removeClass("col-md-6");
		jQuery(".locatedinside_prop,.industrial_prop_hide").hide();
		jQuery(".vacantlandplotting_prop").show();
		jQuery(".VacantLandPlotting_prop").show();
		
				
	}
	
}
jQuery(document).on("change","#sub_category,#commercial_property_type",function(e) {
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
        
       	jQuery(document).on("click",".sw-btn-group-extra",function(){
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
	    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
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

$("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
		checkPropertyTypeUnit();
			if(stepNumber==2){
				$('.sw-btn-group-extra').show(); // show the button extra only in the last page
			}else{
				$('.sw-btn-group-extra').hide();				
			}

	      });
function checkPropertyTypeUnit(){
		 var property_type = jQuery("#property_type").val().replace(/\s+/g, '');; 
     	 jQuery(".accordion-item").hide();
		 jQuery(".property_type_"+property_type).show();
		 jQuery("#step-2").attr("data-id",property_type);
		 getPropertyTypeDisable();
		
}
getState();	

function getPropertyFor(){
	var property_for = jQuery("#property_for").val();
	if(property_for=="Rent"){
		$("#category").empty();
		 $("#category").append('<option value="For owner">For owner</option>');
		
	}else{
		 $("#category").empty();
		 $("#category").append('<option value="For Builder">For Builder</option><option value="For owner">For owner</option>');
	}
}

jQuery(document).on("change","#property_for",function(){
	getPropertyFor();	
});
getPropertyFor();
	  
		  
</script>
@endsection