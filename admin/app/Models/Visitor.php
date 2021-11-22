<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-16 22:49:29
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-11-16 23:24:00
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = [ 'ip_address', 'visit_time' ];

    public $timestamps = false;
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';
}
