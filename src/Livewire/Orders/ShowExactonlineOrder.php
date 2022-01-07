<?php

namespace Qubiqx\QcommerceEcommerceExactonline\Livewire\Orders;

use Livewire\Component;

class ShowExactonlineOrder extends Component
{
    public $order;

    public function mount($order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('qcommerce-ecommerce-exactonline::orders.components.show-exactonline-order');
    }

    public function submit()
    {
        if (! $this->order->exactonlineOrder) {
            $this->emit('notify', [
                'status' => 'error',
                'message' => 'De bestelling mag niet naar Exactonline gepushed worden.',
            ]);
        } elseif ($this->order->exactonlineOrder->pushed == 1) {
            $this->emit('notify', [
                'status' => 'error',
                'message' => 'De bestelling is al naar Exactonline gepushed.',
            ]);
        } elseif ($this->order->exactonlineOrder->pushed == 0) {
            $this->emit('notify', [
                'status' => 'error',
                'message' => 'De bestelling wordt al naar Exactonline gepushed.',
            ]);
        }

        $this->order->exactonlineOrder->pushed = 0;
        $this->order->exactonlineOrder->save();

        $this->emit('refreshPage');
        $this->emit('notify', [
            'status' => 'success',
            'message' => 'De bestelling wordt binnen enkele minuten opnieuw naar Exactonline gepushed.',
        ]);
    }
}