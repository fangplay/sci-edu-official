<?php
                          include('connect.php');
                              $username = $_POST['username'];
                              $password = $_POST['password'];
                              $displayname = $_POST['displayname'];
                              $usertype = $_POST['usertype'];
                            if($_POST['username'] != '' || $_POST['password'] != '' || $_POST['displayname'] != '' || $_POST['usertype'] != ''){

                            $save = "INSERT INTO user_data(username,user_password,display_name,user_type)
                                      VALUES('$username','$password','$displayname','$usertype'";

                            $dataSave = mysqli_query($conn, $save);

                            if ($dataSave) {
                              echo "<script>
                                    alert('New record created successfully');
                                    window.location.replace('user_list.php');
                                  </script>";
                              
                            }else {
                              echo "<script>
                                      alert('Cannot Add Data');
                                      window.location.replace('user_add.php');
                                      </script>";
                            }
                          }else{
                            echo "<script>
                                      alert('Cannot Processing Data');
                                      window.location.replace('user_add.php');
                                      </script>";
                          }
