<div class="row p-0 mt-2 justify-content-center">
        <h2>Crea il tuo account</h2>
    </div>
    <div class="row col-12 col-md-12 p-0 justify-content-center">
      <div class="col-1 col-md-3"></div>
      <div class=" col-10 col-md-6 border mb-4 mt-2 p-4">
        <form action="registration.php" method="POST" class="was-validated registration">
          <div class="form-group ">
            <label for="nome">nome</label>
            <input type="text" class="form-control" placeholder="Nome" id="nome" name="nome" required>
            <div class="invalid-feedback">Necessario compilare il campo.</div>
          </div>

          <div class="form-group">
            <label for="cog">cognome</label>
            <input type="text" class="form-control" placeholder="Cognome" name="cognome" id="cognome" required>
            <div class="invalid-feedback">Necessario compilare il campo.</div>
          </div>

          <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control" placeholder="Indirizzo email" id="email" name="email" required>
            <div class="invalid-feedback">Necessario compilare il campo.</div>
          </div>

          <!-- tipo testo o password ??-->
          <div class="form-group">
            <label for="psw">password</label>
            <input type="text" class="form-control" placeholder="Password" id="psw" name="psw" required>
            <div class="invalid-feedback">Necessario compilare il campo.</div>
          </div>

          <?php if(isset($templateParams["failure"])): ?>
            <div class="alert alert-danger">
                <p><?php echo $templateParams["failure"] ?></p> 
            </div>
        <?php endif; ?>

          <button  type="submit" class="btn btn-primary btn-block mt-4">Crea account</button>
        </form>
      </div>
      <div class="col-1 col-md-3"></div>
  </div>