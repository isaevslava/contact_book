<?php

namespace App\Http\Controllers\API;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\UploadFileRequest;

class UploadFile extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param UploadFileRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UploadFileRequest $request)
    {
        $file = $request->file('import')->storeAs('uploads', session()->getId());
        $fistLine = file(storage_path('app/' . $file))[0];
        $fieldsFromFile = str_getcsv($fistLine);
        $fieldsToChoose = (new Contact())->getFillable();

        return response()->json(compact('fieldsFromFile', 'fieldsToChoose'));
    }
}
