<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthorIdToBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            // Vérifiez si la colonne existe avant de l'ajouter
            if (!Schema::hasColumn('books', 'author_id')) {
                $table->unsignedBigInteger('author_id')->after('id');
                $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropColumn('author_id');
        });
    }
}

