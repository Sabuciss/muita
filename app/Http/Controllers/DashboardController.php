<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Nolasām visu no API
        $data = file_get_contents('https://deskplan.lv/muita/app.json');
        $json = json_decode($data, true);

        // Droši izvelkam masīvus, pat ja kāds nav
        $cases= $json['cases'] ?? [];
        $vehicles= $json['vehicles'] ?? [];
        $users = $json['users'] ?? [];
        $inspections = $json['inspections'] ?? [];
        $documents  = $json['documents'] ?? [];
        $parties= $json['parties'] ?? [];
        $totals = $json['total'] ?? null; // ja API satur total objektu

        // Lai var filtrēt pēc request parametriem (piemēram, ?vehicle=veh-000001)
        $selectedVehicleId = request('vehicle');
        $selectedCaseId    = request('case');
        $selectedUserId    = request('user');

        return view('welcome', [
            'cases' => $cases,
            'vehicles' => $vehicles,
            'users'=> $users,
            'inspections' => $inspections,
            'documents'=> $documents,
            'parties' => $parties,
            'totals'=> $totals,
            'selectedVehicleId'=> $selectedVehicleId,
            'selectedCaseId'=> $selectedCaseId,
            'selectedUserId'=> $selectedUserId,
        ]);
    }
}
