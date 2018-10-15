<?php

namespace App\Model;


class User extends BaseModel
{
    protected $table = self::TABLE_PREFIX."user";
    protected $primaryKey = "uid";

}
