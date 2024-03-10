<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrdersPruse;
use App\Models\Message;
use Validator;
use Illuminate\Support\Facades\DB;
use Auth;

class OrderController extends Controller
{
    public function orders($id=null){
        if(empty($id)){
            $orders = Order::with('orders_products')->where('user_id',Auth::user()->id)->orderBy('id','Desc')->get()->toArray();
            /*dd($orders);*/
            return view('front.orders.orders')->with(compact('orders'));    
        }else{  
            $orderDetails = Order::with('orders_products')->where('id',$id)->first()->toArray();
            /* dd($orderDetails); */
            return view('front.orders.order_details')->with(compact('orderDetails'));  
        }
        
    }

    public function cancelProduct($id){
        $orderProduct  = OrdersProduct::findorfail($id);
        $orderId = $orderProduct->order_id;

        // Count the number of order products with the same order ID
        $countOrderProducts =   OrdersProduct::where('order_id', $orderId)->count();

        if ($countOrderProducts == 1) {
            $notification = ['message' => 'This is the only product in the order. Please cancel the order instead.', 'alert-type' => 'error'];
            return redirect()->back()->with($notification);
        }


        // Delete Order Product
        OrdersProduct::where('id',$id)->delete();
        $notification = ['message' => 'Order Product has been deleted successfully!', 'alert-type' => 'success'];
        return redirect()->back()->with($notification);
    }

    public function cancelOrder($id){
        // Find the order
        // Update order status
    
        Order::where('id',$id)->update(['order_status'=>'Cancelled']);
       
        // Prepare notification
        $notification = ['message' => 'Your Order has been cancelled successfully!', 'alert-type' => 'success'];
        
        // Redirect back with notification
        return redirect()->back()->with($notification);
    }

    public function replaceProduct($id) {
        $item_details = DB::table('orders_products')
            ->where('id', $id)
            ->first();
          /*   dd($item_details); */
       
        return view('front.orders.replace_order')->with(compact('item_details'));  
    }

    public function returnQry(Request $request) {
        $data = $request->all();
    
        // Validate input data
        $validator = Validator::make($data, [
            'message' => 'required|regex:/^[\pL\s\-]+$/u',
            'proofvideo' => 'required'
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Start a database transaction
        DB::beginTransaction();
    
        try {
            // Create a new message
            $message = new Message;
            $message->orders_products_id = $data['product_id'];
            $message->vendor_id = $data['seller_id'];
            $message->user_id = $data['customer_id'];
            $message->message = $data['message'];
            $message->service = $data['option'];
            $message->status =  'Pending';
            $message->video_proof = $data['proofvideo'];
            
            // Save the message to the database
            $message->save();
    
            // Commit the transaction
            DB::commit();
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurred
            DB::rollback();
            return view('front.orders.replace_order')->with('error_message', 'Failed to create ticket, there might be wrong in the system. Please contact Admin for further details.');
        }
    
        // Redirect to inbox page with success message
        return redirect()->route('inbox_page')->with('success_message', 'You have successfully updated the ticket!');
    }

        public function view_inbox(Request $request){

          
            $user = Auth::user(); // Get the authenticated user
            $user_id = $user->id; // Retrieve the user ID from the user model
            
            // Retrieve message details
             $message_details = DB::table('message')
                ->where('user_id', $user_id) // Compare with the user ID
                ->orderBy('created_at', 'desc') // Order the results by created_at column in descending order
                ->groupBy('created_at') // Group the results by the created_at column
                ->get();
            
/*             dd($message_details->toArray());
 */            
            return view('front.orders.replace_order_list')->with(compact('message_details','user'));
        }

        public function Inbox(Request $request){

          
            $user = Auth::user(); // Get the authenticated user
            $user_id = $user->id; // Retrieve the user ID from the user model
            
            // Retrieve message details
             $message_details = DB::table('message')
                ->where('user_id', $user_id) // Compare with the user ID
                ->orderBy('created_at', 'desc') // Order the results by created_at column in descending order
                ->groupBy('created_at') // Group the results by the created_at column
                ->get();
            
/*             dd($message_details->toArray());
 */            
            return view('front.orders.replace_order_list')->with(compact('message_details','user'));
        }


        public function message(){

            return view('front.orders.message');
        }
     
    
}
