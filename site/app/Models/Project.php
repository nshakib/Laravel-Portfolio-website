<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-12-07 21:04:28
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-12-07 21:07:53
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table='projects';
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';
    public  $timestamps=false;
}
