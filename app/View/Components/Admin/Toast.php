<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toast extends Component
{
    public $adminToastMessages;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->adminToastMessages = $this->getToastMessages();
    }

    /**
     * Get the toast messages from session and errors.
     */
    private function getToastMessages(): array
    {
        $messages = [];

        foreach ([
            ['success', 'success'],
            ['order_success', 'success'],
            ['status', 'success'],
            ['error', 'error'],
        ] as [$key, $type]) {
            if (session()->has($key)) {
                $messages[] = [
                    'type' => $type,
                    'message' => session($key),
                ];
            }
        }

        $errors = session('errors');
        if ($errors) {
            foreach ($errors->all() as $message) {
                $messages[] = [
                    'type' => 'error',
                    'message' => $message,
                ];
            }
        }

        return $messages;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.toast');
    }
}
