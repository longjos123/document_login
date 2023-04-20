<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;

interface IBaseRepository
{
    /**
     * Get list of models by condition.
     *
     * @param array $condition
     * @param array $columns
     *
     * @return mixed
     */
    public function getByCondition(array $condition, array $columns = SELECT_ALL);

    /**
     * Get the model detail.
     *
     * @param array $input
     * @param array $columns
     *
     * @return mixed
     */
    public function getDetail(array $input, array $columns = SELECT_ALL);

    /**
     * Check existent model.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function exists(array $input);

    /**
     * Create new model.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function create(array $input);

    /**
     * Update model.
     *
     * @param Model $model
     * @param array $input
     *
     * @return mixed
     */
    public function update(Model $model, array $input);
}
