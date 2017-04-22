<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCollectionsTable extends Migration
{
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->morphs('author');
            $table->morphs('item');

            $table->string('collection_name');

            $table->unique(['author_id', 'author_type', 'item_id', 'item_type']);
        });
    }

    public function down()
    {
        Schema::drop('collections');
    }
}
