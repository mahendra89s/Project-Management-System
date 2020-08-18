<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Task extends Model
{
    use Notifiable;
    protected $guarded = ['id'];
    public function project()
    {
        return $this->belongsTo(Task::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('M d,Y h:i A');
    }
    public function getStartDateAttribute($value)
    {
        if(!is_null($value))
        {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('M d,Y h:i A');
        }
    }
    public function getEndDateAttribute($value)
    {
        if(!is_null($value))
        {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('M d,Y h:i A');
        }
    }

}
