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
    protected $fillable = [ 'user_1_id', 'user_2_id' ];
    protected $with = [ 'messages' ];

    public function user1()
    {
        // this conversation record belongs to one user 1
        return $this->belongsTo(User::class, 'user_1_id', 'id');
    }

    public function user2()
    {
        // this conversation record belongs to one user 2
        return $this->belongsTo(User::class, 'user_1_id', 'id');
    }

    public function messages()
    {
        // this conversation record has many message records
        return $this->hasMany(Message::class, 'conversation_id', 'id');
    }

    // public function conversation_users()
    // {
    //     // this conversation record has many conversation_user records where it is the conversation
    //     return $this->hasMany(ConversationUser::class, 'conversation_id', 'id');
    // }


}
