package mzounko.hackhaton.com.m_zounko.model;

import java.io.Serializable;

/**
 * Created by Florentio on 12/09/15.
 */
public class Announce implements Serializable {
    private  int announce_id;
    private String description;
    private String annonceur_id;
    private String quantite;
    private String unite;
    private String prix;
    private String categorie;
    private String restant;
    private String acquis;
    private String urlImage;

    public Announce() {
    }

    public Announce(int announce_id, String description, String annonceur_id, String quantite, String unite, String prix, String categorie, String restant,
                    String acquis, String urlImage) {
        this.announce_id = announce_id;
        this.description = description;
        this.annonceur_id = annonceur_id;
        this.quantite = quantite;
        this.unite = unite;
        this.prix = prix;
        this.categorie = categorie;
        this.restant = restant;
        this.acquis = acquis;
        this.urlImage = urlImage;
    }

    public int getAnnounce_id() {
        return announce_id;
    }

    public void setAnnounce_id(int announce_id) {
        this.announce_id = announce_id;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public String getAnnonceur_id() {
        return annonceur_id;
    }

    public void setAnnonceur_id(String annonceur_id) {
        this.annonceur_id = annonceur_id;
    }

    public String getQuantite() {
        return quantite;
    }

    public void setQuantite(String quantite) {
        this.quantite = quantite;
    }

    public String getUnite() {
        return unite;
    }

    public void setUnite(String unite) {
        this.unite = unite;
    }

    public String getPrix() {
        return prix;
    }

    public void setPrix(String prix) {
        this.prix = prix;
    }

    public String getCategorie() {
        return categorie;
    }

    public void setCategorie(String categorie) {
        this.categorie = categorie;
    }

    public String getRestant() {
        return restant;
    }

    public void setRestant(String restant) {
        this.restant = restant;
    }

    public String getUrlImage() {
        return urlImage;
    }

    public String getAcquis() {
        return acquis;
    }

    public void setAcquis(String acquis) {
        this.acquis = acquis;
    }

    public void setUrlImage(String urlImage) {
        this.urlImage = urlImage;
    }
}