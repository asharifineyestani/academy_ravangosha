<?php



namespace App\Http\Livewire\Admin\SmsTemplate;

use App\Models\Post;
use App\Models\SmsTemplate;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{

    public $item = [];
    public $heading = 'افزودن قالب';
    public $message = null;
    public $itemId = null;


    public string $renderPath = 'livewire.instructor.posts.create';


    public function setLinks()
    {
        $this->links = [
            'create' => '/instructor/posts/create',
            'index' => '/instructor/posts/',
        ];
    }


    public function mount($itemId = null)
    {
        if ($itemId) {
            $this->item = SmsTemplate::where('id', $itemId)->first()->toArray();
        }

        $this->setLinks();
    }


    public function createOrUpdate()
    {
        $this->validate([
            'item.template_id' => 'required',
            'item.body' => 'required',
        ]);


        if (isset($this->item['id']) and SmsTemplate::find($this->item['id'])) {
            SmsTemplate::query()->where('id', $this->item['id'])->update([
                'template_id' => $this->item['template_id'],
                'body' => $this->item['body'],
            ]);
        } else {
            SmsTemplate::create($this->item);
        }



        return $this->redirect('/admin/templates');
        $this->message = 'عملیات با موفقیت انجام شد.';


    }

    public function render()
    {
        return view('livewire.admin.sms-template.create')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
