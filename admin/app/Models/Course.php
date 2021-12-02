<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-12-01 23:28:55
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-12-02 00:18:13
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
