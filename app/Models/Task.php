<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = ['name', 'priority'];

    public static $createRules = [
        'name' => 'required|string|max:255',
        'priority' => 'required|integer'
    ];

    public static $editRules = [
        'name' => 'required|string|max:255',
        'priority' => 'required|integer'
    ];

}
