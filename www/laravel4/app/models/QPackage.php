<?php

class QPackage extends Eloquent {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'qpackages';

    public function questions() {
        return $this->hasMany('Question');
    }
}
