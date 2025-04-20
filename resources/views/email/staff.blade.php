<h4> Hi <h1> {{ $name }} </h1>, You are Welcome to our LaraCrud App</h4>
<p> Your Email : {{ $email }}</p>
<p> Your Phone : {{ $cell }} </p>
<p>Your Photo : <img src="{{ asset('storage/staff/' . $photo) }}"
        alt="Staff Photo"
        width="150"></p>
