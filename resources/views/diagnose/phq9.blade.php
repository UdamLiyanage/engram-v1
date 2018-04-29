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
            <div class="row">
                <div class="col-md-8">
                    <p class="intro">Over the past 2 weeks, how often have you been bothered by any of the following problems?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6"> 
                </div>
                <div class="col-md-1" align="center">
                    <p class="heading">Not at all</p>
                </div>
                <div class="col-md-1" align="center">
                    <p class="heading">Several Days</p>
                </div>
                <div class="col-md-2" align="center">
                    <p class="heading">More than half the days</p>
                </div>
                <div class="col-md-2" align="center">
                    <p class="heading">Nearly everyday</p>
                </div>
            </div>
            <form action="{{route('phq9_submit')}}" method="post">
                @csrf
                @foreach($questions as $question)
                <div class="row">
                    <div class="col-md-6">
                        <p class="question">{{$question['id']}}.  {{$question['question']}}</p>
                    </div>
                    <div class="col-md-1">  
                        <div class="form-check" align="center">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="na" name="{{$question['id']}}" aria-label="...">
                        </div>
                    </div>
                    <div class="col-md-1" align="center">
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="sd" name="{{$question['id']}}" aria-label="...">
                        </div>
                    </div>
                    <div class="col-md-2" align="center">
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="hd" name="{{$question['id']}}" aria-label="...">
                        </div>
                    </div>
                    <div class="col-md-2" align="center">
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="ne" name="{{$question['id']}}" aria-label="...">
                        </div>
                    </div>
                </div>
                @endforeach
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