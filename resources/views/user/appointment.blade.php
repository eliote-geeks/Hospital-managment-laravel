    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Make an Appointment</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <form action="{{ url('appointment') }}" method="post" role="form" class="" data-aos="fade-up" data-aos-delay="100">
        @csrf
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="date" name="date_appointment" class="form-control datepicker" id="date" placeholder="Appointment Date" required>
            </div>

            <div class="col-md-8 form-group mt-3">
              <select name="doctor" id="doctor" class="form-select">
                <option value="">Select Doctor</option>
                @foreach ($doctor as $doctors)
                    <option value="{{ $doctors->name }}">{{ $doctors->name }} --Speciality-- {{ $doctors->specialty }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
          </div>
          @if(session()->has('message')) 
          <div class="my-3">
            <div class="alert alert-success">{{ session()->get('message') }}</div>
          </div>
          @endif<br>
          <div class="active text-center"><button style="border:none;" class="btn btn-info" type="submit">Make an Appointment</button></div>
        </form>

      </div>
    </section>