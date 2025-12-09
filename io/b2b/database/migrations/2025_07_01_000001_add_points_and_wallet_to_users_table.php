<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('points_balance')->default(0)->after('last_login_at');
            $table->decimal('wallet_balance', 12, 2)->default(0.00)->after('points_balance');
        });
    }
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['points_balance', 'wallet_balance']);
        });
    }
}; 