<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class SpecializedClinic extends Model
{
    use Searchable;
    protected $table = 'Specializedclinic';

    protected $primaryKey = 'sc_id';

    public function toSearchableArray()
    {
        return [
            'sc_id' => $this->sc_id,
            'sc_name' => $this->sc_name,
            'Region' => $this->Region,
            'Zone' => $this->Zone,
            'Wereda' => $this->Wereda,
            'Service' => $this->Service,
 
            // Add more attributes you want to search here
        ];
    }

    protected $casts = [
        'Service' => 'array',
        'Status' => 'array',
    ];
}
