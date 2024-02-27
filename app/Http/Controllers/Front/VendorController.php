<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Image;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\Barangay;
use App\Models\VendorsBusinessDetail;
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
    
            // Validate Vendor 
            $rules = [
                "first_name" => 'required|regex:/^[a-zA-Z\s]+$/|max:100',
                "last_name" => 'required|regex:/^[a-zA-Z\s]+$/|max:100',
                "email" => "required|email|regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|unique:admins|unique:vendors",
                "mobile" => "required|min:11|numeric|unique:admins|unique:vendors",
                "password" => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
                "accept" => "required",
                'shopname' => 'required',
                'vendorshopdetails' => 'required',
                'vendorshopbarangay' => 'required',
                'vendorshopcontact' => 'required|min:11|numeric',
                'vendorshoplicense' => 'required',
                'shop_gov_id' => 'required',
                'shop_permit_id' => 'required',
                'shop_bir_id' => 'required',
                'shop_dti_id' => 'required',

            ];
    
            $customMessages = [
                "first_name.required" => "First name is required.",
                "last_name.required" => "Last name is required.",
                "name.regex" => "Name should be in valid format.",
                "email.required" => "Email is required",
                "email.unique" => "Email already exists",
                "email.regex" => "Email should be in valid format",
                "mobile.required" => "Mobile number is required",
                "mobile.unique" => "The provided mobile number is already registered in our system.",
                "password.required" => "Password is required",
                "password.min" => "Password must be at least 8 characters long",
                "password.regex" => "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character",
                "password.confirmed" => "Password confirmation does not match",
                "accept.required" => "Kindly accept the Terms and Conditions.",
                'shopname.required' => 'Shop Name is Required',
                'vendorshopdetails.required' => 'Shop Address Details is Required',
                'vendorshopbarangay.required' => 'Shop Barangay is Required',
                'vendorshopcontact.required' => 'Shop Contact is Required',
                'vendorshoplicense.required' => 'Bussiness License Number is Required',
                'shop_gov_id.required' => 'Government ID is Required',
                'shop_permit_id.required' => 'Shop Permit is Required',
                'shop_bir_id.required' => 'BIR is Required',
                'shop_dti_id.required' => 'DTI Permit is Required',

            ];
    
            $validator = Validator::make($data, $rules, $customMessages);
    
            if($validator->fails()){
                return Redirect::back()->withErrors($validator);
            }
            
    
            DB::beginTransaction();
    
            // Concatenate first name, middle initial (if provided), last name, and suffix (if provided)
            $fullName = $data['first_name'];

            if(isset($data['middle_initial']) && !empty($data['middle_initial'])) {
                $fullName .= ' ' . $data['middle_initial'];
            }

            $fullName .= ' ' . $data['last_name'];

            if(isset($data['suffix']) && !empty($data['suffix'])) {
                $fullName .= ' ' . $data['suffix'];
            }

    
            // Insert the Vendor details in vendors table
            $vendor = new Vendor;
            $vendor->name = $fullName;
            $vendor->mobile = $data['mobile'];
            $vendor->email = $data['email']; // Assign the email value from the form data
            $vendor->commission = 0;
            $vendor->status = 0;
            
    
            // Set Default Timezone to Manila
            date_default_timezone_set("Asia/Manila");
            $vendor->created_at = date("Y-m-d H:i:s");
            $vendor->updated_at = date("Y-m-d H:i:s");
            $vendor->save();
    
            $vendor_id = $vendor->id;
    
            // Insert the Vendor details in admins table
            $admin = new Admin;
            $admin->type = 'vendor';
            $admin->vendor_id = $vendor_id;
            $admin->name = $fullName;
            $admin->mobile = $data['mobile'];
            $admin->email = $data['email'];
            $admin->password = bcrypt($data['password']);
            $admin->status = 0;
    
            // Set Default Timezone to Manila
            date_default_timezone_set("Asia/Manila");
            $admin->created_at = date("Y-m-d H:i:s");
            $admin->updated_at = date("Y-m-d H:i:s");
            $admin->save();


           // After saving vendor details
            $vendor_id = $vendor->id;

           
            if ($request->hasFile('shop_gov_id')) {
                $image_tmp = $request->file('shop_gov_id');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageGov = $vendor_id . '01.' . $extension;
                    $imagePath = 'admin/images/proofs/' . $imageGov;
                    Image::make($image_tmp)->save($imagePath);
                }
            } else {
                $imageGov = !empty($data['current_shop_gov_id']) ? $data['current_shop_gov_id'] : "";
            }
            // Repeat the same process for other image types


            if ($request->hasFile('shop_permit_id')) {
                $image_tmp = $request->file('shop_permit_id');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imagePermit = $vendor_id . '02.' . $extension;
                    $imagePath = 'admin/images/proofs/' . $imagePermit;
                    Image::make($image_tmp)->save($imagePath);
                }
            } else {
                $imagePermit = !empty($data['current_shop_permit_id']) ? $data['current_shop_permit_id'] : "";
            }

            if ($request->hasFile('shop_bir_id')) {
                $image_tmp = $request->file('shop_bir_id');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageBir = $vendor_id . '03.' . $extension;
                    $imagePath = 'admin/images/proofs/' . $imageBir;
                    Image::make($image_tmp)->save($imagePath);
                }
            } else {
                $imageBir = !empty($data['current_shop_bir_id']) ? $data['current_shop_bir_id'] : "";
            }

            if ($request->hasFile('shop_dti_id')) {
                $image_tmp = $request->file('shop_dti_id');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageDti = $vendor_id . '04.' . $extension;
                    $imagePath = 'admin/images/proofs/' . $imageDti;
                    Image::make($image_tmp)->save($imagePath);
                }
            } else {
                $imageDti = !empty($data['current_shop_dti_id']) ? $data['current_shop_dti_id'] : "";
            }
          
              
            // insert new vendordetails
            $detail = new VendorsBusinessDetail;
            $detail -> vendor_id = $vendor_id;
            $detail->shop_name = $data['shopname'];
            $detail->shop_address = $data['vendorshopdetails'];
            $detail->shop_city = 'Zamboanga City';
            $detail->shop_barangay = $data['vendorshopbarangay'];
            $detail->shop_country = 'Philippines';
            $detail->shop_pincode = '7000';
            $detail->shop_mobile = $data['vendorshopcontact'];
            $detail->shop_website = 'vendors';
            $detail->shop_email = $data['email'];
            $detail->address_proof = 'Gov ID';
            $detail->address_proof_image = $imageGov;
            $detail->permit_proof_image = $imagePermit;
            $detail->bir_image = $imageBir;
            $detail->dti_image = $imageDti;
            $detail->business_license_number = $data['vendorshoplicense'];
            $detail->gst_number = '0';
            $detail->pan_number = '0';
            // set default time zone to Manila
            date_default_timezone_set("Asia/Manila");
            $detail->created_at = date("Y-m-d H:i:s");
            $detail->updated_at =  date("Y-m-d H:i:s");
            $detail->save();

        


    
            // Send Confirmation Email
            $email = 'admin@admin.com';
            $messageData = [
                'email' => $data['email'],
                'name' => $fullName,
                'govID' => $imageGov,
                'permitID' => $imagePermit,
                'birID' => $imageBir,
                'dtiID' => $imageDti,
                'code' => base64_encode($data['email'])
            ];
    
            Mail::send('emails.vendor_confirmation',$messageData,function($message)use($email){
                $message->to($email)->subject('Confirm Seller Account')->from($email, 'wmsu tbi');
            });
    
            DB::commit();
    
            // Redirect back Vendor with Success Message
            $message = " Please wait for admin confirmations";
            return redirect()->back()->with('success_message',$message);
    
        }
    }
    
    public function showBarangayTable()
    {
        $barangays = Barangay::all(); // Retrieve all barangay data

        // Pass the barangay data to the view
        return view('front.vendors.login_register')->with(compact('barangays'));

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
                $message = "Your seller email account has been confirmed. You can now log in.";
                return redirect('vendor/login-register')->with('success_message',$message);
            }
        }else{
            abort(404);
        }

    }
}
