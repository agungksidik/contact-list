<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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

    public function edit(Contact $contact)
    {
        return view('contact.edit', [
            'contact' => $contact,
            'submit' => 'Update'
        ]);
    }

    public function assign(Contact $contact)
    {
        $agens = User::role('agen')->get(); 
        return view('contact.assign', [
            'contact' => $contact,
            'agens' => $agens,
            'submit' => 'Assign'
        ]);
    }

    public function assign_store(Request $request)
    {        
        Task::insert([
            'contact_id' => $request->contact_id,
            'user_id' => $request->agen_id,
            'remark' => null,
            'status' => 'uncontacted',
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('contact.table')->with('success', 'Assign contact was assign to agen');
    }

    public function update(Contact $contact)
    {
        $contact->update([
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email'),
        ]);

        return redirect()->route('contact.table')->with('success', 'The contact was updated');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact.table')->with('success', 'The contact was deleted');
    }
}
