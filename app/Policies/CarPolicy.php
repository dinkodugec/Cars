<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability) //this override all abilities down here, admin users can do everyting
     {
         if ($user->role === 'admin') {
            return true;
        } 
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Car $car) //does certain user has ability to see data on Car Model
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Car $car)
    {
         return $user->id === $car->user_id;  /* it return true or false, if true it can update */
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Car $car)
    {
          return $user->id === $car->user_id;  
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Car $car)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Car $car)
    {
        //
    }
}
