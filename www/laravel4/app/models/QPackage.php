<?php

/**
 * Provide persistent randomized questions per User basis.
 *
 */
class QPackage extends Eloquent {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'qpackages';

    public function exam() {
        return $this->belongsTo('Exam');
    }

    public function qsortables() {
        return $this->hasMany('QSortable');
    }

}
