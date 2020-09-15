<?php

namespace App\Logic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ApiErrorException;
use App\RegisterPrice;


class RegisterPriceLogic{

    private $req;

    public function __construct(Request $req = null) {
        $this->req = $req;
    }

    public function store()
    {
        $this->validate();

        $this->savePrice();

        return "Se ha registrado el precio";
    }

    private function validate()
    {
        $validator = Validator::make($this->req->all(), [
            'price_prod' => 'required|numeric'
        ]);

        // si la validacion falla
        if ($validator->fails()) {
            return response()->json([
                'status_code' => 403,
                'errors' => $validator->errors(),
            ], 403);
        }
    }

    private function savePrice()
    {
        $item = new RegisterPrice;    
        $item->system_products_id = $this->req->system_products_id;
        $item->market_id = $this->req->market_id;
        $item->unit_measures_id = $this->req->unit_measures_id;
        $item->date_price = $this->req->date_price;
        $item->price_prod = $this->req->price_prod;
        $item->save();
    }


}

