<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2022-01-17 23:23:47
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-17 23:49:21
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $table = 'contacts';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
