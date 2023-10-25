<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bio',
        'location',
        'contact',
        'avatar_file',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function boot(): void
    {
        parent::boot();
        static::creating(function ($user) {
            $user->slug = \Str::slug($user->name);
        });
    }

    public function getRouteKey(): string
    {
        return 'slug';
    }

    public function avatar(): string
    {
        return $this->avatar_file && file_exists(public_path('storage/images/avatars/' . $this->avatar_file)) ? asset('storage/images/avatars/' . $this->avatar_file) : asset('storage/images/avatars/default.png');
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class)->orderBy('position');
    }

    public function design(): HasOne
    {
        return $this->hasOne(Design::class);
    }

}
