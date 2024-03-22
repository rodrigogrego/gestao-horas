<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //atribuir motivo_contato a nova coluna motivo_contatos_id
        DB::statement('update contatos set motivo_contatos_id = motivo_contato');

        //criar a foreign key

        Schema::table('contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        //criar a coluna motivo_contato e revendo a fk
        Schema::table('contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('contatos_motivo_contatos_id_foreign');
        });

        //atribuir motivo_contato a nova coluna motivo_contatos_id
        DB::statement('update contatos set motivo_contato = motivo_contatos_id');

        //removendo a coluna motivo_contatos_id
        Schema::table('contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
        
    }
};
