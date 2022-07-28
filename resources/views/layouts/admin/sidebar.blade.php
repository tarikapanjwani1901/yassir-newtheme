<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Locations</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ URL::to('admin/states') }}" >All States</a></li>
                    <li><a href="{{ URL::to('admin/states/add') }}" >Add State</a></li>
                    <li><a href="{{ URL::to('admin/cities') }}" >All Cities</a></li>
                    <li><a href="{{ URL::to('admin/cities/add') }}" >Add City</a></li>
                    <li><a href="{{ URL::to('admin/sub_cities') }}" >All Sub Cities</a></li>
                    <li><a href="{{ URL::to('admin/sub_cities/add') }}" >Add Sub City</a></li>
                    <li><a href="{{ URL::to('admin/areas') }}" >All Areas</a></li>
                    <li><a href="{{ URL::to('admin/areas/add') }}" >Add Area</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Testimonial</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ URL::to('admin/testimonials') }}" >Testimonial</a></li>
                    <li><a href="{{ URL::to('admin/testimonials/add') }}" >Add Testimonial</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Properties</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ URL::to('admin/properties') }}" >Properties</a></li>
                    <li><a href="{{ URL::to('admin/properties/add') }}" >Add Proprty</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ URL::to('admin/bookvisit') }}"  class="ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Book Visit</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('admin/inquiry') }}" class="ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Inquiry Listing</span>
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Advertisement</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ URL::to('admin/advertise') }}" >Advertisement List</a></li>
                    <li><a href="{{ URL::to('admin/advertise/add') }}" >Add Advertisement</a></li>
                </ul>
            </li>
        </ul>
        
        <div class="copyright"  style="display: none;">
            <p><strong>Mophy Payment Admin Dashboard</strong> © 2022 All Rights Reserved</p>
            <p>Made with <span class="heart"></span> by DexignZone</p>
        </div>
    </div>
</div>