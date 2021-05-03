<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;

class DetachRunnerRaceAction extends Action
{
    use Confirmable, HasRaceState;

    public $title = 'Detach runner';

    public $icon = 'user-minus';

    public function getConfirmationMessage($item = null)
    {
        return 'Do you really detach this runner?';
    }

    public function handle($model)
    {
        // TODO database touch

        session()->flash('notifier', ['text' => __('Runner has been detached!')]);

        redirect()->route('race-participants.index', $this->race->id);
    }
}
