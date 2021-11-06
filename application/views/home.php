<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Hello, world!</title>
        <script type="text/javascript">
            function getAge(dateString) {
                var today = new Date();
                var birthDate = new Date(dateString);
                var age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                return age;
            }
            function edit() {
                var email = $("#e_mail").val();
                var pass_word = $("#pass_word").val();
                var ages = $("#age").val();
                $.ajax({
                    url: "https://reqres.in/api/users/2",
                    type: "POST",
                    data: {
                        email: email,
                        password: pass_word,
                        birthdate: ages
                    },
                    success: function (response) {  
                        $('#bsalert1').hide();
                        $('#bsalert2').show();
                        for(var a = 1; a < 7; a++){
                            if(a!==3){
                                $('#bsalert'+a).hide();
                            } else{
                                 $('#bsalert'+a).show();
                            }
                        }
                    }
                });
            }
            function delete_statement() {
                var email = $("#e_mail").val();
                var pass_word = $("#pass_word").val();
                var ages = $("#age").val();
                $.ajax({
                    url: "https://reqres.in/api/users?delay=3",
                    type: "POST",
                    data: {
                        email: email,
                        password: pass_word,
                        birthdate: ages
                    },
                    success: function (response) {  
                        $('#bsalert1').hide();
                        $('#bsalert2').show();
                        for(var a = 1; a < 7; a++){
                            if(a!==4){
                                $('#bsalert'+a).hide();
                            } else{
                                 $('#bsalert'+a).show();
                            }
                        }
                    }
                });
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6" style="border: solid #dee2e6;padding: 1.5rem;margin-top: 50px;">
                    <div class="alert alert-info" id="bsalert1" >
                        <strong>Info!</strong> Do Whatever You Want!
                    </div>
                    <div class="alert alert-success" id="bsalert2" style="display:none">
                        <strong>Info!</strong> Registered!
                    </div>
                     <div class="alert alert-success" id="bsalert3" style="display:none">
                        <strong>Info!</strong> Edited!
                    </div>
                     <div class="alert alert-success" id="bsalert4" style="display:none">
                        <strong>Info!</strong> Deleted!
                    </div>
                    <div class="alert alert-danger" id="bsalert5" style="display:none">
                        <strong>Info!</strong> You Must Be At Least 17 Years Old to Register!
                    </div>
                    <div class="alert alert-danger" id="bsalert6" style="display:none">
                        <strong>Info!</strong> Error! Please Insert @rumahweb.co.id As Domain!
                    </div>
                    <form id="myform">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="e_mail" id="e_mail" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="pass_word" class="form-control" id="psw" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$"  required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Birthday</label>
                            <div class="col-sm-10">
                                <input type="date" name="birthday" id="age" class="form-control" focusout="my_birthday(this.value)" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Process</button>
                            </div>
                            <div class="col-md-5">
                                &nbsp;
                            </div>
                            <div class="col-md-4">
                                <a href="#" onclick="edit()">Edit</a> | <a href="#" onclick="delete_statement()">Delete</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    &nbsp;
                </div>
            </div>
        </div>
        <script src="<?php echo base_url('assets/js/jquery-3.6.0.min.js') ?>" ></script>
        <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>" ></script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                var AlertMsg = $('div[role="alert"]');
                $("form#myform").submit(function (event) {
                    var email = $("#e_mail").val();
                    var pass_word = $("#pass_word").val();
                    var ages = $("#age").val();
                    var auto_ages = getAge(ages);
                    if (/@rumahweb.co.id\s*$/.test(email)) {
                        if (auto_ages <= 17) {
                            for(var a = 1; a < 7; a++){
                                if(a!==5){
                                    $('#bsalert'+a).hide();
                                } else{
                                     $('#bsalert'+a).show();
                                }
                            }
                        } else {
                            $.ajax({
                                url: "https://reqres.in/api/users",
                                type: "POST",
                                data: {
                                    email: email,
                                    password: pass_word,
                                    birthdate: ages
                                },
                                success: function (response) {
                                    $('#bsalert1').hide();
                                    $('#bsalert2').show();
                                    for(var a = 1; a < 7; a++){
                                        if(a!==2){
                                            $('#bsalert'+a).hide();
                                        } else{
                                             $('#bsalert'+a).show();
                                        }
                                    }
                                }
                            });
                        }
                    } else {
                        for(var a = 1; a < 7; a++){
                            if(a!==6){
                                $('#bsalert'+a).hide();
                            } else{
                                 $('#bsalert'+a).show();
                            }
                        }
                    }
                    return false;
                });
            });
        </script>
    </body>
</html>
