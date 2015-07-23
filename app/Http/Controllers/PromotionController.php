<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Qrcode;

class PromotionController extends Controller
{
    protected function index ($id) {

        $promotion = Qrcode::find($id);
        if (!$promotion) {

            return redirect('/');
        }

        return($promotion->description);

    }
}
