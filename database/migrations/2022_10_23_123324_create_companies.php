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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slag");
            $table->string("country")->default("Tanzania");
            $table->string("industry")->default("Consolidator");
            $table->string("contact_phone")->nullable();
            $table->string("contact_email")->nullable();
            $table->string("website")->nullable();
            $table->string("logo")->nullable();
            $table->mediumText("address");
            $table->mediumText("short_description");
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
        Schema::dropIfExists('companies');
    }
};
