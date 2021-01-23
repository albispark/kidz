<section>
            <h2>Articoli</h2>
            <a href="gestisci-prodotto.php?action=1">Inserisci Articolo</a>
            <table>
                <tr>
                    <th>Titolo</th><th>Immagine</th><th>Azione</th>
                </tr>
                <?php foreach($templateParams["prodotti"] as $articolo): ?>
                <tr>
                    <td><?php echo $articolo["titolo"]; ?></td>
                    <td><img src="<?php echo UPLOAD_DIR.$articolo["immagine"]; ?>" alt="" /></td>
                    <td>
                        <a href="gestisci-prodotto.php?action=2&id=<?php echo $articolo["IDprodotto"]; ?>">Modifica</a>
                        <a href="gestisci-prodotto.php?action=3&id=<?php echo $articolo["IDprodotto"]; ?>">Cancella</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </section>