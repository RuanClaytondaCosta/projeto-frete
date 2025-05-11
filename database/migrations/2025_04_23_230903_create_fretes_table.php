<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('fretes', function (Blueprint $table) {
        $table->id();
        $table->float('peso');
        $table->float('distancia');
        $table->enum('tipo', ['normal', 'expresso']);
        $table->float('valor');
        $table->timestamps();
    });
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fretes');
    }
};
