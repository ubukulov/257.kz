<?php

namespace App\Models;

use App\Http\Resources\ReviewResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'city_id', 'country_id', 'start_date', 'end_date', 'rating', 'positive', 'negative', 'active', 'created_at', 'updated_at'
    ];

    public static function getReviews()
    {
        DB::select("SET lc_time_names = 'ru_RU'");
        $reviews = Review::orderBy('id', 'DESC')
            ->select(DB::raw('reviews.*, users.name, cities.title as city_title, countries.title as country_title, from_unixtime(reviews.start_date, "%d %M %Y") as s_d, from_unixtime(reviews.end_date, "%d %M %Y") as e_d'))
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->join('cities', 'cities.id', '=', 'reviews.city_id')
            ->join('countries', 'countries.id', '=', 'reviews.city_id')
            ->where(['reviews.active' => 1])
            ->get();
        ReviewResource::withoutWrapping();
        return ReviewResource::collection($reviews);
    }
}
