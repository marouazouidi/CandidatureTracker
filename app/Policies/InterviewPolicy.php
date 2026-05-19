<?php

namespace App\Policies;

use App\Models\Candidature;
use App\Models\Interview;
use App\Models\User;

class InterviewPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Interview $interview): bool
    {
        return $user->is($interview->candidature->user);
    }

    public function create(User $user, Candidature $candidature): bool
    {
        return $user->is($candidature->user);
    }

    public function update(User $user, Interview $interview): bool
    {
        return $user->is($interview->candidature->user);
    }

    public function delete(User $user, Interview $interview): bool
    {
        return $user->is($interview->candidature->user);
    }
}
