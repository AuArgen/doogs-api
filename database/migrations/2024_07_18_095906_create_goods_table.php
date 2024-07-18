<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->string('sku');
            $table->string('name');
            $table->text('description');
            $table->boolean('is_published');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('goods');
    }
}

