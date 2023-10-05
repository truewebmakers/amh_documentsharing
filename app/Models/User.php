<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_pic',
        'phone',
        'city',
        'company',
        'alternative_phone',
        'company_address',
        'street_address',
        'suburb',
        'state',
        'post_code',
        'company_name',
        'australian_bussiness_number',
        'number_of_emp',
        'estimated_anunal_revenue',
        'date_of_est',
        'bussiness_type',
        'bussiness_category',
        'website_url',
        'service_hour', 

        
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

    
    public function getRelatedUsers()
    {
        // Get users to whom the current user has sent documents
        $sentToUsers = $this->hasMany(DocumentUpload::class, 'sent_from')
            ->distinct('sent_to')
            ->pluck('sent_to');

        // Get users from whom the current user has received documents
        $receivedFromUsers = $this->hasMany(DocumentUpload::class, 'sent_to')
            ->distinct('sent_from')
            ->pluck('sent_from');

        // Combine both sets of user IDs
        $relatedUserIds = $sentToUsers->merge($receivedFromUsers)->unique();

        // Retrieve the related users' details (ID and name)
        $relatedUsers = User::whereIn('id', $relatedUserIds)->select('id', 'name','email')->get();
        $sentUsers = [];
        $receivedUsers = [];
    
        foreach ($relatedUsers as $user) {
            if ($sentToUsers->contains($user->id)) {
                $sentUsers[] = $user;
            }
    
            if ($receivedFromUsers->contains($user->id)) {
                $receivedUsers[] = $user;
            }
        }
    
        return [
            'sentUsers' => $sentUsers,
            'receivedUsers' => $receivedUsers,
        ];
    }
     
    
}
