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
                    <li><a href="{{ URL::to('admin/states') }}" >States List</a></li>
                    <li><a href="{{ URL::to('admin/cities') }}" >Cities  List</a></li>
                    <li><a href="{{ URL::to('admin/sub_cities') }}" >Sub Cities  List</a></li>
                    <?php /*?><li><a href="{{ URL::to('admin/areas') }}" >Areas List</a></li><?php */?>
                </ul>
            </li>
			 <li>
                <a  href="{{ URL::to('admin/users') }}" aria-expanded="false">
                    <i class="flaticon-381-user"></i>
                    <span class="nav-text">Users</span>
                </a>
               
            </li>
            
              <li>
                <a  href="{{ URL::to('admin/slider') }}" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Slider</span>
                </a>
               
            </li>
            
             <li>
                <a  href="{{ URL::to('admin/visitor_search_record') }}" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Visitor Search Records</span>
                </a>
               
            </li>
           
         <li>
                <a  href="{{ URL::to('admin/testimonials') }}" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Testimonials</span>
                </a>
               
            </li>
            <li>
                <a  href="{{ URL::to('admin/properties') }}" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Properties</span>
                </a>
               
            </li>
            <li>
                <a href="{{ URL::to('admin/bookvisit') }}"  class="ai-icon"  aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Book Visit</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('admin/inquiry') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Inquiry</span>
                </a>
            </li>
            <li>
                <a  href="{{ URL::to('admin/advertise') }}" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Advertisement</span>
                </a>
               
            </li>
            
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Blog</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ URL::to('admin/blog') }}" >Blog</a></li>
                    
                    <li><a href="{{ URL::to('admin/blog_categories') }}" >Blog Categories</a></li>
                    <li><a href="{{ URL::to('admin/blog_tag') }}" >Blog Tags</a></li>
                    <li><a href="{{ URL::to('admin/blog_comments') }}" >Blog Comments</a></li>
                    
                </ul>
            </li>
            
             <li>
                <a  href="{{ URL::to('admin/general_setting') }}" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">General Setting</span>
                </a>
               
            </li>
        </ul>
        
        
    </div>
</div>