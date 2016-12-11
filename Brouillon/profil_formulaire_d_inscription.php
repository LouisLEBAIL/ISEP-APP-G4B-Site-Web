
    
<div id="profil_formulaire_d_inscription">
    <form method="post" action="#">
                        <fieldset class="modifier_profil">
                            <p>
                                <label for="Nom">Nom:</label>
                            </p>
                            <p>
                                <input type="text" name="nom" value="<?php echo $user['nom'];?>">
                            </p>
                            <p>
                                <label for="Prenom">Prenom:</label>
                            </p>
                            <p>
                                <input type="text" name="prenom" value="<?php echo $user['prenom'];?>">
                            </p>
                            
                            <p>
                                <label for="date_de_naissance">Date de naissance(jj/mm/aa)</label>

                            </p>
                            <p>
                                <input type="date" name="date_de_naissance" value="<?php echo $user['date_de_naissance'];?>">
                            
                            </p>
                            
                            <p>
                                <label for="Adresse_email">Adresse email:</label>
                            </p>
                            <p>
                                <input type="email" name="email" value="<?php echo $user['email'];?>">
                            </p>

                            <p>
                                <label for="telephone_mobile">Telephone mobile: </label>
                            </p>
                            <p>
                                <input type="tel" name="telephone_mobile" value="<?php echo $user['telephone_mobile'];?>">
                            </p>
                            <p>
                                <label for="telephone_fixe">Telephone fixe:</label>
                            </p>
                            <p>
                                <input type="tel" name="telephone_fixe" value="<?php echo $user['telephone_fixe'];?>">
                            </p>
                            <p>
                                <label for="newmdp "> nouveau mot de passe :</label>
                            </p>
                            <p>
                                <input type="password" name="newmdp">
                            </p>
                            <p>
                                <label for="confirmmdp">Confirmer mot de passe : </label>
                            </p>
                            <p>
                                <input type="password" name="confirmmdp">
                            </p>
                            
                                <p>
                                Avez vous un appartement ou une maison : <br/>
                            
                            
                                <input type="radio" name="logement" value="appartement" id="appartement" ><label for="Appartement">Appartement</label>
                                <input type="radio" name="logement" value="maison" id="maison" ><label for="Maison">Maison</label>
                            </p>
                            <p>
                                <?php 
                                    if(isset($erreur))
                                        {
                                            echo $erreur;
                                        }
                                ?>
                            </p>



                            <p>

                              <input type="submit" name="formsuivant" value="suivant"/>  
                            </p>
                        </fieldset>
    </form>
</div>
