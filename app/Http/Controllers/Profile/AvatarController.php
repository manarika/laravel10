<?php

namespace App\Http\Controllers\Profile;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Support\Str;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {
        /*$request->validate([
            //'avatar'=>'required|image'
            'avatar'=>['required','image'],
        ]);*/
       //$path=$request->file('avatar')->store('avatars','public');

        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));
        if ($oldavatar=$request->user()->avatar)
       {
           Storage::disk('public')->delete($oldavatar);

       }

       auth()->user()->update(['avatar'=>$path]);
       return redirect(route('profile.edit'))->with('message','avatar updated successfully');
        //return back()->with('message','avatar uploaded successfully');
    }

    public function generate(Request $request){
        $result = OpenAI::images()->create([
            "prompt"=> "create avatar for a female developer 20 years old moroccan called manar",
            "n"=> 1,
            "size"=> "512x512",
        ]);

$content=file_get_contents($result->data[0]->url);

$filename=Str::random(23);
         Storage::disk('public')->put("avatars/$filename.jpg", $content);
        if ($oldavatar=$request->user()->avatar)
        {
            Storage::disk('public')->delete($oldavatar);

        }
        auth()->user()->update(['avatar'=>"avatars/$filename.jpg"]);
        return redirect(route('profile.edit'))->with('message','avatar updated successfully');

    }
}
