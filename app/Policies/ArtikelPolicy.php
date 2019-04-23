<?php

namespace App\Policies;

use App\User;
use App\Artikel;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArtikelPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return $user !== null;
    }

    /**
     * Determine whether the user can view the artikel.
     *
     * @param  \App\User  $user
     * @param  \App\Artikel  $artikel
     * @return mixed
     */
    public function view(User $user, Artikel $artikel)
    {
        
    }

    /**
     * Determine whether the user can create artikels.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user !== null;
    }

    /**
     * Determine whether the user can update the artikel.
     *
     * @param  \App\User  $user
     * @param  \App\Artikel  $artikel
     * @return mixed
     */
    public function update(?User $user, Artikel $artikel)
    {
        return $user !== null;
    }

    /**
     * Determine whether the user can delete the artikel.
     *
     * @param  \App\User  $user
     * @param  \App\Artikel  $artikel
     * @return mixed
     */
    public function delete(User $user, Artikel $artikel)
    {
        return $user !== null;
    }

    /**
     * Determine whether the user can restore the artikel.
     *
     * @param  \App\User  $user
     * @param  \App\Artikel  $artikel
     * @return mixed
     */
    public function restore(User $user, Artikel $artikel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the artikel.
     *
     * @param  \App\User  $user
     * @param  \App\Artikel  $artikel
     * @return mixed
     */
    public function forceDelete(User $user, Artikel $artikel)
    {
        //
    }
}
