<!DOCTYPE html>
<html>
   
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/mustache.js/mustache.js"></script>
    <script src="js/mellonData.js"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="bower_components/normalize-css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" id="top-header">
            <ul id="site-top-menu">
                <li>Melon APP LOGO</li>
                <li>Browse</li>
                <li>Log in</li>
                <li>Sing up</li>
                <li><input placeholder="Search"></li>
            </ul>
        </div>
    </div>
    <div class="row mustache-temp" >
        <!--Move to mustache temp-->
        <div class="col-md-10" id="botom-header">
            Carosal
        </div>
    </div>
    <div class="row  mustache-temp">

        <div class=" col-md-offset-1 col-md-10 video-strips">
            <h2>{{for all in category responce - * fetch all categories from api (only in one time) - show random videos or some other criteria }}</h2>

            <div class="col-md-2"><span>{{TEST}}</span>
            </div>
            <div class="col-md-2"><span>{{TEST}}</span>
            </div>
            <div class="col-md-2"><span>{{TEST}}</span>
            </div>
            <div class="col-md-2"><span>{{TEST}}</span>
            </div>
            <div class="col-md-2"><span>{{TEST}}</span>
            </div>
            <div class="col-md-2"><span>{{TEST}}</span>
            </div>


        </div>
    </div>
    <div class="row  mustache-temp">

        <div class=" col-md-offset-1 col-md-10 video-strips">
            <h2>{{for all in category responce - * fetch all categories from api (only in one time) - show random videos or some other criteria }}</h2>

            <div class="col-md-2"><span>{{TEST}}</span>
            </div>
            <div class="col-md-2"><span>{{TEST}}</span>
            </div>
            <div class="col-md-2"><span>{{TEST}}</span>
            </div>
            <div class="col-md-2"><span>{{TEST}}</span>
            </div>
            <div class="col-md-2"><span>{{TEST}}</span>
            </div>
            <div class="col-md-2"><span>{{TEST}}</span>
            </div>


        </div>
    </div>
<p>____________________________1_________________</p>
    <div class="row" id="video-template" >

        <div class="col-md-offset-2 col-md-8">
            <div class="row">
                <div class="col-md-8">
                    <div id="video-player">
                        <h3>{{Video player}}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="next-video">
                        <span>{{test}}</span>
                    </div>
                    <div id="next-video">
                        <span>{{test}}</span>
                    </div>
                    <div id="next-video">
                        <span>{{test}}</span>
                    </div>
                </div>

            </div>
            <div class="row">
                <div id="coment-section">
                    <div class="comment-box">
                        <p>{{Comment box}}</p>
                    </div>
                    <div class="comment-box">
                        <p>{{Comment box}}</p>
                    </div>
                    <div class="comment-box">
                        <p>{{Comment box}}</p>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <p>_________________________________2____________</p>

    <div class="row" id="video-upload">
        <div class="col-md-8 col-md-offset-2">


            <div id="dropfile-upload">
                {{dropzone}}
            </div>
            <div id="drop-info">
                <form id="dropfile-upload-form">
                    Video title:<br>
                    <input type="text" name="upladShowTitle">
                    <br>
                    Video description:<br>
                    <textarea cols="20" rows="5" name="description"></textarea>
                    <br><br>
                    <button>Upload</button>
                </form>
            </div>



        </div>
    </div>

    <p>_________________________________3____________</p>

    <div class="row">

        <div class="col-md-3">
        </div>
        <div class="col-md-6" id="login-modal">
            <div class="modal-header">
                    <h3>Log in to your account</h3>
                </div>
                <div class="modal-body">
                    <form action=''>
                        <p><input type="text" name="eid" id="email" placeholder="Email" size="25"></p>
                        <p><input type="password" name="passwd" placeholder="Password" size="25"></p>
                        <p><button type="submit" >Sign in</button></p>
                        <p> <a href="#">Forgot Password?</a></p>
                    </form>
                </div>
                <div class="modal-footer">
                    Need an account?
                    <a href="#" class="btn btn-primary">Sign up for free</a>
                </div>
            </div>
        <div class="col-md-3">
        </div>
        <div class="row">


        </div>
    </div>

    <div class="row">

        <div class="col-md-3">
        </div>
        <div class="col-md-6" id="login-modal">
            <div class="modal-header">
                    <h3>Create your free account</h3>
                </div>
                <div class="modal-body">
                    <form action=''>
                        <p><input type="text" name="eid" id="email" placeholder="Email" size="25"></p>
                        <p><input type="text" name="username" placeholder="username" size="25"></p>
                        <p><input type="password" name="passwd" placeholder="Password" size="25"></p>
                        <p><input type="password" name="passwd" placeholder="Password repeat" size="25"></p>
                        <p><button type="submit" >Sign up</button></p>
                        <p> <a href="#">Forgot Password?</a></p>
                    </form>
                </div>
                <div class="modal-footer">
                    Already registered?
                    <a href="#" class="btn btn-primary">Log in here</a>
                </div>
            </div>
        <div class="col-md-3">
        </div>
        <div class="row">


        </div>
    </div>

    <div class="row" id="site-footer">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    Before Footer
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Footer data<br>
                    Footer data<br>
                    Footer data<br>
                    Footer data<br>
                </div>
                <div class="col-md-4">
                    Footer data<br>
                    Footer data<br>
                    Footer data<br>
                    Footer data<br>
                </div>
                <div class="col-md-4">
                    Footer data<br>
                    Footer data<br>
                    Footer data<br>
                    Footer data<br>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
