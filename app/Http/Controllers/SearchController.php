<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Clinic;
use App\Models\SpecializedClinic;
use App\Models\SpecializedHospital;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

class SearchController extends Controller
{
    public function search(Request $request)
    {
         // Validate the input
        // $request->validate([
        //     'table' => 'required|in:hospital,specialized_hospitals,specialized_clinics,Clinic',
        //     'query' => 'required|string',
        // ]);


        $table = $request->input('table'); // Get the selected table name from the form
        $query = $request->input('query'); // Get the search query from the form

        // Initialize $results to an empty array to avoid "compact() Undefined variable" error
        $results = [];
        $noResultsMessage = [];


        // Perform the search query based on the selected table
        switch ($table) {
            case 'AnyHealthCare':
                // If "Any HealthCare" is selected, fetch all records from all tables
                $hospitalResults = Hospital::search($query)->get();
                $specializedHospitalResults = SpecializedHospital::search($query)->get();
                $specializedClinicResults = SpecializedClinic::search($query)->get();
                $clinicResults = Clinic::search($query)->get();
    
                // Combine all results into a single array
                $results = $hospitalResults
                    ->concat($specializedHospitalResults)
                    ->concat($specializedClinicResults)
                    ->concat($clinicResults);
                break;
            case 'hospital':
                $results = Hospital::search($query)->get();
                break;
            case 'specializedhospital':
                $results = SpecializedHospital::search($query)->get();
                break;
            case 'specializedclinic':
                $results = SpecializedClinic::search($query)->get();
                break;
            case 'clinic':
                $results = Clinic::search($query)->get();
                break;
            default:
                // If no query is provided or an invalid table is selected, set results to an empty array
                $results = [];
                break;
        }
        
        // Check if there are no search results, then set the "No results found" message
        // if (count($results) === 0) {
        //     $noResultsMessage = "";
        // }
            
        

        // Pass $results to your view for display
       return view('search.results', compact('results', 'noResultsMessage'));
    }
}
