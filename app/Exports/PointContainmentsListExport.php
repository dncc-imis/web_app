<?php
// Last Modified Date: 12-04-2024
// Developed By: Innovative Solution Pvt. Ltd. (ISPL)  
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;

class PointContainmentsListExport implements FromView, WithTitle, WithEvents
{
    private $longitude;
    private $latitude;
    private $distance;

    /**
     * BuildingsExport constructor.
     *
     * @param $longitude
     * @param $latitude
     * @param $distance
     * 
     */
    public function __construct($longitude, $latitude, $distance)
    {
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->distance = $distance;
    }
    
          /**
     * Generates the view for exporting.
     *
     * @return View
     */ 
    public function view(): View
    {
        if($this->distance > 0){
                $distance = $this->distance;
            } else {
                $distance = 0;
            }              
            $containmentQuery = "SELECT DISTINCT ON (final_result.id) final_result.*
            FROM (
                SELECT 
                    c.*, 
                    ct.type AS containment_type, 
                    b.bin AS bin
                FROM fsm.containments c
                LEFT JOIN building_info.build_contains bc 
                    ON bc.containment_id = c.id 
                    AND bc.deleted_at IS NULL 
                    AND bc.bin IS NOT NULL 
                    AND bc.containment_id IS NOT NULL
                LEFT JOIN building_info.buildings b 
                    ON b.bin = bc.bin 
                    AND b.deleted_at IS NULL
                LEFT JOIN fsm.containment_types ct 
                    ON ct.id = c.type_id
                WHERE 
                    ST_Intersects(
                    ST_Buffer(
                        ST_SetSRID(ST_Point(" . $this->longitude . "," . $this->latitude . "),4326)::GEOGRAPHY, " . $distance . ")::GEOMETRY, 
                    b.geom
                    )
                    AND 
            c.deleted_at IS NULL
            ) final_result
            ORDER BY final_result.id";

            $containmentResults = DB::select($containmentQuery);
        return view('exports.containments-list', compact('containmentResults'));
    }

     /**
     * Registers events for the export.
     *
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:B1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
     /**
     * @return string
     */
    public function title(): string
    {
        return 'Containment List';
    }
}