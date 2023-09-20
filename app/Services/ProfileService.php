<?php

namespace App\Services;

use App\Repository\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
    private UserRepositoryInterface $userRepository;

    /**
     * @param UserRepositoryInterface $userRepositoryInterface
     */
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepository = $userRepositoryInterface;
    }

    /**
     * Update the profile
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(array $attributes): \Illuminate\Database\Eloquent\Model
    {
        return $this->userRepository->update($attributes, auth()->id());
    }

    /**
     * Change the password
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function password(array $attributes): \Illuminate\Database\Eloquent\Model
    {
        $attributes['password'] = Hash::make($attributes['password']);
        return $this->userRepository->update($attributes, auth()->id());
    }
}
