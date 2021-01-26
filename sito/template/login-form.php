    <div class="row col-12 col-md-12 p-0 justify-content-center">
        <div class="col-1 col-md-3 p-0"></div>
        <div class=" col-10 col-md-6 border my-4 p-4">
            <form action="login.php" class="was-validated" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" placeholder="Inserci Email" name="email" id="email" required>
                <div class="invalid-feedback">Necessario compilare il campo.</div>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Inserci Password" id="pwd" name="pwd" required>
                <div class="invalid-feedback">Necessario compilare il campo.</div>
            </div>

            
            <?php if(isset($templateParams["errorelogin"])): ?>
                <div class="alert alert-danger">
                     <p><?php echo $templateParams["errorelogin"];?></p>
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary btn-block mt-2">Accedi</button>
            <div class="dropdown-divider"></div>
            <a class="btn btn-block mt-2 btn-link text-dark text-center" href="registration.php">Non hai un account? Iscriviti ora</a>
            </form>
        </div>
        <div class="col-1 col-md-3 p-0"></div>
     </div>
