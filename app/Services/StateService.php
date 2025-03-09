<?php

namespace App\Services;

use App\Models\State;

class StateService {
    public static function getAllStates() {
        return State::all();
    }
}