<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewProductNotification;

class SendNewProductEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $product;
    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        // Check if $this->product is an object
        if (!is_object($this->product)) {
            return;
        }

        // Check if $this->product has the 'user' relationship
        if (!method_exists($this->product, 'user')) {
            return;
        }

        // Access the product details
        $user = $this->product->user; // Assuming a product belongs to a user

        // Check if $user is an object
        if (!is_object($user)) {
            return;
        }

        // Check if $user has the 'email' property
        if (!property_exists($user, 'email')) {
            return;
        }
        $email = $user->email;

        Mail::to($email)->send(new NewProductNotification($this->product));
    }
}
