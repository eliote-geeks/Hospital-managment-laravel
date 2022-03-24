 <x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soengsouy.com</title>
@include('admin.css')
</head>

<body>
    <div id="app">
      @include('admin.sidebar')
            <div class="container-fluid page-body-wrapper" style="margin=left:380px;">
                <div class="container">
                    <table class="table" style="margin-left:190px; width:100%;">
                    <tr>
                        
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Doctor Name</th>
                        <th>Date Appointment</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Approved</th>
                        <th>Cancel</th>
                        <th>Delete</th>
                        <th>Send Mail</th>
                        
                    </tr>
                    @foreach ($data as $appoint )
                        
                    
                    <tr>
                        
                        <td style="width:20%;">{{ $appoint->name }}</td>
                        <td>{{ $appoint->email }}</td>
                        <td>{{ $appoint->phone }}</td>
                        <td>{{ $appoint->doctor }}</td>
                        <td>{{ $appoint->date_appointment }}</td>
                        <td style="width:20%;">{{ $appoint->message }}</td>
                        <td style="color:red;">{{ $appoint->status }}</td>
                        <td><a class="btn-sm btn-success" onclick="return(confirm('Are you sure to confirm this data ?'))" href="{{ url('approved',$appoint->id) }}">Approved</a></td>
                        <td><a onclick="return(confirm('Are you sure to canceled this data ?'))" href="{{ url('canceled',$appoint->id) }}" class="btn-sm btn-danger" >Canceled</a></td>
                        <td><a onclick="return(confirm('Are you sure to delete this data ?'))" href="{{ url('deleted',$appoint->id) }}" class="btn-sm btn-warning" >Deleted</a></td>                        
                        <td style="width:80%;" ><a onclick="return(confirm('Are you sure to send mail to this user ?'))" href="{{ url('emailview',$appoint->id) }}" class="btn-sm btn-primary " > mail</a></td>

                    </tr>

                    @endforeach
                    </table>
                </div>
            </div>
    </div>
@include('admin.script')
</body>

</html>