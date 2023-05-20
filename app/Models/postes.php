<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postes extends Model
{
    use HasFactory;
    public function scopeFilter($query , array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags' , 'like' , '%' . $filters['tag'] .'%');
        }
        if ($filters['search'] ?? false) {
            $query->where('title' , 'like' , '%' . $filters['search'] .'%')
            ->orwhere('dis' , 'like' , '%' . $filters['search'] .'%');
        }
    }
}
