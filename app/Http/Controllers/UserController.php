<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserFormRequest;
use App\Repository\UserRepo;
use App\Service\UserService;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    private $service;

    public function __construct(UserService $service) {
        $this->service = $service;
    }

    public function index() {
        $users = $this->service->repo()->paginate();

        return view('users.index', compact('users'));
    }

    public function store(UserFormRequest $request) {
        $this->service->create($request->only(['email', 'name']));
    }

    public function edit(User $user) {
        $users = $this->service->repo()->paginate();

        return view('users.index', compact('users', 'user'));
    }


    public function update(User $user, UserFormRequest $request) {
        $this->service->update($user->id, $request->only(['email', 'name']));

        return redirect()->route('user.index');
    }

    public function destroy(User $user) {
        $this->service->delete($user->id);

        return redirect()->route('user.index');
    }
}
