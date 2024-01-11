<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    public $table = "positions";
    protected $guarded = ['id'];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'departement_id', 'id');
    }
}
