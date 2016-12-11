<div id="profil_formulaire_d_inscription">
    <form method="post" action="#">
                        <fieldset class="modifier_profil">
                            <p>
                                <label for="Nom">Nom:</label>
                            </p>
                            <p>
                                <input type="text" name="nom">
                            </p>
                            <p>
                                <label for="Prenom">Prenom:</label>
                            </p>
                            <p>
                                <input type="text" name="prenom">
                            </p>
                            <p>
                                Sexe: <br/>
                            
                            
                                <input type="radio" name="sexe" value="Homme" id="H"><label for="Homme">Homme</label>
                                <input type="radio" name="sexe" value="Femme" id="F"><label for="Femme">Femme</label>
                            </p>
                            <p>
                                <label for="date_de_naissance">Date de naissance(jj/mm/aa)</label>

                            </p>
                            <p>
                                <input type="date" name="date_de_naissance">
                            
                            </p>
                            
                            <p>
                                <label for="Adresse_email">Adresse email:</label>
                            </p>
                            <p>
                                <input type="email" name="email">
                            </p>

                            <p>
                                <label for="telephone_mobile">Telephone mobile: </label>
                            </p>
                            <p>
                                <input type="tel" name=telephone_mobile>
                            </p>
                            <p>
                                <label for="telephone_fixe">Telephone fixe:</label>
                            </p>
                            <p>
                                <input type="tel" name="telephone_fixe">
                            </p>
                            
                                <p>
                                Avez vous un appartement ou une maison : <br/>
                            
                            
                                <input type="radio" name="logement" value="Appartement" id="appartement"><label for="Appartement">Appartement</label>
                                <input type="radio" name="logement" value="Maison" id="maison"><label for="Maison">Maison</label>
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

                              <input type="submit" name="formsuivant" value="Suivant"/>  
                            </p>
                        </fieldset>
    </form>
</div>
