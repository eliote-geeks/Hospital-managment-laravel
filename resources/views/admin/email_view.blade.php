<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
<base href="/public"> 
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
                            <h3>SEND MAIL</h3>
                            <p class="text-subtitle text-muted">Send mail please respect all users.</p>
                        </div>
                    </div>
                          <section class="section" style="margin-left:330px;">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">s</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                            <form method ="POST" action="{{ url('sendmail_contact',$data->id) }}">
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
                                        <label for="basicInput">Greeting</label>
                                        <input type="text"  class="form-control" id="basicInput" name="greeting"
                                            placeholder="Enter greeting">
                                    </div>

                                    <div class="form-group">
                                        <label for="helpInputTop">Body</label>
                                        <small class="text-muted">eg.<i>Example message</i></small>
                                        <textarea rows="5" class="form-control ck-editor" name="body" placeholder="write a message"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="basicInput">Action text</label>
                                        <input type="text"  class="form-control" id="basicInput" name="actiontext"
                                            placeholder="Action text">
                                    </div>                           

                                 <div class="form-group">
                                        <label for="basicInput">Action Url</label>
                                        <input type="text"  class="form-control" id="basicInput" name="actionurl"
                                            placeholder="Action Url">
                                    </div>         
                                    <div class="form-group">
                                        <label for="basicInput">End part</label>
                                        <input type="text"  class="form-control" id="basicInput" name="endpart"
                                            placeholder="End part">
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