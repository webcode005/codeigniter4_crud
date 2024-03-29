<?php 
namespace App\Models;

use CodeIgniter\Model;


/**
 * 
 */
class BookModel extends Model
{
	
	protected $table = 'books';

	protected $allowedFields = ['title','author','isbn_no'];

	public function getRecords()
	{
		return $this->orderBy('id','desc')->findAll();

	}

	public function getRow($id)
	{
		return $this->where('id',$id)->first();
		
	}

}



?>