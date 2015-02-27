<?php

class Question extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';

    public function getQuestion() {
        return $this->question;
    }

    public function qtype() {
        return $this->belongsTo('QType');
    }

    public function qpackages() {
        return $this->belongsToMany('QPackage');
    }
}
