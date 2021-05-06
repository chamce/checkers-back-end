<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [ 'tiles', 'moves', 'turn_id', 'winner_id' ];

    public function game_players()
    {
        // this game has many game_player record where it is the game
        return $this->hasMany(Game_player::class, 'game_id', 'id');
    }

    public function turn()
    {
        // this game belongs to the user whose turn it is
        return $this->hasOne(User::class, 'turn_id', 'id');
    }

    public function winner()
    {
        // this game belongs to the user that is the winner
        return $this->hasOne(User::class, 'winner_id', 'id');
    }
}
