<?php

namespace App\Service;

use App\Mail\UserCreatedEmail;
use App\Mail\UserUpdatedEmail;
use App\Repository\UserRepo;
use Illuminate\Support\Facades\Mail;

class UserService {

    protected $repo = UserRepo::class;

    public function __construct() {
        $this->repo = resolve($this->repo);
    }

    public function repo() {
        return $this->repo;
    }

    public function create(array $params) {
        $user = $this->repo->create($params);

        $email = new UserCreatedEmail($user);
        Mail::to('admin@bric.solutions')->send($email);
    }

    public function update($id, array $data) {
        $this->repo->update($id, $data);

        $template = new UserUpdatedEmail($data['email']);
        Mail::to('admin@bric.solutions')->send($template);
    }

    public function delete($id) {
        return $this->repo->delete($id);
    }
}
