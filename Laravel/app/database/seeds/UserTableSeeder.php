<?php

class UserTableSeeder extends Seeder {

        public function run() 
        {
    
            Eloquent::unguard();
    
            DB::table('users')->delete();
    
            $faker = Faker\Factory::create();
    
            //插入普通用户
            for($i = 1; $i <=19; $i++){
                User::create(array(
                    'nickname' => $faker->userName,
                    'password' => Hash::make($faker->name . $faker->year),
                    'email' => $faker->email,
                    'gender' =>(int)rand(0,1),
                    'birthday' =>$faker->dateTime,
                    'address' => $faker->address,
                    'userType'=>0
                ));
            }
    
            User::create(array(
                'nickname' => 'sysan0',
                'password' => Hash::make('123456'),
                'email' => 'shifanglei0@gmail.com',
                'gender' => 0,
                'birthday' => $faker->dateTime,
                'address' => '南京',
                'userType'=>0
            ));

            //插入教练
            for($i = 1; $i <=9; $i++){
                User::create(array(
                    'nickname' => $faker->userName,
                    'password' => Hash::make($faker->name . $faker->year),
                    'email' => $faker->email,
                    'gender' =>(int)rand(0,1),
                    'birthday' =>$faker->dateTime,
                    'address' => $faker->address,
                    'userType'=>1
                ));
            }

            User::create(array(
                'nickname' => 'sysan_coach',
                'password' => Hash::make('123456'),
                'email' => 'shifanglei1@gmail.com',
                'gender' => 0,
                'birthday' => $faker->dateTime,
                'address' => '南京',
                'userType'=>1
            ));

            //插入医生
             for($i = 1; $i <=9; $i++){
                User::create(array(
                    'nickname' => $faker->userName,
                    'password' => Hash::make($faker->name . $faker->year),
                    'email' => $faker->email,
                    'gender' =>(int)rand(0,1),
                    'birthday' =>$faker->dateTime,
                    'address' => $faker->address,
                    'userType'=>2
                ));
            }

            User::create(array(
                'nickname' => 'sysan_doctor',
                'password' => Hash::make('123456'),
                'email' => 'shifanglei2@gmail.com',
                'gender' => 0,
                'birthday' => $faker->dateTime,
                'address' => '南京',
                'userType'=>2
            ));

            //插入管理员
            User::create(array(
                'nickname' => 'sysan_admin',
                'password' => Hash::make('123456'),
                'email' => 'shifanglei3@gmail.com',
                'gender' => 0,
                'birthday' => $faker->dateTime,
                'address' => '南京',
                'userType'=>3
            ));
    
        }
    
    }
    
?>