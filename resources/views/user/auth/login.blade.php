@extends('layouts.auth')

@section('contents')
    <div class="col-12">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                    <div class="px-xl-4">
                        <div class="bg-white rounded-ultra shadow-lg px-8 py-5 p-md-5">

                            <!--<div class="mb-4 text-center">
                                                <img src="/prime/assets/svg/upload/login-03.svg" alt="Login" data-width="64px" data-height="64px" style="width: 64px; height: 64px;">
                                            </div>-->

                            <div class="pb-1"></div>

                            <h3 class="section-title-4 text-center font-weight-800 mb-4">
                                Member Login
                                <div class="title-divider-round"></div>
                            </h3>



                            <form method="post" action="{{ route('user.login-validate') }}"
                                class="@if (user()) hidden @endif" id="loginForm">
                                @csrf

                                <div class="input-group input-group-lg input-group-round mb-4">

                                    <div class="input-group-inner">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-icon"><i class="far fa-user"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input type="text" name="email" id="email" value=""
                                            class="form-control form-control-lg" placeholder="Email">
                                        <span>
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <div class="input-focus-bg"></div>
                                    </div>
                                </div>

                                <div class="input-group input-group-lg input-group-round mb-4">
                                    <div class="d-flex w-100 justify-content-between">

                                        <label class="px-3">
                                            <a href="{{ route('user.forgot-password.index') }}" class="text-reset">Forgot
                                                password?</a>
                                        </label>
                                    </div>
                                    <div class="input-group-inner">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-icon"><i class="far fa-eye-slash"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input type="password" name="password" id="password" value=""
                                            class="form-control form-control-lg" placeholder="Password">
                                        <span>
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <div class="input-focus-bg"></div>
                                    </div>
                                </div>

                                <div data-height="5px" style="height: 5px;"></div>
                                <button type="submit" id="loginBtn"
                                    class="btn btn-lg btn-round btn-primary btn-block mb-0 bg-green-500"><i
                                        class="fas fa-sign-in-alt" aria-hidden="true"></i>Login</button>

                                <div class="mt-4 px-2 font-semibold lg:px-10">
                                    <a href="{{ route('user.register') }}" class="hover:text-blue-700">Create your Account <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </form>




                            <form method="post" action="{{ route('user.login-verify') }}"
                                class="@if (!user()) hidden @endif" id="verifyForm">
                                @csrf

                                <div class="input-group input-group-lg input-group-round mb-4">

                                    <div class="input-group-inner">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text input-group-icon"><i class="far fa-user"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input type="number" name="otp" id="otp" value=""
                                            class="form-control form-control-lg" placeholder="OTP" required maxlength="6">
                                        <span>
                                            @error('otp')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <div class="input-focus-bg"></div>
                                    </div>
                                </div>


                                <div data-height="5px" style="height: 5px;"></div>
                                <button type="submit" id="verifyBtn"
                                    class="btn btn-lg btn-round btn-primary btn-block mb-0 bg-green-500"><i
                                        class="fas fa-sign-in-alt" aria-hidden="true"></i>Verify</button>

                                <div class="mt-4 px-2 font-semibold lg:px-10">
                                    <button type="button" class="hover:text-blue-700" id="resendBtn">Resend OTP</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#loginForm').submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var formData = form.serialize();
                var clicked = $('#loginBtn');

                //disable the submit button
                clicked.addClass('relative disabled');
                clicked.append('<span class="button-spinner"></span>');
                clicked.prop('disabled', true);

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        var verifyText = response.message;
                        var verify = response.verify;
                        $('#noticeMsg').html(verifyText).show();

                        if (verify == 1) {
                            //hide register form and display verification form
                            $('#loginForm').hide();
                            $('#verifyForm').show();

                            //update page title
                            $('#page-title').html('Verify OTP');
                        } else {
                            var url = '{{ route('user.dashboard') }}';
                            window.location.href = url;
                        }




                    },
                    error: function(xhr, status, error) {
                        $('#loginBtn').show();
                        var errors = xhr.responseJSON.errors;

                        if (errors) {
                            $.each(errors, function(field, messages) {
                                var fieldErrors = '';
                                $.each(messages, function(index, message) {
                                    fieldErrors += message + '<br>';
                                });


                                Swal.fire({
                                    icon: 'error',
                                    html: fieldErrors,
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter',
                                            Swal.stopTimer);
                                        toast.addEventListener('mouseleave',
                                            Swal.resumeTimer);
                                    }
                                });
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: 'An error occured, please try again later',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer);
                                    toast.addEventListener('mouseleave',
                                        Swal.resumeTimer);
                                }
                            });
                        }


                    },
                    complete: function() {
                        clicked.removeClass('disabled');
                        clicked.find('.button-spinner').remove();
                        clicked.prop('disabled', false);

                    }

                });
            });


            //otp form
            $('#verifyForm').submit(function(e) {
                e.preventDefault();

                var form = $(this);
                var formData = form.serialize();
                var clicked = $('#verifyBtn');

                //disable the submit button
                clicked.addClass('relative disabled');
                clicked.append('<span class="button-spinner"></span>');
                clicked.prop('disabled', true);

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        var verifyText = response.message;
                        $('#noticeMsg').html(verifyText).show();
                        var url = '{{ route('user.dashboard') }}';
                        window.location.href = url;

                    },
                    error: function(xhr, status, error) {
                        $('#verifyBtn').show();
                        var errors = xhr.responseJSON.errors;

                        if (errors) {
                            $.each(errors, function(field, messages) {
                                var fieldErrors = '';
                                $.each(messages, function(index, message) {
                                    fieldErrors += message + '<br>';
                                });


                                Swal.fire({
                                    icon: 'error',
                                    html: fieldErrors,
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter',
                                            Swal.stopTimer);
                                        toast.addEventListener('mouseleave',
                                            Swal.resumeTimer);
                                    }
                                });
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: 'An error occured, please try again later',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter',
                                        Swal.stopTimer);
                                    toast.addEventListener('mouseleave',
                                        Swal.resumeTimer);
                                }
                            });
                        }


                    },
                    complete: function() {
                        clicked.removeClass('disabled');
                        clicked.find('.button-spinner').remove();
                        clicked.prop('disabled', false);

                    }

                });
            });

        });
    </script>


    <script>
        const resendBtn = document.getElementById('resendBtn');
        const loginBtn = document.getElementById('loginBtn');
        let isClickable = true;
        let countdown;

        function startCountdown() {
            if (isClickable) {
                isClickable = false;
                resendBtn.disabled = true;

                let secondsLeft = 120; // 2 minutes
                countdown = setInterval(() => {
                    if (secondsLeft > 0) {
                        const minutes = Math.floor(secondsLeft / 60);
                        const seconds = secondsLeft % 60;
                        const formattedTime = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                        resendBtn.textContent = `Resend Again in ${formattedTime}`;
                        secondsLeft--;
                    } else {
                        resendBtn.textContent = 'Resend OTP';
                        resendBtn.disabled = false;
                        isClickable = true;
                        clearInterval(countdown);
                    }
                }, 1000); // Update every 1 second
            }
        }

        resendBtn.addEventListener('click', () => {
            startCountdown();
            // Define the CSRF token
            var csrfToken = '{{ csrf_token() }}';

            // Add the CSRF token to the request headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            // Send the AJAX request
            $.ajax({
                url: "{{ route('user.resend-otp') }}",
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    var verifyText = response.message;
                    Swal.fire({
                        icon: 'success',
                        text: verifyText,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter',
                                Swal.stopTimer);
                            toast.addEventListener('mouseleave',
                                Swal.resumeTimer);
                        }
                    });
                },
                error: function(xhr, status, error) {
                    var errors = xhr.responseJSON.errors;

                    if (errors) {
                        $.each(errors, function(field, messages) {
                            var fieldErrors = '';
                            $.each(messages, function(index, message) {
                                fieldErrors += message + '<br>';
                            });

                            Swal.fire({
                                icon: 'error',
                                html: fieldErrors,
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal
                                        .stopTimer);
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer);
                                }
                            });
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: 'An error occurred, please try again later',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer);
                                toast.addEventListener('mouseleave', Swal.resumeTimer);
                            }
                        });
                    }
                }
            });




        });

        loginBtn.addEventListener('click', () => {
            startCountdown();
        });
    </script>
@endsection
