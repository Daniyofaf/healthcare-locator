<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Clinic extends Model
{
    use Searchable;

    protected $table = 'clinic';

    protected $primaryKey = 'c_id';


    public function toSearchableArray()
   {
       return [
           'c_id' => $this->c_id,
           'c_name' => $this->c_name,
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
