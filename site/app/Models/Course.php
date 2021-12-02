<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-29 22:33:06
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-11-29 22:33:24
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public $table = 'courses';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = false;
}
