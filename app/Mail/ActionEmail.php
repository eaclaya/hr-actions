<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\HRActionCategory;
class ActionEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $actionEmployee;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($actionEmployee)
    {
        $this->actionEmployee = $actionEmployee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $selectedItems = [];
        foreach($this->actionEmployee->items as $item){
            $selectedItems[$item->action_type_id] = [
                'selected' => true,
                'description' => $item->description
            ];
        }
        $actionNumber = str_pad($this->actionEmployee->id, 7, '0', STR_PAD_LEFT);
        return $this->subject("Accion de recursos humanos {$actionNumber}")->view('email')->with([
            'employee' => $this->actionEmployee->employee,
            'action' => $this->actionEmployee,
            'categories' => HRActionCategory::all(),
            'selectedItems' => $selectedItems
        ]);
    }
}
