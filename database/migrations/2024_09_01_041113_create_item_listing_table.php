<?php

use App\Models\Item;
use App\Models\Listing;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_listing', function (Blueprint $table) {
            $table->foreignIdFor(Item::class, 'item_id')->constrained();
            $table->foreignIdFor(Listing::class, 'listing_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_listing');
    }
};
