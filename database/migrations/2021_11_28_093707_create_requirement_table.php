<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirement', function (Blueprint $table) {
            $table->id();
            $table->string('requirement_name', 50);
            $table->string('requirement_email', 50);
            $table->string('requirement_title');
            $table->text('requirement_value');
            $table->integer('requirement_active');
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
        Schema::dropIfExists('requirement');
    }
}
