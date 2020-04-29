<?php

namespace App\Http\Controllers\API;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\SaveMappingRequest;

class SaveMapping extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param SaveMappingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SaveMappingRequest $request)
    {
        $mapping = $request->get('mapping');
        $file = storage_path('app/uploads/' . session()->getId());
        $rows = array_map('str_getcsv', file($file));
        $firstRow = array_shift($rows);

        foreach ($rows as $row) {
            $item = [];
            $customAttributes = [];
            foreach ($row as $index => $value) {
                $key = $firstRow[$index];
                if (array_key_exists($key, $mapping)) {
                    $item[$mapping[$key]] = $value;
                }
                else {
                    $customAttributes[] = compact('key', 'value');
                }
            }
            $contact = Contact::create($item);
            $contact->customAttributes()->createMany($customAttributes);
        }

        return response()->json([
            'message' => 'Contacts successfully added'
        ], 200);
    }
}
