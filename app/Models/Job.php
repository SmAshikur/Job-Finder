<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Job extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function hello(){
        return DB::table('job_user')->where('user_id',auth()->user()->id)
        ->where('job_id',$this->id)->exists();
    }
}
