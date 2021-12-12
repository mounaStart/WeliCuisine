<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agentrs', function (Blueprint $table) {
      
        $table->id();
        $table->string('Num_Agent');
        $table->string('name');
        $table->string('Prenom_AgentR');
        $table->string('Num_Tel');
        $table->string('Sexe');
        $table->Integer('Id_Admin'); 
        $table->string('email')->unique();
        $table->string('password');
        $table->boolean('is_editor')->default(false);
        $table->rememberToken();
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
        Schema::dropIfExists('agentrs');
    }
}
