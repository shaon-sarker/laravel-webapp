<?php

namespace App\Listeners;

use App\Events\ProductPurchased;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateProductQuantity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductPurchased $event): void
    {
        // Retrieve the purchased product from the event
        $product = $event->product;

        // Update the product quantity (adjust this based on your actual product quantity logic)
        $product->quantity -= 1; // Assuming each purchase reduces the quantity by 1
        $product->save();
    }
}
