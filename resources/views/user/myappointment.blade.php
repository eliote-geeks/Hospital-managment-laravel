@include('admin.css')
<x-guest-layout>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-jet-authentication-card-logo />
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                My appointment
            </div>
            <div class="container"> 
            <table class="table">

            <tr>
                <th>Doctor Name</th>
                <th>Date</th>
                <th>Message</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
            @foreach ($appoint as $appoints)
                

            <tr>
                <td>{{ $appoints->name }}</td>
                <td>{{ $appoints->date_appointment }}</td>
                <td>{{ $appoints->message }}</td>
                <td>{{ $appoints->status }}</td>
                <td><a onclick="return(confirm('Are you sure to delete this appointment ?'))" href="{{ url('cancel_appoint',$appoints->id) }}" class="btn-sm btn-danger">Delete</a></td>
            </tr>

            @endforeach
            </table>
            <div>
        </div>
    </div>
</x-guest-layout>