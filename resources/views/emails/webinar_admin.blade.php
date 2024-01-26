
<h3>New Webinar Registration - {{ env('APP_NAME') }}</h3>
<br>
<h3>User Details</h3>
<p><span style="font-weight:600;">Name :</span> {{ $bookings->name ?? ''}}</p>
<p><span style="font-weight:600;">Email :</span> {{ $bookings->email ?? '' }}</p>
<p><span style="font-weight:600;">Phone Number :</span> {{ $bookings->phone ?? '' }}</p>
<br>
<h3>Webinar Details</h3>

<p>
    <b>Webinar Title: </b> {!! $webinar->title ?? '' !!}
</p>
<p>
    <b>Date: </b> {{ date('d M, Y', strtotime($webinar->webinar_date)) }}
</p>
<p>
    <b>Time: </b>{{ date('h:i A', strtotime($webinar->webinar_date)) }}
</p>
<p>
    <b>Location: </b>{!! $webinar->location ?? '' !!}
</p>
