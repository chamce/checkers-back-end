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
    protected $fillable = [ 'conversation_id', 'sender_id', 'text' ];

    public function conversation()
    {
        // this message record belongs to one conversation
        return $this->belongsTo(Conversation::class, 'conversation_id', 'id');
    }

    public function sender()
    {
        // this message record belongs to one sender
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }
}
