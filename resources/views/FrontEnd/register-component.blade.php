<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Register</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <form class="form-stl" action="{{route('register-user')}}" method="post" name="frm-login" >
                                @if(Session::has('success'))
                                    <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Create an account</h3>
                                    <h4 class="form-subtitle">Personal infomation</h4>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="validationDefault01" class="form-label">First Name*</label>
                                    <input type="text" value="{{old('fname')}}" class="form-control" id="validationDefault01" required name="fname" placeholder="First name">
                                    <span class="text-danger">@error('fname'){{$message}}@enderror</span>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="validationDefault02" class="form-label">Last Name*</label>
                                    <input type="text" value="{{old('lname')}}" class="form-control" id="validationDefault02" required name="lname" placeholder="Last name">
                                    <span class="text-danger">@error('lname'){{$message}}@enderror</span>
                                </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="validationDefault05" class="form-label">Phone*</label>
                                        <input type="number" value="{{old('phone')}}" class="form-control" id="validationDefault05" required name="phone" placeholder="Phone number">
                                        <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                                    </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="validationDefaultUsername" class="form-label">Email Address*</label>
                                    <input type="email" value="{{old('email')}}" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required name="email" placeholder="Email address">
                                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                </fieldset>
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Login Information</h3>
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half left-item ">
                                    <label for="validationDefault03" class="form-label">Password *</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control" id="validationDefault03" required name="password" placeholder="Password">
                                        <div class="input-group-addon">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="wrap-input item-width-in-half ">
                                    <label for="validation" class="form-label">Confirm Password *</label>
                                    <div class="input-group" id="show_hide_password">
                                            <input type="password" class="form-control" id="validationDefault04" required placeholder="Confirm Password">
                                            <div class="input-group-addon">
                                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                    </div>
                                </fieldset>
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                                <div class="registrationFormAlert" style="color:#f10000;" id="CheckPasswordMatch"></div>
                                <input class="btn btn-primary" id="btnSubmit" type="submit" onclick="return checkPasswordMatch()">
                            </form>
                        </div>
                    </div>
                </div><!--end main products area-->
            </div>
        </div><!--end row-->

    </div><!--end container-->
    <style>
        a, a:hover{
            color:#333
        }
    </style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>
    <script>
        function checkPasswordMatch() {
            var password = $("#validationDefault03").val();
            var confirmPassword = $("#validationDefault04").val();
            if (password !== confirmPassword){
                $("#CheckPasswordMatch").html("Passwords does not match!");
                return false;}
            else {
                return true;
            }
        }
        $(document).ready(function () {
            $("#txtConfirmPassword").keyup(checkPasswordMatch);
        });
        $(document).ready(function () {
            $("#txtConfirmPassword").keyup(checkPasswordMatch);
        });
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });
    </script>

</main>
