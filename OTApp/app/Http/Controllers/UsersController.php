<?php

namespace App\Http\Controllers;

use App\agents;
use App\users;
use App\User;
use App\settings;
use App\confirmations;
use App\Faqs;
use App\Testimonys;
use App\plans;
use App\user_plans;
use App\account;
use App\deposits;
use App\withdrawals;
use App\notifications;
use App\tp_transactions;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Mail\NewNotification;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{ 
    

    public function index()
    {
        
        //Daily profit gainers
        $d=\Carbon\Carbon::now()->subDays(1)->toDateTimeString();
        $dpgs = DB::table('tp_transactions')->select(DB::raw("SUM(amount) as total"))->groupby('user')->
        where('created_at',$d)->get();
        
        //Weekly profit gainers
        $w=\Carbon\Carbon::now()->subWeeks(1)->toDateTimeString();
        $wpgs = DB::table('tp_transactions')->select(DB::raw("SUM(amount) as total"))->groupby('user')->
        where('created_at',$w)->get();
        
        //sum total deposited
        $total_deposits = DB::table('deposits')->select(DB::raw("SUM(amount) as total"))->
        where('status','Processed')->get();
        
        //sum total withdrawals
        $total_withdrawals = DB::table('withdrawals')->select(DB::raw("SUM(amount) as total"))->
        where('status','Processed')->get();
        
      $settings=settings::where('id', '=', '1')->first();
        return view('home.index')->with(array(
          'settings' => $settings,
          'total_users' => users::count(),
          'plans' => plans::all(),
          'total_deposits' => $total_deposits,
          'total_withdrawals' => $total_withdrawals,
          'dpgs' => $dpgs,
          'wpgs' => $wpgs,
          'faqs'=> Faqs::orderby('id', 'desc')->get(),
          'test'=> Testimonys::orderby('id', 'desc')->get(),
          'withdrawals' => withdrawals::orderby('id','DESC')->take(7)->get(),
          'deposits' => deposits::orderby('id','DESC')->take(7)->get(),
          'title' => $settings->site_title,
          'mplans' => plans::where('type','Main')->get(),
          'pplans' => plans::where('type','Promo')->get(),
        ));
    }

    //Licensing and registration route
   public function licensing(){
      
    return view('home.licensing')
    ->with(array(
      'mplans' => plans::where('type','Main')->get(),
          'pplans' => plans::where('type','Promo')->get(),
          'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
          'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
          'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
          'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
          'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
          'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
          'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
          'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
          'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
      'title' => 'Licensing, regulation and registration',
      'settings' => settings::where('id', '=', '1')->first(),
    ));
  }

    //Terms of service route
    public function terms(){
      
      return view('home.terms')
      ->with(array(
        'mplans' => plans::where('type','Main')->get(),
            'pplans' => plans::where('type','Promo')->get(),
            'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
            'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
            'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
            'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
        'title' => 'Terms of Service',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
    }

    //Privacy policy route
    public function privacy(){
      
      return view('home.privacy')
      ->with(array(
        'mplans' => plans::where('type','Main')->get(),
            'pplans' => plans::where('type','Promo')->get(),
            'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
            'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
            'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
            'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
        'title' => 'Privacy Policy',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
    }

     //FAQ route
     public function faq(){
      
      return view('home.faq')
      ->with(array(
        'mplans' => plans::where('type','Main')->get(),
            'pplans' => plans::where('type','Promo')->get(),
            'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
            'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
            'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
            'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
        'title' => 'FAQs',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
    }

     //about route
     public function about(){
      
      return view('home.about')
      ->with(array(
        'mplans' => plans::where('type','Main')->get(),
            'pplans' => plans::where('type','Promo')->get(),
            'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
            'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
            'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
            'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
        'title' => 'About',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
    }

     //Contact route
     public function contact(){
      
      return view('home.contact')
      ->with(array(
        'mplans' => plans::where('type','Main')->get(),
            'pplans' => plans::where('type','Promo')->get(),
            'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
            'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
            'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
            'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
        'title' => 'Contact',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
    }

    

    //send contact message to admin email
    public function sendcontact(Request $request){

      $settings=settings::where('id','1')->first();
      
       $objDemo = new \stdClass();
        $objDemo->message = substr(wordwrap($request['message'],70),0,350);
        $objDemo->sender = "$request->name $request->email";
        $objDemo->date = \Carbon\Carbon::Now();
        $objDemo->subject = "Contact message from $settings->site_name";
            
        Mail::bcc($settings->contact_email)->send(new NewNotification($objDemo));

      return redirect()->back()
      ->with('message', ' Your message was sent successfully!');
  
  }

  
	

    //return add account form
    public function accountdetails(Request $request){
      return view('user.updateacct')->with(array(
        'title'=>'Update account details',
        'settings' => settings::where('id', '=', '1')->first()
        ));
    }
    //update account and contact info
    public function updateacct(Request $request){
    
          users::where('id', $request['id'])
          ->update([
          'bank_name' => $request['bank_name'],
          'account_name' =>$request['account_name'], 
          'account_no' =>$request['account_no'], 
          'btc_address' =>$request['btc_address'], 
          'eth_address' =>$request['eth_address'], 
          'ltc_address' =>$request['ltc_address'], 
          ]);
          return redirect()->back()
          ->with('message', 'Withdrawal Info updated Sucessfully');
    }

    //return add change password form
    public function changepassword(Request $request){
      return view('user.changepassword')->with(array('title'=>'Change Password','settings' => settings::where('id', '=', '1')->first()));
    }
   

    //Update Password
    public function updatepass(Request $request){
        if(!password_verify($request['old_password'],$request['current_password']))
        {
          return redirect()->back()
          ->with('message', 'Incorrect Old Password');
        }
        $this->validate($request, [
        'password_confirmation' => 'same:password',
        'password' => 'min:6',
        ]);

          users::where('id', $request['id'])
          ->update([
          'password' => bcrypt($request['password']),
          ]);
          return redirect()->back()
          ->with('message', 'Password Updated Sucessful');
    } 

   
  
  
  
  //activate account route
     public function activate_account($session)
     {
      $user=users::where('act_session',$session)->first();
      if($user->act_session == $session){
        users::where('id',$user->id)
        ->update([
            'status' => "active",
        ]);  
        
        //display a msg
        echo'<link href="'.asset('css/bootstrap.css').'" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="'.asset('js/bootstrap.min.js').'"></script>';
    return('<div style="border:1px solid #f2f2f2; padding:10px; margin:150px; color:#d0d0d0; text-align:center;"><h1>Your account has been successfully verified! You may proceed to login.</h1>
    </div>');
        
      }else{
          //display a msg
           echo'<link href="'.asset('css/bootstrap.css').'" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="'.asset('js/bootstrap.min.js').'"></script>';
    return('<div style="border:1px solid #f2f2f2; padding:10px; margin:150px; color:#d0d0d0; text-align:center;"><h1>Details mismatched! Try registration again.</h1>
    </div>');
      }
     }
  

  
  
	
	//Make or remove admin
    public function makeadmin(Request $request, $id, $action){
        if($action=="on"){
            $action = "1";
        }elseif($action == "off"){
            $action = "0";
        }else{
            return redirect()-back()->with('message',"Unknown action!");
        }
        
        users::where('id', $id)
        ->update([
        'type' => $action,
        ]);
        return redirect()->back()
        ->with('message', "User type has been changed successful!.");
  }
  
  //Change user email
    public function chngemail(Request $request){
      $user=users::where('id',$request['user_id'])->first();
      users::where('id', $request['user_id'])
          ->update([
          'email'=> $request['email'],
          ]);
          return redirect()->route('manageusers')
          ->with('message', 'Action Successful!');
    }
    

  public function referuser(){
    $array = users::all();
    return view('user.referuser')->with(array(
      'title'=>'Refer Users',
      'team' => users::where('ref_by',0)->get(),
      'settings' => settings::where('id', '=', '1')->first()));

  }


  //Get downlines level
public function getdownlines($array, $parent = 0, $level = 0) {
  $referedMembers = '';
  foreach ($array as $entry) {
      if ($entry->ref_by == $parent) {
        
        if($level==0){
          $levelQuote= "Direct referral";
        }else{
          $levelQuote= "Indirect referral level $level";
        }

          $referedMembers .= "
          <tr>
          <td> $entry->name $entry->l_name </td> 
          <td> $levelQuote </td>".
          '<td>'. $this->getUserParent($entry->id).'</td>'.
          '<td>'. $this->getUserStatus($entry->id).'</td>
          <td>'. $this->getUserRegDate($entry->id).'</td>
          </tr>';

          $referedMembers .= $this->getdownlines($array, $entry->id, $level+1);
      }

      if($level == 5){
      break;
      }
  }
  return $referedMembers;
}

//Get user Parent
function getUserParent($id) {
  $user = users::where('id',$id)->first();
  $parent = users::where('id',$user->ref_by)->first();
  if($parent){
    return "$parent->name $parent->l_name";
  }else{
  return "null";
  }
}

//Get user status
function getUserStatus($id) {
  $user = users::where('id',$id)->first();

  return $user->status;
}

//Get User Registration Date
function getUserRegDate($id) {
  $user = users::where('id',$id)->first();

  return $user->created_at;
}


    // pay with card option
    public function paywithcard(Request $request, $amount){
      require_once'billing/config.php';
      
      $t_p=$amount*100; //total price in cents

    //session variables for stripe charges
    $request->session()->put('t_p', $t_p);
    $request->session()->put('c_email', Auth::user()->email);
    
    return view('user.payment')->with(array(
        'title'=>'Pay with card',
        't_p' => $t_p,
        'settings' => settings::where('id', '=', '1')->first()));

    echo'<link href="'.asset('css/bootstrap.css').'" rel="stylesheet">
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="'.asset('js/bootstrap.min.js').'"></script>';
    return('<div style="border:1px solid #f5f5f5; padding:10px; margin:150px; color:#d0d0d0; text-align:center;"><h1>You will be redirected to your payment page!</h1>
    
    <h4 style="color:#222;">Click on the button below to proceed.</h4>

    <form action="charge" method="post">
    <input type="hidden" name="_token" value="'.csrf_token().'">
      <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="'.$stripe['publishable_key'].'"
          data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
          data-name="'.$set->site_name.'"
          data-description="Account fund"
          data-amount="'.$t_p.'"
          data-locale="auto">
      </script>
    </form>
    </div>

    ');
    }

    //stripe charge customer
    public function charge(Request $request){
      include'billing/charge.php';

  //process deposit and confirm the user's plan
  //confirm the users plan

  users::where('id',Auth::user()->id)
  ->update([
  'confirmed_plan' => Auth::user()->plan,
  'activated_at' => \Carbon\Carbon::now(),
  'last_growth' => \Carbon\Carbon::now(),
  ]);
    //get plan
    $p=plans::where('id',Auth::user()->plan)->first();
    //get settings 
    $settings=settings::where('id', '=', '1')->first();
    $earnings=$settings->referral_commission*$up/100;

    if(!empty(Auth::user()->ref_by)){
  //increment the user's referee total clients activated by 1
  agents::where('agent',Auth::user()->ref_by)->increment('total_activated', 1);
  agents::where('agent',Auth::user()->ref_by)->increment('earnings', $earnings);
  
  //add earnings to agent balance
          //get agent
          $agent=users::where('id',Auth::user()->ref_by)->first();
          users::where('id',Auth::user()->ref_by)
          ->update([
          'account_bal' => $agent->account_bal + $earnings,
          ]);
          
          //create history
             tp_transactions::create([
            'user' => auth::user()->id,
            'plan' => "Credit",
             'amount'=>$earnings,
             'type'=>"Ref_bonus",
            ]);
          
          //credit commission to ancestors
          $deposit_amount = $up;
          $array=users::all();
          $parent=Auth::user()->id;
          $this->getAncestors($array, $deposit_amount, $parent);
    }
  

  //save deposit info
  $dp=new deposits();

  $dp->amount= $up;
  $dp->payment_mode= 'Credit card';
  $dp->status= 'processed';
  $dp->proof= 'stripe';
  $dp->plan= Auth::user()->plan;
  $dp->user= Auth::user()->id;
  $dp->save();
  
  return redirect()->route('dashboard')->with('message',"Successfully charged $set->currency$up!");

  echo '<h1 style="border:1px solid #f5f5f5; padding:10px; margin:150px; color:#d0d0d0; text-align:center;">Successfully charged '.$set->currency.''.$up.'!<br/>
  <small style="color:#333;">Returning to dashboard</small>
  </h1>';

  //redirect to dashboard after 5 secs
echo'
  <script>
  window.setTimeout(function(){
    window.location.href = "../";
  }, 5000);
  </script>
    ';
  }
  
  function getAncestors($array, $deposit_amount, $parent = 0, $level = 0) {
  $referedMembers = '';
  $parent=users::where('id',$parent)->first();
  foreach ($array as $entry) {
    
      if ($entry->id == $parent->ref_by) {
          //get settings 
          $settings=settings::where('id', '=', '1')->first();
                    
           if($level == 1){
          $earnings=$settings->referral_commission1*$deposit_amount/100;
          //add earnings to ancestor balance
            users::where('id',$entry->id)
            ->update([
            'account_bal' => $entry->account_bal + $earnings,
            'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
            
            //create history
             tp_transactions::create([
            'user' => $entry->id,
            'plan' => "Credit",
             'amount'=>$earnings,
             'type'=>"Ref_bonus",
            ]);
            
          }elseif($level == 2){
          $earnings=$settings->referral_commission2*$deposit_amount/100;
          //add earnings to ancestor balance
            users::where('id',$entry->id)
            ->update([
            'account_bal' => $entry->account_bal + $earnings,
            'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
            
            //create history
             tp_transactions::create([
            'user' => $entry->id,
            'plan' => "Credit",
             'amount'=>$earnings,
             'type'=>"Ref_bonus",
            ]);
            
          }elseif($level == 3){
          $earnings=$settings->referral_commission3*$deposit_amount/100;
          //add earnings to ancestor balance
            users::where('id',$entry->id)
            ->update([
            'account_bal' => $entry->account_bal + $earnings,
            'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
            
            //create history
             tp_transactions::create([
            'user' => $entry->id,
            'plan' => "Credit",
             'amount'=>$earnings,
             'type'=>"Ref_bonus",
            ]);
            
          }elseif($level == 4){
          $earnings=$settings->referral_commission4*$deposit_amount/100;
          //add earnings to ancestor balance
            users::where('id',$entry->id)
            ->update([
            'account_bal' => $entry->account_bal + $earnings,
            'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
            
            //create history
             tp_transactions::create([
            'user' => $entry->id,
            'plan' => "Credit",
             'amount'=>$earnings,
             'type'=>"Ref_bonus",
            ]);
            
          }elseif($level == 5){
          $earnings=$settings->referral_commission5*$deposit_amount/100;
          //add earnings to ancestor balance
            users::where('id',$entry->id)
            ->update([
            'account_bal' => $entry->account_bal + $earnings,
            'ref_bonus' => $entry->ref_bonus + $earnings,
            ]);
            
            //create history
             tp_transactions::create([
            'user' => $entry->id,
            'plan' => "Credit",
             'amount'=>$earnings,
             'type'=>"Ref_bonus",
            ]);
         
          }

          if($level == 6){
          break;
          }
          
          //$referedMembers .= '- ' . $entry->name . '- Level: '. $level. '- Commission: '.$earnings.'<br/>';
          $referedMembers .= $this->getAncestors($array, $deposit_amount, $entry->id, $level+1);
      
       }
  }
  return $referedMembers;
}

 public function changestyle(Request $request)
    {
      if(isset($request['style']) and $request['style']=='true'){
        $dashboard_style="dark";
      }else{
        $dashboard_style="light";
      }
        //change dashboard style
      User::where('id', Auth::User()->id)
      ->update([
          'dashboard_style' => $dashboard_style,
          ]);
        return response()->json(['success'=>'Changed']);
        
    }
    

}
