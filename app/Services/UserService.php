<?php

namespace App\Services;

use App\Repository\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private UserRepositoryInterface $userRepository;
    private LogService $logService;

    /**
     * @param UserRepositoryInterface $userRepositoryInterface
     * @param LogService $logService
     */
    public function __construct(UserRepositoryInterface $userRepositoryInterface, LogService $logService)
    {
        $this->userRepository = $userRepositoryInterface;
        $this->logService = $logService;
    }

    /**
     * Returns a collection of the users
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Support\Collection
     */
    public function index(): \Illuminate\Support\Collection
    {
        return $this->userRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes): \Illuminate\Database\Eloquent\Model
    {
        $attributes['password'] = Hash::make($attributes['password']);
        $user = $this->userRepository->create($attributes);
        $this->logService->create($user->id, $user->name, 'users.create');
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show(int $id): \Illuminate\Database\Eloquent\Model
    {
        return $this->userRepository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(array $attributes, int $id): \Illuminate\Database\Eloquent\Model
    {
        $user = $this->userRepository->update($attributes, $id);
        $this->logService->create($user->id, $user->name, 'users.update');
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        if ($id == 1) return false;
        $user = $this->userRepository->findOrFail($id);
        $deleted = $this->userRepository->destroy($id);
        if ($deleted) {
            $this->logService->create($user->id, $user->name, 'users.delete');
        }
        return $deleted;
    }
}
