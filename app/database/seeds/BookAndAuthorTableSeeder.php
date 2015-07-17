<?php

class BookAndAuthorTableSeeder extends Seeder {

	public function run()
	{
		DB::table('authors')->delete();
        DB::table('books')->delete();
        $this->command->info('Sukses membersihkan tabel author');

        $b1 = Book::create(array(
			'title' 		=> 'Judul buku 1',
			'edition' 		=> '2014/1',
			'isbn' 			=> 'X-123-5-18-97654',
			'total_page' 	=> 100,
			'price' 		=> 90000,
			'info' 			=> 'ini info book 1',
			'toc' 			=> 'ini table of contents book 1',
			'category_id' 	=> 1
        ));

        $b2 = Book::create(array(
			'title' 		=> 'Buku berjudul 2',
			'edition' 		=> '1994/1',
			'isbn' 			=> 'X-987-6-54-321012',
			'total_page' 	=> 198,
			'price' 		=> 90000,
			'info' 			=> 'lalala ini info book 2',
			'toc' 			=> 'daftar isi buku ke 2',
			'category_id' 	=> 2
        ));

        $b3 = Book::create(array(
			'title' 		=> 'Judulnya buku 3',
			'edition' 		=> '2000/1',
			'isbn' 			=> 'X-974-2-92-382013',
			'total_page' 	=> 198,
			'price' 		=> 90000,
			'info' 			=> 'tetnang buku ke 3',
			'toc' 			=> 'isi daftar isi buku ke3',
			'category_id' 	=> 1
        ));


        $b4 = Book::create(array(
			'title' 		=> 'Ini ke 4 Judul buku',
			'edition' 		=> '2019/1',
			'isbn' 			=> 'X-923-6-26-029924',
			'total_page' 	=> 198,
			'price' 		=> 90000,
			'info' 			=> 'info buku ke- 4',
			'toc' 			=> 'table of contens lagi buku ke - 4',
			'category_id' 	=> 1
        ));
        $this->command->info('Sukses membuat daftar buku');




        $a1 = Author::create(array(
        	'name'			=> 'Namanya penulis 1',
			'history'		=> 'Sejarah penulis 1',
			'contact'		=> 'penulis1@kontak.com'
        ));

        $a2 = Author::create(array(
        	'name'			=> 'Penuliss 2 loh',
			'history'		=> 'Ini tentang bagiamana Sejarah penulis 2',
			'contact'		=> 'penulis2@kontak.com'
        ));

        $a3 = Author::create(array(
        	'name'			=> 'Bpk penulis 3',
			'history'		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe obcaecati rem ea, temporibus asperiores molestias magni, est magnam omnis quaerat commodi accusantium ut, fugit quibusdam velit quae doloribus numquam animi?',
			'contact'		=> 'penulis3@kontak.com'
        ));
        $this->command->info('Sukses membuat dafar penulis');





        $b1->authors()->attach($a1->id);
        $b1->authors()->attach($a2->id);

		$b2->authors()->attach($a1->id);
        
        $b3->authors()->attach($a3->id);

        $b4->authors()->attach($a2->id);
        $this->command->info('Sukses membuat daftar buku-penulis');

	}

}









