<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [ 'conversation_user_id', 'content' ];

    public function conversation_user()
    {
        // this message record belongs to one conversation_user
        return $this->belongsTo(ConversationUser::class, 'conversation_user_id', 'id');
    }
}
