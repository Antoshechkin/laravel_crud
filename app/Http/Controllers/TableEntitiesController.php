<?php

namespace App\Http\Controllers;

use App\DataAccess\TableEntitiesRepository;
use App\ViewModels\EntitiesViewModel;
use Illuminate\Http\Request;

class TableEntitiesController extends Controller
{
	private TableEntitiesRepository $entitiesRepository;

	public function __construct(TableEntitiesRepository $entitiesRepository)
	{
		$this->entitiesRepository = $entitiesRepository;
	}

	public function getAll()
	{
		$entities = $this->entitiesRepository->getAll();

		return view('entitiesList', ['model' => new EntitiesViewModel($entities)]);
	}

	public function createPage()
	{
		return view('createPage');
	}

	public function create(Request $request)
	{
		$validated = $request->validate(
			[
				'company_name' => 'required',
				'director' => 'required',
				'phone' => 'required|min:18|max:18',
				'address' => 'required'
			]
		);

		$company_name = trim($validated['company_name']);
		$director = trim($validated['director']);
		$phone = trim($validated['phone']);
		$address = trim($validated['address']);

		$this->entitiesRepository->create($company_name, $director, $phone, $address);

		return redirect()->route('entities.list');
	}

	public function updatePage(int $id)
	{
		$item = $this->entitiesRepository->getById($id);

		return view('updatePage', ['model' => new EntitiesViewModel([$item])]);
	}

	public function update(int $id, Request $request)
	{
		$validated = $request->validate(
			[
				'company_name' => 'required',
				'director' => 'required',
				'phone' => 'required|min:18|max:18',
				'address' => 'required'
			]
		);

		$company_name = trim($validated['company_name']);
		$director = trim($validated['director']);
		$phone = trim($validated['phone']);
		$address = trim($validated['address']);

		$this->entitiesRepository->update($id, $company_name, $director, $phone, $address);

		return redirect()->route('entities.list');
	}

	public function delete(Request $request)
	{
		$id = (int)$request->input('id');

		$this->entitiesRepository->delete($id);

		return redirect()->route('entities.list');
	}
}
