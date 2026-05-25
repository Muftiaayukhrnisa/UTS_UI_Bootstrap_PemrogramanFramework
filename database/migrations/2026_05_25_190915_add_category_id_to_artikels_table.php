public function up()
{
    Schema::table('artikels', function (Blueprint $table) {
        $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
    });
}