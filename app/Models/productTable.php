<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productTable extends Model
{
    use HasFactory;

    public function customfunctiomn($insertproduct,$productTable){
        // dd($insertproduct);
        // dd("called");

        foreach ($insertproduct as $key => $value) {
            $productTable-> $key = $value;
        }
        $productTable->save();
        return redirect('product')->with('insert-status', 'Record Added successfully');
        

    }
}


