<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;
    protected $table = 'education';

    protected $fillable = [
        'cv_id', 'institution', 'degree', 'start_date', 'end_date'
    ];

    public function cv()
    {
        return $this->belongsTo(CV::class,'cv_id');
    }
}
