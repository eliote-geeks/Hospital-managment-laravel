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
                                        <th>content</th>
                                        <th>Grade</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                               <tbody>
                            @foreach ($data as $news )
                                
                                    <tr>
                                        <td>{{  $news->autor }}</td>
                                        <td>{{  $news->content }}</td>
                                        <td>{{  $news->grade }}</td>
                                        <td><img height="100" width="100" class="thumbnail" style="border-radius:50%;" src="actualiteimage/{{$news->image}}"></td>
                                        <td>
                                         <span class="badge bg-danger"><a style="color:white;" onclick="return(confirm('Are you sure to delete this ?!'))" href="{{ url('deletenew',$news->id) }}"> Delete </a></span>
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