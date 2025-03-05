<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class TaobangController extends Controller
{
    public function create() {
        $message = "";

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $message ="Succsesfuly create table";

        return view('table_status',['message' => $message]);
    }      
}
