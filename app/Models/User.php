<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Mail\DynamicEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laracasts\Flash\Flash;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Mail;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{

    use Sortable;

    public $sortable = [
        'name',
        'email',
        'designation',
        'id',
    ];

    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_no',
        'expiry_date',
        'password',
        'publish'
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

    public function sendPasswordResetNotification($token)
    {
        $mailTemplate = MailTemplates::where('heading', 'Forgot Password')->first();

        $variable = ["[Full Name]", "[RESETURL]"];
        $replace   = [$this->first_name . " " . $this->last_name, route('password.reset', ['token' => $token, 'email' => $this->email])];
        $finalTemplate = str_replace($variable, $replace, $mailTemplate->description);
        Mail::to($this->email)->send(new DynamicEmail($mailTemplate->subject, $finalTemplate));
    }

    public function personalDetails()
    {
        return $this->hasOne('App\Models\PersonalDetails');
    }

    public function communicationDetail()
    {
        return $this->hasOne('App\Models\CommunicationDetail');
    }

    public function childDetails()
    {
        return $this->hasMany('App\Models\ChildDetail', 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'user_id');
    }

    public function eventRegistrations()
    {
        return $this->hasMany('App\Models\EventRegistration', 'user_id');
    }

    public function donations()
    {
        return $this->hasMany('App\Models\Donation', 'user_id');
    }
}
