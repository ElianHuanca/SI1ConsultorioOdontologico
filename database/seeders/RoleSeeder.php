<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Recepcionista;
use Spatie\Permission\Models\Permission;
use App\Models\Odontologo;
use App\Models\Paciente;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role1 = Role::create(['name'=>'administrador']);
      $role2 = Role::create(['name'=>'odontologo']);
      $role3 = Role::create(['name'=>'recepcionista']);

      Permission::create(['name'=>'Ver lista de pacientes'])->syncRoles([$role1,$role3, $role2]);
      Permission::create(['name'=>'Crear paciente'])->syncRoles([$role1, $role3]);
      Permission::create(['name'=>'Editar paciente'])->syncRoles([$role1, $role3]);
      Permission::create(['name'=>'Eliminar paciente'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver lista de recepcionistas'])->syncRoles([$role1]);
      Permission::create(['name'=>'Crear recepcionista'])->syncRoles([$role1]);
      Permission::create(['name'=>'Editar recepcionista'])->syncRoles([$role1]);
      Permission::create(['name'=>'Eliminar recepcionista'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver lista de odontologos'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'Crear odontologo'])->syncRoles([$role1]);
      Permission::create(['name'=>'Editar odontologo'])->syncRoles([$role1]);
      Permission::create(['name'=>'Eliminar odontologo'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver lista de reservas'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'Crear reserva'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'Editar reserva'])->syncRoles([$role1, $role3]);
      Permission::create(['name'=>'Eliminar reserva'])->syncRoles([$role1,$role3]);

      Permission::create(['name'=>'Ver lista de fichas'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'Crear ficha'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'Editar ficha'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'Eliminar ficha'])->syncRoles([$role1,$role3]);

      Permission::create(['name'=>'Ver agenda'])->syncRoles([$role1,$role2,$role3]);

      Permission::create(['name'=>'Ver lista de servicios'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'Crear servicio'])->syncRoles([$role1]);
      Permission::create(['name'=>'Editar servicio'])->syncRoles([$role1]);
      Permission::create(['name'=>'Eliminar servicio'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver lista de atenciones'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'Crear atencion'])->syncRoles([$role1,$role2]);
      Permission::create(['name'=>'Editar atencion'])->syncRoles([$role1,$role2]);
      Permission::create(['name'=>'Eliminar atencion'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver lista de historiales'])->syncRoles([$role1,$role2]);
      Permission::create(['name'=>'Crear historial'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'Editar historial'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'Eliminar historial'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver lista de productos'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'Crear producto'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'Editar producto'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'Eliminar producto'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver lista de tratamientos'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'Crear tratamiento'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'Editar tratamiento'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'Eliminar tratamiento'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver lista de recetas'])->syncRoles([$role1,$role2,$role3]);
      Permission::create(['name'=>'Crear receta'])->syncRoles([$role1,$role2]);
      Permission::create(['name'=>'Editar receta'])->syncRoles([$role1,$role2]);
      Permission::create(['name'=>'Eliminar receta'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver lista de pagos'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'Crear pago'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'Editar pago'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'Eliminar pago'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver lista de planes de pago'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'Crear plan de pago'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'Editar plan de pago'])->syncRoles([$role1,$role3]);
      Permission::create(['name'=>'Eliminar plan de pago'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver lista de usuarios'])->syncRoles([$role1]);
      Permission::create(['name'=>'Crear usuario'])->syncRoles([$role1]);
      Permission::create(['name'=>'Editar usuario'])->syncRoles([$role1]);
      Permission::create(['name'=>'Eliminar usuario'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver lista de roles'])->syncRoles([$role1]);
      Permission::create(['name'=>'Crear rol'])->syncRoles([$role1]);
      Permission::create(['name'=>'Editar rol'])->syncRoles([$role1]);
      Permission::create(['name'=>'Eliminar rol'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver lista de permisos'])->syncRoles([$role1]);

      Permission::create(['name'=>'Ver bitacora'])->syncRoles([$role1]);

      $user = new User();
      $user->name = 'admin';
      $user->password = bcrypt('admin');
      $user->save();
      $user->assignRole('administrador');
    }
}
