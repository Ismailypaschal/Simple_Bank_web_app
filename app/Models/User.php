<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'occupation',
        'gender',
        'marital_status',
        'address',
        'city',
        'postal_code',
        'password',
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
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
    public function deposits()
    {
        return $this->hasManyThrough(Deposit::class, Account::class);
    }
    public function withdraws()
    {
        return $this->hasManyThrough(Withdraw::class, Account::class);
    }
    public function transactions()
    {
        return $this->hasManyThrough(Transaction::class, Account::class);
    }
    public function transfers()
    {
        return $this->hasManyThrough(Transfer::class, Account::class);
    }
    public function cards()
    {
        return $this->hasManyThrough(Card::class, Account::class);
    }
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
    public function loanpayments()
    {
        return $this->hasMany(LoanPayment::class);
    }
}
