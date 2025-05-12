<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'cv_id', 'company', 'position', 'description', 'start_date', 'end_date'
    ];

    public function cv()
    {
        return $this->belongsTo(CV::class,'cv_id');
    }
}
