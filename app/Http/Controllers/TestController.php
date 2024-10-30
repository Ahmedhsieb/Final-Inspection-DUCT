<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function submitSignature(Request $request)
    {
        // Validate the request
        $request->validate([
            'signature' => 'required',
        ]);

        // Decode the base64 string and save it as an image
        $signatureData = $request->input('signature');
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
        $signatureData = str_replace(' ', '+', $signatureData);
        $signatureImage = base64_decode($signatureData);

        // Define a unique file name
        $fileName = uniqid() . '.png';

        // Save the image to storage/app/public/signatures
        Storage::put('public/signatures/' . $fileName, $signatureImage);

        // Save the file path to the database
//        DB::table('signatures')->insert([
//            'signature_path' => 'signatures/' . $fileName,
//            'created_at' => now(),
//            'updated_at' => now(),
//        ]);

        return redirect()->back()->with('success', 'Signature saved successfully!');
    }
}
