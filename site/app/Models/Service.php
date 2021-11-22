<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-17 23:30:01
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-11-17 23:47:27
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table='services';
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';
    public  $timestamps=false;
}
