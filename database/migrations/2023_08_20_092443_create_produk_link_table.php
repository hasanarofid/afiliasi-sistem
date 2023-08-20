<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_link', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('produk_id');
             $table->unsignedBigInteger('member_id');

            $table->string('link');
              $table->index('produk_id');
              $table->index('member_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk_link');
    }
}
