package WS;

import metier.Compte;

import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
@WebService(serviceName = "BankWS")
public class BankService {
    @WebMethod(operationName ="ConvertDollartoDH")
    public double convert(@WebParam(name = "solde") double mt){
        return  mt*10.6;
    }
    @WebMethod
    public Compte getCompte(@WebParam(name = "code") String nom) throws AccountnotFoundException{
       return compteList().stream()
               .filter(acc->acc.getNom().equals(nom))
               .findFirst().orElseThrow(()->new AccountnotFoundException(String
                       .format(" not Found")));
    }
    @WebMethod
    public List<Compte> compteList(){
        List<Compte> comptes=new ArrayList<Compte>();
        comptes.add(new Compte(10, "Oussama","Chakkour", (Math.random()*100),new Date()));
        comptes.add(new Compte(20, "Karim","el ARBI",(Math.random()*100),new Date()));
        comptes.add(new Compte(30, "Ahmed","RBIEI", (Math.random()*100),new Date()));
        comptes.add(new Compte(40, "alae","Chakkour", (Math.random()*100),new Date()));
        comptes.add(new Compte(50, "abd kader","Chakkour", (Math.random()*100),new Date()));
        comptes.add(new Compte(60, "mahmoud","Chakkour", (Math.random()*100),new Date()));

        return comptes ;
    }

}
