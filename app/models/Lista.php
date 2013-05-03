<?php

class Lista extends Eloquent {

    public function tasks() {
        return $this->hasMany('Task', 'list_id');
    }
    
    
    public function usuario() {
        return $this->belongsTo('User', 'user_id');
    }

}