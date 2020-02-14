<?php

namespace App\Policies;

use App\Quest;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any quests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the quest.
     *
     * @param  \App\User  $user
     * @param  \App\Quest  $quest
     * @return mixed
     */
    public function view(User $user, Quest $quest)
    {
        return true;
    }

    /**
     * Determine whether the user can create quests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the quest.
     *
     * @param  \App\User  $user
     * @param  \App\Quest  $quest
     * @return mixed
     */
    public function update(User $user, Quest $quest)
    {
        return $quest->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the quest.
     *
     * @param  \App\User  $user
     * @param  \App\Quest  $quest
     * @return mixed
     */
    public function delete(User $user, Quest $quest)
    {
        return $quest->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the quest.
     *
     * @param  \App\User  $user
     * @param  \App\Quest  $quest
     * @return mixed
     */
    public function restore(User $user, Quest $quest)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the quest.
     *
     * @param  \App\User  $user
     * @param  \App\Quest  $quest
     * @return mixed
     */
    public function forceDelete(User $user, Quest $quest)
    {
        return false;
    }
}
