<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Name of the package
            $table->decimal('price', 8, 2); // Price of the package
            $table->unsignedBigInteger('provider_id'); // Foreign key to the providers table
            $table->timestamps(); // Created and updated timestamps

            // Foreign key constraint
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
