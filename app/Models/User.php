<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password', 'role', 'nip', 'no_telepon'];

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
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'nip', 'nip');
    }

        // Event untuk mengupdate nip pada guru
        protected static function boot()
        {
            parent::boot();

            static::updating(function ($user) {
                if ($user->isDirty('nip')) {
                    $guru = $user->guru;
                    if ($guru) {
                        $guru->nip = $user->nip;
                        $guru->save();
                    }
                }
            });
        }
}
