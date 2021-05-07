<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $table = 'conversations';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [];

    public function conversation_users()
    {
        // this conversation record has many conversation_user records where it is the conversation
        return $this->hasMany(ConversationUser::class, 'conversation_id', 'id');
    }
}
