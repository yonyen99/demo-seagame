<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'created_by_id',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'event_teams')->withTimestamps();
    }
    public static function store($reques, $id = null)
    {
        $team = $reques->only(['name', 'description','created_by_id','start_date','end_date']);

        $team = self::updateOrCreate(['id' => $id], $team);

        $teams = request('teams');
        $team->teams()->sync($teams);
        
        return $team;
    }
}
