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
                <a  href="{{ URL::to('vendor/properties') }}" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Properties</span>
                </a>
               
            </li>
           <li>
                <a href="{{ URL::to('vendor/bookvisit') }}"  class="ai-icon"  aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Book Visit</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('vendor/inquiry') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Inquiry</span>
                </a>
            </li>

           <?php /*?>  <li>
                <a  href="{{ URL::to('vendor/advertise') }}" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Advertisement</span>
                </a>
               
            </li><?php */?>
             <li>
                <a  href="{{ URL::to('vendor/profile') }}" aria-expanded="false">
                    <i class="flaticon-381-user"></i>
                    <span class="nav-text">Profile</span>
                </a>
               
            </li>
        </ul>
        
        <div class="copyright"  style="display: none;">
            <p><strong>Mophy Payment Admin Dashboard</strong> © 2022 All Rights Reserved</p>
            <p>Made with <span class="heart"></span> by DexignZone</p>
        </div>
    </div>
</div>