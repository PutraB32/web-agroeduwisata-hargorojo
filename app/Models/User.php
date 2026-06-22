<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'no_hp',
        'alamat',
        'foto',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function produks()
    {
        return $this->hasMany(Produk::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function katalogDesas()
    {
        return $this->hasMany(KatalogDesa::class, 'user_id');
    }

    public function agroeduwisatas()
    {
        return $this->hasMany(Agroeduwisata::class, 'user_id');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function getRoleLabelAttribute()
    {
        return match ($this->role) {
            'super_admin' => 'Super Admin',
            'admin' => 'Admin',
            'customer' => 'Customer',
            default => str_replace('_', ' ', (string) $this->role),
        };
    }

    public function getRoleBadgeClassAttribute()
    {
        return match ($this->role) {
            'super_admin' => 'bg-red-50 text-red-700 border-red-200',
            'admin' => 'bg-green-50 text-green-700 border-green-200',
            'customer' => 'bg-[#fff8e1] text-[#9f7b20] border-[#ead79a]',
            default => 'bg-gray-50 text-gray-700 border-gray-200',
        };
    }
}
