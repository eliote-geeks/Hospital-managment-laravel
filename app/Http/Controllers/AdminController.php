<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\Gallerie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function addview()
     {
    //     if(Auth::id())
    //     {
    //         if(Auth::user()->user_type == 1)
    //         {
                return view('admin.add_doctor');
        //     }
        //     else
        //     {
        //         return redirect()->back();
        //     }
        // }
        // else
        // {
        //     return redirect('login');
        // }
        
    }

    public function upload(Request $request)
    {
        $doctor = new Doctor;
        //file
        $request->validate([
            'name' => ['required','max:255','min:5','unique:doctors'],
            'phone' => ['required','unique:doctors'],
            'room' => ['required','unique:doctors'],
            'specialty' => ['required'],
            'image' => ['required','unique:doctors']
        ]);
        $image = $request->image;
        $imagename = time().'.'.$image->getClientoriginalExtension();
        $request->image->move('doctorimage',$imagename);
        
        //make variable
        $doctor->image = $imagename;  
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;        
        $doctor->room = $request->room;        
        $doctor->specialty = $request->specialty;        
        
        //save
        $doctor->save();
        return redirect()->back()->with('message','Doctor Added Successfully');

    }

    public function showappointment()
    {
        
        // if(Auth::id())
        // {
        //     if(Auth::user()->user_type == 1)
        //     {
                $data = Appointment::all();
                return view('admin.showappointment',compact('data'));
        //     }
        //     else
        //     {
        //         return redirect()->back();
        //     }
        // }
        // else
        // {
        //     return redirect('login');
        // }        
        
    }

    public function approved($id)
    {
        $data = Appointment::findOrFail($id);
        $data->status = 'approved';
        $data->save();
        return redirect()->back();
    }

    public function canceled($id)
    {
        $data = Appointment::findOrFail($id);
        $data->status = 'Rejected';
        $data->save();
        return redirect()->back();
    }

    public function showdoctor()
    {
        // if(Auth::id())
        // {
        //     if(Auth::user()->user_type == 1)
        //     {
                $data = Doctor::all();
                return view('admin.showdoctor',compact('data'));
        //     }
        //     else
        //     {
        //         return redirect()->back();
        //     }
        // }
        // else
        // {
        //     return redirect('login');
        // }        
    }

    public function deletedoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->back();
    }

    public function updatedoctor($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.update_doctor',compact('doctor'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->specialty = $request->specialty;
        $doctor->room = $request->room;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientoriginalExtension();
            $request->image->move('doctorimage',$imagename);
            $doctor->image = $image;
        }

        $doctor->save();
        return redirect()->back()->with('message','Data Updated successfully');

    }

    public function emailview($id)
    {
        // if(Auth::id())
        // {
        //     if(Auth::user()->user_type == 1)
        //     {
                $data = Appointment::findOrFail($id);
                return view('admin.email_view',compact('data'));
        //     }
        //     else
        //     {
        //         return redirect()->back();
        //     }
        // }
        // else
        // {
        //     return redirect('login');
        // }        

    }

    public function email_contact_view($id)
    {
        $data = User::findOrFail($id);
        return view('admin.contact_email_view',compact('data'));        
    }

    public function sendmail(Request $request,$id)
    {
        $data = Appointment::findOrFail($id);
        $details = [
           'greeting' =>   $request->greeting,
           'body' =>   $request->body,
           'actiontext' =>   $request->actiontext,
           'actionurl' =>   $request->actionurl,
           'endpart' =>   $request->endpart
        ];
        
        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back()->with('message','Your email sended successfully :))!');
    }

    public function sendmail_contact(Request $request,$id)
    {   
        $data = User::find($id);
        $details = [
           'greeting' =>   $request->greeting,
           'body' => $request->body,
           'actiontext' =>   $request->actiontext,
           'actionurl' =>   $request->actionurl,
           'endpart' =>   $request->endpart
        ];
        
        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back()->with('message','Your email sended successfully :))!');
    }

    public function deleted($id)
    {
        $data = Appointment::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

    public function showuser()
    {
        $data = User::all();
        return view('admin.showuser',compact('data'));
    }

    public function deleteuser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function makenews()
    {
        return view('admin.makenews');
    }

    public function upload_new(Request $request)
    {
        $actualites = new Actualite;
        //file
        $request->validate([
            'autor' => ['required','max:25','min:5','unique:actualites'],
            'content' => ['required','unique:actualites'],
            'grade' => ['required'],
            'image' => ['required']
        ]);
        $image = $request->image;
        $imagename = time().'.'.$image->getClientoriginalExtension();
        $request->image->move('actualiteimage',$imagename);
        
        //make variable
        $actualites->image = $imagename;  
        $actualites->autor = $request->autor;
        $actualites->content = $request->content;        
        $actualites->grade = $request->grade;        
        
        //save
        $actualites->save();
        return redirect()->back()->with('message','new Actu Added Successfully');        
    }

    public function allnews()
    {
        $data = Actualite::all();
        return view('admin.shownews',compact('data'));
    }

    public function deletenew($id)
    {
        $data = Actualite::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

    public function message()
    {
        $data = Contact::all();
        return view('admin.showmessage',compact('data'));
    }

    public function deletemessage($id)
    {
        $data = Contact::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

    public function addimage()
    {
        return view('admin.addimage');
    }

    public function upload_image(Request $request)
    {
        $gallery =  New Gallerie;
        $request->validate([
            'image'  => ['required'],
            'name' => ['required']
        ]);
        $image = $request->image;
        $imagename = time().'.'.$image->getClientoriginalExtension();
        $request->image->move('Gallery',$imagename);

        $gallery->name = $request->name;        
        $gallery->image = $imagename;        
        $gallery->save();


        return redirect()->back()->with('message','image uploading successfully!!');
        
    }

    public function imageview()
    {
        $data = Gallerie::all();
        return view('admin.imageview',compact('data'));
    }

    public function deleteimage($id)
    {
        $data = Gallerie::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

}

