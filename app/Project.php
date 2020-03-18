<?php

namespace App;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    // Stops mass assign error
    protected $guarded = [];

    public $old = [];

    // Method that when called returns the correct url path for a single project using its ID
    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($body)
    {
        $task = $this->tasks()->create(compact('body'));

        return $task;
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function recordActivity($description)
    {
        $this->activity()->create([
            'description' => $description,
            'changes' => $this->activityChanges($description)
        ]);
        
    }

    public function activityChanges($description) 
    {
        if ($description == 'updated') {
            return [
                "before" => Arr::Except(array_diff($this->old, $this->getAttributes()), 'updated_at'),
                "after" => Arr::Except($this->getChanges(), 'updated_at')
            ];
        }
        
    }
}

?>