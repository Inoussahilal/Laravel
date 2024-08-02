<?php


        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;
        
        class ModifyPublishedYearInBooksTable extends Migration
        {
            public function up()
            {
                Schema::table('books', function (Blueprint $table) {
                    // Définir une valeur par défaut et s'assurer que la colonne n'est pas nullable
                    $table->integer('published_year')->default(2000)->nullable(false)->change();
                });
            }
        
            public function down()
            {
                Schema::table('books', function (Blueprint $table) {
                    // Annuler les modifications
                    $table->integer('published_year')->default(null)->nullable()->change();
                });
            }
        }
        