<div class="row px-0 mx-md-0 mx-3">
    <div class="col-md-1 col-0"></div>
      <div class="col-md-10 col-12 p-0">

        <h2 class="text-left text-md-center p-0 mt-4 mb-md-4 mb-1">Notifiche</h2>

        <section class="mt-0 mb-3 mx-0 justify-content-center">
          <ul class="text-left my-2 mx-0 list-unstyled">
            <?php foreach($templateParams["notifiche"] as $notif):?>
            <!-- NOTIFICA 1 -->
            <li class="border p-2">
              <article class="<?php if($notif["visualizzato"] == 0):?>to_be_read<?php else: ?>read<?php endif; ?>">
                <h3 class="m-0"><?php echo $notif["titolo"] ?></h3>
                <p class="m-0"><?php echo $notif["messaggio"] ?></p>
              </article>
            </li>
            <?php endforeach;?>
          </ul>
        </section>

      </div>
    <div class="col-md-1 col-0"></div>
</div>