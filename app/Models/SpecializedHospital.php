<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class SpecializedHospital extends Model
{
    use Searchable;
    protected $table = 'Specializedhospital';

    protected $primaryKey = 'sh_id';

    
    public function toSearchableArray()
    {
        return [
            'sh_id' => $this->sh_id,
            'sh_name' => $this->sh_name,
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
