<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
     public function showDataFromJson()
    {
    $data = file_get_contents("https://deskplan.lv/muita/app.json");
    $jsonData = json_decode($data, true);

    return view('/', ['jsonData' => $jsonData]);
    }

        public function updateUsersFromJson($jsonData)
    {
        foreach ($jsonData['users'] as $users) {
            \App\Models\Users::updateOrCreate(
                ['id' => $users['id']],
                [
                    'username' => $users['username'],
                    'full_name' => $users['full_name'],
                    'role' => $users['role'],
                    'active' => $users['active'],
                ]
            );
        }
    }
}
