<?php require_once ('dinners_direct_header.php');?>

    <div class="container">
        <main>
            <h3 class="headstyle"><b>Welcome to DinnersDirect!</b></h3><hr>
            <h6 style="text-align:center">Let's set up your account. Already have one? Log in <a href="DinnersDirect_Login.html">here</a>.</h6><br>
            <form>
                <div class="row">
                    <div class="col-md-3"></div>

                    <div class="col-md-6">
                        Email Address:
                        <input class="border" name="Email Address" type="email">
                    </div>
                    <div class="col-md-3"></div>
                </div><br>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        First Name:
                        <input class="border" name="First Name" type="text">
                    </div>
                    <div class="col-md-3"></div>
                </div><br>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        Last Name:
                        <input class="border" name="Last Name" type="text">
                    </div>
                    <div class="col-md-3"></div>
                </div><br>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        Phone Number:
                        <input class="border" name="Phone Number" type="tel">
                    </div>
                    <div class="col-md-3"></div>
                </div><br>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        Password:
                        <input class="border" name="Password" type="Password">
                    </div>
                    <div class="col-md-3"></div>
                </div><br>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        Confirm Password:
                        <input class="border" name="Confirm Password" type="Password">
                    </div>
                    <div class="col-md-3"></div>
                </div><br>


                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-4">
                        Account Type:
                        <label> <input name="Account Type" type="radio">Student</label>
                    </div>
                    <div class="col-md-1">
                        <label><input name="Account Type" type="radio">Parent</label>
                    </div>

                    <div class="col-md-4"></div>
                </div><br>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        School:
                        <select name="Schools">
                            <option value="ucl">UCL</option>
                            <option value="lse">LSE</option>
                            <option value="Imperial">Imperial College London</option>
                            <option value="Kings">Kings College London</option>
                        </select>
                    </div>
                    <div class="col-md-4"></div>
                </div><br>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-5">
                        <button class="btn btn-secondary btn-block" type="Submit">Create My Account</button>
                    </div>
                    <div class="col-md-3"></div>
                </div><br>
            </form>
        </main>
    </div>

<?php require_once ('dinners_direct_footer.php');?>