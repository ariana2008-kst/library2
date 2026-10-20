public function up(): void
{
    Schema::table('books', function (Blueprint $table) {
        // Добавляем текстовое поле для пути к обложке
        $table->string('cover')->nullable()->after('title');
    });
}

public function down(): void
{
    Schema::table('books', function (Blueprint $table) {
        $table->dropColumn('cover');
    });
}