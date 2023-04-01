package metier;

import java.util.Date;

public class Compte {
    private  int code ;
    private String nom;
    private String prenom;

    public double getSolde() {
        return solde;
    }

    public void setSolde(double solde) {
        this.solde = solde;
    }

    private  double solde;
    private Date DateCreat;

    public Compte() {

    }

    public Compte(int code, String nom, String prenom, double solde, Date dateCreat) {
        this.code = code;
        this.nom = nom;
        this.prenom = prenom;
        this.solde = solde;
        DateCreat = dateCreat;
    }





    public double getsolde() {
        return solde;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    @Override
    public String toString() {
        return "Compte{" +
                "code=" + code +
                ", nom='" + nom + '\'' +
                ", prenom='" + prenom + '\'' +
                ", solde=" + solde +
                ", DateCreat=" + DateCreat +
                '}';
    }

    public int getCode() {
        return code;
    }

    public void setCode(int code) {
        this.code = code;
    }

    public Date getDateCreat() {
        return DateCreat;
    }

    public void setDateCreat(Date dateCreat) {
        DateCreat = dateCreat;
    }
}
