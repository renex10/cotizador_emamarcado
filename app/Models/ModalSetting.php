<?php

// app/Models/ModalSetting.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalSetting extends Model
{
    use HasFactory;

    protected $fillable = ['modal_active'];
}
