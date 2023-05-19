<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ImageTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function verifyAndUpload(Request $request, $fieldname = 'image', $directory = 'images' ) {
          // dd("inside called");

          if( $request->hasFile( $fieldname ) ) {
            if (!$request->file($fieldname)->isValid()) {
                flash('Invalid Image!')->error()->important();
                return redirect()->back()->withInput();
            }
            $destinationPath = 'images';
            $myimage = $request->product_image->getClientOriginalName();
            $request->images->move(public_path($destinationPath), $myimage);
        
          //   return $request->file($fieldname)->store($directory, 'public');

        }

//         return null;

    }

}