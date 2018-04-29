<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Engram - Take Survey</title>

    <!-- Bootstrap core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
        <link href="{{asset('css/landingPage.css')}}" rel="stylesheet">
    </head>

    <body class="text-center">
        <form class="form-takesurvey" action="{{route('survey-main')}}" method="post">
            @csrf
            <img class="mb-4" src="{{asset('images/logo.png')}}" alt="" width="180" height="150">
            <h1 class="h3 mb-3 font-weight-normal">Welcome to Engram Survey</h1>
            <div class="form-group">
                <label for="sel1">Gender:</label>
                <select class="form-control" title="Gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="spacer"></div>
            <div class="form-group">
                <label for="sel1">Age Group:</label>
                <select class="form-control" title="Age Group:" name="group">
                @foreach ($groups as $group)
                    <option value="{{$group->id}}">{{$group->group}}</option>
                @endforeach
                </select>
            </div>
            <div class="spacer"></div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Take survey -></button>
        </form>
    </body>
</html>
