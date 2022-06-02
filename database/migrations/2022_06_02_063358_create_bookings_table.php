<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
            ->constrained()->cascadeOnDelete();
            $table->foreignId('time_id')
            ->constrained()->cascadeOnDelete();
            $table->foreignId('hall_id')
            ->constrained()->cascadeOnDelete();
            $table->foreignId('theme_id')
            ->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('date');
            $table->boolean('status')->default(0)->comment('0 for pending 1 for approval and 2 for cancel');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}









