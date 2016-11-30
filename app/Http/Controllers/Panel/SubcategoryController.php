<?php 

namespace App\Http\Controllers\Panel;

use App\Category;
use App\Subcategory;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;
use Zofe\Rapyd\DataGrid\DataGrid;

class SubcategoryController extends CrudController{

    public function all($entity){
        parent::all($entity); 

        /** Simple code of  filter and grid part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields
         */


			//$this->filter = \DataFilter::source(new Subcategory);
            $this->filter = \DataFilter::source(Subcategory::with('category'));

			$this->filter->add('name', 'Name', 'text');

			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('name', 'Name');

			//$this->grid->add('f_id', 'Father');

            $this->grid->add('{{ $category->name }}','FatherCategory');



			$this->addStylesToGrid();


                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        /* Simple code of  edit part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields
	    */
			$this->edit = \DataEdit::source(new Subcategory);

			$this->edit->label('Edit Category');

			$this->edit->add('name', 'Name', 'text');

			$this->edit->add('f_id', 'FatherID', 'select')->options(Category::pluck('name','id')->all());

            $this->edit->add('priority','Priority','text');



       
        return $this->returnEditView();
    }    
}
