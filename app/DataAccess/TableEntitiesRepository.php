<?php

namespace App\DataAccess;

use App\Models\Entity;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\DB;

class TableEntitiesRepository extends BaseRepository
{
	public function __construct(DatabaseManager $databaseManager)
	{
		parent::__construct($databaseManager, 'table_entities');
	}

	public function getAll(): array
	{
		return $this->getAllEntities(Entity::class);
	}

	public function getById(int $id)
	{
		return $this->getEntityById($id, Entity::class);
	}

	public function create(string $company_name, string $director, string $phone, string $address)
	{
		return $this->insert(
			[
				'company_name' => $company_name,
				'director' => $director,
				'phone' => $phone,
				'address' => $address
			]
		);
	}

	public function update(int $id, string $company_name, string $director, string $phone, string $address)
	{
		DB::table($this->tableName)
			->where('id', '=', $id)
			->update([
				'company_name' => $company_name,
				'director' => $director,
				'phone' => $phone,
				'address' => $address
			]);
	}

	public function delete(int $id)
	{
		$this->removeEntityById($id);
	}
}