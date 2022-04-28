<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Validator;

class CategoryApiController extends Controller
{
    public function index()
    {
    	return Category::limit(5)->get();
    }

    public function add(request $req)
    {
    	if($req->isMethod('post')){
            $rule = ['categoryname' => "required|regex:/^[a-zA-Z-' ]*$/|"
                    ];
            $validator = Validator::make($req->all(), $rule);
            if($validator->fails()){
                return response()->json([
                    'message' => "Name is required",
                ]);
            }
    	        $category = new Category;
    	        $category->category_name = $req->categoryname;
    	        $category->save(); 
        	    return response()->json([
    		            'message' => " category register successfully.",
    	        ]);
        }
    }//end add category

    public function edit(Request $req)
    {        
    	$rule = ['categoryname' => "required|regex:/^[a-zA-Z-' ]*$/|"
                    ];
            $validator = Validator::make($req->all(), $rule);
            if($validator->fails()){
                return response()->json([
                    'message' => "Name is required and it is alphabhet only",
                ]);
            }
            else{
            	$params = ['category_name' => $req->categoryname,
                  ];
                $query = Category::where('id', $req->id)->update($params);
                return response()->json([
                        'message' => "category updated...",
                        ]);
            }
    }// end edit category
    public function delete(Request $req)
    {
        $rule = ['id' => "required"
                    ];
            $validator = Validator::make($req->all(), $rule);
            if($validator->fails()){
                return response()->json([
                    'message' => "Id is required",
                ]);
            }
            else{
                $query = Category::where('id', $req->id)->delete();
                if($query == 1)
                {
                    return response()->json([
                                'message' => "delete Category",
                ]);
                }
                else{
                    return response()->json([
                                'message' => "Id is wrong!!!!",
                ]);
                }
                
            }
    }//enddelete
}
