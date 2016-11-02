<?php
namespace App\Repositories\User;

use App\Models\User;

interface UserRepository
{
    public function getPaginatedFollowers(User $id, $no);
    public function getPaginatedLeadersid(User $id, $no);
	public function findManyById(array $ids);
}
