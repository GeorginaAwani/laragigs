<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//  php artisan make:model Listing
class Listing extends Model
{
    use HasFactory;

    // values in your fillable property will be inserted on create. Alternatively, call Model::unguard() in the boot() method of the AppServiceProvider
    // protected $fillable = ['title', 'company', 'email', 'website', 'location', 'description', 'tags', 'logo];


    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $search = request('search');
            $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")->orWhere('tags', 'like', "%{$search}%");
        }
    }

    /**
     * Relationship to user. Similar method exists in User
     */
    public function user()
    {
        // Open tinker using : php artisan tinker
        // \App\Models\Listing::first()->user
        // \App\Models\User::first()->listings
        return $this->belongsTo(User::class, 'user_id');
    }
}
