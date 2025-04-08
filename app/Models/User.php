<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
// use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel; 

class User extends Authenticatable implements FilamentUser
{
    // use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    // use HasProfilePhoto;
    use Notifiable;
    // use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'two_factor_recovery_codes',
        // 'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        // 'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    // protected function casts(): array
    // {
    //     return [
            // 'email_verified_at' => 'datetime',
    //         'password' => 'hashed',
    //     ];
    // };

    protected $casts = [
        'password' => 'hashed',
    ];

    // public function canAccessPanel(): bool
    public function canAccessPanel(Panel $panel): bool
    // public function canAccessPanel(string $panel): bool
    {
        // return $this->role === 'admin';
        // return match ($panel) {
        //     'admin' => $this->role === 'admin',
        //     'contestant' => $this->role === 'contestant',
        //     'voter' => $this->role === 'voter',
        //     default => false,
        // };
        
        return true;
    }
}
