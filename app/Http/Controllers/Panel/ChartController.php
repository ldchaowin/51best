<?php 

namespace App\Http\Controllers\Panel;

use App\Http\Requests;
use App\Chart;
use App\Subcategory;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class ChartController extends CrudController{

    public function all($entity){
        parent::all($entity); 

        /** Simple code of  filter and grid part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields
         */

			$this->filter = \DataFilter::source(Chart::with('subcategory'));
			$this->filter->add('name', 'Name', 'text');
			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('name', '名称');

            $this->grid->add('{{ $subcategory->name }}', '分类');


			$this->addStylesToGrid();


                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

        /* Simple code of  edit part , List of all fields here : http://laravelpanel.com/docs/master/crud-fields
	*/
			$this->edit = \DataEdit::source(new Chart);

			$this->edit->label('榜单编辑');

			$this->edit->add('name', '名称', 'text');
		
			$this->edit->add('class', '分类', 'select')->options(Subcategory::pluck('name','id')->all());



       
        return $this->returnEditView();
    }    
}
