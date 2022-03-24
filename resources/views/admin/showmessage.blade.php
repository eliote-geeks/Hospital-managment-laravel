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
                                Messages
                        </div>
                        <div class="card-body" >
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>subject</th>
                                        <th>message</th>
                                        <th>Reponse</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                               <tbody>
                            @foreach ($data as $messages )
                                
                                    <tr>
                                        <td>{{  $messages->name }}</td>
                                        <td>{{  $messages->email }}</td>
                                        <td>{{  $messages->subject }}</td>
                                        <td>{{  $messages->message }}</td>
                                        <td><a class="btn btn-primary" href="{{ url('email_contact_view',$messages->user_id) }}">Send mail</a></td>
                                        <td><a class="btn btn-danger" onclick="return(confirm('Are you sure to delete this data ? '))" href="{{ url('deletemessage',$messages->id) }}">Delete</a></td>
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