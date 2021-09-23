<?php 
namespace App\Controllers;


use App\Models\BookModel;

class Book extends BaseController
{

	public function index()
	{
		
		$session= \Config\Services::session();
		$data['session']=$session;

		// fetch record

		$model = new BookModel();
		$data['books'] = $model->getRecords();

		return view('books/list',$data);
	}
	public function create()
	{
		$session= \Config\Services::session();
		helper('form');

		$data = [];

			if ($this->request->getMethod()=='post') {
				$input= $this->validate([
					'title'=> 'required|min_length[5]',
					'author'=> 'required|min_length[5]',
				]);


				if($input==true)
				{
					// Form Validated sucessfully, so we can values to database

					// Insert data

					$model= new BookModel();
					$model->save([


						'title' => $this->request->getpost('title'),
						'author' => $this->request->getpost('author'),
						'isbn_no' => $this->request->getpost('isbn_no'),

					]);

					$session -> setFlashdata('success','winner winner chiken deinner , Record Added Sucessfully.');

					return redirect()->to('books');

				}
				else
				{
						// Form Not Validated sucessfully
						$data['validation'] = $this->validator;
				}

			}

			return view('books/create',$data);
	}

	public function edit($id)
	{
		$session= \Config\Services::session();
		helper('form');


		$model = new BookModel();
		$book = $model->getRow($id) ;

			if(empty($book))
			{
					
					$session-> setFlashdata('error','Record Not Found');

				return redirect()->to('/books');
			}

		$data = [];

		$data['book'] = $book;

			if ($this->request->getMethod()=='post') {
				$input= $this->validate([
					'title'=> 'required|min_length[5]',
					'author'=> 'required|min_length[5]',
				]);


				if($input==true)
				{
					// Form Validated sucessfully, so we can values to database

					// Insert data

					$model= new BookModel();
					$model->update($id,[


						'title' => $this->request->getpost('title'),
						'author' => $this->request->getpost('author'),
						'isbn_no' => $this->request->getpost('isbn_no'),

					]);

					$session -> setFlashdata('success','winner winner chiken deinner , Record Updated Sucessfully.');

					return redirect()->to('books');

				}
				else
				{
						// Form Not Validated sucessfully
						$data['validation'] = $this->validator;
				}

			}

			return view('books/edit',$data);
	}

	public function delete($id)
	{
		$session= \Config\Services::session();

		$model = new BookModel();
		$book = $model->getRow($id) ;

			if(empty($book))
			{
					
					$session-> setFlashdata('error','Record Not Found');

				return redirect()->to('/books');
			}

		$model= new BookModel();
		$model->delete($id);

		$session ->setFlashdata('success','Record Deleted Successfully');
		return redirect()->to('books');
	}

}
?>