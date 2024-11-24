<?php

// app/Models/HeroSetting.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSetting extends Model
{
    use HasFactory;

    protected $fillable = ['background_image', 'title', 'subtitle', 'button_text', 'button_url'];
}

