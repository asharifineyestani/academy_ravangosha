<?php

namespace Afranext\Crud\app\View\Components;


use App\Helpers\Assoc;
use Illuminate\View\Component;
use \Afranext\Crud\app\Models\Menu as M;

class Alert extends Component
{

    public $items;
    public $view;

    public function __construct($group = 'main', $view = null)
    {

        $this->items = M::where('group', $group)->get();
    }


    public function render()
    {
        return view(crudView('components.' . 'coreui-menu'));
    }


}


