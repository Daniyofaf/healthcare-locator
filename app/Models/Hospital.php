<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Hospital extends Model
{
    use Searchable;
    protected $table = 'Hospital';

    protected $primaryKey = 'h_id';

    public function toSearchableArray()
    {
        return [
            'h_id' => $this->h_id,
            'h_name' => $this->h_name,
            'Region' => $this->Region,
            'Zone' => $this->Zone,
            'Wereda' => $this->Wereda,
            'Service' => $this->Service
            
 
            // Add more attributes you want to search here
        ];
    }

    protected $casts = [
        'Service' => 'array',
        'Status' => 'array',
    ];
}
