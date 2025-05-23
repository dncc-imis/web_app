<?php

namespace App\Http\Controllers\Fsm;

use App\Http\Controllers\Controller;
use App\Models\BuildingInfo\BuildContain;
use App\Models\BuildingInfo\Owner;
use App\Models\Fsm\Application;
use App\Models\Fsm\Containment;
use App\Models\Fsm\ContainmentType;
use App\Models\Fsm\SupervisoryAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SupervisoryAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fsm.supervisory-assessment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {      
        $value = rtrim(request()->getQueryString(), '=');
       
        $page_title = 'Add Supervisory Assessment';
        // Get the slug from the query string
        $slug = array_keys($request->query())[0] ?? null;
        $owner_detail  = Owner::where('bin', $slug)->first();
        $application = Application::where('bin', $slug)->first();
        $containment_id = BuildContain::where('bin', $slug)->first()->containment_id;
        $containment = Containment::where('id', $containment_id)->first();
        $type_id = Containment::where('id', $containment_id)->first()->type_id;
        $containment_type = ContainmentType::pluck('type', 'id');
        
        return view('fsm.supervisory-assessment.create', compact('page_title', 'slug', 'owner_detail', 'type_id', 'containment_type', 'containment', 'application', 'value'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
       
    
        // Store the data
        $assessment = new SupervisoryAssessment();
        $assessment->holding_number = $request->holding_number;
        $assessment->owner_name = $request->owner_name;
        $assessment->owner_gender = $request->owner_gender;
        $assessment->owner_contact = $request->owner_contact;
        $assessment->containment_type = $request->containment_type;
        $assessment->containment_outlet_connection = $request->containment_outlet_connection;
        $assessment->containment_volume = $request->containment_volume;
        $assessment->road_width = $request->road_width;
        $assessment->distance_from_nearest_road = $request->distance_from_nearest_road;
        $assessment->septic_tank_length = $request->septic_tank_length;
        $assessment->septic_tank_width = $request->septic_tank_width;
        $assessment->septic_tank_depth = $request->septic_tank_depth;
        $assessment->number_of_pit_rings = $request->number_of_pit_rings;
        $assessment->pit_diameter = $request->pit_diameter;
        $assessment->pit_depth = $request->pit_depth;
        $assessment->appropriate_desludging_vehicle_size = $request->appropriate_desludging_vehicle_size;
        $assessment->number_of_trips = $request->number_of_trips;
        $assessment->confirmed_emptying_date = $request->confirmed_emptying_date;
        $assessment->advance_paid_amount = $request->advance_paid_amount;
        
        // Save the assessment
        $assessment->save();
    
        // Update the application status
        $slug = $request->slug;
        $application = Application::where('bin', $slug)->first();
        $application->supervisory_assessment_status = true;
        $application->save();
    
        // Redirect with a success message
        return redirect(route('application.index'))->with('success', 'Supervisory Assessment created successfully');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
