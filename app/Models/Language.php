<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $primaryKey = 'locale';

    public $incrementing = false;

    protected $keyType = 'string';

    public function getRouteKeyName(): string
    {
        return 'locale';
    }

    protected $fillable = [
        'locale',
        'name',
        'flag',
    ];
}
