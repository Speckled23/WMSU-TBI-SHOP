<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrdersProduct;
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
        $product = OrdersProduct::find($id); // Fetch the product details based on $id
        $orderDetails = Order::with('orders_products')->where('id',$id)->first()->toArray();
        $images = []; // This should be an array containing the filenames of the uploaded images
        
        if (!$product) {
            // Handle case where product is not found, such as showing an error message or redirecting
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        return view('front.orders.replace_order', compact('product', 'orderDetails', 'images'));  
    }
    
    
    
}
