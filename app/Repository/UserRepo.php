<?php

namespace App\Repository;

use App\User;

class UserRepo {

    /**
     * @var \Illuminate\Foundation\Application|mixed|string
     */
    protected $model = User::class;

    public function __construct() {
        $this->model = resolve($this->model);
    }

    /**
     * @return mixed
     */
    public function findAll() {
        return $this->model->all();
    }

    /**
     * @return mixed
     */
    public function paginate() {
        return $this->model->paginate();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data) {
        $user = $this->model->create($data);

        return $user->toArray();
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data) {
        return $this->model->find($id)->update($data);
    }

    public function delete($id) {
        return $this->model->find($id)->delete();
    }
}
