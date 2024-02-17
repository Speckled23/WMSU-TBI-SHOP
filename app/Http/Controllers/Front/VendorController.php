<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Vendor;
use Validator;
use DB;

class VendorController extends Controller
{
    public function loginRegister(){
        return view('front.vendors.login_register');
    }

    public function vendorRegister(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
           /* echo "<pre>"; print_r($data); die;*/

            // Validate Vendor 
            $rules = [
                "name" => 'required|regex:/^[a-zA-Z\s]+$/|max:100',
                "email" => "required|email|regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|unique:admins|unique:vendors",
                "mobile" => "required|min:11|numeric|unique:admins|unique:vendors",
                "password"=> 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                "accept" => "required"
            ];
            $customMessages = [
                "name.required" => "Name is required",
                "name.regex" => "Name should be in valid format",
                "email.required" => "Email is required",
                "email.unique" => "Email already exists",
                "email.regex" => "Email should be in valid format",
                "mobile.required" => "Mobile number is required",
                "mobile.unique" => "The provided mobile number is already registered in our system.",
                "accept.required" => "Kindly accept the Terms and Conditions.",
            ];
            $validator = Validator::make($data,$rules,$customMessages);
            if($validator->fails()){
                return Redirect::back()->withErrors($validator);
            }

            DB::beginTransaction();

            // Create Vendor Account

            // Insert the Vendor details in vendors table
            $vendor = new Vendor;
            $vendor->name = $data['name'];
            $vendor->mobile = $data['mobile'];
            $vendor->email = $data['email'];
            $vendor->commission = 0;
            $vendor->status = 0;

            // Set Default Timezone to India
            date_default_timezone_set("Asia/Manila");
            $vendor->created_at = date("Y-m-d H:i:s");
            $vendor->updated_at = date("Y-m-d H:i:s");
            $vendor->save();
            

            $vendor_id = DB::getPdo()->lastInsertId();

            // Insert the Vendor details in admins table
            $admin = new Admin;
            $admin->type = 'vendor';
            $admin->vendor_id = $vendor_id;
            $admin->name = $data['name'];
            $admin->mobile = $data['mobile'];
            $admin->email = $data['email'];
            $admin->password = bcrypt($data['password']);
            $admin->status = 0;

            // Set Default Timezone to India
            date_default_timezone_set("Asia/Kolkata");
            $admin->created_at = date("Y-m-d H:i:s");
            $admin->updated_at = date("Y-m-d H:i:s");
            $admin->save();

            // Send Confirmation Email
            $email = $data['email'];
            $messageData = [
                'email' => $data['email'],
                'name' => $data['name'],
                'code' => base64_encode($data['email'])
            ];

            Mail::send('emails.vendor_confirmation',$messageData,function($message)use($email){
                $message->to($email)->subject('Confirm your Seller Account')->from('wmsu.tbiu@wmsutbiu.shop', 'wmsu tbi');
            });

            DB::commit();


            // Redirect back Vendor with Success Message
            $message = "Thanks for registering as seller. Please confirm your email to activate your account.";
            return redirect()->back()->with('success_message',$message);

        }
    }

    public function confirmVendor($email){
        // Decode Vendor Email
        $email = base64_decode($email);
        // Check Vendor Email exists
        $vendorCount = Vendor::where('email',$email)->count();
        if($vendorCount>0){
            // Vendor Email is already activated or not
            $vendorDetails = Vendor::where('email',$email)->first();
            if($vendorDetails->confirm == "Yes"){
                $message = "Your Seller Account is already confirmed. You can now login";
                return redirect('vendor/login-register')->with('error_message',$message);
            }else{
                // Update confirm column to Yes in both admins / vendors tables to activate account
                Admin::where('email',$email)->update(['confirm'=>'Yes']);
                Vendor::where('email',$email)->update(['confirm'=>'Yes']);

                // Send Register Email
                $messageData = [
                    'email' => $email,
                    'name' => $vendorDetails->name,
                    'mobile' => $vendorDetails->mobile
                ];

                Mail::send('emails.vendor_confirmed',$messageData,function($message)use($email){
                    $message->to($email)->subject('Your Seller Account Confirmed');
                });

                // Redirect to Vendor Login/Register page with Success message
                $message = "Your seller email account has been confirmed. You can now log in and provide your personal and business details to activate your seller account and start adding products.";
                return redirect('vendor/login-register')->with('success_message',$message);
            }
        }else{
            abort(404);
        }

    }
}
