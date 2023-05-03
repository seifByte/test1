<!-- Formulaire d'ajout d'un événement -->
<form method="post" action='index.php?controller=evenement&action=created' enctype="multipart/form-data">
    <fieldset>
        <legend>Création d'un nouveau Evénement</legend>
        <p>
        <label for="nom">Nom</label> :
        <input type="text" placeholder="Mon événement" name="nom" id="nom" required/>
        </p>

        <p>
        <label for="date">Date</label> :
        <input type="date" placeholder="17/04/2023" max="2050-12-31" min="2023-05-15"  name="date" id="date" required/>
        </p>

        <p>
        <label for="lieu"> Ville</label> :
                    <select name="lieu" id="lieu" required>
                        <option value="none">- Choisir une valeur -</option>
                        <option value="Ariana">Ariana</option>
                        <option value="Béja">Béja</option>
                        <option value="Ben Arous">Ben Arous</option>
                        <option value="Bizerte">Bizerte</option>
                        <option value="Gabès">Gabès</option>
                        <option value="Gafsa">Gafsa</option>
                        <option value="Jendouba">Jendouba</option>
                        <option value="Kairouan">Kairouan</option>
                        <option value="Kasserine">Kasserine</option>
                        <option value="Kébili">Kébili</option>
                        <option value="Le Kef">Le Kef</option>
                        <option value="Mahdia">Mahdia</option>
                        <option value="La Manouba">La Manouba</option>
                        <option value="Médenine">Médenine</option>
                        <option value="Monastir">Monastir</option>
                        <option value="Nabeul">Nabeul</option>
                        <option value="Sfax">Sfax</option>
                        <option value="Sidi Bouzid">Sidi Bouzid</option>
                        <option value="Siliana">Siliana</option>
                        <option value="Sousse">Sousse</option>
                        <option value="Tataouine">Tataouine</option>
                        <option value="Tozeur">Tozeur</option>
                        <option value="Tunis">Tunis</option>
                        <option value="Zaghouan">Zaghouan</option>
                        <option value="Etranger">Etranger</option>
                    </select>
        </p>

        <p>
        <label for="description">Description</label> :
        <input class='description-input'  type="text" placeholder="Votre description" name="description" id="description" required/>
        </p>

        <p>
        <label for="Prix">Votre proposition de prix de billets</label>  :
        <input type="number" min=10 max=1000 placeholder="Prix"  step="any" name="prix" id="prix" required/> DT
        </p>

        <p>
        <label for="nombre">Nombre de billets</label>  :
        <input type="number" min=10  placeholder="nombre"   name="nombre" id="nombre" required/> 
        </p>

        <p>
        <label for="image">Image de l'événement</label> :
        <input type="file" placeholder="image" name="image" id="image" required/>
        </p>



        <p>
        <input type="submit" value="Envoyer" />
        </p>
     </fieldset>
</form>


 
