<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlpiProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glpi_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->NULL();
            $table->string('interface')->NULL();
            $table->tinyInteger('is_default')->default('0');
            $table->integer('helpdesk_hardware')->default('0');
            $table->text('helpdesk_item_type')->NULL();
            $table->text('ticket_status')->NULL();
            $table->text('comment')->NULL();
            $table->text('problem_status')->NULL();
            $table->tinyInteger('create_ticket_on_login')->default('0');
            $table->integer('tickettemplates_id')->default('0');
            $table->integer('changetemplates_id')->default('0');
            $table->integer('problemtemplates_id')->default('0');
            $table->text('change_status')->NULL();
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
        Schema::dropIfExists('glpi_profiles');
    }
}
