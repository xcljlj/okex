<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class SmsLog extends BaseModel
{
    protected $table = self::TABLE_PREFIX.'sms_log';
    protected $primaryKey = 'sid';
}