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
                            <h3>ADD DOCTOR</h3>
                            <p class="text-subtitle text-muted">Add doctor.</p>
                        </div>
                    </div>
                          <section class="section" style="margin-left:330px;">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Inputs</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                            <form method = "post" action="{{ url('upload_doctor') }}" enctype="multipart/form-data">
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
                                        <label for="basicInput">Doctor Name</label>
                                        <input type="text"  class="form-control" id="basicInput" name="name"
                                            placeholder="Enter name">
                                    </div>

                                    <div class="form-group">
                                        <label for="helpInputTop">Phone</label>
                                        <small class="text-muted">eg.<i>6777832733</i></small>
                                        <input type="number" class="form-control" id="helpInputTop" name="phone">
                                    </div>

                                    <div class="form-group">
                                        <label for="helperText">Specialty</label>
                                            <select name="specialty" class="form-control">  
                                                <option>Select _sepciality</option>
                                                <option>Skin</option>
                                                <option>Heart</option>
                                                <option>eye</option>
                                                <option>nose</option>
                                            </select>
                                        </p>
                                    </div>
                                 <div class="form-group">
                                        <label for="helpInputback">Room no</label>
                                        <small class="text-muted">eg.<i>8928</i></small>
                                        <input type="text" class="form-control" id="helpInputback" placeholder="Write a room No" name="room">
                                </div>

                                    <div class="form-group">
                                        <label for="helpInputTop">Doctor Image</label>
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