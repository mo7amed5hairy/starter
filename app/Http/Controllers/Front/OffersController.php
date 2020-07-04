<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function get_offers(){
        return Offer::all();
    }

    public function create(){
        return view('offers.insert_offers');
    }

    public function store(Request $request){
       //validate data before insertion

        $rules  =  $this->get_rules();
        $messages =  $this->get_messages();

        $validator = Validator::make($request->all(),$rules,$messages);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }




       //insert data into database
        Offer::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'discount'=>$request->discount,
        ]);
        return redirect()->back()->with(['message'=>'Data inserted successfully']);
    }

    public function get_messages(){
        return $message =([
            'name.required'=>__('messages.offer_name_is_required'),
            'name.unique'=>__('messages.offer_name_is_unique'),
            'price.required'=>__('messages.offer_price_must_be_required'),
            'price.numeric'=>__('messages.offer_price_must_be_numeric'),
            'discount.required'=>__('messages.offer_discount_is_required'),
            'discount.numeric'=>__('messages.offer_discount_must_be_numeric'),
        ]);
    }

    public function get_rules(){
        return $rules =([

            'name'=>'required|max:100|unique:table_offers,name',
            'price'=>'required|numeric',
            'discount'=>'required|numeric',

        ]);
    }
}
