<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('page_id');
            $table->string('page_title',100);
            $table->string('page_subtitle',100);
            $table->string('page_not_available',100);
            $table->string('page_available',100);
            $table->text('page_footer');
            $table->string('page_pdf',200);
            $table->text('page_og');
            $table->text('page_card'); 
            $table->tinyInteger('page_active');
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
        Schema::dropIfExists('pages');
    }
}
