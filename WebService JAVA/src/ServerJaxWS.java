import WS.BankService;

import javax.xml.ws.Endpoint;

public class ServerJaxWS {
    public static void main(String[] args) {
        String url="http://0.0.0.0:8686/";
        Endpoint.publish(url,new BankService());
        System.out.println("WebService is Start at "+ url);
    }
}
