<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game_player extends Model
{
    use HasFactory;
    protected $table = 'game_players';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [ 'game_id', 'player_id' ];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }

    public function player()
    {
        return $this->belongsTo(User::class, 'player_id', 'id');
    }
}
