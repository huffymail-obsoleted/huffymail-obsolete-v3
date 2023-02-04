<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_id',
        'from',
        'to',
        'spam_verdict',
        'virus_verdict',
        'subject',
        'html',
    ];

    public const COLUMNS_FOR_LIST = [
        'id',
        'message_id',
        'from',
        'to',
        'spam_verdict',
        'virus_verdict',
        'subject',
        // 'html',
        'created_at',
        'updated_at',
    ];
}
