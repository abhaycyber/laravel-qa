<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable = [

        'title', 'body'

    ];

    public function user()
    {

        return $this->belongsTo(User::class);

        //after that You can achive this
        //$question = Question::find(1);
        //$question->user-name; or any other info user have

    }


    public function setTitleAttribute($value)
    {

        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }


    public function getUrlAttribute()
    {

        // return route("questions.show", $this->id);

        return route("questions.show", $this->slug);
    }


    public function getCreatedDateAttribute()
    {

        return $this->created_at->diffForHumans();
    }


    public function getStatusAttribute()
    {

        if ($this->answers_count > 0) {

            if ($this->best_answer_id) {

                return "answered-accepted";
            }


            return "answered";
        }

        return "unanswered";
    }


    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }


    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function acceptBestAnswer(Answer $answer)
    {

        $this->best_answer_id = $answer->id;
        $this->save();
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'question_id', 'user_id')->withTimestamps();
    }


    public function isfavorited()
    {

        return $this->favorites()->where('user_id', auth()->id())->count() > 0;
    }


    public function getIsFavoritedAttribute()
    {
        return $this->isfavorited();
    }



    public function getFavoritesCountAttribute()
    {
    
        return $this->favorites->count();
    }
}
