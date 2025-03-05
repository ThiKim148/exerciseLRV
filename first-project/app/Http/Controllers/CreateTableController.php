<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CreateTableController extends Controller
{
    public function table() {
        if (!Schema::hasTable('Productsl')) {
            Schema::create('Productsl', function(Blueprint $table) {
                $table->incremments('id');
                $table->string('name');
                $table->string('image');
                $table->string('description');
                $table->integer('quantity');
                $table->date('date');
                $table->timestamps();
            });
        }
    }
}
