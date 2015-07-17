<?php


class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('categories')->delete();
        $this->command->info('Sukses membersihkan tabel categories');

        $c1 = Category::create(array(
        	'name' => 'hukum',
        	'desc' => 'tentang hukum dan kaitanya dengan indonesia'
        ));

        $c2 = Category::create(array(
        	'name' => 'sosial politik',
        	'desc' => 'tentang sosial dan politik saja'
        ));

        $c2 = Category::create(array(
        	'name' => 'jurnalistik',
        	'desc' => 'deskripsi tentang jurnalistik'
        ));
        $this->command->info('Sukses mengisi tabel kategori');

	}

}