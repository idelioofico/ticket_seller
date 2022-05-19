<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\EventType;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {


    $this->call([
      ProvinceSeeder::class,
      EventTopicSeeder::class,
      EventTypeSeeder::class
    ]);


    Permission::create([
      'description' => 'ver-dashboard'
    ]);

    /*Permission para produtos*/
    Permission::create([
      'description' => 'gerir-evento'
    ]);
    Permission::create([
      'description' => 'registar-evento'
    ]);
    Permission::create([
      'description' => 'editar-evento'
    ]);

    Permission::create([
      'description' => 'apagar-evento'
    ]);


    /*Permission para Clientes*/
    Permission::create([
      'description' => 'gerir-cliente'
    ]);
    Permission::create([
      'description' => 'registar-cliente'
    ]);
    Permission::create([
      'description' => 'editar-cliente'
    ]);

    Permission::create([
      'description' => 'apagar-cliente'
    ]);


    /*Permission para Contas*/
    Permission::create([
      'description' => 'gerir-conta'
    ]);
    Permission::create([
      'description' => 'registar-conta'
    ]);

    Permission::create([
      'description' => 'consultar-conta'
    ]);

    Permission::create([
      'description' => 'editar-conta'
    ]);

    Permission::create([
      'description' => 'apagar-conta'
    ]);

    Permission::create([
      'description' => 'pagar-conta'
    ]);



    /*Permission para Pagamentos*/
    Permission::create([
      'description' => 'gerir-Pagamento'
    ]);


    /*Permission para Utilizadores*/
    Permission::create([
      'description' => 'gerir-utilizador'
    ]);
    Permission::create([
      'description' => 'registar-utilizador'
    ]);
    Permission::create([
      'description' => 'editar-utilizador'
    ]);

    Permission::create([
      'description' => 'apagar-utilizador'
    ]);

    Permission::create([
      'description' => 'pagar-utilizador'
    ]);


    //Gerir estabelcimento
    Permission::create([
      'description' => 'gerir-empresa'
    ]);

    Permission::create([
      'description' => 'registar-empresa'
    ]);


    // User::factory(10)->create();
    $perfilAdmin = Role::create(["name" => "admin"]);

    foreach (Permission::whereNotIn("description", ["gerir-empresa", "registar-empresa"])->get() as $permissao) {
      $perfilAdmin->permission()->attach($permissao);
    }

    $perfilSuper = Role::create(["name" => "super"]);

    foreach (Permission::where("description", "like", "%utilizador%")->orWhere("description", "like", "%empresa%")->get() as $permissao) {
      $perfilSuper->permission()->attach($permissao);
    }

    $tikonta = User::create(
      [
        'name' => 'Tikonta',
        //   'utilizador' => 'admin',
        'email' => 'tikonta@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => $perfilSuper->id
      ]
    );


    $company = Company::create([
      'name' => 'MoreEvents',
      'contact' => '8412345678'
    ]);
    $idelio = User::create(

      [
        'name' => 'Idelio Ofiço',
        //   'utilizador' => 'iofico',
        'email' => 'oficoidelio@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => $perfilAdmin->id,
        'company_id'=>$company->id
      ]
    );
  }
}
