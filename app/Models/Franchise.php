<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    protected $fillable = [
        'title', 'address', 'phones', 'image'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function image()
    {
        return "/uploads/franchises/".$this->image;
    }

    public function getPhones()
    {
        if (!empty($this->phones)) {
            $phones = explode(",", $this->phones);
            $html = '';
            foreach($phones as $phone) {
                $html .= "<a href='tel:$phone'>$phone</a>, ";
            }
            return substr(rtrim($html),0,-1);
        } else {
            return "";
        }
    }
}
