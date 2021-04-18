<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></script>

</head>
<style type="text/css">
    @font-face {
        font-family: IRANSans;
        font-style: normal;
        src: url('./public/font/IRANSansWeb(FaNum).ttf') format('truetype');
    }
    /*body { font-family: DejaVu Sans; }*/
</style>
<body>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    @foreach($info_pdfs as $info_pdf)
        <tr>
            <th scope="row">1</th>
            <td>{{$info_pdf->title}}</td>
            <td>{{$info_pdf->description}}</td>
            <td>{{$info_pdf->price}}</td>
        </tr>
    @endforeach
    </tbody>
</table>




</body>
</html>
