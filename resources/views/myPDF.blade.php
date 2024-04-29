<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 11 Generate PDF</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    </head>
<body>
   
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Gender</th>
            <th>Address</th>
        </tr>
        @foreach ($data as $contact)
            <tr>
                <td>{{ $contact['name'] }}</td>
                <td>{{ $contact['email'] }}</td>
                <td>{{ $contact['phone_number'] }}</td>
                <td>{{ $contact['gender'] }}</td>
                <td>{{ $contact['address'] }}</td>
            </tr>
        @endforeach
    </table>
  
</body>
</html>
