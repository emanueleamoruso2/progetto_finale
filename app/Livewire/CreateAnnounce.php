<?php

namespace App\Livewire;

use App\Models\Announce;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ResizeImage;
use Illuminate\Support\Facades\File;

class CreateAnnounce extends Component
{

use WithFileUploads;

#[Validate('required', message: 'Il titolo è obbligatorio')]
#[Validate('min:5', message: 'Il titolo deve contenere almeno 5 caratteri')]
public $title;

#[Validate('required', message: 'Il prezzo è obbligatorio')]
#[Validate('numeric', message: 'Il prezzo deve essere un numero')]
#[Validate('gt:0', message: 'Il prezzo deve essere maggiore di 0')]
public $price;

#[Validate('required', message: 'La descrizione è obbligatoria')]
#[Validate('min:5', message: 'La descrizione deve contenere almeno 5 caratteri')]
public $description;

#[Validate('required', message: 'La categoria è obbligatoria')]
public $category;

public $images = [];

public $temporary_images;

public $announce;


public function store(){

$this->validate();
$this->announce=Announce::create([
'title' => $this->title,
'price' => $this->price,
'description' => $this->description
,'category_id'=>$this->category,
'user_id' =>Auth::user()->id]);
if (count($this->images) > 0) {

foreach ($this->images as $image) {

$newFileName = "announces/{$this->announce->id}";

$newImage = $this->announce->images()->create([
'path' => $image->store($newFileName, 'public')
]);

dispatch(new ResizeImage(
$newImage->path,
300,
300
));
}

File::deleteDirectory(
storage_path('/app/livewire-tmp')
);
}

//    $this->clearForm();
$this->reset();
session()->flash('message','Annuncio creato correttamente');
}

public function render()
{
return view('livewire.create-announce', [
'categories' => Category::all(),
]);
}

public function updatedTemporaryImages()
{
if ($this->validate([
'temporary_images.*' => 'image|max:1024',
'temporary_images' => 'max:6',
])) {
foreach ($this->temporary_images as $image) {
$this->images[] = $image;
}
}
}

public function removeImage($key)
{
if (in_array($key, array_keys($this->images))) {
unset($this->images[$key]);
}
}

}
