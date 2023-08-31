<?php

namespace Modules\Competition\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface QuestionServiceInterface
{
    public function all();
    public function store(array $attribute);
    public function update(array $attributes, int $id);
    public function find(int $id);
    public function delete(int $id);
}
