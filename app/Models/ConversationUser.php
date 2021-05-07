<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationUser extends Model
{
    use HasFactory;
    protected $table = 'conversation_users';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [ 'conversation_id', 'user_id' ];

    public function messages()
    {
        // this conversation_user record has many message records where it is the conversation_user
        return $this->hasMany(Message::class, 'conversation_user_id', 'id');
    }

    public function conversation()
    {
        // this conversation_user record belongs to one conversation
        return $this->belongsTo(Conversation::class, 'conversation_id', 'id');
    }

    public function user()
    {
        // this conversation_user record belongs to one user
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
