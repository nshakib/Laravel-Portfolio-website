<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-12-07 21:35:44
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-10 23:33:05
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $primaryKey='id';
    public $incrementing=true;
    protected $keyType='int';
    public  $timestamps=false;
}
