<!DOCTYPE html>
<html>
<head>
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>
       <table>
            <tr>
                <td>Name :</td>
                <td>{{ $name }}</td>
            </tr>
            <tr>
                <td>Email :</td>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <td>Phone :</td>
                <td>{{ $phone }}</td>
            </tr>
            <tr>
                <td>Linkedin :</td>
                <td>{{ $linkedin }}</td>
            </tr>
        </table>
    </p>
     
    <p>Thank you</p>
</body>
</html>