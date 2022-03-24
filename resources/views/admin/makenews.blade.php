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

                    <div class="row" style="margin-left:330px;">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Make News</h3>
                            <p class="text-subtitle text-muted">news.</p>
                        </div>
                    </div>
                          <section class="section" style="margin-left:330px;">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Make news</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                            <form method = "post" action="{{ url('upload_new') }}" enctype="multipart/form-data">
                            @csrf
                    @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="text-red-500">{{ $error }}</div>
                                    @endforeach
                     @endif
                     @if(session()->has('message'))
                                        <div  class="text-green-500 text-center">{{ session()->get('message') }}
                                        </div>
                     @endif
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Author</label>
                                        <input type="text"  class="form-control" id="basicInput" name="autor"
                                            placeholder="Enter author">
                                    </div>

                                    <div class="form-group">
                                        <label for="helperText">Content</label>
                                    <textarea class="form-control" name="content" placeholder="enter content"></textarea>
                                    </div>
                                 <div class="form-group">
                                        <label for="helpInputback">Grade</label>
                                        <small class="text-muted">eg.<i>Entrepreneur</i></small>
                                        <input type="text" class="form-control" id="helpInputback" placeholder="Write a grade" name="grade">
                                </div>

                                    <div class="form-group">
                                        <label for="helpInputTop">Profile pic</label>
                                        <input type="file" class="form-control" id="helpInputTop" name="image">
                                    </div>                                

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary form-control">
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    
                </section>
    </div>
        </div>
@include('admin.script')
</body>

</html>