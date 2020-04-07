<?php

use Illuminate\Database\Seeder;
use App\User;

class Table_Users_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('users')->delete();
        $var = [
            ['firstname' => 'Adriana','lastname' => 'Duran','email' => 'adriana@novoples.net','doc'=>'26581823','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '1','master' => NULL,'agency_id' => 3,'profile' => 'img/upload/users/26581823.jpeg','created_at'=>now(),'updated_at'=>now()],
            ['firstname' => 'Juan Carlos','lastname' => 'Guadama','email' => 'juancarlos@novoples.net','doc'=>'11347173','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '1','master' => NULL,'agency_id' => 3,'profile' => 'img/upload/users/11347173.jpg','created_at'=>now(),'updated_at'=>now()],
            ['firstname' => 'kellian','lastname' => 'rea','email' => 'kellian@novoples.net','doc'=>'87654321','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '1','master' => NULL,'agency_id' => 3,'profile' => 'https://lorempixel.com/100/100/?47277','created_at'=>now(),'updated_at'=>now()],
            ['firstname' => 'Daniel','lastname' => 'rea','email' => 'daniel@novoples.net','doc'=>'12345678','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '1','master' => NULL,'agency_id' => 3,'profile' => 'img/upload/users/12345678.png','created_at'=>now(),'updated_at'=>now()],
            ['firstname' => 'Anthony','lastname' => 'Carriedo','email' => 'anthony@novoples.net','doc'=>'25047058','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '1','master' => NULL,'agency_id' => 3,'profile' => 'img/upload/users/25047058.png','created_at'=>now(),'updated_at'=>now()],
            ['firstname' => 'Sofia','lastname' => 'Ballesteros','email' => 'irojas@example.com','doc'=>'24165336','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '2','master' => 1,'agency_id' => 1,'profile' => 'https://lorempixel.com/100/100/?97806','created_at'=>now(),'updated_at'=>now()],
            ['firstname' => 'Alonso','lastname' => 'Portillo','email' => 'riojas.lucia@example.net','doc'=>'3602611','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '2','master' => 2,'agency_id' => 2,'profile' => 'https://lorempixel.com/100/100/?17741','created_at'=>now(),'updated_at'=>now()],
            ['firstname' => 'Jaime','lastname' => 'Cabán','email' => 'xguzman@example.org','doc'=>'4734478','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '2','master' => 3,'agency_id' => 1,'profile' => 'https://lorempixel.com/100/100/?30913','created_at'=>now(),'updated_at'=>now()],
            ['firstname' => 'Valentina','lastname' => 'Cavazos','email' => 'pjasso@example.com','doc'=>'10064249','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '2','master' => 4,'agency_id' => 2,'profile' => 'https://lorempixel.com/100/100/?91408','created_at'=>now(),'updated_at'=>now()],
            ['firstname' => 'Adriana','lastname' => 'Escamilla','email' => 'manuel23@example.com','doc'=>'26447543','password'=>'$2y$10$dJNlL4bv0J5kGxuxMHfE5ezqUqb73yQ7t7fBSZTa2CEifswkmeHy.','role_id' => '2','master' => 5,'agency_id' => 1,'profile' => 'https://lorempixel.com/100/100/?30913','created_at'=>now(),'updated_at'=>now()]
        ];
        User::insert($var);

        factory(App\User::class, 10)->create();
    }
}
