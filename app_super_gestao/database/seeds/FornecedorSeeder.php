<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Instanciando um objeto
        $fornecedor = new Fornecedor();
        $fornecedor -> nome = "Fornecedor 100";
        $fornecedor -> site = "fornecedor100.com.br";
        $fornecedor -> uf ="SC";
        $fornecedor -> email ="fornecedor@100.com";
        $fornecedor -> save();

        //Utilizando método create (Cuidar o atributo FILLABLE da classe).
        Fornecedor::create([
            'nome'  => 'Fornecedor MIL',
            'site'  => 'Fornecedormil.com',
            'uf'    => 'RS',
            'email' => 'fornecedormil.com.br'
        ]);

        //Método insert
        DB::table('fornecedores')->insert([
            'nome'  => 'Fornecedor MILe1',
            'site'  => 'Fornecedormile1.com',
            'uf'    => 'RN',
            'email' => 'fornecedormile1.com.br'
        ]);
    }
}
