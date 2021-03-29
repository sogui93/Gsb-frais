<?php

/**
 * Vue Liste des frais au forfait
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
?>


<?php
if (!verifComptable()) 
{ // si l'utilisateur est un visiteur
?>
    <div class="rows">

        <h2>Renseigner ma fiche de frais du mois
            <?php echo $numMois . '-' . $numAnnee ?>
        </h2>
        <h3>Eléments forfaitisés</h3>
        <div class="col-md-8">
            <form method="post" action="index.php?uc=gererFrais&action=validerMajFraisForfait" role="form">
                <fieldset>
                <?php
            } else {
                // si l'utilisateur est un comptable
                ?>

                    <div class="row">

                        <div class="mx-auto">
                            </br>
                            </br>
                            <h2 class='frais'>Valider la fiche de frais </h2>
                            <h3>Eléments forfaitisés</h3>
                                <form action="index.php?uc=corriger_frais&action=validerMajFraisForfaitt" method="post" role="form">
                                    <fieldset>
                                                <?php
                                            }
                                            foreach ($lesFraisForfait as $unFrais) {
                                                $idFrais = $unFrais['idfrais'];

                                                $libelle = htmlspecialchars($unFrais['libelle']);
                                                $quantite = $unFrais['quantite']; ?>
                                                    <div class="form-group">
                                                        <label for="idFrais"><?php echo $libelle ?></label>
                                                        <input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais ?>]" size="10" maxlength="5" value="<?php echo $quantite ?>" class="form-control">
                                                    </div>

                                                <?php
                                            }
                                                ?>
                                        
                                       <div class="col-md-8">
                                        <button class="btn btn-success" type="submit">Corriger</button>
                                        <button class="btn btn-danger" type="reset">Réinitialiser</button>
                                       </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
