@extends('layouts.admin.app')
@section('content')
<style>
.sw-btn-group-extra{ display:none;position: absolute;right: 6px;bottom: 12px;padding: 17px 20px !important;border-radius: .25rem !important;background: #1EAAE7 !important;font-weight: 400 !important;border: 0 !important;}
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
        <?php //echo "<pre>";print_r($properties); ?>
        <div class="row">
   <div class="col-lg-12 p-0">
      <div class="card">
      	<div class="card-header">Edit Properties</div>
         <div class="card-body">
            <form method="post" id="propertyForm" enctype="multipart/form-data">
               <input type="hidden" name="property_id" id="property_id" value="{{$p->id}}" />
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
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Vendor <span class="required_field">*</span></label>
                                    <select name="property_vendor" id="property_vendor" class="form-control select2 required" >
                                       <option value="">Select Vendor</option>
                                       @foreach($vendors as $v)
                                       @if($p->property_vendor==$v->id)
                                       <option value="{{$v->id}}" selected="selected">{{$v->company_name}}</option>
                                      	@else
                                        <option value="{{$v->id}}">{{$v->company_name}}</option>
                                        @endif
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Property For <span class="required_field">*</span></label>
                                    {!! Form::select('property_for', $propertyFor,$p->property_for,['class' => 'select2 required form-control', 'id' => 'property_for']) !!}
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Property Category <span class="required_field">*</span></label>
                                    {!! Form::select('category', $category,$p->category,['class' => 'select2 required form-control', 'id' => 'category']) !!}
                                    
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label class="control-label">Property Sub Category <span class="required_field">*</span></label>
                                    
                                        {!! Form::select('sub_category', $SubCategory,$p->sub_category,['class' => 'select2 required form-control', 'id' => 'sub_category']) !!}
                                
                                 </div>
                              </div>
                              <div class="col-md-3 residential_prop">
                                 <div class="form-group">
                                    <label class="control-label">Property Type <span class="required_field">*</span></label>
                                   {!! Form::select('property_type', $property_type,$p->property_type,['class' => 'select2 required form-control', 'id' => 'property_type']) !!}
                                
                                 </div>
                              </div>
                              <div class="col-md-3 commercial_prop">
                                 <div class="form-group">
                                    <label class="control-label">Property Type <span class="required_field">*</span></label>
                                      {!! Form::select('commercial_property_type', $commercial_property_type,$p->commercial_property_type,['class' => 'select2 required form-control', 'id' => 'commercial_property_type']) !!}
                                
                                 </div>
                              </div>
                              <div class="col-md-3 vacantlandplotting_prop">
                                 <div class="form-group">
                                    <label class="control-label">What kind of vacant land/ plotting is it?</label>
                                       {!! Form::select('what_kind_of_vacantland', $what_kind_of_vacantland,$p->what_kind_of_vacantland,['class' => 'select2 required form-control', 'id' => 'what_kind_of_vacantland']) !!}
                                
                                 </div>
                              </div>
                              <div class="col-md-6" id="ProjectNameApartmentName">
                                 <div class="form-group">
                                    <label class="control-label">Project Name / Apartment Name/ Society Name  <span class="required_field">*</span></label>
                                    <input type="text" class="form-control required" value="{{$p->project_name}}" name="project_name"/>
                                 </div>
                              </div>
                           </div>
                           <div class="row WhatkindofHospitality">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="control-label">What kind of Hospitality is it?</label>
                                   {!! Form::select('what_kind_of_hospitality', $what_kind_of_hospitality,$p->what_kind_of_hospitality,['class' => 'select2 required form-control', 'id' => 'what_kind_of_hospitality']) !!}

                                 </div>
                              </div>
                           </div>
                           <div class="row retail_type">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Retail Type:</label>
                                    {!! Form::select('retail_type', $retail_type,$p->retail_type,['class' => 'select2 required form-control', 'id' => 'retail_type']) !!}

                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Shop is located inside</label>
                                      {!! Form::select('shop_located_inside', $shop_located_inside,$p->shop_located_inside,['class' => 'select2 required form-control', 'id' => 'shop_located_inside']) !!}

                                 </div>
                              </div>
                           </div>
                           <div class="row commercial_prop industrial_prop">
                              <div class="col-md-6 locality_prop">
                                 <div class="form-group">
                                    <label class="control-label">Locality</label>
                                    <input type="text" class="form-control" name="locality" value="{{$p->locality}}"/>
                                 </div>
                              </div>
                              <div class="col-md-6 locatedinside_prop">
                                 <div class="form-group">
                                    <label class="control-label">Located inside</label>
                                   {!! Form::select('located_inside', $located_inside,$p->located_inside,['class' => 'select2 required form-control', 'id' => 'located_inside']) !!}

                                 </div>
                              </div>
                           </div>
                           <div class="row residential_prop">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Rera Number</label>
                                    <input type="text" class="form-control" name="rera_number" value="{{$p->rera_number}}"/>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="control-label">Rera Profile Link </label>
                                    <input type="text" class="form-control" name="rera_link" value="{{$p->rera_link}}"/>
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
                                        @if($p->country==$k)
                                       <option value="{{$k}}" selected="selected">{{$v}}</option>
                                      	@else
                                        <option value="{{$k}}">{{$v}}</option>
                                        @endif
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">State <span class="required_field">*</span></label>
                                     {!! Form::select('state', $state,$p->state,['class' => 'select2 required form-control', 'id' => 'state']) !!}

                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">City <span class="required_field">*</span></label>
                                     {!! Form::select('city', $city,$p->city,['class' => 'select2 required form-control', 'id' => 'city']) !!}
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Sub City <span class="required_field">*</span></label>
                                     {!! Form::select('sub_city', $sub_city,$p->sub_city,['class' => 'select2 required form-control', 'id' => 'sub_city']) !!}
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Area <span class="required_field">*</span></label>
                                           {!! Form::select('area', $area,$p->area,['class' => 'select2 required form-control', 'id' => 'area']) !!}
                             
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label class="control-label">Zipcode <span class="required_field">*</span></label>
                                    <input type="text" class="form-control required" value="{{$p->zip_code}}" name="zip_code" id="zip_code" placeholder="Zip Code"  >
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label class="control-label" for="address">Address <span class="required_field">*</span></label>
                                    <input type="text" class="form-control required" value="{{$p->address}}" name="address" id="address" placeholder="Address" >
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
                                    	@if(!empty($property_units))
                                        	@foreach($property_units as $k=>$v)
                                            	
                                            	@php 
                                                	$counter = 0;
                                                    $db_property_type = str_replace(" ","",$p->property_type);
                                                    $db_value = $v->property_unit; 
                                                    
                                                @endphp
                                             
           	<div class="accordion-item property_type_{{$db_property_type}}" id="{{$db_property_type}}_accordion_{{$counter}}" >
            <div class="accordion-header rounded-lg collapsed" id="headingOne" data-bs-toggle="collapse" data-bs-target="#{{$db_property_type}}_accordion_header_{{$counter}}" aria-expanded="true" aria-controls="collapseOne">
          		{{$db_value}}
            <div class="close-window">
            <i class="fa fa-times delete_acc" data-value="{{$db_value}}" data-id="{{$counter}}" data-type="{{$db_property_type}}" aria-hidden="true"></i>
            </div>
            </div>
            <div id="{{$db_property_type}}_accordion_header_{{$counter}}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionUnitType">
            <div class="accordion__body">
           
		   <div class="form-group row label-floating is-empty">
         <div class="col-sm-12">
        
         @if($db_property_type=="ApartmentAndFlat")
              
            <table class="table table-bordered table-hover  table-striped <?php echo $db_property_type?>_items_table_{{$counter}}">
		<thead class="thead-primary">
			<tr>
			<th width="30">Sr.</th>
			<th width="400">Carpet Area</th>
			<th width="200">Super Built-up Area</th>
			<th width="100">Action</th>
		</tr>
	</thead>
		<tbody>
			@php 
             $unitCounter  = 0;
           
            @endphp
            @if(!empty($unitAreas) && !empty($unitAreas[$v->id]))
           
            @foreach($unitAreas[$v->id] as $units)
            
		<tr><td><span class="counter">{{$unitCounter+1}}</span></td><td>
        <input type="text" value="{{$units->carpet_area}}" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][carpet_area][{{$unitCounter}}]" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></td>
        <td><input type="text" value="{{$units->super_builtup_area}}" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][super_builtup_area][{{$unitCounter}}]" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area"></td>
        <td><div data-id="{{$counter}}" data-value="{{$db_value}}" class="delelteItem" data-type="{{$db_property_type}}"><i class="fa fa-times"></i></div></td>
        </tr>
        @php 
        $unitCounter++;
        @endphp
        @endforeach	
        @else
        <tr><td><span class="counter">1</span></td><td><input type="text" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][carpet_area][0]" class="carpet_area_txt form-control required number" placeholder="Carpet Area"></td>
        <td><input type="text" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][super_builtup_area][0]" class="super_builtup_area_txt form-control required number" placeholder="Super Built-up Area"></td>
        <td><div data-id="{{$counter}}" data-value="{{$db_value}}" class="delelteItem" data-type="{{$db_property_type}}"><i class="fa fa-times"></i></div></td>
        </tr>
        @endif

		</tbody>
		</table>
         @endif
         
         @if($db_property_type=="IndependentHouse" || $db_property_type=="Farmhouse"){ 
		  
        <table class="table table-bordered table-hover  table-striped <?php echo $db_property_type?>_items_table_{{$counter}}">';
        <thead class="thead-primary">
<tr>
<th width="30">Sr.</th>

<th width="400">Plot Area</th>
<th width="400">Carpet Area</th>
<th width="200">Super Built-up Area</th>
<th width="100">Action</th>
</tr>
</thead>
<tbody>
			@php 
             $unitCounter  = 0;
            @endphp
            @if(!empty($unitAreas) && !empty($unitAreas[$v->id]))
           
            @foreach($unitAreas[$v->id] as $units)
            
<tr><td><span class="counter">{{$unitCounter+1}}</span></td>
	<td><input type="text" value="{{$units->plot_area}}" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][plot_area][{{$unitCounter}}]" class="plot_area_txt form-control number required" placeholder="Plot Area"></td>
    <td><input type="text" value="{{$units->carpet_area}}" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][carpet_area][{{$unitCounter}}]" class="carpet_area_txt form-control number required" placeholder="Carpet Area"></td>
    <td><input type="text" value="{{$units->super_builtup_area}}" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][super_builtup_area][{{$unitCounter}}]" class="super_builtup_area_txt form-control number required" placeholder="Super Built-up Area"></td>
    <td><div  data-type="{{$db_property_type}}" data-id="{{$counter}}" data-value="{{$db_value}}" class="delelteItem"><i class="fa fa-times"></i></div></td></tr>
	@php 
             $unitCounter++;
            @endphp
            
    @endforeach
    @else
	<tr><td><span class="counter">1</span></td>
	<td><input type="text" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][plot_area][0]" class="plot_area_txt form-control number required" placeholder="Plot Area"></td>
    <td><input type="text" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][carpet_area][0]" class="carpet_area_txt form-control number required" placeholder="Carpet Area"></td>
    <td><input type="text" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][super_builtup_area][0]" class="super_builtup_area_txt form-control number required" placeholder="Super Built-up Area" value=""></td>
    <td><div  data-type="{{$db_property_type}}" data-id="{{$counter}}" data-value="{{$db_value}}" class="delelteItem"><i class="fa fa-times"></i></div></td></tr>
    
    @endif
</tbody>
</table>
         @endif
	<div class="add-new-btn text-right d-block" style="float:right">
    	<input type="button" value="Add New Area" data-type="{{$db_property_type}}" data-id="{{$counter}}" data-value="{{$db_value}}"   class="AddNewRow btn btn-primary"></div></div></div>
          
           <div class="form-group row label-floating is-empty">
            <div class="col-sm-4">
           
            <label class="control-label">
                No of Bedrooms <span class="required_field">*</span>
                </label>
                <input type="text" value="{{$v->number_of_bedrooms}}" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][number_of_bedrooms]" class="form-control number required" placeholder="No of Bedrooms">
                </div>
                <div class="col-sm-4">
            
                <label class="control-label">
                No of Bathrooms <span class="required_field">*</span>
                </label>
                <input type="text" value="{{$v->number_of_bathrooms}}" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][number_of_bathrooms]" class="form-control number required" placeholder="No of Bathrooms">
                </div>
            
                <div class="col-sm-4">
            
                <label class="control-label">
                No of Balconies <span class="required_field">*</span>
                </label>
                <input type="text" value="{{$v->number_of_balconies}}" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][number_of_balconies]" class="form-control number required" placeholder="No of Balconies">
                </div>
            </div>

            <div class="form-group row label-floating is-empty">
                <label class="col-sm-2 control-label">
                Other Rooms (optional)
                </label>
                @php
                		$other_room = $v->other_room;
                    	$other_room_array = array();
                        if(!empty($other_room)){
                       		$other_room_array  = explode(", ",$other_room); 
                       }
                @endphp
                <div class="col-sm-10">
                <input type="checkbox" <?php echo in_array('Pooja Room',$other_room_array)?"checked":""; ?> name="propertyDetails[{{$db_property_type}}][{{$db_value}}][other_room][]" value="Pooja Room">
                &nbsp;<label>Pooja Room</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox"  <?php echo in_array('Servant Room',$other_room_array)?"checked":""; ?> name="propertyDetails[{{$db_property_type}}][{{$db_value}}][other_room][]" value="Servant Room">
                &nbsp;<label>Servant Room</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox"  <?php echo in_array('Store Room',$other_room_array)?"checked":""; ?> name="propertyDetails[{{$db_property_type}}][{{$db_value}}][other_room][]"  value="Store Room">
                &nbsp;<label>Store Room</label>&nbsp;&nbsp;&nbsp;
                </div>
            </div>
                
            <div class="form-group row label-floating is-empty">
               @php
                		$furnished_details = $v->furnished_details;
                    	$furnished_details_array = array();
                        if(!empty($furnished_details)){
                       		$furnished_details_array  = explode(", ",$furnished_details); 
                       }
                @endphp
                <label class="col-sm-2 control-label">
                Furnishing
                </label>
                <div class="col-sm-10">
                <input type="checkbox"  <?php echo in_array('Furnished',$furnished_details_array)?"checked":""; ?> name="propertyDetails[{{$db_property_type}}][{{$db_value}}][furnished_details][]" value="Furnished">
                &nbsp;<label>Furnished</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox"  <?php echo in_array('Semi-furnished',$furnished_details_array)?"checked":""; ?> name="propertyDetails[{{$db_property_type}}][{{$db_value}}][furnished_details][]" value="Semi-furnished">
                &nbsp;<label>Semi-furnished</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox"  <?php echo in_array('Un furnished',$furnished_details_array)?"checked":""; ?> name="propertyDetails[{{$db_property_type}}][{{$db_value}}][furnished_details][]" value="Un furnished">
                &nbsp;<label>Un furnished</label>&nbsp;&nbsp;&nbsp;
                </div>
            </div>

            <div class="form-group row label-floating is-empty">
                @php
                		$reserved_parking = $v->reserved_parking;
                    	$reserved_parking_array = array();
                        if(!empty($reserved_parking)){
                       		$reserved_parking_array  = explode(", ",$reserved_parking); 
                       }
                @endphp
                <label class="col-sm-2 control-label">
                Reserved Parking (optional)
                </label>
                <div class="col-sm-10">
                <input type="checkbox" <?php echo in_array('Covered Parking',$reserved_parking_array)?"checked":""; ?> name="propertyDetails[{{$db_property_type}}][{{$db_value}}][reserved_parking][]" value="Covered Parking">
                &nbsp;<label>Covered Parking</label>&nbsp;&nbsp;&nbsp;
                <input type="checkbox" <?php echo in_array('Open Parking',$reserved_parking_array)?"checked":""; ?> name="propertyDetails[{{$db_property_type}}][{{$db_value}}][reserved_parking][]" value="Open Parking">
                &nbsp;<label>Open Parking</label>&nbsp;&nbsp;&nbsp;
                </div>
            </div>

            <div class="form-group row label-floating is-empty">
                <div class="col-sm-6"><label class="control-label">No. of Floor <span class="required_field">*</span></label>
                <input type="text" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][number_of_floor]"  class="form-control number required" placeholder="No. of Floor" value="{{$v->number_of_floor}}">
                </div>
				 @if($db_property_type=="IndependentHouse" ||  $db_property_type=="Farmhouse")
					<div class="col-sm-6"><label class="control-label">Total Units <span class="required_field">*</span></label>
                <input type="text" value="{{$v->total_units}}" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][total_units]"  class="form-control number required" placeholder="Total Units">
                </div>
				 	 
				 @else
                <div class="col-sm-6"><label class="control-label">No. of Blocks <span class="required_field">*</span></label>
                <input type="text" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][number_of_blocks]"  class="form-control number required" placeholder="No. of Blocks" value="{{$v->number_of_blocks}}">
                </div>
				 @endif
            </div>

            <div class="form-group row label-floating is-empty">
                <label class="col-sm-2 control-label">
                Status <span class="required_field">*</span>
                </label>
                <div class="col-sm-10">
                <input type="radio" <?php echo ($v->propertystatus=="Ready to move")?"checked":"" ?>  name="propertyDetails[{{$db_property_type}}][{{$db_value}}][propertystatus]"   class="propertystatus" data-id="{{$counter}}" data-type="{{$db_property_type}}" value="Ready to move">
                &nbsp;<label for="">Ready to move</label>&nbsp;&nbsp;&nbsp;
                <input type="radio" <?php echo ($v->propertystatus=="Under Construction")?"checked":"" ?> name="propertyDetails[{{$db_property_type}}][{{$db_value}}][propertystatus]" class="propertystatus" data-id="{{$counter}}" data-type="{{$db_property_type}}"  value="Under Construction">
                &nbsp;<label for="">Under Construction</label>&nbsp;&nbsp;&nbsp;
                </div>
            </div>  
                

            <div class="form-group row label-floating is-empty" style="display:<?php echo ($v->propertystatus=="Ready to move")?"flex":"none" ?>" id="age_property_div_{{$db_property_type}}_{{$counter}}">
                <label class="col-sm-2 control-label">
                    Age of Property<span class="required_field">*</span>
                </label>
                <div class="col-sm-10">
                    <select name="propertyDetails[{{$db_property_type}}][{{$db_value}}][age_of_property]" class="propertystatus select2 required form-control" >
                        <option value="">Select</option>
                        <option value="0-1 Year" <?php echo ($v->age_of_property=="0-1 Year")?"selected":"" ?>>0-1 Year</option>
                        <option value="1-5 Year" <?php echo ($v->age_of_property=="1-5 Year")?"selected":"" ?>>1-5 Year</option>
                        <option value="5-10 Year" <?php echo ($v->age_of_property=="5-10 Year")?"selected":"" ?>>5-10 Year</option>
                        <option value="10+ Year" <?php echo ($v->age_of_property=="10+ Year")?"selected":"" ?>>10+ Year</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group row label-floating is-empty" id="possesion_by_div_{{$db_property_type}}_{{$counter}}" style="display:<?php echo ($v->propertystatus=="Under Construction")?"flex":"none" ?>;">
                <label class="col-sm-2 control-label">
                    Possession Date <span class="required_field">*</span>
                </label>
                <div class="col-sm-10">
                    <input type="text" name="propertyDetails[{{$db_property_type}}][{{$db_value}}][possession_date]" value="{{$v->possession_date}}" class="form-control possesion_date required possesion_by">
                    
                </div>
            </div>

            </div>
            </div>
            </div>

                  
                                           @php 
                                           $counter++;
                                           @endphp
                                            @endforeach
                                            
                                        @endif        
							
          
                                    
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
                                    <input type="text" placeholder="Area details" value="{{$p->area_details}}" name="VacantLandPlottingAreadetails" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Ploat area <span class="required_field">*</span> </label>
                                    <input type="text" placeholder="Ploat area" value="{{$p->plot_area}}" name="VacantLandPlottingCarpetarea" class="form-control required number" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty">
                              <label  class="col-sm-2 control-label"> Status </label>
                              <div class="col-sm-10">
                                 <input type="radio"  name="VacantLandPlottingpropertystatus" data-id="0" data-type="VacantLandPlottingpropertyStatus" class="propertystatus" <?php echo ($p->age_of_property=="Ready to move")?"checked":""; ?> value="Ready to move">
                                 &nbsp;
                                 <label for="">Ready to move</label>
                                 &nbsp;&nbsp;&nbsp;
                                 <input type="radio" class="propertystatus" data-id="0" data-type="VacantLandPlottingpropertyStatus" name="VacantLandPlottingpropertystatus" <?php echo ($p->age_of_property=="Under Construction")?"checked":""; ?> value="Under Construction">
                                 &nbsp;
                                 <label for="">Under Construction</label>
                                 &nbsp;&nbsp;&nbsp; 
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="age_property_div_VacantLandPlottingpropertyStatus_0" style="display:<?php echo ($p->age_of_property=="Ready to move")?"flex":"none"; ?>;">
                              <label  class="col-sm-2 control-label"> Age of Property <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                      {!! Form::select('VacantLandPlottingage_of_property', $age_of_property,$p->age_of_property,['class' => 'select2 required form-control', 'id' => 'VacantLandPlottingage_of_property']) !!}
                                </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="possesion_by_div_VacantLandPlottingpropertyStatus_0" style="display:<?php echo ($p->age_of_property=="Under Construction")?"flex":"none"; ?>;">
                              <label  class="col-sm-2 control-label"> Possession Date <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control required possesion_date" value="{{$p->possesion_date}}" name="VacantLandPlottingpossession_date" placeholder="Possession Date">
                              </div>
                           </div>
                        </div>
                        <div class="industrial_prop industrial_prop_hide">
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of washrooms <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of washrooms" value="{{$p->number_of_washrooms}}" name="Industrialnumber_of_washrooms" class="form-control number required" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Area details <span class="required_field">*</span></label>
                                    <input type="text" placeholder="Area details" value="{{$p->area_details}}" name="IndustrialAreadetails" class="form-control number required" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Carpet area <span class="required_field">*</span></label>
                                    <input type="text" placeholder="Carpet area" value="{{$p->carpet_area}}" name="IndustrialCarpetarea" class="form-control number required" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Super built-up area <span class="required_field">*</span></label>
                                    <input type="text" placeholder="Super built-up area" value="{{$p->super_builtup_area}}" name="Industrialsuper_builtup_area" class="form-control number required" />
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty">
                              <label  class="col-sm-2 control-label"> Status </label>
                              <div class="col-sm-10">
                                 <input type="radio"  name="Industrialpropertystatus" data-id="0" data-type="IndustrialpropertyStatus" class="propertystatus" <?php echo ($p->age_of_property=="Ready to move")?"checked":""; ?> value="Ready to move">
                                 &nbsp;
                                 <label for="">Ready to move</label>
                                 &nbsp;&nbsp;&nbsp;
                                 <input type="radio" class="propertystatus" data-id="0" data-type="IndustrialpropertyStatus" name="Industrialpropertystatus" <?php echo ($p->age_of_property=="Under Construction")?"checked":""; ?> value="Under Construction">
                                 &nbsp;
                                 <label for="">Under Construction</label>
                                 &nbsp;&nbsp;&nbsp; 
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="age_property_div_IndustrialpropertyStatus_0" style="display:<?php echo ($p->age_of_property=="Ready to move")?"flex":"none"; ?>;">
                              <label  class="col-sm-2 control-label"> Age of Property <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 
                                      {!! Form::select('Industrialage_of_property', $age_of_property,$p->age_of_property,['class' => 'select2 required form-control', 'id' => 'Industrialage_of_property']) !!}
 </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="possesion_by_div_IndustrialpropertyStatus_0" style="display:<?php echo ($p->age_of_property=="Under Construction")?"flex":"none"; ?>;">
                              <label  class="col-sm-2 control-label"> Possession Date <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control required possesion_date"  value="{{$p->possesion_date}}" name="Industrialpossession_date" placeholder="Possession Date">
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>It is pre-Leased / pre rented? &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="Industrialpre_leased" <?php echo ($p->pre_leased=="Yes")? "checked":""; ?>  value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" <?php echo ($p->pre_leased=="No" || $p->pre_leased=="")? "checked":""; ?>  type="radio" name="Industrialpre_leased"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label> Is your office Fire NOC Certified?  &nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" <?php echo ($p->fire_noc_certified=="Yes")? "checked":""; ?> name="Industrialfire_noc_certified"  value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked="checked" <?php echo ($p->fire_noc_certified=="No" || $p->fire_noc_certified=="")? "checked":""; ?>  type="radio" name="Industrialfire_noc_certified"  value="No">&nbsp;&nbsp;No&nbsp;</label>
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
                                       <input type="text" placeholder="Add room Details" value="{{$p->area_details}}" name="HospitalityAddroomDetails" class="form-control number required" />
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>No of Rooms <span class="required_field">*</span></label>
                                       <input type="text" placeholder="No of Rooms" value="{{$p->number_of_rooms}}" name="Hospitalitynumber_of_rooms" class="form-control number required" />
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>No of washrooms <span class="required_field">*</span></label>
                                       <input type="text" placeholder="No of washrooms"  value="{{$p->number_of_washrooms}}" name="Hospitalitynumber_of_washrooms" class="form-control number required" />
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>No of Balconies <span class="required_field">*</span></label>
                                       <input type="text" name="Hospitalitynumber_of_balconies" value="{{$p->number_of_balconies}}" placeholder="No of Balconies" class="form-control number required" />
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Plot Area<span class="required_field">*</span> </label>
                                       <input type="text" placeholder="Plot Area" value="{{$p->plot_area}}" name="Hospitalityplot_area" class="form-control number required" />
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Carpet Area <span class="required_field">*</span></label>
                                       <input type="text" placeholder="Carpet Area" value="{{$p->carpet_area}}" name="Hospitalitycarpet_area" class="form-control number required" />
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Super Built-up Area <span class="required_field">*</span></label>
                                       <input type="text" placeholder="Super Built-up Area" value="{{$p->super_builtup_area}}" name="Hospitalitysuper_builtup_area" class="form-control number required" />
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group row label-floating is-empty">
                                 <label for="title" class="col-sm-2 control-label"> Furnishing detail </label>
                                 <div class="col-sm-10">
                                    <input type="radio"  name="furnishing_detail" <?php echo ($p->furnishing_detail=="Furnished")? "checked":""; ?>   value="Furnished">
                                    &nbsp;
                                    <label for="">Furnished</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"  name="furnishing_detail" <?php echo ($p->furnishing_detail=="Semi furnished")? "checked":""; ?>   value="Semi furnished">
                                    &nbsp;
                                    <label for="">Semi furnished</label>
                                    &nbsp;&nbsp;&nbsp;
                                    <input type="radio"  checked name="furnishing_detail" <?php echo ($p->furnishing_detail=="Un furnished")? "checked":""; ?>  value="Un furnished">
                                    &nbsp;
                                    <label for="">Un furnished</label>
                                    &nbsp;&nbsp;&nbsp; 
                                 </div>
                              </div>
                              <?php $furnished_data = $p->furnished_data;
							  	$furnished_data_array = array();
								if($furnished_data!=""){
									$furnished_data_array = explode(", ",$furnished_data);
										
								}
							  ?>
                              
                              <div class="form-group row label-floating is-empty" id="Furnished_Block" style="display:<?php echo ($p->furnishing_detail=="Furnished")? "block":"none"; ?>;">
                                 <div class="col-sm-2"></div>
                                 <div class="col-sm-10 PropertyFeatures">
                                   
                                    <ul>
                                       <li>
                                          <input type="checkbox"  <?php echo in_array('Light',$furnished_data_array)?'checked="checked"':"" ?> value="Light" name="furnished_data[]" />
                                          Light
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('fans',$furnished_data_array)?'checked="checked"':"" ?>  value="fans" name="furnished_data[]"/>
                                          fans
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('AC',$furnished_data_array)?'checked="checked"':"" ?>  value="AC" name="furnished_data[]"/>
                                          AC
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('TV',$furnished_data_array)?'checked="checked"':"" ?>  value="TV" name="furnished_data[]"/>
                                          TV
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Beds',$furnished_data_array)?'checked="checked"':"" ?>  value="Beds" name="furnished_data[]"/>
                                          Beds
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Wardrobe',$furnished_data_array)?'checked="checked"':"" ?>  value="Wardrobe" name="furnished_data[]"/>
                                          Wardrobe
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Geyser',$furnished_data_array)?'checked="checked"':"" ?>  value="Geyser" name="furnished_data[]"/>
                                          Geyser
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Sofa',$furnished_data_array)?'checked="checked"':"" ?>  value="Sofa" name="furnished_data[]"/>
                                          Sofa
                                       </li>
                                       <li>
                                          <input type="checkbox"  <?php echo in_array('Washing machine',$furnished_data_array)?'checked="checked"':"" ?> value="Washing machine" name="furnished_data[]"/>
                                          Washing machine
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Stove',$furnished_data_array)?'checked="checked"':"" ?>  value="Stove" name="furnished_data[]"/>
                                          Stove
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('fridge',$furnished_data_array)?'checked="checked"':"" ?>  value="fridge" name="furnished_data[]"/>
                                          fridge
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('water purifier',$furnished_data_array)?'checked="checked"':"" ?>  value="water purifier" name="furnished_data[]"/>
                                          water purifier
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('microwave',$furnished_data_array)?'checked="checked"':"" ?>  value="microwave" name="furnished_data[]"/>
                                          microwave
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('modular kitchen',$furnished_data_array)?'checked="checked"':"" ?>  value="modular kitchen" name="furnished_data[]"/>
                                          modular kitchen
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Chimney',$furnished_data_array)?'checked="checked"':"" ?>  value="Chimney" name="furnished_data[]"/>
                                          Chimney
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Dinning Table',$furnished_data_array)?'checked="checked"':"" ?>  value="Dinning Table" name="furnished_data[]"/>
                                          Dinning Table
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Curtains',$furnished_data_array)?'checked="checked"':"" ?>  value="Curtains" name="furnished_data[]"/>
                                          Curtains
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Exhaust Fan',$furnished_data_array)?'checked="checked"':"" ?>  value="Exhaust Fan" name="furnished_data[]"/>
                                          Exhaust Fan
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="form-group row label-floating is-empty" id="Semifurnished_Block" style="display:<?php echo ($p->furnishing_detail=="Semi furnished")? "block":"none"; ?>;">
                                 <div class="col-sm-2"></div>
                                 <div class="col-sm-10 PropertyFeatures">
                                     <ul>
                                       <li>
                                          <input type="checkbox"  <?php echo in_array('Light',$furnished_data_array)?'checked="checked"':"" ?> value="Light" name="semifurnished_data[]" />
                                          Light
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('fans',$furnished_data_array)?'checked="checked"':"" ?>  value="fans" name="semifurnished_data[]"/>
                                          fans
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('AC',$furnished_data_array)?'checked="checked"':"" ?>  value="AC" name="semifurnished_data[]"/>
                                          AC
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('TV',$furnished_data_array)?'checked="checked"':"" ?>  value="TV" name="semifurnished_data[]"/>
                                          TV
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Beds',$furnished_data_array)?'checked="checked"':"" ?>  value="Beds" name="semifurnished_data[]"/>
                                          Beds
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Wardrobe',$furnished_data_array)?'checked="checked"':"" ?>  value="Wardrobe" name="semifurnished_data[]"/>
                                          Wardrobe
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Geyser',$furnished_data_array)?'checked="checked"':"" ?>  value="Geyser" name="semifurnished_data[]"/>
                                          Geyser
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Sofa',$furnished_data_array)?'checked="checked"':"" ?>  value="Sofa" name="semifurnished_data[]"/>
                                          Sofa
                                       </li>
                                       <li>
                                          <input type="checkbox"  <?php echo in_array('Washing machine',$furnished_data_array)?'checked="checked"':"" ?> value="Washing machine" name="semifurnished_data[]"/>
                                          Washing machine
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Stove',$furnished_data_array)?'checked="checked"':"" ?>  value="Stove" name="semifurnished_data[]"/>
                                          Stove
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('fridge',$furnished_data_array)?'checked="checked"':"" ?>  value="fridge" name="semifurnished_data[]"/>
                                          fridge
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('water purifier',$furnished_data_array)?'checked="checked"':"" ?>  value="water purifier" name="semifurnished_data[]"/>
                                          water purifier
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('microwave',$furnished_data_array)?'checked="checked"':"" ?>  value="microwave" name="semifurnished_data[]"/>
                                          microwave
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('modular kitchen',$furnished_data_array)?'checked="checked"':"" ?>  value="modular kitchen" name="semifurnished_data[]"/>
                                          modular kitchen
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Chimney',$furnished_data_array)?'checked="checked"':"" ?>  value="Chimney" name="semifurnished_data[]"/>
                                          Chimney
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Dinning Table',$furnished_data_array)?'checked="checked"':"" ?>  value="Dinning Table" name="semifurnished_data[]"/>
                                          Dinning Table
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Curtains',$furnished_data_array)?'checked="checked"':"" ?>  value="Curtains" name="semifurnished_data[]"/>
                                          Curtains
                                       </li>
                                       <li>
                                          <input type="checkbox" <?php echo in_array('Exhaust Fan',$furnished_data_array)?'checked="checked"':"" ?>  value="Exhaust Fan" name="semifurnished_data[]"/>
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
                                    <input type="text" placeholder="Carpet Area" value="{{$p->carpet_area}}" name="carpet_area" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Super Built-up Area <span class="required_field">*</span></label>
                                    <input type="text" placeholder="Super Built-up Area" value="{{$p->super_builtup_area}}" name="super_builtup_area" class="form-control required number" />
                                 </div>
                              </div>
                           </div>
                           <div class="row hospitality_prop_hide">
                              <div class="col-md-3 retail_type">
                                 <div class="form-group">
                                    <label>Entrance width <span class="required_field">*</span></label>
                                    <input type="text" name="entrance_width" value="{{$p->entrance_width}}" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3 retail_type">
                                 <div class="form-group">
                                    <label>Ceiling Heights <span class="required_field">*</span></label>
                                    <input type="text" name="ceiling_heights" value="{{$p->ceiling_heights}}" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Private Washroom <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of Private Washroom" value="{{$p->number_of_private_washroom}}" name="number_of_private_washroom" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Shared Washroom <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of Shared Washroom" value="{{$p->number_of_shared_washroom}}" name="number_of_shared_washroom" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3 retail_type_hide">
                                 <div class="form-group">
                                    <label> Conference Room </label>
                                    <select class="select2 form-control" name="conference_room">
                                       <option value="Available" <?php echo ($p->conference_room=="Available")? "selected":""; ?>>Available</option>
                                       <option value="Not Available" <?php echo ($p->conference_room=="Not Available")? "selected":""; ?>>Not Available</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3 retail_type_hide">
                                 <div class="form-group">
                                    <label>Reception Area</label>
                                    <select class="form-control select2" name="reception_area">
                                       <option value="Available" <?php echo ($p->reception_area=="Available")? "selected":""; ?>>Available</option>
                                       <option value="Not Available" <?php echo ($p->reception_area=="Not Available")? "selected":""; ?>>Not Available</option>
                                     
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row hospitality_prop_hide">
                              <div class="form-group">
                                 <div class="col-sm-12 PropertyFeatures">
                                    <label class="control-label">Facilities</label>
                                   
                                   <?php
								   		 $facilities_data = $p->facilities;
										$facilities_data_array = array();
										if($facilities_data!=""){
											$facilities_data_array = explode(", ",$facilities_data);
												
										}
							  		?>
                                    <ul>
                                       <li><input type="checkbox"   name="facilities[]"  value="Furnishing"  <?php echo in_array('Furnishing',$facilities_data_array)?'checked="checked"':"" ?> /> Furnishing</li>
                                       <li><input type="checkbox" name="facilities[]" value="Central air conditioning"  <?php echo in_array('Central air conditioning',$facilities_data_array)?'checked="checked"':"" ?> /> Central air conditioning</li>
                                       <li><input type="checkbox" name="facilities[]" value="Oxygen Duct"  <?php echo in_array('Oxygen Duct',$facilities_data_array)?'checked="checked"':"" ?> /> Oxygen Duct</li>
                                       <li><input type="checkbox" name="facilities[]" value="UPS" <?php echo in_array('UPS',$facilities_data_array)?'checked="checked"':"" ?> /> UPS</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="row hospitality_prop_hide">
                              <div class="form-group">
                                 <div class="col-sm-12 PropertyFeatures">
                                    <label class="control-label"> Fire Safety Measures </label>
                                    
                                   <?php
								   		$fire_safety_measures_data = $p->fire_safety_measures;
										$fire_safety_measures_data_array = array();
										if($fire_safety_measures_data!=""){
											$fire_safety_measures_data_array = explode(", ",$fire_safety_measures_data);
												
										}
							  		?>
                                    <ul>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Fire Safety Extinguisher" <?php echo in_array('Fire Safety Extinguisher',$fire_safety_measures_data_array)?'checked="checked"':"" ?> /> Fire Safety Extinguisher</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Fire Sensors" <?php echo in_array('Fire Sensors',$fire_safety_measures_data_array)?'checked="checked"':"" ?>/> Fire Sensors</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Sprinklers" <?php echo in_array('Sprinklers',$fire_safety_measures_data_array)?'checked="checked"':"" ?>/> Sprinklers</li>
                                       <li><input type="checkbox" name="fire_safety_measures[]" value="Fire House" <?php echo in_array('Fire House',$fire_safety_measures_data_array)?'checked="checked"':"" ?>/> Fire House</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="row hospitality_prop_hide">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of floor <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of floor" value="{{$p->number_of_floor}}" name="number_of_floor" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Passenger lifts <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of Passenger lifts" value="{{$p->number_of_passenger_lifts}}" name="number_of_passenger_lifts" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Service Lift <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of Service Lift" value="{{$p->number_of_service_lift}}" name="number_of_service_lift" class="form-control required number" />
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of Staircases <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of Staircases" value="{{$p->number_of_staircases}}" name="number_of_staircases" class="form-control required number" />
                                 </div>
                              </div>
                           </div>
                           <div class="row hospitality_prop_hide">
                             
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>No of parking allotted <span class="required_field">*</span></label>
                                    <input type="text" placeholder="No of parking allotted" value="{{$p->number_of_parking_allotted}}" name="number_of_parking_allotted" class="form-control required number" />
                                 </div>
                              </div>
                             <?php
								   		$parkings_data = $p->parkings;
										$parkings_data_array = array();
										if($parkings_data!=""){
											$parkings_data_array = explode(", ",$parkings_data);
												
										}
							  		?>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <input type="checkbox" name="parkings[]" value="Private parking in basement"  <?php echo in_array('Private parking in basement',$parkings_data_array)?'checked="checked"':"" ?>>
                                    <label>Private parking in basement
                                    </label>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <input type="checkbox" name="parkings[]" value="Private parking outside"  <?php echo in_array('Private parking outside',$parkings_data_array)?'checked="checked"':"" ?>>
                                    <label>Private parking outside
                                    </label>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <input type="checkbox" name="parkings[]" value="Public Parking" <?php echo in_array('Public Parking',$parkings_data_array)?'checked="checked"':"" ?>>
                                    <label>Public Parking
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty">
                              <label  class="col-sm-2 control-label"> Status </label>
                              <div class="col-sm-10">
                                 <input type="radio"  name="propertystatus" data-id="0" data-type="propertyStatus" class="propertystatus" <?php echo ($p->age_of_property=="Ready to move")?"checked":""; ?> value="Ready to move">
                                 &nbsp;
                                 <label for="">Ready to move</label>
                                 &nbsp;&nbsp;&nbsp;
                                 <input type="radio" class="propertystatus" data-id="0" data-type="propertyStatus" name="propertystatus" <?php echo ($p->age_of_property=="Under Construction")?"checked":""; ?> value="Under Construction">
                                 &nbsp;
                                 <label for="">Under Construction</label>
                                 &nbsp;&nbsp;&nbsp; 
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="age_property_div_propertyStatus_0" style="display:<?php echo ($p->age_of_property=="Ready to move")?"flex":"none"; ?>;">
                              <label  class="col-sm-2 control-label"> Age of Property <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                               
                                    {!! Form::select('age_of_property', $age_of_property,$p->age_of_property,['class' => 'select2 required form-control', 'id' => 'age_of_property']) !!}
                                    
                              </div>
                           </div>
                           <div class="form-group row label-floating is-empty" id="possesion_by_div_propertyStatus_0" style="display:<?php echo ($p->age_of_property=="Under Construction")?"flex":"none"; ?>;">
                              <label  class="col-sm-2 control-label"> Possession Date <span class="required_field">*</span></label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control required possesion_date" value="{{$p->possesion_date}}" name="possession_date" placeholder="Possession Date">
                              </div>
                           </div>
                           <div class="row retail_type hospitality_prop_hide">
                              <div class="form-group">
                                 <div class="col-sm-12 PropertyFeatures">
                                    <label class="control-label"> Suitable business Type</label>
                                    <?php
								   		$suitable_business_type_data = $p->suitable_business_type;
										$suitable_business_type_data_array = array();
										if($suitable_business_type_data!=""){
											$suitable_business_type_data_array = explode(", ",$suitable_business_type_data);
												
										}
							  		?>
                                    <ul>
                                       <li><input type="checkbox"  name="suitable_business_type[]" value="Jewelry" <?php echo in_array('Jewelry',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Jewelry</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Gym"  <?php echo in_array('Gym',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Gym</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Grocery"  <?php echo in_array('Grocery',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Grocery</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Clinic"  <?php echo in_array('Clinic',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Clinic</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Stationary"  <?php echo in_array('Stationary',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Stationary</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Mobile shop"  <?php echo in_array('Mobile shop',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Mobile shop</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Cloths"  <?php echo in_array('Footwear',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Cloths</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Footwear"  <?php echo in_array('Footwear',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Footwear</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Medical"  <?php echo in_array('Medical',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Medical</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Salon/spa"  <?php echo in_array('Salon/spa',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Salon/spa</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Fast food"  <?php echo in_array('Fast food',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Fast food</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Coffee shop"  <?php echo in_array('Coffee shop',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Coffee shop</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="ATM"  <?php echo in_array('ATM',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> ATM</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Juice shop"  <?php echo in_array('Juice shop',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Juice shop</li>
                                       <li><input type="checkbox" name="suitable_business_type[]" value="Sweet shop"  <?php echo in_array('Sweet shop',$suitable_business_type_data_array)?'checked="checked"':"" ?>/> Sweet shop</li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>It is pre-Leased / pre rented? &nbsp;&nbsp;&nbsp;
                                    
                                     <input class="form-check-input" type="radio" name="pre_leased" <?php echo ($p->pre_leased=="Yes")? "checked":""; ?>  value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" <?php echo ($p->pre_leased=="No" || $p->pre_leased=="")? "checked":""; ?>  type="radio" name="pre_leased"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                             
                                    
                                    
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label> Is your office Fire NOC Certified?  &nbsp;&nbsp;&nbsp;
                                    
                                   <input class="form-check-input" type="radio" <?php echo ($p->fire_noc_certified=="Yes")? "checked":""; ?> name="fire_noc_certified"  value="Yes">&nbsp;&nbsp;
                                    Yes&nbsp;&nbsp;
                                    <input class="form-check-input" checked="checked" <?php echo ($p->fire_noc_certified=="No" || $p->fire_noc_certified=="")? "checked":""; ?>  type="radio" name="fire_noc_certified"  value="No">&nbsp;&nbsp;No&nbsp;</label>
                                 </div>
                            
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="step3" class="tab-pane" role="tabpanel">
                        <div class="row">
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <label class="control-label" for="amenities" >Amenities:</label>
                                  <?php
								   		$amenities_data = $p->amenities;
										$amenities_data_array = array();
										if($amenities_data!=""){
											$amenities_data_array = explode(", ",$amenities_data);
												
										}
							  		?>
                                   
                                 <select class="form-control multi_select" name="amenities[]" style="width:100%" multiple="multiple" id="multi_select">
                                    <?php foreach($amenties as $v){ ?>
                                    <option value="<?php echo $v ?>" <?php echo in_array($v,$amenities_data_array)?'selected':"" ?>><?php echo $v; ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group">
                              <div class="col-sm-12 PropertyFeatures">
                                 <label class="control-label">Property Features:</label>
                                  <?php
								   		$property_features_data = $p->property_features;
										$property_features_data_array = array();
										if($property_features_data!=""){
											$property_features_data_array = explode(", ",$property_features_data);
												
										}
							  		?>
                                 
                                 <ul>
                                    <li><input type="checkbox" name="property_features[]" value="Gas Pipeline" <?php echo in_array('Gas Pipeline',$property_features_data_array)?'checked="checked"':"" ?>/> Gas Pipeline</li>
                                    <li><input type="checkbox" name="property_features[]" value="Central air conditioning"  <?php echo in_array('Central air conditioning',$property_features_data_array)?'checked="checked"':"" ?>/> Central air conditioning</li>
                                    <li><input type="checkbox" name="property_features[]" value="Natural light"  <?php echo in_array('Natural light',$property_features_data_array)?'checked="checked"':"" ?>/> Natural light</li>
                                    <li><input type="checkbox"  name="property_features[]" value="Airy rooms"  <?php echo in_array('Airy rooms',$property_features_data_array)?'checked="checked"':"" ?>/> Airy rooms</li>
                                    <li><input type="checkbox" name="property_features[]" value="Spacious"  <?php echo in_array('Spacious',$property_features_data_array)?'checked="checked"':"" ?>/> Spacious</li>
                                    <li><input type="checkbox" name="property_features[]" value="Ac Points"  <?php echo in_array('Ac Points',$property_features_data_array)?'checked="checked"':"" ?>/> Ac Points</li>
                                    <li><input type="checkbox" name="property_features[]" value="Electric Charging Points"  <?php echo in_array('Electric Charging Points',$property_features_data_array)?'checked="checked"':"" ?>/> Electric Charging Points</li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <label>Project features</label>
                                 <textarea class="form-control" name="project_features">{{$p->project_features}}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <label>Additional features</label>
                                 <textarea  class="form-control" name="additional_features">{{$p->additional_features}}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group">
                              <div class="col-sm-12 PropertyFeatures">
                                 <label class="control-label">Other features</label>
                                  <?php
								   		$other_features_data = $p->other_features;
										$other_features_data_array = array();
										if($other_features_data!=""){
											$other_features_data_array = explode(", ",$other_features_data);
												
										}
							  		?>
                                 
                                 <ul>
                                    <li><input type="checkbox"  name="other_features[]" value="Gated Society" <?php echo in_array('Gated Society',$other_features_data_array)?'checked="checked"':"" ?>/> Gated Society</li>
                                    <li><input type="checkbox"  name="other_features[]" value="Corner side property"  <?php echo in_array('Corner side property',$other_features_data_array)?'checked="checked"':"" ?>/> Corner side property</li>
                                    <li><input type="checkbox"  name="other_features[]" value="Roade facing property"  <?php echo in_array('Roade facing property',$other_features_data_array)?'checked="checked"':"" ?>/> Roade facing property</li>
                                    <li><input type="checkbox"  name="other_features[]" value="Small society"  <?php echo in_array('Small society',$other_features_data_array)?'checked="checked"':"" ?>/> Small society</li>
                                    <li><input type="checkbox"  name="other_features[]" value="Pet friendly society"  <?php echo in_array('Pet friendly society',$other_features_data_array)?'checked="checked"':"" ?>/> Pet friendly society</li>
                                    <li><input type="checkbox"  name="other_features[]" value="Wheelchair friendly society"  <?php echo in_array('Wheelchair friendly society',$other_features_data_array)?'checked="checked"':"" ?>/> Wheelchair friendly society</li>
                                    <li><input type="checkbox" name="other_features[]"  value="Automation"  <?php echo in_array('Automation',$other_features_data_array)?'checked="checked"':"" ?>/> Automation</li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <label>Location Advantages (nearby facilities)</label>
                                 <textarea  class="form-control" name="location_advantages">{{$p->location_advantages}}</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <label>Suggestions and other</label>
                                 <textarea  class="form-control" name="suggestions">{{$p->suggestions}}</textarea>
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
                                       <input type="file" name="project_gallery[]" multiple="multiple" class="form-file-input form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="row">
                                    <label class="control-label  p-0" for="form-file-multiple-input">Floor Plan Gallery</label>
                                    <div class="form-file p-0">
                                       <input type="file" name="floor_plan_gallery[]" multiple="multiple" class="form-file-input form-control">
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
                                       <input type="file" name="project_status_gallery[]" multiple="multiple" class="form-file-input form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="row">
                                    <label class="control-label  p-0" >Video Toor</label>
                                    <div class="form-file p-0">
                                       <input type="file" name="video_toor" class="form-file-input form-control">
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
                                       <input type="file" name="pdf_brochure" class="form-file-input form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <div class="row">
                                    <label class="control-label  p-0" >Sample house video(Youtube URL)</label>
                                    <input type="text" class="form-control" name="sample_house_video" value="{{$p->sample_house_video}}">
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
@endsection

@section('customjs')
<script>
  $(document).ready(function(){
	  

 $( ".possesion_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
   var navListItems = $('div.setup-panel div a'),
              allWells = $('.setup-content'),
              allNextBtn = $('.nextBtn');
          allPrevBtn = $('.prevBtn');

          allWells.hide();

          navListItems.click(function(e) {
              e.preventDefault();
              var $target = $($(this).attr('href')),
                  $item = $(this);

              if (!$item.hasClass('disabled')) {
                  navListItems.removeClass('btn-primary').addClass('btn-default');
                  $item.addClass('btn-primary');
                  allWells.hide();
                  $target.show();
                  $target.find('input:eq(0)').focus();
              }
          });
          allNextBtn.click(function() {
              var curStep = $(this).closest(".setup-content"),
                  curStepBtn = curStep.attr("id"),
                  nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                  curInputs = curStep.find("input[type='text'],input[type='url'],input[type='email'],input[type='number'],select,textarea"),
                  isValid = true;
				  if(curStepBtn=="step-1"){
					  
					  var property_type = jQuery("#property_type").val().replace(/\s+/g, ''); 
     				 jQuery(".accordion-item").hide();
					jQuery(".property_type_"+property_type).show();
		
					 jQuery("#step-2").attr("data-id",property_type);  
				  }

              $(".form-group").removeClass("has-error");
              for (var i = 0; i < curInputs.length; i++) {
                  if (!curInputs[i].validity.valid) {
                      isValid = false;
                      console.log(curInputs[i]);
                      $(curInputs[i]).closest(".form-group").addClass("has-error");
                  }
              }

              if (isValid)
                  nextStepWizard.removeAttr('disabled').trigger('click');
          });
          allPrevBtn.click(function() {

              var curStep = $(this).closest(".setup-content"),

                  curStepBtn = curStep.attr("id"),

                  prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

              prevStepWizard.removeAttr('disabled').trigger('click');

          });

          $('div.setup-panel div a.btn-primary').trigger('click');
         
  jQuery(".select2").select2();
 
  jQuery(".multi_select").select2();
 
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

  $("#area").empty();
  $("#area").append('<option value="">Select Area</option>');

  
                  
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
  $("#area").empty();
  $("#area").append('<option value="">Select Area</option>');

               
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
  $("#area").empty();
  $("#area").append('<option value="">Select Area</option>');
               
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


$("#sub_city").on('change',function(){

var sub_city = $('#sub_city').val();
  $("#area").empty();
  $("#area").append('<option value="">Select Area</option>');
               
if (sub_city !== '') {

    //Populate Sub Category Drop Down
    $.ajax({
        type:"GET",
        dataType: "json",
        url:"{{url('/admin/getArea')}}?sub_city="+this.value,
        success:function(data){
            if ( data ) {
                
                $.each( data, function( key, value ) {
                    $("#area").append('<option value="'+key+'">'+value+'</option>');
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
		  
</script>
@endsection