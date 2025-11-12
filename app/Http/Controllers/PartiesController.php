<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartiesController extends Controller
{
     public function showDataFromJson()
    {
    $data = file_get_contents("https://deskplan.lv/muita/app.json");
    $jsonData = json_decode($data, true);

    return view('/', ['jsonData' => $jsonData]);
    }

        public function updateUsersFromJson($jsonData)
    {
        foreach ($jsonData['parties'] as $parties) {
            \App\Models\Parties::updateOrCreate(
                ['id' => $parties['id']],
                [
                    'type' => $parties['type'],
                    'name' => $parties['name'],
                    'reg_code' => $parties['reg_code'],
                    'vat' => $parties['vat'],
                    'country' => $parties['country'],
                    'email' => $parties['email'],
                    'phone' => $parties['phone'],
                ]
            );
        }
    }
}
