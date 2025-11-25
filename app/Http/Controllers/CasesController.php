<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CasesController extends Controller
{
    public function showDataFromJson()
    {
        $data = file_get_contents("https://deskplan.lv/muita/app.json");
        $jsonData = json_decode($data, true);

        return view('/', ['jsonData' => $jsonData]);
    }

        public function updateUsersFromJson($jsonData)
    {
        foreach ($jsonData['cases'] as $cases) {
            \App\Models\Cases::updateOrCreate(
                ['id' => $cases['id']],
                [
                    'cexternal_ref' => $cases['external_ref'],
                    'status' => $cases['status'],
                    'priority' => $cases['priority'],
                    'arrival_ts' => $cases['arrival_ts'],
                    'checkpoint_id' => $cases['checkpoint_id'],
                    'origin_country' => $cases['origin_country'],
                    'destination_country' => $cases['destination_country'],
                    'risk_flags' => $cases['risk_flags'],
                ]
            );

            $query = Cases::query();
                if ($request->has('status')) {
                    $query->where('status', $request->input('status'));
                }
                if ($request->has('vehicle')) {
                    $query->where('vehicle', $request->input('vehicle'));
                }
                $cases = $query->paginate(20);

        }
    }
}
