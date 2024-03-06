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
        $countOrderProducts = OrdersProduct::where('order_id', $orderId)->count();

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
            ->select('product_name')
            ->where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->first();
       
        return view('front.orders.replace_order')->with(compact('item_details'));  
    }

    public function returnQry(Request $request) {
        $data = $request->all();
    
        // Validate input data
        $validator = Validator::make($data, [
            'message' => 'required|regex:/^[\pL\s\-]+$/u',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
        ], [
            'message.required' => 'Message is required',
            'image1.required' => 'Image is required',
            'image2.required' => 'Image is required',
            'image3.required' => 'Image is required',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Update operation with condition based on the record ID
        $affectedRows = Message::where('id', $data['id'])->update([
            'message' => $data['message'],
            'image1' => $data['image1'],
            'image2' => $data['image2'],
            'image3' => $data['image3']
        ]);
    
        if ($affectedRows > 0) {
            return view('front.orders.replace_order_list')->with('success_message', 'You have successfully updated the  ticket!');
        } else {
            return view('front.orders.replace_order')->with('error_message', 'Failed to create ticket, there might be wrong in the system. Please contact Admin for further details.');
        }
    }    
    
}
