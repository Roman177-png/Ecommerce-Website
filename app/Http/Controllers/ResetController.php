<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ResetController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function reset()
    {
       \Artisan::call('  migrate:fresh --seed');

       foreach (['categories','products'] as $folder)
       {
           Storage::deleteDirectory($folder);
           Storage::makeDirectory($folder);

           $files =Storage::disk('reset')->files($folder);

           foreach ($files as $file)
           {
               Storage::put($file,Storage::disk('reset')->get($file));
           }
       }

/*       $folder = 'categories';
       Storage::deleteDirectory($folder);
       Storage::makeDirectory($folder);

       $files =Storage::disk('reset')->files($folder);

       foreach ($files as $file)
       {
           Storage::put($file,Storage::disk('reset')->get($file));
       }*/

       session()->flash('success','Project was reset');
       return redirect()->route('index');
    }

}
