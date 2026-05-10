<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scorename extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'scorename';

    public $timestamps = false;

    protected $fillable = ['name', 'score'];
}
