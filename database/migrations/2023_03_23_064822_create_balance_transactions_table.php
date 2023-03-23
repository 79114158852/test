<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_transactions', function (Blueprint $table) {
            $table->char('uuid', 32)->unique('uuid');
            $table->unsignedBigInteger('balance_id')->index('balance_id');
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent()->index('created_at');
            $table->double('value', 15, 2);
            $table->text('description')->fulltext('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balance_transactions');
    }
};
