
<h3>New Course Registration - {{ env('APP_NAME') }}</h3>
<br>

<h3>User Details</h3>
<p><span style="font-weight:600;">Name :</span> {{ $details['name'] ?? ''}}</p>
<p><span style="font-weight:600;">Email :</span> {{ $details['email'] ?? '' }}</p>
<p><span style="font-weight:600;">Phone Number :</span> {{ $details['phone'] ?? '' }}</p>
<p><span style="font-weight:600;">Job Title :</span> {{ $details['job_title'] ?? '' }}</p>
<p><span style="font-weight:600;">Company Name :</span> {{ $details['company_name'] ?? '' }}</p>
<p><span style="font-weight:600;">Members Count :</span> {{ $details['count'] ?? '' }}</p>
<p><span style="font-weight:600;">Message :</span> {{ $details['message'] ?? '' }}</p>
<br>

<h3>Course Details</h3>

<p>
    <b>Course Title:</b> {!! $course->name ?? '' !!}
</p>
<p>
    <b>Duration :</b> {!! $course->duration ?? '' !!}
</p>
<p>
    <b>Language :</b> {!! $course->language->title ?? '' !!}
</p>
<p>
    <b>Type :</b> {!! $course->course_type->title ?? '' !!}
</p>
<p>
    <b>Location :</b> {!! $course->location->name ?? '' !!}
</p>
<p>
    <b>Course Fee :</b> AED {{ $course->price }}
</p>
<p>
    <b>Type :</b> {!! $course->course_type->title ?? '' !!}
</p>
