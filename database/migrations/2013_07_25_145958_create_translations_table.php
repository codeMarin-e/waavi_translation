<?php

use Illuminate\Database\Migrations\Migration;

class CreateTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(config('translator.connection'))->create('translator_translations', function ($table) {
            $table->increments('id');
            $table->string('locale', 6);
            $table->string('namespace')->default('*');
            $table->string('group');
            $table->string('item');
            $table->text('text');
            $table->boolean('unstable')->default(false);
            $table->boolean('locked')->default(false);
            $table->timestamps();
//            $table->foreign('locale')->references('locale')->on('translator_languages');
//            $table->unique(['locale', 'namespace', 'group', 'item']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('translator_translations');
    }
}
