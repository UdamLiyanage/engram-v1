<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/survey/takeSurvey.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <img src="{{asset('images/logo.png')}}" alt="" width="180" height="180">
        </div>
    </div>
    <form action="{{route('phq9_further')}}" method="post">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <p class="question">1. What is your symptom duration? </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="radio">
                        <label><input type="radio" name="q1" value="1">Less than 3 months</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="radio">
                        <label><input type="radio" name="q1" value="2">More than 3 months less than 2 years</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="radio">
                        <label><input type="radio" name="q1" value="3">More than 2 years</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p class="question">2. Are taking treatments for depression? </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="radio">
                        <label><input type="radio" name="q2" value="1">Yes</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="radio">
                        <label><input type="radio" name="q2" value="2">No</label>
                    </div>
                </div>
            </div>
            <div class="spacer"></div>
            <div class="row">
                <div class="col-md-2">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                </div>
            </div>
        <div class="spacer"></div>
    </form>
</div>
</body>
</html>