@extends('frontend.layouts.app')

@section('content')
<style>
.section-title-area {
  margin-top: 100px !important;
}
</style>
<div class="ltn__utilize-overlay"></div>
<!-- BREADCRUMB AREA START -->

<div id="main" class="inner-content  contact-page">
    <div class="inner-banner-row" style="background-image:url(/assests/images/inner-banner1.png);">
        <div class="bannertext">
            <h1>Contact Us</h1>
            <span>Get a prompt, pocket-friendly and apt quotation specifically for you.</span>
        </div>
    </div>
    <div class="container padd100">
        <div class="row">
            <div class="col-sm-6">
                <div class="contact-left">
                    <img src="/assests/front-end/img/contact/contactpic.png">
                    <p>Yas Sir is a bridge, bonding the buyers and the sellers across Gujarat and serves as a virtual
                        market in acquiring all the building materials from the vendors of your choice along with
                        fitting the requirements in the budget of your choice.</p>
                    <table>
                        <tbody>
                            <tr>
                                <td><i class="fa fa-map-marker"></i> Address</td>
                                <td>H/O : 318, Anikedhya Capitol, nr. Tapovan Circle, Nigam Nagar, Chandkheda,
                                    Ahmedabad, Gujarat 382424</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-phone"></i> Phone</td>
                                <!--<td><a href="tel:7575081000">7575081000</a></td>-->
                                <td>
                                    <a href="tel:7575081000">7575081000</a>,
                                    <a href="tel:7575020262">7575020262</a>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-envelope"></i> Email</td>
                                <td><a href="mailto:info@yassir.in">info@yassir.in</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <tr>
                        <div class="socialicon ct">
                            <h6>Follow Us on</h6>

                            <a class="fb" href="https://www.facebook.com/Construction.YasSir" target="_blank"><i
                                    class="fa fa-facebook"></i> </a>
                            <a class="tw" href="https://twitter.com/yassirIn2018" target="_blank"><i
                                    class="fa fa-twitter"></i> </a>
                            <a class="insta" href="https://www.instagram.com/YasSir.in/" target="_blank"><i
                                    class="fa fa-instagram"></i> </a>
                            <a class="you" href="https://www.youtube.com/channel/UCrvfZV9TZbck5YCpH7uorMQ"
                                target="_blank"><i class="fa fa-youtube"></i> </a>
                        </div>
                </div>
            </div>
            <div class="col-sm-6 contact-right">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3665.806245178714!2d72.63909!3d23.2501367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395c2bce3721c5f5%3A0xb653ff4a371f70d8!2sYas+Sir!5e0!3m2!1sen!2sin!4v1542172512161"
                    width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                <div class="book-form sidebox">
                    <h6>Get In Touch</h6>
                    <form class="formdesign1" id="cform" method="post" action="{{ route('send.contact') }}" autocomplete="off">
                    {!! csrf_field() !!}
                        <div class="formheader">
                            <div class="fromgroup">
                                <input placeholder="Name" type="text" name="fname" id="fname" value="{{ old('fname') }}">
                                <span class="text-danger">{{ $errors->first('fname') }}</span>
                            </div>
                            <div class="fromgroup">
                                <input placeholder="Phone" type="text" name="phone" id="phone" value="{{ old('phone') }}">
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                            <div class="fromgroup">
                                <input placeholder="Email" type="email" id="email" name="email" value="{{ old('email') }}">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="fromgroup">
                                <textarea placeholder="Comment" name="comment" value="{{ old('comment') }}"></textarea>
                                <span class="text-danger">{{ $errors->first('comment') }}</span>
                            </div>
                        </div>
                        
                        <div class="formfooter">
                            <input type="submit" value="Send Us" id="test">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('style')
<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    
.socialicon.ct .fb i {
    background: #39579a;
    color: #FFF;
    border: 1px solid #39579a;
    height: 40PX;
    width: 40PX;
    text-align: center;
    line-height: 40PX;
    border-radius: 33PX;
}

.socialicon.ct .tw i {
    background: #059ff5;
    color: #FFF;
    border: 1px solid #059ff5;
    height: 40PX;
    width: 40PX;
    text-align: center;
    line-height: 40PX;
    border-radius: 33PX;
}

.socialicon.ct .insta i {
    background: #e4405f;
    color: #FFF;
    border: 1px solid #e4405f;
    height: 40PX;
    width: 40PX;
    text-align: center;
    line-height: 40PX;
    border-radius: 33PX;
}

.socialicon.ct .you i {
    background: #cd201f;
    color: #FFF;
    border: 1px solid #cd201f;
    height: 40PX;
    width: 40PX;
    text-align: center;
    line-height: 40PX;
    border-radius: 33PX;
}
</style>
@endpush

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>
@endpush