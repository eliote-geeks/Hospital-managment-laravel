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
            <div class="container-fluid page-body-wrapper" style="margin=left:300px;">
                <div class="container">
                    <table class="table" style="margin-left:130px;">
                    <tr>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th>Image</th>
                        <th>Doctor Name</th>
                        <th>Phone</th>
                        <th>Specialty</th>
                        <th>Room No</th>                        
                        <th>Action</th> 
                    </tr>
                    @foreach ($data as $doctors)

                    <tr>    
                        <td>aaa &nbsp;&nbsp; &nbsp;&nbsp;</td>
                        <td><img height="100" width="100" class="thumbnail" style="border-radius:50%;" src="doctorimage/{{$doctors->image}}"></td>
                        <td>{{ $doctors->name }}</td>
                        <td>{{ $doctors->phone }}</td>
                        <td>{{ $doctors->specialty }}</td>
                        <td>{{ $doctors->room }}</td>
                        <td><a href="{{ url('deletedoctor',$doctors->id) }}" class="btn btn-danger" onclick="return(confirm('are you sure to delete this data ?'))">Delete</a></td>
                        <td><a href="{{ url('updatedoctor',$doctors->id) }}" class="btn btn-primary" onclick="return(confirm('are you sure to update this data ?'))">Update</a></td>
                    </tr>
                    @endforeach
                    
                    </table>
                </div>
            </div>
    </div>
@include('admin.script')
</body>

</html>