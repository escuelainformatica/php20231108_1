<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
Artisan::command('listar',function() {
    $this->info(User::all());    
});
Artisan::command('newuser',function() {
    $nombre = $this->ask('Nombre del usuario?');
    $correo = $this->ask('correo?');
    $clave = $this->ask('clave?');
    $user=new User(['name'=>$nombre,'email'=>$correo,'password'=>$clave]);
    $user->save();
    $this->info("usuario agregado correctamente");
});
