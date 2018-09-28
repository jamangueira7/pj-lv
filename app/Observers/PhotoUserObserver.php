<?php
namespace App\Observers;

use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class PhotoUserObserver
{
    public function creating(User $user)
    {
        if(is_a($user->photo,UploadedFile::class) and $user->photo->isValid()) {
            $this->updating($user);
        }
    }

    public function deleting(User $user)
    {
        Storage::delete($user->photo);
    }

    public function updating(User $user)
    {
        if(is_a($user->photo,UploadedFile::class) and $user->photo->isValid()) {
            $previous_image = $user->getOriginal('photo');
            $this->upload($user);

            Storage::delete($previous_image);
        }
    }

    public function upload(User $user)
    {
        $allowed_exetensions = [
            'png',
            'gif',
            'jpeg',
            'jpg',
        ];
        $extension = $user->photo->extension();

        if(!in_array($extension, $allowed_exetensions)){
            throw new \Exception('Extension not allowed');
        }
        $name = bin2hex(openssl_random_pseudo_bytes(8));
        $name = $name . '.' . $extension;
        $name = 'avatars/' . $name;

        //sava imagem tamanho real
        $user->photo->storeAs('',$name);

        //redimenciona a imagem
        $img = Image::make($user->photo->getRealPath());
        $img->fit(250,250)->save(public_path('/thumb/'.$name));
        $user->photo = $name;
    }
}
