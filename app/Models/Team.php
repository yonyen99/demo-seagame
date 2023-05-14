<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'members',
        'created_by_id',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_teams')->withTimestamps();
    }
    public static function store($reques, $id = null)
    {
        $team = $reques->only(['name', 'members','created_by_id']);

        $team = self::updateOrCreate(['id' => $id], $team);

        return $team;
    }
}
