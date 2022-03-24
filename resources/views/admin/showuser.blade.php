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
                      <section class="section text-center" style="margin-left:260px;" >
                    <div class="card">
                        <div class="card-header">
                            Mange User
                        </div>
                        <div class="card-body" >
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                               <tbody>
                            @foreach ($data as $users )
                                
                                    <tr>
                                        <td>{{  $users->name }}</td>
                                        <td>{{  $users->email }}</td>
                                        <td>{{  $users->phone }}</td>
                                        <td>{{  $users->address }}</td>
                                        <td> @if($users->usertype == 1) Admin @else Simple user @endif</td>
                                        <td>
                                         <span class="badge bg-danger"><a style="color:white;" onclick="return(confirm('Are you sure to delete this user this action will destroy account of this user !!'))" href="{{ url('deleteuser',$users->id) }}"> Delete </a></span>
                                        </td>
                                    </tr>
                            @endforeach

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>

    </div>
    
@include('admin.script')
</body>

</html>