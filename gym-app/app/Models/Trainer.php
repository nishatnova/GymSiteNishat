<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    private static $trainer, $imageUrl;

    private static function saveBasicInfo($trainer, $request, $imageUrl)
    {
        $trainer->user_id              = $request->user_id;
        $trainer->mobile               = $request->mobile;
        $trainer->image                = $imageUrl;
        $trainer->experience           = $request->experience;
        $trainer->description          = $request->description;
        $trainer->expertise            = $request->expertise;
        $trainer->availability         = $request->availability;
        $trainer->active_status        = $request->active_status;
        $trainer->save();
    }

    public static function newTrainer($request)
    {
        self::$imageUrl         = $request->file('image') ? imageUpload($request->file('image'),'admin/upload/trainer-img/') : asset('admin/user.png');
        self::$trainer = new Trainer();
        self::saveBasicInfo(self::$trainer, $request, self::$imageUrl);
    }


    public static function updateTrainer($request, $trainer)
    {
        if ($request->file('image'))
        {
            if (file_exists($trainer->image))
            {
                unlink($trainer->image);
            }
            self::$imageUrl   = imageUpload($request->file('image'),'admin/upload/trainer-img/');
        }
        else
        {
            self::$imageUrl   = $trainer->image;
        }

        self::saveBasicInfo($trainer, $request, self::$imageUrl);
    }

    public static function deleteTrainer($trainer)
    {
        if (file_exists($trainer->image))
        {
            unlink($trainer->image);
        }

        $trainer->delete();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function gymClasses()
    {
        return $this->hasMany(GymClass::class);
    }

}
