<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentFolder;
use App\Models\Notepad;
use App\Models\Recode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    /* -----------------Start Document--------------------- */

    //show document page
    public function document(Request $request){
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;

            $doc = Document::where('user_id',$userid)->get();
            $folder = DocumentFolder::where('user_id',$userid)->get();
        }
        return view('admin.document.view_document',compact('doc','folder'));
    }

    //upload document folder
    public function upload_folder(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $user=Auth::user();
        $user_id=$user->id;

        $folder = new DocumentFolder;
        $folder->user_id=$user_id;
        
        $folder->name =$request->name;

        $folder->save();

        return redirect()->route('admin.document')->with('success', 'Document Folder Upload Succesfully'); 
    }

    //show document folder
    public function document_folder(Request $request,$id){
        $folder = DocumentFolder::findOrfail($id);
        $document = Document::where('folder_id', $request->id)->get();
        return view('admin.document.document_folder',compact('folder','document'));
    }

    //document folder add
    public function document_folder_add(Request $request,$id){
        $folder = DocumentFolder::findOrfail($id);
        return view('admin.document.document_folder_add',compact('folder'));
    }

    //Upload document in folder page
    public function upload_document(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx,jpg,jpeg,png,mp4,xlsx,mov,avi',
        ]);

        $user=Auth::user();
        $user_id=$user->id;

        $doc = new Document;
        $doc->user_id=$user_id;
        
        $doc->title =$request->title;
        $doc->folder_id =$request->folder_id;

        if(!empty($request->file('file'))){
            $file = $request->file('file');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/document'), $filename);
            $doc->file = $filename;
        }

        $doc->save();

        return redirect()->route('admin.document_folder',$request->folder_id)->with('success', 'Document Upload Succesfully'); 
    }

    //Add document page
    public function add_document(Request $request){
        return view('admin.document.add_document');
    }

    //View document
    public function view(Request $request,$id){
        $doc = Document::findOrfail($id);
        return view('admin.document.view',compact('doc'));
    }

    //download document
    public function download(Request $request,$file){
        return response()->download(public_path('upload/document/'.$file));
    }

    //delete document 
    public function delete_document(Request $request,$id){
        $doc = Document::findOrfail($id);

        $doc->delete();

        return redirect()->route('admin.document')->with('success', 'Document Delete Succesfully'); 
    }

    //note_document
    public function note_document(){
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;

            $note=Notepad::where('user_id',$userid)->get();
        }
        return view('admin.document.noteview',compact('note'));
    }

    //notepad_file
    public function notepad_file(Request $request,$id){
        $note = Notepad::findOrfail($id);
        return view('admin.document.noteview_file',compact('note'));
    }



    /* -----------------End Document--------------------- */

    /* -------------------Start Recode------------------- */

    //show recode page
    public function recode(Request $request){
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;

            $recode = Recode::where('user_id',$userid)->get();
        }
        return view('admin.recode.view_recode',compact('recode'));
    }

    //add recode page
    public function add_recode(Request $request){
        return view('admin.recode.add_recode');
    }

    //upload Recode
    public function upload_recode(Request $request){
        $user=Auth::user();
        $user_id=$user->id;

        $recode = new Recode;
        $recode->user_id=$user_id;
        
        $recode->name = $request->name;
        $recode->email = $request->email;
        $recode->contact = $request->contact;
        $recode->type = $request->type;
        $recode->present_address = $request->present_address;
        $recode->permanent_address = $request->permanent_address;
        $recode->blood_group = $request->blood_group;
        $recode->salary = $request->salary;

        if(!empty($request->file('photo'))){
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/recode'), $filename);
            $recode->photo = $filename;
        }

        $recode->save();

        return redirect()->route('admin.recode')->with('success', 'Recode Upload Succesfully'); 
    }

    //view recode page
    public function view_recode(Request $request,$id){
        $recode = Recode::findOrfail($id);
        return view('admin.recode.view_single_recode',compact('recode'));
    }

    //edit recode page
    public function edit_recode(Request $request,$id){
        $recode = Recode::findOrfail($id);
        return view('admin.recode.edit_recode',compact('recode'));
    }


    //update Recode
    public function update_recode(Request $request,$id){
        $user=Auth::user();
        $user_id=$user->id;

        $recode = Recode::findOrfail($id);
        $recode->user_id=$user_id;
        
        $recode->name = $request->name;
        $recode->email = $request->email;
        $recode->contact = $request->contact;
        $recode->type = $request->type;
        $recode->present_address = $request->present_address;
        $recode->permanent_address = $request->permanent_address;
        $recode->blood_group = $request->blood_group;
        $recode->salary = $request->salary;

        if(!empty($request->file('photo'))){
            $file = $request->file('photo');
            @unlink(public_path('upload/recode/'.$recode->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/recode'), $filename);
            $recode->photo = $filename;
        }

        $recode->save();

        return redirect()->route('admin.recode')->with('success', 'Recode Update Succesfully'); 
    }

    //delete recode 
    public function delete_recode(Request $request,$id){
        $recode = Recode::findOrfail($id);

        if(!empty($request->file('photo'))){
            @unlink(public_path('upload/recode/'.$recode->photo));
        }

        $recode->delete();

        return redirect()->route('admin.recode')->with('success', 'Recode Delete Succesfully'); 
    }
    /* -----------------End Recode--------------------- */

    /* -----------------Start Notepad--------------------- */

    //show notepad page
    public function notepad(Request $request){
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;

            $note=Notepad::where('user_id',$userid)->get();
        }
        
        return view('admin.notepad.view_notepad',compact('note'));
    }

    //add note in notepad 
    public function add_note(Request $request){
        return view('admin.notepad.add_note');
    }

    //upload note in notepad 
    public function upload_note(Request $request){
        $user=Auth::user();
        $user_id=$user->id;

        $note = new Notepad;
        $note->user_id=$user_id;
        $note->title = $request->title;
        $note->description = $request->description;

        $note->save();

        return redirect()->route('admin.notepad')->with('success', 'Note Upload Succesfully'); 
    }

    //show note in notepad 
    public function show_note(Request $request,$id){
        $note = Notepad::findOrfail($id);
        return view('admin.notepad.show_note',compact('note'));
    }

    //upload note in notepad 
    public function update_note(Request $request,$id){
        $user=Auth::user();
        $user_id=$user->id;
        $note = Notepad::findOrfail($id);
        $note->user_id=$user_id;
        $note->title = $request->title;
        $note->description = $request->description;

        $note->save();

        return redirect()->route('admin.notepad')->with('success', 'Note Update Succesfully'); 
    }

    //delete note in notepad 
    public function delete_note(Request $request,$id){
        $note = Notepad::findOrfail($id);

        $note->delete();

        return redirect()->back()->with('success', 'Note Delete Succesfully'); 
    }

    /* -----------------End Notepad--------------------- */
}
