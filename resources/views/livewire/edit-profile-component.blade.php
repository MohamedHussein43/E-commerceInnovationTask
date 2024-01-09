<div>
<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="/" class="link">home</a></li>
            <li class="item-link"><span>Edit-Profile</span></li>
        </ul>
    </div>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                    </div>
                                    @if(Session::get('utype')=='ADM')
                                        <h6 class="f-w-600">Hello Admin</h6>
                                    @else
                                        <h6 class="f-w-600">Hello Customer</h6>
                                    @endif
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <form action="{{route('edit-profile')}}" method="post" name="frm-edit" autocomplete="off" >
                                        @if(Session::has('success'))
                                            <div class="alert alert-success">{{Session::get('success')}}</div>
                                        @endif
                                        @if(Session::has('fail'))
                                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                        @endif
                                        @csrf

                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                            <span class="text-danger">@error('password'){{$message}}@enderror</span>
                                            <span class="text-danger">@error('first_name'){{$message}}@enderror</span>
                                            <span class="text-danger">@error('last_name'){{$message}}@enderror</span>
                                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                            <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="validationDefault01" class="m-b-10 f-w-600 form-label">First Name</label>
                                            <input class="text-muted f-w-400 form-control" id="validationDefault01" required name="first_name" value="{{$user->first_name}}" wire:model="first_name">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="validationDefault02" class="m-b-10 f-w-600 form-label">Last Name</label>
                                            <input class="text-muted f-w-400 form-control" id="validationDefault02" required name="last_name" value="{{$user->last_name}}" wire:model="last_name">

                                        </div>
                                        <div class="col-sm-6">
                                            <label class="m-b-10 f-w-600 form-label" for="validationDefaultUsername">Email</label>
                                            <input class="text-muted f-w-400 form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required name="email" value="{{$user->email}}" wire:model="email">

                                        </div>
                                        <div class="col-sm-6">
                                            <label class="m-b-10 f-w-600 form-label">Phone</label>
                                            <input class="text-muted f-w-400 form-control" id="validationDefault02" required name="phone" value="{{$user->phone}}" wire:model="phone">

                                        </div>
                                    </div>
                                                <fieldset class="wrap-input item-width-in-half left-item ">
                                                    <label for="validationDefault03" class="form-label">Password *</label>
                                                    <div class="input-group" id="show_hide_password">
                                                         <input type="password" class="form-control" id="validationDefault03" required name="password">
                                                        <div class="input-group-addon">
                                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>

                                                </fieldset>

                                                <fieldset class="wrap-input item-width-in-half ">

                                                    <label for="validation" class="form-label">Confirm Password *</label>
                                                    <div class="input-group" id="show_hide_password">
                                                          <input type="password" class="form-control" id="validationDefault04" name="conf_password">
                                                        <div class="input-group-addon">
                                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>

                                                    <div class="registrationFormAlert" style="color:#f10000;" id="CheckPasswordMatch"></div>
                                                </fieldset>


                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Processes</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Total orders</p>
                                            <h6 class="text-muted f-w-400">{{$order}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <button class="btn btn-primary bg-c-lite-green" id="btnSubmit" type="submit" onclick="return checkPasswordMatch()" style="width:30%;margin-top:30px">Edit</button>
{{--                                            <a class="bg-c-lite-green btn btn-info" href="{{route('edit.profile')}}" style="width: 30%;margin-top: 30px">Edit</a>--}}
                                        </div>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end container-->

<style>
    a, a:hover{
        color:#333
    }
    .padding {
        padding: 3rem !important
    }

    .user-card-full {
        overflow: hidden;
    }

    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
        box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
        border: none;
        margin-bottom: 30px;
    }

    .m-r-0 {
        margin-right: 0px;
    }

    .m-l-0 {
        margin-left: 0px;
    }

    .user-card-full .user-profile {
        border-radius: 5px 0 0 5px;
    }

    .bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
        background: linear-gradient(to right, #ee5a6f, #f29263);
    }

    .user-profile {
        padding: 20px 0;
    }

    .card-block {
        padding: 1.25rem;
    }

    .m-b-25 {
        margin-bottom: 25px;
    }

    .img-radius {
        border-radius: 5px;
    }



    h6 {
        font-size: 14px;
    }

    .card .card-block p {
        line-height: 25px;
    }

    @media only screen and (min-width: 1400px){
        p {
            font-size: 14px;
        }
    }

    .card-block {
        padding: 1.25rem;
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .p-b-5 {
        padding-bottom: 5px !important;
    }

    .card .card-block p {
        line-height: 25px;
    }

    .m-b-10 {
        margin-bottom: 10px;
    }

    .text-muted {
        color: #919aa3 !important;
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0;
    }

    .f-w-600 {
        font-weight: 600;
    }

    .m-b-20 {
        margin-bottom: 20px;
    }

    .m-t-40 {
        margin-top: 20px;
    }

    .p-b-5 {
        padding-bottom: 5px !important;
    }

    .m-b-10 {
        margin-bottom: 10px;
    }

    .m-t-40 {
        margin-top: 20px;
    }

    .user-card-full .social-link li {
        display: inline-block;
    }

    .user-card-full .social-link li a {
        font-size: 20px;
        margin: 0 10px 0 0;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
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
</div>
