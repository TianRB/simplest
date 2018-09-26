<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permission;
use App\Role;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {

    // Crear Usuarios
    DB::table('users')->insert([
      'name' => 'Admin',
      'email' => 'admin@admin.com',
      'password' => bcrypt('secret'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
    DB::table('users')->insert([
      'name' => 'Designer',
      'email' => 'designer@admin.com',
      'password' => bcrypt('secret'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
    DB::table('users')->insert([
      'name' => 'Author',
      'email' => 'author@admin.com',
      'password' => bcrypt('secret'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
    DB::table('users')->insert([
      'name' => 'Manager',
      'email' => 'manager@admin.com',
      'password' => bcrypt('secret'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
    DB::table('users')->insert([
      'name' => 'User',
      'email' => 'user@admin.com',
      'password' => bcrypt('secret'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    // Crear Permisos
    DB::table('permissions')->insert([
      'name' => 'manage-users',
      'display_name' => 'Administrar Usuarios',
      'description' => 'Acceso a administración de usuarios',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
    DB::table('permissions')->insert([
      'name' => 'manage-banners',
      'display_name' => 'Administrar Banners',
      'description' => 'Acceso a administración de banners',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
    DB::table('permissions')->insert([
      'name' => 'manage-products',
      'display_name' => 'Administrar Productos',
      'description' => 'Acceso a administración de productos',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
    DB::table('permissions')->insert([
      'name' => 'manage-articles',
      'display_name' => 'Administrar Artículos',
      'description' => 'Acceso a administración de artículos',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    // Crear Roles
    DB::table('roles')->insert([
      'name' => 'admin',
      'display_name' => 'Administrador',
      'description' => 'Acceso sin restricciones',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
    DB::table('roles')->insert([
      'name' => 'designer',
      'display_name' => 'Diseñador',
      'description' => 'Acceso a administrar banners',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
    DB::table('roles')->insert([
      'name' => 'manager',
      'display_name' => 'Inventarios',
      'description' => 'Acceso a administrar productos',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
    DB::table('roles')->insert([
      'name' => 'author',
      'display_name' => 'Autor',
      'description' => 'Acceso a administrar artículos',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);
    DB::table('roles')->insert([
      'name' => 'user',
      'display_name' => 'Usuario Registrado',
      'description' => 'Usuario base, sin accesos especiales',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    // Encontrar Usuarios en DB
    $uA = User::where('name','Admin')->first();
    $uD = User::where('name','Designer')->first();
    $uS = User::where('name','Author')->first();
    $uM = User::where('name','Manager')->first();
    $uU = User::where('name','User')->first();

    // Encontrar Permisos en DB
    $pU = Permission::where('name','manage-users')->first();
    $pB = Permission::where('name','manage-banners')->first();
    $pP = Permission::where('name','manage-products')->first();
    $pA = Permission::where('name','manage-articles')->first();

    // Encontrar Roles en DB
    $rA = Role::where('name','admin')->first();
    $rD = Role::where('name','designer')->first();
    $rM = Role::where('name','manager')->first();
    $rAu = Role::where('name','author')->first();
    $rU = Role::where('name','user')->first();

    // Relacionar Roles y Permisos
    $rA->attachPermissions(array($pU, $pB, $pP, $pA));
    $rD->attachPermission($pB);
    $rM->attachPermission($pP);
    $rAu->attachPermission($pA);

    // Relacionar Usuarios y Roles
    $uA->attachRole($rA);
    $uD->attachRole($rD);
    $uS->attachRole($rM);
    $uM->attachRole($rAu);
    $uU->attachRole($rU);

  }
}
