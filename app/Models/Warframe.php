<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warframe extends Model
{
    use HasFactory;
    protected $table = 'warframes';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'description',
        'firstAbility',
        'secondAbility',
        'thirdAbility',
        'fourthAbility',
        'sex',
        'health',
        'shields',
        'armor',
        'energy',
        'initialEnergy',
        'auraPolarity',
    ];
}
