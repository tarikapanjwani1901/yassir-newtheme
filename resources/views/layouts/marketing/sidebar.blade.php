<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="ai-icon" href="{{ URL::to('marketing/dashboard') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

           <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Properties</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ URL::to('marketing/properties') }}" >Properties List</a></li>
                </ul>
            </li>

        </ul>
        
        <div class="copyright"  style="display: none;">
            <p><strong>Mophy Payment Admin Dashboard</strong> © 2022 All Rights Reserved</p>
            <p>Made with <span class="heart"></span> by DexignZone</p>
        </div>
    </div>
</div>