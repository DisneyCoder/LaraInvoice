<?php

namespace Database\Seeders;

use App\Models\Counter;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        Counter::factory(1)->create();
        Product::factory(5)->create();
        Customer::factory(5)->create();
        Invoice::factory(5)->create();
        InvoiceItem::factory(5)->create();

    }
}
