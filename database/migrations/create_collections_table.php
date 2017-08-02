<?php

/*
 * This file is part of Laravel Collectable.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
