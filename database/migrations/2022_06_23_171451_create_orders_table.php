<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     * id bigint
     * user_id bigint
     * title varchar(100)
     * is_paid tinyint
     * price decimal(10, 2)
     * product_quantity int
     * created_at timestamp
     * address text
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            //$table->bigInteger('id', true, true);
            $table->id();

            $table->bigInteger('user_id', false)->unsigned();
            $table->string('hash');
            $table->string('title', 100);
            $table->boolean('is_paid')->default(0);
            $table->decimal('price', 10);
            $table->integer('product_quantity', false, true);

            $table->text('address');

            /*$table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();*/
            $table->timestamps();

            $table->unique('hash');
            $table->index('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
