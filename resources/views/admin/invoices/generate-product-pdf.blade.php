<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2>Title: {{ $title }}<h2>
<h2>Title: {{ $date }}<h2>

<table class= "table table-bordered">
    <thead>
        <tr>
                 <th>ID</th>
                                           
                <th>Task Id</th>
                <th>Text</th>
                <th>Email</th>
                <th>Phone</th>

</tr>
</thead>
<tbody>
    @foreach ($invoice as   $invoice)

    
    <tr>
          <td>{{  $invoice->id }}</td>
         <td> {{  $invoice ->taskid}}</td>
         <td> {{  $invoice ->text}}</td>
         <td> {{  $invoice ->email}}</td>
         <td> {{  $invoice ->phone}}</td>

</tr>
    @endforeach
</tbody>
</table>

    
    
</body>
</html>