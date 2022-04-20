<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexprofil()
    {
    	return view('profile.index', array('user' => Auth::user()) );
    }

    public function editProfile($id) {
        $user = User::find($id);
        return view('profile.edit', compact( "user"));
    }

    public function editprofil(Request $request)
    {
    	// Bagian yang mengHandle upload avatar user
    	if($request->hasFile('avatar'))
    		{
	    		$photo = $request->file('avatar');
	    		$filename = time() . '.' . $photo->getClientOriginalExtension();
	    		Image::make($photo)->resize(300, 300)->save( public_path('/img/upload/avatar/' . $filename ) );

	    		$user = Auth::user();
	    		$user->photo = $filename;
	    		$user->save();
    		}
    	return view('profile.index', array('user' => Auth::user()) );
    }

    public function updateProfile(Request $request, $id) {
        // $this->validate($request, [
        //     "name" => "required|string",
        //     "password" => "required",
        //     "photo" => "required|mimes:jpeg,jpg,png",
        //     "alamat" => "required|string",
        //     "jenis_kelamin" => "required"
        // ]);

        // $user = User::find($id);

        // if($request->hasFile('avatar')) {
	    // 		$photo = $request->file('avatar');
	    // 		$filename = time() . '.' . $photo->getClientOriginalExtension();
	    // 		Image::make($photo)->resize(300, 300)->save( public_path('/img/upload/avatar/' . $filename ) );

	    // 		$user = Auth::user();
	    // 		$user->photo = $filename;
	    // 		$user->save();
    		

        //     // Jika user mengganti passwornya password 

        //     if ($user->password != $request->password) {
        //         $user->update([
        //             "name" => $request->name,
        //             "password" => Hash::make($request->password),
        //             "photo" => $filename,
        //             "alamat" => $request->alamat,
        //             "jenis_kelamin" => $request->jenis_kelamin
        //         ]);
        //     } else {
        //         // Jika user tidak mengganti passwordnya

        //         $user->update([
        //             "name" => $request->name,
        //             "password" => $request->password,
        //             "photo" => $filename,
        //             "alamat" => $request->alamat,
        //             "jenis_kelamin" => $request->jenis_kelamin
        //         ]);
        //     }
        // }

        // return redirect(route("user.profile", $user->id))->with(["success" => "User berhasil diupdate!"]);
        $img = 'photo';
        $user = User::find($id);
        $user->id = $request->id;
        $user->name = $request->name;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->alamat = $request->alamat;
        $user->save();

        $user1 = User::find($id);

        if($request->hasFile('avatar')) {
	    		$photo = $request->file('avatar');
	    		$filename = time() . '.' . $photo->getClientOriginalExtension();
	    		Image::make($photo)->resize(300, 300)->save( public_path('/img/upload/avatar/' . $filename ) );

	    		$user1 = Auth::user();
	    		$user1->photo = $filename;
	    		$user1->save();
    }
    return redirect(route("user.profile", $user->id))->with(["success" => "User berhasil diupdate!"]);
}

}
