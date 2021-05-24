<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {       
        return view('contact.table', [
            'contacts' => Contact::latest()->paginate(10),
        ])->with('no', 1);
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        $attr = request()->validate([
            'name' => 'required|min:3',            
            'phone' => 'required|min:3',            
            'email' => 'required|min:3',            
        ]);        
        
        Contact::create($attr);
        
        return redirect('contact')->with('success', 'The contact was created');
    }
}
