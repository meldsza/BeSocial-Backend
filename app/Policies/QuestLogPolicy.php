<?php

namespace App\Policies;

use App\QuestLog;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestLogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any quest logs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the quest log.
     *
     * @param  \App\User  $user
     * @param  \App\QuestLog  $questLog
     * @return mixed
     */
    public function view(User $user, QuestLog $questLog)
    {
        return $questLog->user_id == $user->id || $questLog->quest->user_id == $user->id;
    }

    /**
     * Determine whether the user can create quest logs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the quest log.
     *
     * @param  \App\User  $user
     * @param  \App\QuestLog  $questLog
     * @return mixed
     */
    public function update(User $user, QuestLog $questLog)
    {
        return $questLog->user_id == $user->id || $questLog->quest->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the quest log.
     *
     * @param  \App\User  $user
     * @param  \App\QuestLog  $questLog
     * @return mixed
     */
    public function delete(User $user, QuestLog $questLog)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the quest log.
     *
     * @param  \App\User  $user
     * @param  \App\QuestLog  $questLog
     * @return mixed
     */
    public function restore(User $user, QuestLog $questLog)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the quest log.
     *
     * @param  \App\User  $user
     * @param  \App\QuestLog  $questLog
     * @return mixed
     */
    public function forceDelete(User $user, QuestLog $questLog)
    {
        return false;
    }
}
