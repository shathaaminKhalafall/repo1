<?php
/**
 * Created by PhpStorm.
 * UserRequest: mohammedsobhei
 * Date: 5/2/18
 * Time: 11:42 PM
 */

namespace App\Repositories\Interfaces;

interface Repository
{
    
    function getAll(array $attributes);

    function getById($id);

    function create(array $attributes);

    function update(array $attributes,$id = null);

    function delete($id);
}