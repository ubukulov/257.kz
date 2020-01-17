<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends BaseController
{
    public function index()
    {
        return view('company.review');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($user = User::exists($data['email'])) {
            Review::create([
                'user_id' => $user->id, 'city_id' => $data['city_id'], 'country_id' => $data['country_id'], 'start_date' => strtotime($data['start_date']),
                'end_date' => strtotime($data['end_date']), 'rating' => $data['rating'], 'positive' => $data['positive'], 'negative' => $data['negative']
            ]);
            return response('Отзыв успешно отправлено.');
        } else {
            DB::beginTransaction();
            try {
                $user = User::create([
                    'name' => $data['first_name'], 'email' => $data['email'], 'password' => bcrypt('123456'), 'type' => 'user'
                ]);

                Review::create([
                    'user_id' => $user->id, 'city_id' => $data['city_id'], 'country_id' => $data['country_id'], 'start_date' => strtotime($data['start_date']),
                    'end_date' => strtotime($data['end_date']), 'rating' => $data['rating'], 'positive' => $data['positive'], 'negative' => $data['negative']
                ]);
                DB::commit();
                return response('Отзыв успешно отправлено.');
            } catch (\Exception $exception) {
                DB::rollBack();
                return response('Ошибка сервера. Попробуйте позже', 500);
            }
        }
    }

    public function getReviewList()
    {
        return Review::getReviews();
    }
}
