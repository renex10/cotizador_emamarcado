<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuoteItem;

class QuoteItemSeeder extends Seeder
{
    public function run()
    {
        QuoteItem::create([
            'quote_id' => 1,
            'item_description' => 'Moldura de madera',
            'price' => 37680,
            'quantity' => 1,
            'total_price' => 37680,
        ]);
        
        QuoteItem::create([
            'quote_id' => 1,
            'item_description' => 'Vidrio Simple',
            'price' => 5527,
            'quantity' => 1,
            'total_price' => 5527,
        ]);

        QuoteItem::create([
            'quote_id' => 1,
            'item_description' => 'Passepartout',
            'price' => 7007,
            'quantity' => 1,
            'total_price' => 7007,
        ]);

        QuoteItem::create([
            'quote_id' => 1,
            'item_description' => 'Trupán',
            'price' => 2395,
            'quantity' => 1,
            'total_price' => 2395,
        ]);
    }
}
