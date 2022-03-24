<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Gallerie;
use App\Models\User;
use App\Notifications\newAppointment;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        { 
            if(Auth::user()->usertype=='0')
            {
                $doctor = Doctor::all();
                $actu = Actualite::all();
                $galleries = Gallerie::all();
                return view('user.home',compact('doctor','actu','galleries'));
            }
            else{
                return view('admin.home');
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else
        {
            $actu = Actualite::all();
            $doctor = Doctor::all();
            $galleries = Gallerie::all();
            return view('user.home',compact('doctor','actu','galleries'));
        }
    }

    public function appointment(Request $request)
    {

        if(Auth::id())
        {
            if(Auth::user()->user_type == 0)
            {
                        //Condition
        $request->validate([
            'name' => ['required','max:255','min:5'],
            'email' => ['required'],
            'phone' => ['required'],
            'date_appointment' => ['required'],
            'message' => ['required'],
            'doctor' => ['required']
        ]);        
        //variables
        $data = new Appointment;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->date_appointment = $request->date_appointment;
        $data->message = $request->message;
        $data->doctor = $request->doctor;   
        $data->status = 'In progress';    
        if(Auth::id())
        {
            $data->user_id = Auth::user()->id;     
        }

        //save
        $data->save();
        $data->notify(new newAppointment($data));

        return  redirect()->back()->with('message','Appointment Request Successfully. We will contact with you soon');
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }        
    }

    public function myappointment()
    {
        if(Auth::id())
        {
            $user_id = Auth::user()->id;
            $appoint = Appointment::where('user_id',$user_id)->get();
            return view('user.myappointment',compact('appoint'));
        }
        else{
            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back(); 
    }

    public function contact(Request $request)
    {
        
        if(Auth::id())
        {
            $user_id = Auth::user()->id;
            $request->validate([
                'name' => ['required','max:255','min:5'],
                'email' => ['required'],
                'subject' => ['required'],
                'message' => ['required']
            ]);        
    
            $data = new Contact;
            $data->user_id = $user_id;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->subject = $request->subject;
            $data->message = $request->message;
            
            //save
            $data->save();
            return  redirect()->back()->with('contact_message','Message Successfully send. We will contact with you soon');
        }
        else{
            return redirect('login');
        }
    }
}

