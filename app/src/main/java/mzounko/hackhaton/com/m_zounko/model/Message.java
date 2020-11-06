package mzounko.hackhaton.com.m_zounko.model;

import java.io.Serializable;

/**
 * Created by Florentio on 13/09/15.
 */
public class Message implements Serializable {

    private String message;
    private String annonce_id;
    private String quantite;

    public Message() {
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public String getAnnonce_id() {
        return annonce_id;
    }

    public void setAnnonce_id(String annonc_id) {
        this.annonce_id = annonc_id;
    }

    public String getQuantite() {
        return quantite;
    }

    public void setQuantite(String quantite) {
        this.quantite = quantite;
    }

    @Override
    public String toString() {
        return message;
    }
}
