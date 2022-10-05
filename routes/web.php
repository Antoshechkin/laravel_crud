<?php

use App\Http\Controllers\TableEntitiesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('entities.')
	->prefix('')
	->group(
		function () {
			Route::get('', [TableEntitiesController::class, 'getAll'])
				->name('list');
			Route::get('create_page', [TableEntitiesController::class, 'createPage'])
				->name('createPage');
				
			Route::post('create', [TableEntitiesController::class, 'create'])
				->name('create');
			Route::get('update_page/{id}', [TableEntitiesController::class, 'updatePage'])
				->name('updatePage')
				->where('id', '[0-9]+');
			Route::post('update/{id}', [TableEntitiesController::class, 'update'])
				->name('update')
				->where('id', '[0-9]+');
			Route::post('delete', [TableEntitiesController::class, 'delete'])
				->name('delete');
		}
	);
