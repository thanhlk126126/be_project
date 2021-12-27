
    <title> Admin-Login </title>
    <?php include ROOT_DIR.'/src/views/header.php'; ?>

<body class="bg-gradient-primary" style="margin-top: 80px;" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;<?php echo BASE_URL.'/assets/img/login1.jpg' ?>&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <form class="user">
                                        <!-- name -->
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                                        </div>
                                        <!-- code -->
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="name" id="exampleInput" aria-describedby="textHelp" placeholder="Enter The id Code " name="name">
                                        </div>
                                        <!-- pass -->
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1">
                                                    <label class="form-check-label custom-control-label" for="formCheck-1">
                                                        Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-block text-white btn-user" type="submit">Login</button> 
                                        <hr>
                                    </form>
                                    <div class="text-center" style="padding-top: 20px;" ><a class="small" href="<?php echo BASE_URL . '/admin-dk' ?>">Create an Admin Account!</a></div>
                                    <div class="text-center"><a class="small" href="<?php echo BASE_URL ?>">Back To Home</a></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include ROOT_DIR.'/src/views/footer.php'; ?>