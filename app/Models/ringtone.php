<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ringtone extends Model
{
    use HasFactory;
    protected $table = 'ringtone';
    protected $primaryKey = 'r_id';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'url',
        'time',
        'authorname',
        'download_count',
        'labels',
        'image',
    ];
}
						