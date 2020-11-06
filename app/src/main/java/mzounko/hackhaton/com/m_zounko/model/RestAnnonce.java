package mzounko.hackhaton.com.m_zounko.model;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

/**
 * Created by Florentio on 12/09/15.
 */



public class RestAnnonce implements Serializable {

    //{"id":"1","type_id":"1","type":"Achat","libelle":"Metaux uses","description":"Meteaux uses lourd",
    // "quantite":"100","prix_unitaire":"200",
    // "date":{"date":"2015-09-08 00:00:00.000000","timezone_type":3,"timezone":"America\/New_York"},
    // "categorie_id":"1","categorie":"Metal","phase_id":"1","nbr_reponse":3},
    public List<RestAnnonceDetail> users;

    public RestAnnonce() {
    }

    public List<RestAnnonceDetail> getUsers() {
        return users;
    }

    public void setUsers(List<RestAnnonceDetail> users) {
        this.users = users;
    }


    public static class RestAnnonceDetail implements  Serializable {
        private String id;

        private String type_id;
        private String libelle;
        private String categorie_id;
        private String phase_id;
       // private Date date;
        private String nbr_reponse;
        private String categorie;
        private String description;
        private String quantite;
        private String prix_unitaire;

        public RestAnnonceDetail() {
        }

        public String getId() {
            return id;
        }

        public void setId(String id) {
            this.id = id;
        }

        public String getType_id() {
            return type_id;
        }

        public void setType_id(String type_id) {
            this.type_id = type_id;
        }

        public String getLibelle() {
            return libelle;
        }

        public void setLibelle(String libelle) {
            this.libelle = libelle;
        }

        public String getCategorie_id() {
            return categorie_id;
        }

        public void setCategorie_id(String categorie_id) {
            this.categorie_id = categorie_id;
        }


        public String getNbr_reponse() {
            return nbr_reponse;
        }

        public void setNbr_reponse(String nbr_reponse) {
            this.nbr_reponse = nbr_reponse;
        }

        public String getCategorie() {
            return categorie;
        }

        public void setCategorie(String categorie) {
            this.categorie = categorie;
        }

        public String getDescription() {
            return description;
        }

        public void setDescription(String description) {
            this.description = description;
        }

        public String getQuantite() {
            return quantite;
        }

        public void setQuantite(String quantite) {
            this.quantite = quantite;
        }

        public String getPrix_unitaire() {
            return prix_unitaire;
        }

        public void setPrix_unitaire(String prix_unitaire) {
            this.prix_unitaire = prix_unitaire;
        }

        public String getPhase_id() {
            return phase_id;
        }

        public void setPhase_id(String phase_id) {
            this.phase_id = phase_id;
        }

        public static class Reponse {
            private String message;
            private int quantite;

            public Reponse() {
            }

            public String getMessage() {
                return message;
            }

            public void setMessage(String message) {
                this.message = message;
            }

            public int getQuantite() {
                return quantite;
            }

            public void setQuantite(int quantite) {
                this.quantite = quantite;
            }
        }
    }
}
