<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserOtp;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;
use App\Models\User;

class LoginController extends Controller
{
   
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }
    
    public function showVendorLoginForm()
    {
        return view('vendor.auth.login');
    }

    public function showMarketingLoginForm()
    {
        return view('marketing.auth.login');
    }

    public function generateOTP(Request $request)
    {

        /*$this->validate($request, [
            'mobile_number'   => 'required|mobile_number',
        ]);*/

        $checkUser = DB::table('users')->select('*')->where('mobile', $_POST['mobile_number'])->first();
       
		if(empty( $checkUser)){
			return redirect()->back()->with('error','Invalid mobile number.');
		}
        
        $users_info = DB::table('users')
            ->select('activations.completed','activations.user_id')
            ->join('activations','activations.user_id','users.id')
            ->groupby('activations.user_id')->distinct()
            ->where('users.deleted_at','=',NULL)
            ->where('users.id',$checkUser->id)->get();

		if(isset($users_info[0]->completed) && $users_info[0]->completed==0){
			return redirect()->back()->with('error','Account not activated');
		}else{
		
            $digits = 4;
            $otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
            
            //$otpResponse = $this->sendOTP($otp,$request->mobile_number,'sendotp');
            $otpResponse ='aaa';

            DB::table('user_otp')->where('mobile', $request->mobile_number)->delete();
            
            $user_otp = new UserOtp();
            $user_otp->mobile = $_POST['mobile_number'];
            $user_otp->otp = $otp;
            $user_otp->created_at = date('Y-m-d H:i:s');
            $user_otp->updated_at = date('Y-m-d H:i:s');
            $user_otp->otp_api_response = $otpResponse;
            $user_otp->save();

            session(['mobile_number'=>$_POST['mobile_number']]);
    
            return Redirect::route("login")->with('otp_send',  $request->mobile_number);		 
			
		}	

        return back()->withInput($request->only('mobile_number'));

    }

    public function vendorgenerateOTP(Request $request){
        $checkUser = DB::table('users')->select('*')->where('mobile', $_POST['mobile_number'])->first();
       
		if(empty( $checkUser)){
			return redirect()->back()->with('error','Invalid mobile number.');
		}
        
        $users_info = DB::table('users')
            ->select('activations.completed','activations.user_id')
            ->join('activations','activations.user_id','users.id')
            ->groupby('activations.user_id')->distinct()
            ->where('users.deleted_at','=',NULL)
            ->where('users.id',$checkUser->id)->get();

		if(isset($users_info[0]->completed) && $users_info[0]->completed==0){
			return redirect()->back()->with('error','Account not activated');
		}else{
		
            $digits = 4;
            $otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
            
            //$otpResponse = $this->sendOTP($otp,$request->mobile_number,'sendotp');
            $otpResponse ='aaa';

            DB::table('user_otp')->where('mobile', $request->mobile_number)->delete();
            
            $user_otp = new UserOtp();
            $user_otp->mobile = $_POST['mobile_number'];
            $user_otp->otp = $otp;
            $user_otp->created_at = date('Y-m-d H:i:s');
            $user_otp->updated_at = date('Y-m-d H:i:s');
            $user_otp->otp_api_response = $otpResponse;
            $user_otp->save();

            session(['mobile_number'=>$_POST['mobile_number']]);
    
            return Redirect::route("vendorlogin")->with('otp_send',  $request->mobile_number);		 
			
		}	

        return back()->withInput($request->only('mobile_number'));
    }

    public function marketinggenerateOTP(Request $request){
        $checkUser = DB::table('users')->select('*')->where('mobile', $_POST['mobile_number'])->first();
       
		if(empty( $checkUser)){
			return redirect()->back()->with('error','Invalid mobile number.');
		}
        
        $users_info = DB::table('users')
            ->select('activations.completed','activations.user_id')
            ->join('activations','activations.user_id','users.id')
            ->groupby('activations.user_id')->distinct()
            ->where('users.deleted_at','=',NULL)
            ->where('users.id',$checkUser->id)->get();

		if(isset($users_info[0]->completed) && $users_info[0]->completed==0){
			return redirect()->back()->with('error','Account not activated');
		}else{
		
            $digits = 4;
            $otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
            
            //$otpResponse = $this->sendOTP($otp,$request->mobile_number,'sendotp');
            $otpResponse ='aaa';

            DB::table('user_otp')->where('mobile', $request->mobile_number)->delete();
            
            $user_otp = new UserOtp();
            $user_otp->mobile = $_POST['mobile_number'];
            $user_otp->otp = $otp;
            $user_otp->created_at = date('Y-m-d H:i:s');
            $user_otp->updated_at = date('Y-m-d H:i:s');
            $user_otp->otp_api_response = $otpResponse;
            $user_otp->save();

            session(['mobile_number'=>$_POST['mobile_number']]);
    
            return Redirect::route("marketinglogin")->with('otp_send',  $request->mobile_number);		 
			
		}	

        return back()->withInput($request->only('mobile_number'));
    }

    public function otpSubmit(Request $request)
    {

		if($_POST['otp']==""){
			return redirect('login')->with('error',trans('Please enter otp.'));
		}else{
            // verify otp
			$getOtp = DB::table('user_otp')->select('otp','created_at')->where('otp', $_POST['otp'])->where('mobile', $_POST['mobile_number'])->get()->toArray();
			
            if(empty($getOtp)){
				return Redirect::back()->withErrors(['otp' => ['Invalid OTP']]);
			}else{
               
				$user = User::where('mobile', $_POST['mobile_number'])->first(); 
                Auth::login($user);
                
                $user = Auth::user();
                $_SESSION['user'] = $user;

                if($user->user_role==env('ADMIN_ROLE_ID')){
                    session(['user_role'=>'admin']);
                    return Redirect::route("admindashboard");
                }
                else if($user->user_role==env('VENDOR_ROLE_ID')){
                    session(['user_role'=>'vendor']);
                    return Redirect::route("vendordashboard");
                }
                else if($user->user_role==env('MARKETING_ROLE_ID')){
                    session(['user_role'=>'marketing']);
                    return Redirect::route("marketingdashboard");
                }
                else{

                }
                return Redirect::route("dashboard");
                
            }
        }	
    }
		
    public function resendOTP(){
		$mobile_number = session('mobile_number');
		if($mobile_number==""){
            return \Illuminate\Support\Facades\Response::json(array(
                'success' => false,
                'code'    => 442,
                'message' => "Sorry invalid request.",
                'data'    =>[])
            );	
		}
		
        $digits = 4;
        $otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
        
        $otpResponse = $this->sendOTP($otp,$mobile_number,'sendotp');
        DB::table('user_otp')->where('mobile', $mobile_number)->delete();

        $user_otp = new UserOtp();
        $user_otp->mobile = $mobile_number;
        $user_otp->otp = $otp;
        $user_otp->created_at = date('Y-m-d H:i:s');
        $user_otp->updated_at = date('Y-m-d H:i:s');
        $user_otp->otp_api_response = $otpResponse;
        $user_otp->save();

        return \Illuminate\Support\Facades\Response::json(array('success' => true,'code'=> 200,'message' => "Otp send successfully."));
		
	}

    public function backtologin(){
		\Session::flush();
		return \Illuminate\Support\Facades\Response::json(array('success' => true,'code'    => 200));
	}

    public function sendOTP($otp='',$phone='',$flag='')
    {

        if ($flag == 'sendotp') {
            $otpmessage = urlencode("Dear User, ".$otp." is your YasSir Verification code.");
        } else {
            $otpmessage = urlencode($otp);
        }
        
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,'http://sms.incisivewebsolution.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=667810964beb48fcf4f157b070dd89fa&message='.$otpmessage.'&senderId=YASSIR&routeId=1&mobileNos='.$phone.'&smsContentType=english');
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);

        return $query;

    }

    public function logout()
    {

        \Session::flush();
        \Auth::logout();

        if(session('user_role')=='vendor'){
            return redirect()->route('vendorlogin');
        }
        else if(session('user_role')=='marketing'){
            return redirect()->route('marketinglogin');
        }
        else{
            return redirect()->route('login');
        }
    }

}