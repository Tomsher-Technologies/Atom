
<h3>New Contact Enquiry From {{ env('APP_NAME') }}</h3>
<p><span style="font-weight:600;">Name :</span> {{ $contact->name }}</p>
<p><span style="font-weight:600;">Email :</span> {{ $contact->email }}</p>
<p><span style="font-weight:600;">Phone Number :</span> {{ $contact->phone_number }}</p>
<p><span style="font-weight:600;">Subject :</span> {{ $contact->subject }}</p>
<p><span style="font-weight:600;">Message :</span> {{ $contact->message }}</p>
