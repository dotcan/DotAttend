<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
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
    ];

    public function card(): HasOne
    {
        return $this->hasOne(Card::class);
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function absences(): HasMany
    {
        return $this->hasMany(Absence::class);
    }

    public function getFirstNameAttribute(): string
    {
        // match the first name using a regular expression
        preg_match('/^([^\s,]+)/', $this->name, $matches);
        // return the first matched group
        return $matches[1];
    }

    public function getLastNameAttribute(): string
    {
        // match the last name using a regular expression
        preg_match('/\b(\w+)\b$/', $this->name, $matches);
        // return the last matched group
        return $matches[1];
    }

    public function getShortFirstNameAttribute(): string
    {
        // remove any prefix such as "Ms." from the full name
        $nameWithoutPrefix = preg_replace('/^(Mr\.|Mrs\.|Ms\.|Dr\.|Prof\.|Rev\.)\s*/i', '', $this->name);

        // split the modified full name into its component parts
        $parts = preg_split('/\s+/', $nameWithoutPrefix);

        // if the modified full name has only one part, return it as is
        if (count($parts) == 1)
            return $nameWithoutPrefix;

        // shorten the first name and keep the last name
        $firstName = substr($parts[0], 0, 1);
        $lastName = end($parts);

        // combine the shortened first name and last name
        return sprintf("%s. %s", $firstName, $lastName);
    }

    public function getShortLastNameAttribute(): string
    {
        // remove any prefix such as "Ms." from the full name
        $nameWithoutPrefix = preg_replace('/^(Mr\.|Mrs\.|Ms\.|Dr\.|Prof\.|Rev\.)\s*/i', '', $this->name);

        // split the modified full name into its component parts
        $parts = preg_split('/\s+/', $nameWithoutPrefix);

        // if the modified full name has only one part, return it as is
        if (count($parts) == 1) {
            return $nameWithoutPrefix;
        }

        // keep the first name and shorten the last name
        $firstName = $parts[0];
        $lastName = end($parts);
        $shortLastName = substr($lastName, 0, 1);

        // combine the first name and shortened last name
        return sprintf("%s %s.", $firstName, $shortLastName);
    }

}
