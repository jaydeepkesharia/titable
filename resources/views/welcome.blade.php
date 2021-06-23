<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <form id="table_form">
                    <label for="workingd">No of Working days:</label><br>
                    <input type="text" id="workingd" name="workingd" value="5"><br>
                    <label for="workingh"> No of working hours per day:</label><br>
                    <input type="text" id="workingh" name="workingh" value="8"><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
        <div>
            <table border="1">
                <thead>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </thead>
                <tbody class="grid-canvas"></tbody>
            </table>
        </div>
        <script type="text/javascript">
            $(document).on("submit", "#table_form", function(e) {
                e.preventDefault();
                numOfRow = $('#workingh').val();
                numOfCol = $('#workingd').val();


                subjects = ['Gujarati','English','Science','Maths'];

                var body = $('.grid-canvas');
                for (var i = 1; i <= numOfRow; i++) {
                let row = $('<tr></tr>');
                    for (col = 1; col <= numOfCol; col++) {
                        let column = $('<td></td>');
                        row.append(column);
                        column.html(subjects[Math.floor(Math.random()*subjects.length)]);
                    }
                body.append(row);

                }
            });

        </script>
    </body>
</html>
