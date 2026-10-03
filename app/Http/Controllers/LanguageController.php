<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
      public function changelanguage($language)
    {
        if (!in_array($language, ['it', 'en'])) {
            abort(404);
        }

        session()->put('locale', $language);

        return redirect()->back();
    }
}
