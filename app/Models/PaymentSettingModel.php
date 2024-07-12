<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSettingModel extends Model
{
    use HasFactory;

    protected $table = 'payment_setting';


    static public function getSingle()
    {
        return self::find(1);
    }
}
