<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Page extends Model
{
    use HasFactory;
    use HasRichText;

    protected $guarded = [];

    protected $fillable = ['content'];

    protected $richTextFields = [
        'content',
    ];

}
