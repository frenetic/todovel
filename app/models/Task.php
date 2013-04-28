<?php

class Task extends Eloquent {
    public function lista() {
        return $this->belongsTo('Lista', 'list_id');
    }
}