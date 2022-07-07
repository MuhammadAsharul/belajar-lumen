<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk')->insert(
            [
                [
                    'namaProduk' => 'Kopi',
                    'deskripsiProduk' => 'Kopi merupakan minuman yang terbuat dari kopi arabika atau kopi robusta. Kopi ini biasanya dicampur dengan susu atau krim.',
                    'hargaProduk' => 10000,
                    'kategoriProduk' => 'minuman',
                ],
                [
                    'namaProduk' => 'Ayam Pecel',
                    'deskripsiProduk' => 'Ayam pecel adalah makanan yang terbuat dari daging ayam yang dicampur dengan bumbu-bumbu lainnya.',
                    'hargaProduk' => 15000,
                    'kategoriProduk' => 'makanan',
                ]
            ]
        );
    }
}
