<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Packages; 

class PackagesController extends Controller
{
    
      public function list_role(){ 
        $data = Role::get();

        $response['data'] = $data;
        $response['succes'] = true;
        return $response;
      }    
    
      public function create(Request $request){

        try {
  
          $insert['package_name'] = $request['name'];
          $insert['package_type'] = $request['type'];
          $insert['package_location'] = $request['location'];
          $insert['package_price'] = $request['price'];
          $insert['package_feature'] = $request['feature'];
          $insert['package_details'] = $request['details'];
  
          Packages::insert($insert);
  
          $response['message'] = "Save succesful";
          $response['succes'] = true;
  
        } catch (\Exception $e) {
          $response['message'] = $e->getMessage();
          $response['succes'] = true;
        }
         
        return $response;
      }
      
      public function list(){

        try {
  
          $data = Packages::with("role")->get();
          $response['data'] = $data;
          $response['success'] = true;
  
        } catch (\Exception $e) {
          $response['message'] = $e->getMessage();
          $response['success'] = false;
        }
        return $response;
  
      }

      public function get($id){

        try {
  
          $data = Packages::with("role")->find($id);
  
          if ($data) {
            $response['data'] = $data;
            $response['message'] = "Load successful";
            $response['success'] = true;
          }
          else {
            $response['message'] = "Not found data id => $id";
            $response['success'] = false;
          }
  
        } catch (\Exception $e) {
          $response['message'] = $e->getMessage();
          $response['success'] = false;
        }
        return $response;
      }

      public function update(Request $request,$id){

        try {
  
          $data['package_name'] = $request['name'];
          $data['package_type'] = $request['type'];
          $data['package_location'] = $request['location'];
          $data['package_price'] = $request['price'];
          $data['package_feature'] = $request['feature'];
          $data['package_details'] = $request['details'];
  
          Packages::where("id",$id)->update($data);
  
          $response['message'] = "Updated successful";
          $response['success'] = true;
  
        } catch (\Exception $e) {
          $response['message'] = $e->getMessage();
          $response['success'] = false;
        }
        return $response;
  
      }

      public function delete($id){

        try {
          $res = Packages::where("id",$id)->delete();
          $response['res'] = $res;
          $response['message'] = "Deleted successful";
          $response['success'] = true; 
        } catch (\Exception $e) {
          $response['message'] = $e->getMessage();
          $response['success'] = false;
        }
  
        return $response;
      }
     
}
