<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'description',
        'address',
        'address_2',
        'city_id',
        'state_id',
        'country_id',
        'pincode',
        'type',
        'bedrooms',
        'bathrooms',
        'size_area',
        'status',
        'furnishing_status',
        'developer',
        'project_name',
        'floor_number',
        'transaction_type',
        'ownership_type',
        'facing',
        'contact_details',
        'amenities',
        'additional_details',
    ];

    public function images(){
        return $this->hasMany(PropertyImages::class,'user_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
