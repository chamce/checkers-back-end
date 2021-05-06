<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function game_players()
    {
        // this user has many game_player records where they are the player
        return $this->hasMany(Game_player::class, 'player_id', 'id');
    }

    public function turn()
    {
        // this user has many game records where they have next turn
        return $this->belongsTo(Game::class, 'turn_id', 'id');
    }

    public function winner()
    {
        // this user has many game records where they are the winner
        return $this->belongsTo(Game::class, 'winner_id', 'id');
    }
}
