<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService;

class UserController extends Controller
{
    private UserService $userService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the users
     *
     * @param \App\Models\User $model
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $users = $this->userService->index();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.user.crud');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserCreateRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $this->userService->create($data);
        return redirect()->route('user.index')->with('success', __('User created with success!'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return string|false
     */
    public function show(int $id): bool|string
    {
        $user = $this->userService->show($id);
        return json_encode($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $user = $this->userService->show($id);
        return view('admin.user.crud', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UserUpdateRequest $request, int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $data = $request->validated();
        $this->userService->update($data, $id);
        return redirect(route('user.index'))->with('success', __('User updated with success!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->userService->destroy($id);
        return redirect()->route('user.index')->with('success', __('User deleted with success!'));
    }
}
