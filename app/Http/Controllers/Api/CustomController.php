<?php
/**
 * User:Tanay Kumar Roy
 * Email:tanayroy12@gmail.com
 * Created by Tanay Kumar Roy<tanayroy12@gmail.com> on 4/3/2020.
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MeasurementTable;
use App\Models\TailorShopUser;
use App\Models\OrderListTable;
use App\Models\OrderTypeTable;
use App\Models\CustomerMeasurementTable;
use App\Models\Table;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomController extends Controller
{   

//Customer_Table validate
public function customermeasurement(Request $request){
    $validator = Validator::make($request->all(), [
        'tailor_id' => 'required',
        'order_id' => 'required',
        'name' => 'required',
        'mobile_number' => 'required',
        'city' => 'required',
        'shirt_height' => 'required',
        'shirt_shoulder' => 'required',
        'shirt_hand_height' => 'required',
        'shirt_body' => 'required',
        'shirt_sleeave_length' => 'required',
        'shirt_collar' => 'required',
        'full_hand_shirt' => 'required',
        'pant_height' => 'required',
        'pant_waist' => 'required',
        'pant_front_rise' => 'required',
        'pant_thigh' => 'required',
        'bottom' => 'required',
        'description' => 'required',
        'notes' => 'required',
        'status' => 'required',
    ]); 

    $row = CustomerMeasurementTable::create([
        'tailor_id' => $request->tailor_id,
        'order_id' => $request->order_id,
        'name' => $request->name,
        'mobile_number' => $request->mobile_number,
        'city' => $request->city,
        'shirt_height'=>$request->shirt_height,
        'shirt_shoulder' => $request->shirt_shoulder,
        'shirt_hand_height' => $request->shirt_hand_height,
        'shirt_body' => $request->shirt_body,
        'shirt_sleeave_length' => $request->shirt_sleeave_length,
        'shirt_collar' => $request->shirt_collar,
        'full_hand_shirt' => $request->full_hand_shirt,
        'pant_height' => $request->pant_height,
        'pant_waist' => $request->pant_waist,
        'pant_front_rise' => $request->pant_front_rise,
        'pant_thigh' => $request->pant_thigh,
        'pant_thigh_loose' => $request->pant_thigh_loose,
        'bottom' => $request->bottom,
        'description'=>$request->description,
        'notes'=>$request->notes,
        'status' => $request->status,
    ]);

     if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }
    

    return response()->json(['success' => true], 200);
}    
      
    //Customer_Table GET method
    public function getAllCustomers()
    {
        $tailorusertable = CustomerMeasurementTable::where('status', '!=', 0)->get();
        return response()->json($tailorusertable, 200);
    } 

public function getCustomer($id)
{
    $customertable = CustomerMeasurementTable::where('status', '!=', 0)->find($id);
    if (!$customertable) {
        return response()->json(['error' => 'Customer not found'], 404);
    }
    return response()->json($customertable, 200);
}

    //Customer_Table EDIT method
    public function editCustomer($id){
        $single_user = CustomerMeasurementTable::where('status', '!=', 0)->find($id);
        if (!$single_user) {
            return response()->json(['error' => 'Customer not found'], 404);
        }
        return response()->json($single_user);
    
    }

    //Customer_Table DELETE method
    public function deleteCustomer($id)
    {
        $customertable = CustomerMeasurementTable::find($id);
        if (!$customertable) {
            return response()->json(['error' => 'Customer not found'], 404);
        }
         // Instead of deleting, update the status to 0
        $customertable->status = 0;
        $customertable->save();
        // $customertable->delete();
        return response()->json(['success' => true, 'message' => 'Customer deleted successfully'], 200);
    }

    //Customer_Table UPDATE method
    public function updateCustomer(Request $request, $id)
    {
        $customertable = CustomerMeasurementTable::find($id);
        if (!$customertable || $customertable->status == 0) {
            return response()->json(['error' => 'Customer not found or inactive'], 404);
        }
        
    $customertable->update([
        'customer_name' => $request->customer_name,
        'email_id' => $request->email_id,
        'contact_number' => $request->contact_number,
        'password' => bcrypt($request->password),
        'gender' => $request->gender,
        'date_of_birth' => $request->date_of_birth,
        'address' => $request->address,
        'measurement_id' => $request->measurement_id,
        'status' => $request->status,
    ]);
    $customertable->save();
    return response()->json(['success' => true, 'message' => 'Customer updated successfully'], 200);
}

// Tailor_Shop_User validate
public function tailorshopuser(Request $request){
  $validator = Validator::make($request->all(), [
      'user_name' => 'required',
      'email_id' => 'email|unique:tailor_shop_user',
      'contact_number' => 'numeric|digits:10|unique:tailor_shop_user',
      'password' => 'required',
      'gender' => 'required',
      'shop_name' => 'required',
      'shop_details' => 'required',
      'description' => 'required',
      'status' => 'required',
  ]);

  if ($validator->fails()) {
      return response()->json(['errors' => $validator->errors()], 422);
  }  
     
      $Colrow = TailorShopUser::create([
         'user_name'=>$request->user_name,
         'email_id'=>$request->email_id,
         'contact_number'=>$request->contact_number,
         'password'=>bcrypt($request->password),
         'gender'=>$request->gender,
         'shop_name' => $request->shop_name,
         'shop_details' => $request->shop_details,
         'description' => $request->description,
         'status' => $request->status,
      ]);
      return response()->json(['success' => true], 200);
  }
   
  // Tailor_Shop_User GET method
  public function getAllTailorusers()
  {
      $tailorusertable = TailorShopUser::where('status', '!=', 0)->get();
      return response()->json($tailorusertable, 200);
  } 

  public function getTailoruser($id)
  {
    $tailorusertable = TailorShopUser::where('status', '!=', 0)->find($id);
      if (!$tailorusertable) {
          return response()->json(['error' => 'Tailor Shop User not found'], 404);
      }
      return response()->json($tailorusertable, 200);
  } 

  // Tailor_Shop_User EDIT method
  public function editTailoruser($id){
    $single_user = TailorShopUser::where('status', '!=', 0)->find($id);
    if (!$single_user) {
        return response()->json(['error' => 'Tailor Shop User not found'], 404);
    }
    return response()->json($single_user);
  }

  // Tailor_Shop_User DELETE method
  public function deleteTailoruser($id)
  {
      $tailorusertable = TailorShopUser::find($id);
      if (!$tailorusertable) {
          return response()->json(['error' => 'Tailor Shop User not found'], 404);
      }
        $tailorusertable->status = 0;
        $tailorusertable->save();
    //   $tailorusertable->delete();
      return response()->json(['success' => true, 'message' => 'Tailor Shop User deleted successfully'], 200);
  }

  // Tailor_Shop_User UPDATE method
  public function updateTailoruser(Request $request, $id)
  {
      $tailorusertable = TailorShopUser::find($id);

      if (!$tailorusertable || $tailorusertable->status == 0) {
        return response()->json(['error' => 'Tailor Shop User not found or inactive'], 404);
    }
    
  $tailorusertable->update([
      'user_name' => $request->user_name,
      'email_id' => $request->email_id,
      'contact_number' => $request->contact_number,
      'password' => bcrypt($request->password),
      'gender' => $request->gender,
      'shop_name' => $request->shop_name,
      'shop_details' => $request->shop_details,
      'description' => $request->description,
      'status' => $request->status,
  ]);
  $tailorusertable->save();
  return response()->json(['success' => true, 'message' => 'Tailor Shop User updated successfully'], 200);
}

    //order list
    public function orderlist(Request $request){
        
      $validator = Validator::make($request->all(), [
          'customer_id' => 'required',
          'order_type_id' => 'required',
          'description' => 'required',
          'order_status' => 'required',
          'status' => 'required'
      ]);
  
      if ($validator->fails()) {
          return response()->json(['errors' => $validator->errors()], 422);
      }  
         
          $Cumrow = OrderListTable::create([
             'customer_id'=>$request->customer_id,
             'order_type_id'=>$request->order_type_id,
             'description'=>$request->description,
             'order_status'=>$request->order_status,
             'status' => $request->status
          ]);
          return response()->json(['success' => true], 200);
      }

      //order_type validate
      public function ordertype(Request $request){
        
        $validator = Validator::make($request->all(), [
            'type_name' => 'required',
            'status' => 'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }  
           
            $coluRow = OrderTypeTable::create([
               'type_name'=>$request->type_name,
               'status' => $request->status
            ]);
            return response()->json(['success' => true], 200);
        }
       
    //customer_measurement create
    public function create_customer_table(array $data)
    {
        return CustomerMeasurementTable::create([
            'tailor_id' => $data['tailor_id'],
            'order_id' => $data['order_id'],
            'name' => $data['name'],
            'mobile_number' => $data['mobile_number'],
            'city' => $data['city'],
            'shirt_height' => $data['shirt_height'],
            'shirt_shoulder' => $data['shirt_shoulder'],
            'shirt_hand_height' => $data['shirt_hand_height'],
            'shirt_body' => $data ['shirt_body'],
            'shirt_sleeave_length' => $data ['shirt_sleeave_length'],
            'shirt_collar' => $data ['shirt_collar'],
            'full_hand_shirt' => $data ['full_hand_shirt'],
            'pant_height' => $data ['pant_height'],
            'pant_waist' => $data ['pant_waist'],
            'pant_front_rise' => $data ['pant_front_rise'],
            'pant_thigh' => $data ['pant_thigh'],
            'pant_thigh_loose' => $data ['pant_thigh_loose'],
            'bottom' => $data ['bottom'],
            'description' => $data ['description'],
            'notes' => $data['notes'],
            'status' => $data['status']

        ]);
    }

    //tailor_shop_user create
    public function create_tailor_table(array $data)
    {
        return TailorShopUser::create([
            'user_name' =>  $data['user_name'],
            'email_id' =>       $data['email_id'],
            'contact_number' => $data['contact_number'],
            'password' =>       $data['password'],
            'gender' =>         $data['gender'],
            'shop_name' =>      $data['shop_name'],
            'shop_details' =>   $data['shop_details'],
            'description' =>    $data['description'],
            'status' =>         $data['status']
        ]);
    }
    
    //order_list create
    public function create_orderlist_table(array $data)
    {
        return OrderListTable::create([
            'customer_id' =>  $data['customer_id'],
            'order_type_id' =>       $data['order_type_id'],
            'description' => $data['description'],
            'order_status' =>       $data['order_status'],
            'status' =>         $data['status']
        ]);
    }

    //order_type create
    public function create_ordertype_table(array $data)
    {
        return OrderTypeTable::create([
            'type_name' =>  $data['type_name'],
            'status' =>         $data['status']
        ]);
    }

    public function forgetPassword(){

    }
    public function hello(){
        $name = Auth::id();
        return response()->json(['name'=>$name],200);
    }
    public function logoutApi()
    {
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
        }
    }
    public function reset(){
        PasswordReset::class;
    }
}