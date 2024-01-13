Admin
User: admin@sewamobil.id
Pass: admin123

Member
User: andre@sewamobil.id
Pass: 12345678


database ada di folder 'database' dengan nama file 'sewa_mobil.sql'












composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate

php artisan permission:create-role "member"
php artisan permission:create-role "admin"
php artisan permission:create-permission "mobil crud" //fitur CRUD data mobil
php artisan permission:create-permission "mobil kembali" //fitur pengembalian mobil

User.php (Models)
use Spatie\Permission\Traits\HasRoles;
use HasApiTokens, HasFactory, Notifiable, HasRoles;


php artisan tinker
$user = User::find(2); //Melihat user: admin@sewamobil.id
$user->assignRole('admin'); //Set menjadi 'admin'
$user = User::find(3); //Melihat user: andre@sewamobil.id
$user->assignRole('member'); //Set menjadi 'member'


//routes-web.php
use Spatie\Permission\Models\Role;
$role = Role::find(2);
$role->givePermissionTo('mobil crud','mobil kembali');

php artisan permission:show //Melihat permission dan roles
