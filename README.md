Admin
User: admin@sewamobil.id
Pass: admin123

Member
User: andre@sewamobil.id
Pass: 12345678


database ada di folder 'database' dengan nama file 'sewa_mobil.sql'


<br><br><br>









composer require spatie/laravel-permission<br>
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"<br>
php artisan migrate<br><br>

php artisan permission:create-role "member"<br>
php artisan permission:create-role "admin"<br>
php artisan permission:create-permission "mobil crud" //fitur CRUD data mobil<br>
php artisan permission:create-permission "mobil kembali" //fitur pengembalian mobil<br><br>

User.php (Models)<br>
use Spatie\Permission\Traits\HasRoles;<br>
use HasApiTokens, HasFactory, Notifiable, HasRoles;<br><br>


php artisan tinker<br>
$user = User::find(2); //Melihat user: admin@sewamobil.id<br>
$user->assignRole('admin'); //Set menjadi 'admin'<br>
$user = User::find(3); //Melihat user: andre@sewamobil.id<br>
$user->assignRole('member'); //Set menjadi 'member'<br><br>


//routes-web.php<br>
use Spatie\Permission\Models\Role;<br>
$role = Role::find(2);<br>
$role->givePermissionTo('mobil crud','mobil kembali');<br><br>

php artisan permission:show //Melihat permission dan roles
