<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<footer class="modal-footer bg-dark">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- copyright -->
            <div class="col-md-6">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <span class="copyright">Copyright @2019 All rights reserved</span>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
            <!-- /copyright -->

            <!-- footer nav -->
            <div class="col-md-6">
                <nav class="navbar-dark">
                    <a href="#">Home     </a>
                    <a href="#">Order    </a>
                    <a href="#">Login    </a>
                    <a href="#">Sign Up    </a>
                    <a href="#">My Account</a>
                </nav>
            </div>
            <!-- /footer nav -->

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</footer>

</body>

</html>

<?php

if ($db) {
    dataDisconnect($db);
}

?>