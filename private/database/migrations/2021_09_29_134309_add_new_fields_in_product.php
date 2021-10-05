<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsInProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('thumbnail_image', 255)->nullable();
            $table->string('large_image', 255)->nullable();
            $table->decimal('discount_price', 22)->nullable()->default(0.00);
            $table->timestamp('discount_start_date')->nullable();
            $table->timestamp('discount_end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('thumbnail_image');
            $table->dropColumn('large_image');
            $table->dropColumn('discount_price');
            $table->dropColumn('discount_start_date');
            $table->dropColumn('discount_end_date');
        });
    }
}
